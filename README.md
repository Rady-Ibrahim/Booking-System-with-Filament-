<<<<<<< HEAD


# Booking System (Laravel + Filament 3)

A clean, junior-friendly booking platform built with **Laravel 12** and **Filament 3.3**. It helps teams manage **customers, services, bookings, and booking statuses** from a modern admin panel.

> This README is designed to be recruiter‑friendly: quick to skim, with clear install steps, features, and roadmap.

---

## ✨ Key Features (Current)

* **Customers** management (Users)
* **Services** management
* **Bookings** CRUD with status workflow: `Pending → Confirmed → Completed → Cancelled`
* **Filament 3 Admin** resources for all entities
* **Smart tables** with search, filters, and sorting
* **Basic dashboard** and quick metrics (via Filament widgets)

---

## 🗺️ Roadmap (Upcoming)

* **Payments Integration**

  * Link bookings to payments
  * Payment model & relations (Booking ↔ Payment)
* **Notifications**

  * Email notifications on confirmation/cancellation
  * Real‑time notifications (broadcast)
* **Reports & Exports**

  * Download **PDF / Excel** reports (Laravel Excel, DomPDF)
  * Booking statistics by status & date range
* **UI & UX Improvements**

  * Polished Filament theme, icons, and layout
  * **Localization (multi‑language)**
* **Roles & Permissions**

  * Role‑based access control (Filament Shield / Spatie Permissions)
* **Automated Tests**

  * Feature & unit tests for core flows

---

## 🧰 Tech Stack

* **Backend:** PHP 8.2+, Laravel 12
* **Admin:** Filament 3.3 (Resources, Widgets, Tables, Forms)
* **Database:** MySQL (or any Laravel‑supported driver)
* **Auth:** Laravel default (ready to extend to Sanctum/Passport if API added)
* **Exports:** Laravel Excel (XLSX/CSV), DomPDF (PDF) *(planned)*
* **Notifications:** Mail, Broadcasting *(planned)*

---

## ✅ Requirements

* **PHP** 8.2+
* **Composer**
* **Node.js & NPM** (for assets if needed)
* **Database**: MySQL (recommended)

---


### 🔑 Admin (Filament) Access

* Admin Panel: `/admin`
* Default admin (if seeded):

  * **Email:** `admin@example.com`
  * **Password:** `password`

> If you don’t use seeders, create a user and grant the necessary role/permissions as described below.

---

## 🧱 Domain Model

**Entities**

* **User** (customer/admin)
* **Service** (bookable item)
* **Booking** (belongs to User, belongs to Service)
* *(Planned)* **Payment** (belongs to Booking)

**Suggested Booking Statuses**

* `pending`, `confirmed`, `completed`, `cancelled`

**High‑level ERD (text)**

```
User (id, name, email, ...)
Service (id, name, price, duration, ...)
Booking (id, user_id, service_id, scheduled_at, status, notes, ...)
Payment (id, booking_id, amount, method, status, paid_at, ...)   # planned
```

---

## 🧩 Filament Resources

* `UserResource` — manage customers & admins
* `ServiceResource` — manage services (price/duration)
* `BookingResource` — create, edit, and transition statuses
* *(Planned)* `PaymentResource` — record and review payments

Each resource includes:

* Table: search, filters (by status/date), sorting, bulk actions
* Form: validated inputs, relations (user/service), status select
* Actions: view, edit, delete; custom actions for status changes

---

## 📊 Reports & Exports *(planned)*

* **Excel/CSV:** via Laravel Excel (`app/Exports/*`)
* **PDF:** via DomPDF (printable booking summary, daily report)
* **Stats:** Filament widgets for counts by status & date range

---

## 🔔 Notifications *(planned)*

* **Mail:** booking confirmation/cancellation
* **Broadcast:** real‑time updates for admins (Echo/Pusher compatible)

---

## 🔐 Roles & Permissions *(planned)*

* Use **Spatie/laravel-permission**
* Roles: `Admin`, `Staff`, `Viewer`
* Restrict Filament resources/actions per role



