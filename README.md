<!-- =========================================================
   Coaching Management App (SaaS) — Dockerized Laravel Platform
   Author: coderemon24
========================================================== -->

<h1 align="center">🏫 Coaching Management App (SaaS)</h1>

<p align="center">
  <b>Bangladesh-focused Coaching Center Automation</b><br/>
  Admission • Batch • Monthly Fee • Attendance • SMS Due Reminder
</p>

<p align="center">
  <img src="https://readme-typing-svg.herokuapp.com?font=Fira+Code&size=26&pause=900&color=00F7FF&center=true&vCenter=true&width=900&lines=Coaching+Center+Management+System+Specialist+%F0%9F%8F%AB;Bangladesh+SSC%2FHSC+%7C+Admission+Coaching+Automation;Dockerized+Laravel+%7C+MySQL+%7C+phpMyAdmin;Built+to+scale+as+a+Multi-Tenant+SaaS+%F0%9F%9A%80" />
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-8-00758F?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Docker-Ready-2496ED?style=for-the-badge&logo=docker&logoColor=white" />
  <img src="https://img.shields.io/badge/Vite-%E2%9A%A1-646CFF?style=for-the-badge&logo=vite&logoColor=white" />
  <img src="https://img.shields.io/badge/TailwindCSS-4.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white" />
</p>

---

## 🎯 Why this exists (Bangladesh Market Fit)

Most coaching centers still run on:
- 📒 Admission notebook
- 🧾 Fee calculation in Excel
- ✅ Attendance taken manually
- 📩 SMS reminder manual

This app turns that **chaos into a clean system** — and is designed to become a **multi-tenant SaaS** (one platform → many coaching centers).

---

## ✅ MVP (Client-Ready Features)

- 🧑‍🎓 **Student Admission**
- 🧩 **Batch Management**
- 💳 **Monthly Fee Tracking**
- 🟩 **Attendance System**
- 🔔 **SMS Due Reminder** *(SaaS-ready module)*

---

## 🧱 Tech Stack

**Backend**
- Laravel 12 (PHP ^8.3)  
- MySQL 8  
- Apache (DocumentRoot → `/public`)

**Frontend**
- Javascript
- Jquery
- TailwindCSS 4

**Dev/Infrastructure**
- Docker Compose (App + DB + phpMyAdmin)

---

## ⚡ Quick Start (Docker)

### 1) Clone the repository
```bash
git clone https://github.com/coderemon24/coaching-management-app.git
cd coaching-management-app
docker compose --env-file .env.docker -d --build
