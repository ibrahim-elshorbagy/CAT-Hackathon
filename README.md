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

## Auth Routes
Remeber To Use Token here

| Type  | URL           | Accepts            |
|-------|---------------|--------------------|
| POST  | `/api/logout` | -                  |


# Profile
| Type  | URL           | Accepts            |
|-------|---------------|--------------------|
| PUT  | `/api/change-password` | `password`,`password_confirmation`|
| PUT  | `/api/change-image` | `image`|
| PUT  | `/api/change-name` | `name`|



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
