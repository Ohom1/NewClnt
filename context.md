### 📌 Project Name

**Marinexa Shipping Pvt Ltd**

### 🌍 Industry

International Logistics, Freight Forwarding, and Global Shipping (Air & Sea Cargo).

### 💼 Project Overview

Marinexa Shipping Pvt Ltd requires a **modern, SEO-optimized business website** combined with an integrated **Lead Management System (LMS)** that automates customer communication via **Email (Brevo)** and **WhatsApp notifications**.
The system will allow both potential customers and internal staff to track and manage leads, quotes, and shipment statuses in real time.

The overall goal is to provide a clean, trustworthy, and technology-driven impression to international clients while simplifying the company’s internal communication workflow.

---

## 🎯 Primary Objectives

1. **Corporate Website**

   * Showcase services (Air, Ocean, Customs, Door-to-Door logistics).
   * Provide detailed route pages and quote request forms.
   * Capture leads with tracking and UTM.
   * SEO-friendly and multilingual ready (future scope).

2. **Lead Management System (LMS)**

   * Store, assign, and track leads.
   * Manage communication logs (emails, WhatsApp, calls, notes).
   * Auto-notify via Brevo email + WhatsApp messages for events.
   * Role-based access for team members.
   * Central dashboard with analytics & pipeline visualization.

3. **Automation & Integrations**

   * **Email automation:** Brevo transactional API.
   * **WhatsApp automation:** Unofficial gateway for internal team notifications.
   * Scheduled reports and follow-up reminders.
   * Webhooks to capture Brevo delivery & WhatsApp message events.

---

## 🧱 Technology Stack

| Layer               | Technology                                            |
| ------------------- | ----------------------------------------------------- |
| **Backend**         | PHP 8.x (Laravel Framework recommended)               |
| **Frontend**        | Blade Templates + Tailwind CSS                        |
| **Database**        | MySQL / MariaDB                                       |
| **Caching & Queue** | Redis                                                 |
| **Mail Service**    | Brevo (Transactional & Campaign API)                  |
| **Messaging**       | WhatsApp (Unofficial API Gateway initially)           |
| **Hosting**         | VPS (e.g., DigitalOcean / AWS EC2)                    |
| **Version Control** | GitHub                                                |
| **Deployment**      | Laravel Forge / CI/CD pipeline                        |
| **Security**        | SSL (Let’s Encrypt), Auth Guards, CSRF, Rate Limiting |

---

## 🧩 Functional Modules

### 1. Website (Public)

* **Pages:** Home, Services, Routes, About, Contact, Careers, Blog.
* **Dynamic Routing:** `/services/:slug`, `/routes/:slug`.
* **Quote Form:** Origin, Destination, Cargo details, Contact info.
* **Lead API Endpoint:** `/api/v1/leads` (JSON POST).

### 2. Lead Management System (Admin Panel)

* Secure login, Role-based Dashboard.
* Lead table (search, sort, filters, pagination).
* Lead detail view: activity timeline, attachments, communication log.
* Assignment & follow-up reminders.
* Email + WhatsApp message triggers on status change.
* Export & reporting (CSV, PDF).

### 3. Notifications & Automation

* Brevo emails for quote confirmation, booking updates.
* WhatsApp notifications for:

  * New lead alert (internal)
  * Status updates (customer)
* Daily / Weekly summary emails.
* Webhooks for email/WhatsApp delivery tracking.

---

## 🎨 Design & Brand Identity

### Logo Reference

*(Already provided in `/assets/logo.png`)*
Elements in logo:

* **Colors:** Green (growth, eco, connectivity), Navy Blue (trust, maritime, reliability).
* **Symbolism:** Ship (ocean freight), Globe (global reach), Airplane (air cargo).

---

## 🖌️ Color Palette

