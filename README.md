# Laravel API

## Guest Routes

| URL                        | Accepts                            |
|----------------------------|------------------------------------|
| `/api/register`            | `name`, `phone`, `password`        |
| `/api/verify`              | `phone`, `code`                    |
| `/api/resend-code`         | `phone`                            |
| `/api/login`               | `phone`, `password`                |
| `/api/forgot-password`     | `phone`                            |
| `/api/forgot-password-resend-code` | `phone`                            |
| `/api/verify-reset-code`   | `phone`, `ForgetPasswordCode`      |
| `/api/forgot-reset-password` | `phone`, `ForgetPasswordCode`, `password` |

## Auth Routes
remeber to use Token here
| URL           | Accepts            |
|---------------|--------------------|
| `/api/logout` | -                  |
| `/api/testo`  | -                  |


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
