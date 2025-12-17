<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lead extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'origin',
        'destination',
        'cargo_type',
        'shipping_mode',
        'container_size',
        'weight',
        'dimensions',
        'message',
        'shipping_date',
        'status',
        'source',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'assigned_to',
        'quoted_amount',
        'currency',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'shipping_date' => 'date',
        'quoted_amount' => 'decimal:2',
    ];

    /**
     * Get the user that the lead is assigned to.
     */
    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Get all activities for this lead.
     */
    public function activities(): HasMany
    {
        return $this->hasMany(LeadActivity::class);
    }

    /**
     * Add a note activity to this lead.
     *
     * @param string $content
     * @param int $userId
     * @return \App\Models\LeadActivity
     */
    public function addNote(string $content, int $userId): LeadActivity
    {
        return $this->activities()->create([
            'user_id' => $userId,
            'type' => 'note',
            'content' => $content,
        ]);
    }

    /**
     * Record an email sent to this lead.
     *
     * @param string $subject
     * @param string $content
     * @param string|null $messageId
     * @param int $userId
     * @return \App\Models\LeadActivity
     */
    public function recordEmail(string $subject, string $content, ?string $messageId, int $userId): LeadActivity
    {
        return $this->activities()->create([
            'user_id' => $userId,
            'type' => 'email',
            'email_subject' => $subject,
            'content' => $content,
            'email_message_id' => $messageId,
            'email_status' => 'sent',
        ]);
    }

    /**
     * Record a WhatsApp message sent to this lead.
     *
     * @param string $content
     * @param string|null $messageId
     * @param int $userId
     * @return \App\Models\LeadActivity
     */
    public function recordWhatsApp(string $content, ?string $messageId, int $userId): LeadActivity
    {
        return $this->activities()->create([
            'user_id' => $userId,
            'type' => 'whatsapp',
            'content' => $content,
            'whatsapp_message_id' => $messageId,
            'whatsapp_status' => 'sent',
        ]);
    }

    /**
     * Record a status change for this lead.
     *
     * @param string $oldStatus
     * @param string $newStatus
     * @param int $userId
     * @return \App\Models\LeadActivity
     */
    public function recordStatusChange(string $oldStatus, string $newStatus, int $userId): LeadActivity
    {
        return $this->activities()->create([
            'user_id' => $userId,
            'type' => 'status_change',
            'old_status' => $oldStatus,
            'new_status' => $newStatus,
        ]);
    }

    /**
     * Record an assignment change for this lead.
     *
     * @param int|null $oldUserId
     * @param int $newUserId
     * @param int $actorUserId
     * @return \App\Models\LeadActivity
     */
    public function recordAssignment(?int $oldUserId, int $newUserId, int $actorUserId): LeadActivity
    {
        return $this->activities()->create([
            'user_id' => $actorUserId,
            'type' => 'assignment',
            'content' => json_encode([
                'old_user_id' => $oldUserId,
                'new_user_id' => $newUserId,
            ]),
        ]);
    }

    /**
     * Record a file attachment for this lead.
     *
     * @param string $filePath
     * @param string $fileName
     * @param string $fileType
     * @param int $userId
     * @return \App\Models\LeadActivity
     */
    public function addAttachment(string $filePath, string $fileName, string $fileType, int $userId): LeadActivity
    {
        return $this->activities()->create([
            'user_id' => $userId,
            'type' => 'file',
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_type' => $fileType,
        ]);
    }

    /**
     * Get the status badge HTML.
     *
     * @return string
     */
    public function getStatusBadgeAttribute(): string
    {
        $colors = [
            'new' => 'bg-blue-100 text-blue-800',
            'contacted' => 'bg-purple-100 text-purple-800',
            'quoted' => 'bg-yellow-100 text-yellow-800',
            'negotiating' => 'bg-indigo-100 text-indigo-800',
            'won' => 'bg-green-100 text-green-800',
            'lost' => 'bg-red-100 text-red-800',
            'cancelled' => 'bg-gray-100 text-gray-800',
        ];

        $color = $colors[$this->status] ?? 'bg-gray-100 text-gray-800';

        return '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ' . $color . '">' 
            . ucfirst($this->status) 
            . '</span>';
    }
}