| Element                            | Color                                                        | Hex       | Use                              |
| ---------------------------------- | ------------------------------------------------------------ | --------- | -------------------------------- |
| **Primary Blue (Trust)**           | ![#013A63](https://via.placeholder.com/20/013A63/013A63.png) | `#013A63` | Navbar, Buttons, Headings        |
| **Secondary Green (Eco / Global)** | ![#3CB043](https://via.placeholder.com/20/3CB043/3CB043.png) | `#3CB043` | Icons, Highlights, CTA Buttons   |
| **Accent Light Green**             | ![#9FE870](https://via.placeholder.com/20/9FE870/9FE870.png) | `#9FE870` | Hover states, Section highlights |
| **Dark Navy (Text/Contrast)**      | ![#001E2E](https://via.placeholder.com/20/001E2E/001E2E.png) | `#001E2E` | Headers, Bold texts              |
| **Background Light Grey**          | ![#F8FAFC](https://via.placeholder.com/20/F8FAFC/F8FAFC.png) | `#F8FAFC` | Page background                  |
| **White**                          | ![#FFFFFF](https://via.placeholder.com/20/FFFFFF/FFFFFF.png) | `#FFFFFF` | Cards, Containers, Forms         |

---

## ✏️ Typography

| Type               | Font         | Weight        | Usage             |
| ------------------ | ------------ | ------------- | ----------------- |
| **Primary Font**   | `Poppins`    | 400, 600, 700 | Body text, titles |
| **Secondary Font** | `Lato`       | 300, 400      | Paragraphs        |
| **Fallback**       | `sans-serif` | —             | System fallback   |

* Headings: Uppercase, bold.
* Line height: 1.6
* Letter spacing: +1px for uppercase headings.

---

## 🧭 UI Components & Style Guide

* **Navbar:** Sticky, minimal with a subtle green underline hover effect.
* **Hero Section:** Split layout (ship image + contact form CTA).
* **Buttons:**

  * Primary: Blue background, white text.
  * Secondary: Green outline.
* **Cards:** Rounded corners (radius `16px`), soft shadows.
* **Icons:** Simple line icons (Lucide / Heroicons).
* **Animations:** Framer Motion / AOS fade-in for scroll reveal.

---

## 🧰 API Integration Notes

### Brevo (Email)

* Use transactional API key via `.env`.
* Template placeholders: `{{lead.name}}`, `{{origin}}`, `{{destination}}`.
* Webhook endpoint: `/webhooks/brevo` (store events in DB).

### WhatsApp (Unofficial)

* Send outbound messages through local gateway service.
* Store message IDs & statuses in `lead_activities`.
* Retry queue on failure.

### Data Flow

```
Website Form → Lead DB Entry → Queue Job
Queue Job → Send Email (Brevo)
Queue Job → Send WhatsApp Message
Webhook → Update Message Status in DB
```

---

## 🔐 Security Requirements

* HTTPS enforced on all endpoints.
* Server-side validation for all input fields.
* reCAPTCHA on all public forms.
* Role-based access for Admin/Sales/Support.
* Audit logs for updates & communication.
* DB backups scheduled daily.

---

## ⚙️ Clean URL Rules

| Type       | Example                       | Description             |
| ---------- | ----------------------------- | ----------------------- |
| Home       | `/`                           | Homepage                |
| Service    | `/services/ocean-freight`     | Individual service page |
| Route      | `/routes/mumbai-to-singapore` | Route details           |
| Quote Form | `/get-a-quote`                | Lead capture            |
| Admin      | `/admin/leads`                | LMS dashboard           |
| API        | `/api/v1/leads`               | JSON API endpoint       |

---

## 📈 Phase Plan

| Phase       | Deliverable                            | Duration |
| ----------- | -------------------------------------- | -------- |
| **Phase 1** | Website UI + Quote form + DB schema    | 2 weeks  |
| **Phase 2** | Admin Panel (Lead Mgmt) + Brevo Email  | 2 weeks  |
| **Phase 3** | WhatsApp Integration + Automation      | 2 weeks  |
| **Phase 4** | Dashboard Analytics + Reports + Polish | 1 week   |

---

## 🧪 Testing Checklist

* Form submission validation (required, format, recaptcha).
* Email deliverability (Brevo test logs).
* WhatsApp message send + delivery logging.
* Lead creation & assignment.
* Role-based permission testing.
* SQL injection & XSS defense check.

---

## 📎 Deliverables

* `/frontend/` — Tailwind-based website templates.
* `/backend/` — Laravel controllers, migrations, jobs.
* `/assets/` — logo, icons, brand kit.
* `/config/` — env.example for Brevo, WhatsApp, DB.
* `/docs/context.md` — this file (project reference).

---

## 🔖 Tone & Brand Voice

* Confident, professional, globally oriented.
* Clear CTA and service-oriented tone.
* Trust-focused (use testimonials, certifications).
* Minimal clutter, international appeal.

---

## 🧠 AI Model Instructions (for Dev or Designer Agents)

> You are building for a **B2B International Shipping Company**.
> Focus on **clarity, trust, global connectivity, and speed**.
> Use the color palette and fonts exactly as defined.
> Ensure all generated content (copy, UI, code) matches this style guide.
>
> Prioritize:
>
> * Clean, semantic HTML structure (for SEO)
> * Fast loading (optimize images, async scripts)
> * Fully responsive
> * Consistent lead workflow integration

