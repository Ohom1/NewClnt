<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeadActivity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lead_id',
        'user_id',
        'type',
        'content',
        'email_subject',
        'whatsapp_message_id',
        'whatsapp_status',
        'email_message_id',
        'email_status',
        'old_status',
        'new_status',
        'file_path',
        'file_name',
        'file_type',
    ];

    /**
     * Get the lead that owns the activity.
     */
    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    /**
     * Get the user that performed the activity.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the formatted activity message.
     *
     * @return string
     */
    public function getFormattedMessageAttribute(): string
    {
        $message = '';
        $userName = $this->user ? $this->user->name : 'System';

        switch ($this->type) {
            case 'note':
                $message = "<strong>{$userName}</strong> added a note: \"{$this->content}\"";
                break;
            case 'email':
                $message = "<strong>{$userName}</strong> sent an email with subject \"{$this->email_subject}\"";
                break;
            case 'whatsapp':
                $message = "<strong>{$userName}</strong> sent a WhatsApp message";
                break;
            case 'call':
                $message = "<strong>{$userName}</strong> logged a call: \"{$this->content}\"";
                break;
            case 'status_change':
                $message = "<strong>{$userName}</strong> changed status from <span class=\"font-medium\">" . ucfirst($this->old_status) . "</span> to <span class=\"font-medium\">" . ucfirst($this->new_status) . "</span>";
                break;
            case 'assignment':
                $data = json_decode($this->content, true);
                $newUserName = User::find($data['new_user_id'])->name ?? 'Unknown';
                
                if (empty($data['old_user_id'])) {
                    $message = "<strong>{$userName}</strong> assigned this lead to <strong>{$newUserName}</strong>";
                } else {
                    $oldUserName = User::find($data['old_user_id'])->name ?? 'Unknown';
                    $message = "<strong>{$userName}</strong> reassigned this lead from <strong>{$oldUserName}</strong> to <strong>{$newUserName}</strong>";
                }
                break;
            case 'file':
                $message = "<strong>{$userName}</strong> attached a file: <a href=\"" . asset('storage/' . $this->file_path) . "\" target=\"_blank\" class=\"text-secondary-green hover:underline\">{$this->file_name}</a>";
                break;
            default:
                $message = "<strong>{$userName}</strong> performed an action";
        }

        return $message;
    }

    /**
     * Get the icon for this activity type.
     *
     * @return string
     */
    public function getIconAttribute(): string
    {
        $icons = [
            'note' => 'clipboard',
            'email' => 'mail',
            'whatsapp' => 'message-circle',
            'call' => 'phone',
            'status_change' => 'refresh-cw',
            'assignment' => 'user-check',
            'file' => 'paperclip',
        ];

        return $icons[$this->type] ?? 'activity';
    }

    /**
     * Get the icon color for this activity type.
     *
     * @return string
     */
    public function getIconColorAttribute(): string
    {
        $colors = [
            'note' => 'text-amber-500',
            'email' => 'text-blue-500',
            'whatsapp' => 'text-green-500',
            'call' => 'text-purple-500',
            'status_change' => 'text-orange-500',
            'assignment' => 'text-indigo-500',
            'file' => 'text-gray-500',
        ];

        return $colors[$this->type] ?? 'text-gray-500';
    }
}
