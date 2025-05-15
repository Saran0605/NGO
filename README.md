# PRADAN Form Submission & Approval System (Laravel Project)

This project is a Laravel-based web application developed as a consultancy project for **PRADAN**, a prominent NGO working in rural development across India.

The system streamlines the process of **form submissions and approval workflows**, enabling field agents and administrators to collaborate efficiently and manage data with ease.

---

## 📌 Project Objectives

- Enable PRADAN field workers to submit structured forms digitally.
- Introduce a multi-level **approval process** for submitted forms.
- Maintain a secure and centralized database for managing rural development data.

---

## 🛠️ Tech Stack

- **Framework**: Laravel 10+
- **Frontend**: Blade, Bootstrap, JavaScript
- **Database**: MySQL
- **Server**: Apache (XAMPP/LAMP)

---

## ✅ Core Features

- 📝 **Dynamic Form Submission**  
  Users can fill out and submit forms with validations.

- 🔐 **Role-Based Access Control**  
  Separate roles for admins, reviewers, and submitters.

- ✔️ **Approval Workflow**  
  Multi-step form review and approval/rejection process.

- 📊 **Submission Dashboard**  
  View and manage all submitted forms with filtering options.

- 📁 **Export Reports**  
  Download approved submissions in Excel/CSV formats.

---

## 👨‍💻 My Role

- End-to-end development using Laravel.
- Integrated authentication and role-based authorization.
- Designed approval logic with status tracking.
- Handled database schema design and migration.

---

## 🚀 How to Run Locally

```bash
git clone https://github.com/yourusername/pradan-form-approval-system.git
cd pradan-form-approval-system
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
