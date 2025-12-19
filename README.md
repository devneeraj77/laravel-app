# FlightFlareMart.com

**FlightFlareMart.com** is a web-based travel booking and management platform built with the Laravel framework. It is designed to provide seamless integration for users searching, comparing, and booking flights and related travel services through an intuitive and scalable system.

---

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Environment Configuration](#environment-configuration)
- [Database Migration](#database-migration)
- [Running the Application](#running-the-application)
- [Project Structure](#project-structure)
- [Deployment](#deployment)
- [Contributing](#contributing)
- [License](#license)

---

## Overview

FlightFlareMart.com is developed using **Laravel**, following clean architecture principles and adhering to modern web standards. The project aims to deliver fast performance, maintainability, and secure handling of user data.

This repository includes all the backend and frontend integration necessary for running the core web application, including authentication, database models, and API endpoints.

---

## Features

- User authentication and account management
- Flight search and booking system
- Dynamic pricing and fare comparison
- Secure payment gateway integration
- Admin dashboard for managing users, bookings, and system settings
- SEO-friendly routing and URL structure
- RESTful API for external integrations
- Laravel Blade-based frontend templates
- Optimized caching and session handling

---

## Tech Stack

- **Framework:** Laravel (PHP)
- **Frontend:** Blade Templates, HTML5, CSS3, JavaScript
- **Database:** MySQL / MariaDB
- **Version Control:** Git
- **Server:** Apache / Nginx
- **Environment:** PHP 8.1+, Composer

---

## Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/devneeraj77/laravel-app.git
   cd flightflaremart.com


## Deployment with GitHub Actions to Namecheap

This project includes a GitHub Actions workflow to automate deployment to Namecheap shared hosting. The workflow is defined in `.github/workflows/deploy-namecheap.yml`.

### Prerequisites

Before the workflow can successfully run, you need to configure the following secrets in your GitHub repository settings. Go to `Settings > Secrets and variables > Actions` and add the following repository secrets:

-   `APP_KEY`: Your Laravel application key. You can generate one using `php artisan key:generate`.
-   `APP_URL`: The full URL of your application on Namecheap (e.g., `https://yourdomain.com`).
-   `DB_HOST`: Your Namecheap database host (usually `localhost`).
-   `DB_PORT`: The port for your database (usually `3306`).
-   `DB_DATABASE`: The name of your database on Namecheap.
-   `DB_USERNAME`: The username for your database.
-   `DB_PASSWORD`: The password for your database user.
-   `FTP_SERVER`: The FTP server address for your Namecheap hosting account.
-   `FTP_USERNAME`: Your cPanel/FTP username.
-   `FTP_PASSWORD`: Your cPanel/FTP password.

### How it Works

The workflow will be triggered on every push to the `main` branch. It performs the following steps:

1.  **Checkout Code**: Checks out the latest code from your repository.
2.  **Set up PHP and Composer**: Installs PHP and your project's Composer dependencies.
3.  **Set up Node.js and NPM**: Installs Node.js and your project's NPM dependencies.
4.  **Build Frontend Assets**: Builds your frontend assets using `npm run build`.
5.  **Create .env File**: Creates a production `.env` file using the secrets you configured.
6.  **Deploy via FTP**: Uploads the application files to your Namecheap server using the `SamKirkland/FTP-Deploy-Action`. The files are uploaded to the `public_html/` directory by default. You can change this in the workflow file.

**Important Notes:**

-   Make sure the PHP version in the workflow file (`.github/workflows/deploy-namecheap.yml`) matches the PHP version on your Namecheap server.
-   The `server-dir` in the workflow file specifies the directory on your server where the files will be uploaded. Adjust it to match your hosting setup if needed.
-   The `exclude` list in the workflow file prevents certain files and directories from being uploaded to the server. You can customize this list as needed.
