# EventHub - Event Registration & Management System

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.7.3-red)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple)
![PHPUnit](https://img.shields.io/badge/PHPUnit-10-green)

EventHub is a full-stack CodeIgniter 4 final project developed for BS Information Technology. The system allows users to browse events, register online, upload profile pictures, and receive email confirmations. Administrators can manage registrations, monitor attendees, and access dashboard statistics through a secure admin panel.

---

## Table of Contents

* [Project Information](#project-information)
* [Contributors](#contributors)
* [Main Features](#main-features)
* [Technologies Used](#technologies-used)
* [System Requirements](#system-requirements)
* [Project Structure](#project-structure)
* [Installation and Setup](#installation-and-setup)
* [Default Admin Account](#default-admin-account)
* [Database Tables](#database-tables)
* [SMTP Email Setup](#smtp-email-setup)
* [Security Implementation](#security-implementation)
* [Advanced CodeIgniter 4 Features](#advanced-codeigniter-4-features)
* [Unit Testing and Debugging](#unit-testing-and-debugging)
* [Deployment](#deployment)
* [Live URL](#live-url)
* [Important Notes](#important-notes)
* [Final Status](#final-status)
* [License](#license)

---

## Project Information

| Category      | Details                                           |
| ------------- | ------------------------------------------------- |
| Project Title | EventHub - Event Registration & Management System |
| Framework     | CodeIgniter 4                                     |
| Language      | PHP 8.2+                                          |
| Database      | MySQL                                             |
| Frontend      | Bootstrap 5, SweetAlert2, AOS Animations          |
| Testing       | PHPUnit                                           |

---

## Contributors

* Gerald Ace V. Nazareno
* Aryana B. Balasta
* Justine V. Deleon
* Aaliyah Francesca Gabriele M. Garlan
* Laurence B. Alsong

**BSIT 3.8**

---

## Main Features

### Public Features

* Browse available events
* Register online
* Upload profile pictures
* Receive email confirmation
* View registration success page

### Admin Features

* Secure administrator login
* Dashboard statistics
* Search attendees
* Pagination (5 records per page)
* Manage registration records
* Delete attendee records
* View uploaded profile pictures

### Security Features

* CSRF Protection
* XSS Protection
* Password Hashing
* Session Authentication
* Secure File Upload Validation

---

## Technologies Used

* CodeIgniter 4.7.3
* PHP 8.2+
* MySQL
* Bootstrap 5
* Bootstrap Icons
* SweetAlert2
* AOS Animations
* PHPUnit 10
* Gmail SMTP
* XAMPP

---

## System Requirements

```text
PHP 8.2+
Composer
MySQL
Apache Server
XAMPP
```

---

## Project Structure

```text
EVENTMANAGEMENTSYSTEM/
│
├── app/
│   ├── Config/
│   ├── Controllers/
│   ├── Database/
│   ├── Filters/
│   ├── Models/
│   └── Views/
│
├── database/
│   └── eventhub_schema.sql
│
├── public/
│   ├── assets/
│   ├── index.php
│   └── .htaccess
│
├── tests/
│
├── writable/
│   └── uploads/
│
├── .env
├── composer.json
├── phpunit.xml
└── README.md
```

---

## Installation and Setup

### 1. Clone Repository

```bash
git clone https://github.com/your-username/EventHub.git
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Configure Environment

Copy `.env.example` to `.env` and update:

```env
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost/EVENTMANAGEMENTSYSTEM/public/'

database.default.hostname = localhost
database.default.database = eventhub_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 4. Create Database

```sql
CREATE DATABASE eventhub_db;
```

### 5. Run Migration

```bash
php spark migrate
```

### 6. Seed Database

```bash
php spark db:seed EventHubSeeder
```

### 7. Run Application

```bash
php spark serve
```

Open:

```text
http://localhost:8080
```

---

## Default Admin Account

```text
Email: ***********
Password: ***********
```

> Change the default administrator password before deployment.

---

## Database Tables

| Table      | Description            |
| ---------- | ---------------------- |
| users      | Administrator accounts |
| events     | Event records          |
| attendees  | Registration records   |
| migrations | Migration history      |

---

## SMTP Email Setup

```env
email.fromEmail = 'yourgmail@gmail.com'
email.fromName = 'EventHub'
email.protocol = smtp
email.SMTPHost = smtp.gmail.com
email.SMTPUser = 'yourgmail@gmail.com'
email.SMTPPass = 'your-app-password'
email.SMTPPort = 587
email.SMTPCrypto = tls
email.mailType = html
```

Email template location:

```text
app/Views/emails/registration_confirmation.php
```

---

## Security Implementation

* Global CSRF Filter
* Session Authentication
* Password Hashing
* XSS Filtering
* Secure File Upload Validation
* Route Protection
* Escaped Output
* Directory Listing Disabled

---

## Advanced CodeIgniter 4 Features

* File Upload using UploadedFile
* Gmail SMTP Integration
* HTML Email Templates
* Pagination
* Search Filtering
* Query Optimization
* Route Caching
* Debug Toolbar
* Database Indexing

---

## Unit Testing and Debugging

Run PHPUnit:

```bash
vendor/bin/phpunit
```

Windows:

```powershell
vendor\bin\phpunit
```

Expected Result:

```text
OK (11 tests, 20 assertions)
```

---

## Deployment

### Production Environment

```env
CI_ENVIRONMENT = production

app.baseURL = 'https://your-domain.com/'
```

### Deployment Checklist

* Configure live database
* Set writable permissions
* Enable HTTPS
* Upload project files
* Configure SMTP credentials
* Disable Debug Toolbar
* Verify file uploads

---

## Live URL

Coming Soon

```text
https://your-live-domain.com
```

---

## Important Notes

* Do not commit `.env` files.
* Keep SMTP credentials private.
* Change default admin password.
* Use HTTPS in production.
* Ensure writable folder permissions are configured correctly.

---

## Final Status

| Requirement              | Status      |
| ------------------------ | ----------- |
| Security                 | ✅ Completed |
| Advanced Features        | ✅ Completed |
| Unit Testing             | ✅ Completed |
| Deployment Documentation | ✅ Completed |
| Code Quality             | ✅ Completed |

---

## License

This project is intended for educational purposes only.
