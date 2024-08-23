# Laravel API

## Guest Routes

| Type  | URL                        | Accepts                            |
|-------|----------------------------|------------------------------------|
| POST  | `/api/register`            | `name`, `phone`,`password`,`password_confirmation`       |
| POST  | `/api/verify`              | `phone`, `code`                    |
| POST  | `/api/resend-code`         | `phone`                            |
| POST  | `/api/login`               | `phone`, `password`                |
| POST  | `/api/forgot-password`     | `phone`                            |
| POST  | `/api/forgot-password-resend-code` | `phone`                            |
| POST  | `/api/verify-reset-code`   | `phone`, `ForgetPasswordCode`      |
| POST  | `/api/forgot-reset-password` | `phone`, `ForgetPasswordCode`, `password` |
| GET  | `/api/login-with-google` | - |
| GET  | `/api/google-callback` | - |

## Auth Routes API Endpoints

| Type  | URL           | Accepts            |
|-------|---------------|--------------------|
| POST  | `/api/logout` | -                  |


# Profile API Endpoints
Remeber To Use Token here

| Type  | URL           | Accepts            |
|-------|---------------|--------------------|
| PUT  | `/api/change-password` | `password`,`password_confirmation`|
| PUT  | `/api/change-image` | `image`|
| PUT  | `/api/change-name` | `name`|



# Company API Endpoints

| Method      | URL                          | Controller Action     | Accepts                |
|-------------|------------------------------|-----------------------|------------------------|
| GET         | /api/companies               | Indexing Companies    |                        |
| GET         | /api/companies/{company}/info| Show A Company        |                        |
| POST        | /api/company                 | Create A Company      | `id of the company write on {company}`  `name`, `email` (nullable), `phone` (nullable), `address` (nullable), `website` (nullable), `description` (nullable), `industry` (nullable), `logo` (nullable) |
| PUT         | /api/company/{company}       | Update A Company `id of the company write on {company}`   `You must send all data even there is no change on it`    | `name`, `email` (nullable), `phone` (nullable), `address` (nullable), `website` (nullable), `description` (nullable), `industry` (nullable), `logo` (nullable) |
| DELETE      | /api/company/{company}       | Delete A Company      |   `id of the company write on {company}`       

# Jobs API Endpoints
| Method      | URL                          | Controller Action     | Accepts                |
|-------------|------------------------------|-----------------------|------------------------|
| GET         | /api/jobs                    | Indexing jobs         |                        |
| GET         | /api/jobs/{job}/info         | Show A Job            |    `id  of the job`                      |
| GET         | /api/companies/{companyId}/jobs| Show one of company's Jobs |   `id  of the company`                     |
| POST        | /api/job                     | Create A Job          | `name`, `description` (nullable), `company_id`, `contact_email` (nullable), `contact_phone` (nullable), `logo` (nullable), `field` (nullable) |
| PUT         | /api/job/{job}               | Update A Job          | `id  of the job`,`name`, `description` (nullable), `company_id`, `contact_email` (nullable), `contact_phone` (nullable), `logo` (nullable), `field` (nullable) |
| DELETE      | /api/job/{job}               | Delete A Job          | `id  of the job`                      |

# Roadmap API Endpoints
| Method      | URL                          | Controller Action     | Accepts                |
|-------------|------------------------------|-----------------------|------------------------|
| GET         | /api/roadmaps| get all roadmaps |                       |
| POST        | /api/roadmaps/{roadmapId}/contents | get a roadmap content          | `id of roadmap`|
| POST         | /api/create-schedule                    | create schedule for user        |  `id of roadmap`       |
| GET         | /api/my-schedule         | get the user schedule            |                          |


# Admin Dashbaord API Endpoints
| Method      | URL                          | Controller Action     | Accepts                |
|-------------|------------------------------|-----------------------|------------------------|
| POST         | /api/admin/login                    | Login         |  `phone`,`password`       |
| GET         | /api/admin/get-all-users         | get all users            |                          |
| GET         | /api/admin/get-all-admins| get all admins |   `id  of the company`                     |
| POST        | /api/admin/create-user | Create A user          | `name`, `phone`, `password`, `email` (nullable), `role`|
| POST      | /api/admin/delete-user/{id}              | Delete A User          | `id  of the User`                      |





## Features

- Full authentication system with mobile registration
- Phone number verification via SMS
- Password reset functionality with verification code
- Token-based authentication using Laravel Sanctum
- Company Full CRUD API
- Company's Jobs Full CRUD API
- Roles : Admin,user,mentor
- Roadmap System
- every user has his schedule

## With
- Laravel 11


## Installation
1. Clone the repository:
   ```
   git clone https://github.com/CAT-Hackathon/Backend.git
   
   cd CAT-Hackathon
   ```

2. Install dependencies :

    ```
    composer install
     ```

3. Copy Env file

    ```
    cp .env.example .env
    ```
4. Generate Key

    ```
    php artisan key:generate
    ```
5. Configure your database in the .env file.

6. you will need to add To env
    ```
    VONAGE_SMS_FROM=
    VONAGE_KEY=
    VONAGE_SECRET=
    ```
    ```

    # Web Application
    GOOGLE_CLIENT_ID_WEB= 
    GOOGLE_CLIENT_SECRET_WEB= 
    ```
    ```
    # Mobile Application
    GOOGLE_CLIENT_ID_MOBILE= 
    GOOGLE_CLIENT_SECRET_MOBILE= 
    GOOGLE_REDIRECT_URI_WEB= 
    ```

7. Start The Server

    ```
    php artisan serve
    ```

