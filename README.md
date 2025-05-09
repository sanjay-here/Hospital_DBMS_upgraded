# ⚠️ Hospital Management System (HMS) – Forked & Heavily Modified Version

> ⚠️ **Disclaimer:** This project was originally forked from an open-source Hospital Management System repository. However, it has been **significantly enhanced** with new features including **patient login system, billing module, and medical history tracking**. All major improvements were done as part of our academic project.

---

## 🏥 Overview

A comprehensive web-based Hospital Management System built using PHP and MySQL. The base version provided core hospital management functionalities. We have **added multiple new modules and extensively customized** the system for better usability, extended role-based dashboards, and medical data tracking.

---

## 🚀 Features

### 👨‍⚕️ Admin Panel
- Manage hospital resources: patients, doctors, staff, vendors, pharmaceuticals, surgeries, lab reports, and more
- ✅ **Add and manage billing information**
- Generate, edit, and delete patient records
- Responsive dashboard with quick access features

### 🩺 Doctor Panel
- Secure doctor login
- Access to assigned patient profiles
- Update prescriptions and view patient history

### 🧑‍💻 Patient Panel (**✅ Newly Added**)
- Login using patient ID and phone number
- View personal profile data
- Access complete **medical history**
  - Ailments
  - Admission/discharge dates
  - Discharge status
  - ✅ **Associated bills**

### 💳 Billing Module (**✅ Newly Added**)
- Admin can record and manage bills per visit
- Bills shown in the patient dashboard under medical history
- Each medical history record is paired with relevant billing data

---

## 🛠️ Tech Stack

- **Frontend**: HTML, CSS, Bootstrap
- **Backend**: PHP
- **Database**: MySQL
- **Development Environment**: XAMPP (Apache + MySQL)

---

## 📁 Folder Structure

backend/
├── admin/ # Admin dashboard with 97+ files
├── doc/ # Doctor login and features
├── patient/ # ✅ Patient login system and dashboard (new)
└── assets/ # Shared CSS, JS, and media assets


---

## 🔧 Setup Instructions

### 1. Clone the Repository

git clone https://github.com/sanjay-here/Hospital_DBMS_upgraded.git


### 2. Move Project to XAMPP

Place the backend folder inside htdocs of your XAMPP installation.

### 3. Import the Database

Launch phpMyAdmin

Create a new database (e.g., hms)

Import the provided .sql file

### 4. Run the Application

> php -S localhost:8000

Admin Panel: http://localhost/backend/admin

Doctor Panel: http://localhost/backend/doc

Patient Panel: http://localhost/backend/patient


### ✨ Enhancements Made
Feature	Status
Patient login system	✅ Added
Medical history view	✅ Added
Billing per record	✅ Added
Multi-record patient dashboard	✅ Added
Patient-specific billing data	✅ Integrated
90+ Admin PHP scripts reorganized	✅ Done


### 📄 License
This version is open-source. Original credit goes to the base repo. Custom additions are made under academic fair use.


### 🙌 Credits
Original Author: [https://github.com/arkprocoder/Hospital-Management-System-dbmsminiproject.git]

Custom Enhancements: [https://github.com/sanjay-here/Hospital_DBMS_upgraded.git]
