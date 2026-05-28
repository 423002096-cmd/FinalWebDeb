# EventHub - Event Registration & Management System

EventHub is a full-stack CodeIgniter 4 final project for BS Information Technology. It is a modern event registration and management system where public users can browse events, register online, upload a profile picture, and receive an email confirmation.

Administrators can securely log in, view dashboard statistics, search attendees, manage registration records, view uploaded images, and delete invalid entries.

The project was built to satisfy the final project requirements for security, advanced CodeIgniter 4 features, unit testing/debugging, deployment readiness, code quality, and documentation.

---

## Table of Contents

* [Project Information](#project-information)
* [Contributors](#contributors)
* [Main Features](#main-features)
* [Technologies Used](#technologies-used)
* [System Requirements](#system-requirements)
* [Folder Structure](#final-project-folder-structure)
* [Installation and Local Setup](#installation-and-local-setup)
* [Default Admin Account](#default-admin-account)
* [Database Tables](#database-tables)
* [SMTP Email Setup](#smtp-email-setup)
* [Security Implementation](#security-implementation)
* [Advanced CI4 Features](#advanced-ci4-features)
* [Unit Testing and Debugging](#unit-testing-and-debugging)
* [Deployment](#deployment)
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

*BSIT 3.8*

---

## Main Features

* Public landing page with event highlights and upcoming event cards
* Event registration form with validation
* Secure profile picture upload using CodeIgniter UploadedFile
* Uploaded files stored in writable/uploads/
* Registration success page displaying uploaded image
* Gmail SMTP confirmation email
* HTML email template with plain-text fallback
* Admin login and logout
* Session-based authentication
* Password hashing using password_hash() and password_verify()
* Admin dashboard statistics
* Attendee management table
* Search by name, email, or course
* Pagination with 5 records per page
* Search query maintained during pagination
* Delete attendee with SweetAlert2 confirmation
* CSRF protection
* XSS prevention and escaped output
* Debug Toolbar support in development mode
* Homepage page caching
* Optimized attendee query using select()
* Database indexes for searchable fields
* PHPUnit test suite
* Deployment documentation for InfinityFree, Hostinger, and shared hosting

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
* XAMPP for local development
* InfinityFree or shared hosting for deployment

---

## System Requirements

plaintext
- PHP 8.2+
- Composer
- MySQL
- Apache Server
- XAMPP

---

## Final Project Folder Structure

plaintext
EVENTMANAGEMENTSYSTEM/
│
├── app/
│   ├── Config/
│   │   ├── Routes.php
│   │   ├── Filters.php
│   │   ├── Email.php
│   │   └── Pager.php
│   │
│   ├── Controllers/
│   │   ├── AdminController.php
│   │   ├── AuthController.php
│   │   ├── Home.php
│   │   └── RegistrationController.php
│   │
│   ├── Database/
│   │   ├── Migrations/
│   │   └── Seeds/
│   │
│   ├── Filters/
│   │   ├── AuthFilter.php
│   │   └── XSSFilter.php
│   │
│   ├── Models/
│   │   ├── AttendeeModel.php
│   │   ├── EventModel.php
│   │   └── UserModel.php
│   │
│   └── Views/
│       ├── admin/
│       ├── auth/
│       ├── emails/
│       ├── events/
│       ├── home/
│       ├── layouts/
│       └── pager/
│
├── database/
│   └── eventhub_db.sql
│
├── public/
│   ├── assets/
│   │   └── css/
│   │       └── eventhub.css
│   ├── index.php
│   └── .htaccess
│
├── tests/
│   ├── app/
│   │   └── EventHubWeek14Test.php
│   └── unit/
│       └── EventHubTest.php
│
├── writable/
│   └── uploads/
│
├── .env
├── .gitignore
├── .htaccess
├── composer.json
└── phpunit.dist.xml

---

## Installation and Local Setup

### 1. Start Apache and MySQL

Start Apache and MySQL using XAMPP Control Panel.

---

### 2. Place the Project Directory

plaintext
C:\xampp\htdocs\EVENTMANAGEMENTSYSTEM

---

### 3. Install Composer Dependencies

composer install

---

### 4. Create or Import the Database

### Option A — Import SQL using phpMyAdmin

plaintext
database/eventhub_db.sql

### Option B — Use CodeIgniter Migration and Seeder

php spark migrate
php spark db:seed EventHubSeeder

---

### 5. Configure .env

env
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost/EVENTMANAGEMENTSYSTEM/public/'

database.default.hostname = localhost
database.default.database = eventhub_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306

---

### 6. Run the Application

plaintext
http://localhost/EVENTMANAGEMENTSYSTEM/public/

---

## Default Admin Account

plaintext
Email: ***********
Password: ***********

Change the default administrator password before deploying to production.


If you would like to test the system, please contact one of the contributors.

---

## Database Tables

plaintext
users
events
attendees
migrations

### Main Table Purpose

| Table      | Purpose                                           |
| ---------- | ------------------------------------------------- |
| users      | Administrator accounts                            |
| events     | Event listings                                    |
| attendees  | Registration records and uploaded image filenames |
| migrations | CodeIgniter migration tracking                    |

---

## SMTP Email Setup

Create a Gmail App Password and configure the .env file:

env
email.fromEmail = 'yourgmail@gmail.com'
email.fromName = 'EventHub'
email.protocol = smtp
email.SMTPHost = smtp.gmail.com
email.SMTPUser = 'yourgmail@gmail.com'
email.SMTPPass = 'your-gmail-app-password'
email.SMTPPort = 587
email.SMTPCrypto = tls
email.mailType = html

### Email Template Location

plaintext
app/Views/emails/registration_confirmation.php

### Email Logs

plaintext
writable/logs/

---

## Security Implementation

### Security Files

plaintext
app/Config/Filters.php
app/Filters/AuthFilter.php
app/Filters/XSSFilter.php

### Implemented Security Controls

* Global CSRF filter
* csrf_field() in all POST forms
* Secure session authentication
* Admin route protection
* Password hashing
* XSS input cleanup filter
* Escaped output using esc($variable, 'html')
* Secure uploaded file validation
* Directory listing disabled using Options -Indexes

---

## Advanced CI4 Features

Implemented features include:

* Multipart image upload form
* UploadedFile validation
* Secure upload storage in writable/uploads/
* Uploaded image preview after registration
* Gmail SMTP email integration
* HTML email and plain-text fallback
* Logged email delivery status
* Pagination using $model->paginate(5)
* Search query maintained during pagination
* Current page and total record count
* Debug Toolbar in development mode
* Homepage route caching
* Optimized attendee query using select()
* Database indexes for performance optimization

---

## Unit Testing and Debugging

### Test Files

plaintext
tests/app/EventHubWeek14Test.php
tests/unit/EventHubTest.php

### Run PHPUnit

vendor/bin/phpunit --no-coverage

### Windows PowerShell

vendor\bin\phpunit --no-coverage

### Current Result

plaintext
OK (11 tests, 20 assertions)

### Covered Tests

* Homepage returns HTTP 200
* Model method test using assertEquals()
* Validation pass/fail test
* Required assertions:

  * assertTrue
  * assertEquals
  * assertNotNull
  * assertStatus(200)

---

## Deployment

### Production .env Example

env
CI_ENVIRONMENT = production

app.baseURL = 'https://your-live-domain.com/'

### Deployment Requirements Covered

* Production environment configuration
* Live baseURL
* Debug Toolbar disabled in production
* File upload through SFTP/FileZilla/WinSCP or Git
* writable/ permissions set to 755
* Root .htaccess redirects traffic to /public/
* Database export/import instructions
* Live database credentials setup
* SSL/HTTPS deployment guide
* .env included in .gitignore
* Directory listing disabled
* Strong production database password policy

### Root .htaccess

apache
Options -Indexes

<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_URI} !^/public/
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>

---

## Live URL

Deployment link will be added after production deployment.

plaintext
https://your-live-eventhub-url.com/

---

## Important Notes

* Do not commit real .env secrets.
* .env is already included in .gitignore.
* Change the default administrator password before public deployment.
* Keep writable/uploads/ writable on the production server.
* Use HTTPS for production deployment.

---

## Final Status

| Category                       | Status    |
| ------------------------------ | --------- |
| Security                       | Completed |
| Advanced Features              | Completed |
| Unit Testing and Debugging     | Completed |
| Deployment Documentation       | Completed |
| Code Quality and Documentation | Completed |

---

## License#   F i n a l W e b D e b  
 