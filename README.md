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

### 1. Full Authentication System with Mobile Registration
Users can register using their mobile phone numbers instead of email addresses.
SMS verification is required to activate the account, ensuring user identity and reducing the chance of fraudulent registrations.
### 2. Phone Number Verification via SMS
An SMS with a verification code is sent to the user's phone number during the registration process.
Users must input the code to complete their registration and verify their phone number.
### 3. Password Reset Functionality with Verification Code
If a user forgets their password, they can initiate a password reset request.
A password reset code is sent via SMS to the registered phone number.
Users must enter the verification code to reset their password.
### 4. Token-Based Authentication using Laravel Sanctum
Laravel Sanctum will be used for API authentication.
Each authenticated user session will generate a token that the user will need to pass in subsequent requests for protected routes.
Sanctum provides API token management, ensuring secure access to user data and actions.
### 5. Company Full CRUD API
Create, Read, Update, and Delete functionality for company profiles.
Users with the appropriate roles (such as Admin) can create new companies, update existing ones, or delete them from the system.
The API allows for dynamic filtering, sorting, and pagination of company records.
### 6. Company's Jobs Full CRUD API
Full CRUD for managing job postings related to companies.
Jobs can be created, listed, updated, and deleted through the API.

### 7. Roles: Admin, User, Mentor
Admin: Full access to manage users, companies, jobs, and system configurations.
Mentor: with the ability to mentor users or offer guidance.
User:manage their personal profiles, and follow roadmaps based on assigned schedules.
Role-based access control (RBAC) is enforced using Spatie's Laravel-Permission package.

### 8. Roadmap System
Each user has a personalized roadmap that guides their learning or work progression.
Roadmaps can include milestones, tasks, and deadlines for users to follow.

### 9. Every User Has Their Schedule
Each user can have a customized schedule.
Users can view and manage their schedule from their dashboard

## With
- Laravel 11

## Accounts
- Admin
  ```
  phone `01012345678`
  password `A2padf##fd##ssword`
  ```
- user
  ```
  phone `01014725836`
  password `A2padf##fd##ssword`
  ```
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

