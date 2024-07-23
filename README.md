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
Remeber To Use Token here

| Type  | URL           | Accepts            |
|-------|---------------|--------------------|
| POST  | `/api/logout` | -                  |


# Profile API Endpoints
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



## Features

- Full authentication system with mobile registration
- Phone number verification via SMS
- Password reset functionality with verification code
- Token-based authentication using Laravel Sanctum

## Libraries Used
- Laravel 11


## Installation
1. Clone the repository:
   ```
   git clone https://github.com/ibrahim-elshorbagy/CAT-Hackathon.git
   
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
7. Start The Server

    ```
    php artisan serve
    ```
    ```
    npm run dev
    ```
