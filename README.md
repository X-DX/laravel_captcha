<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Laravel Captcha
- Link: https://github.com/mewebstudio/captcha
- Link: https://www.chirags.in/index.php/127/laravel-11-captcha-configuration?show=127#q127

## Step 1: Set Up Your Laravel Application

Install Laravel: If you haven’t already set up a Laravel application, you can create a new one using Composer:

- composer create-project --prefer-dist laravel/laravel Laravel-11_Captcha

Navigate to Your Project:

- cd Laravel-11_Captcha

## Step 2: Install Mews Captcha

Install Mews Captcha Package: Use Composer to install the Mews Captcha package.

- composer require mews/captcha

Publish the Package Configuration: Publish the package’s configuration file.

- php artisan vendor:publish --provider="Mews\Captcha\CaptchaServiceProvider"

Configure Captcha: Open the published config file at config/captcha.php to customize settings as needed.

## Step 3: Setup Routes

Add Routes: Open your routes/web.php file and add routes for displaying the captcha and for form submission.


## Step 4: Create the Controller

Create Controller:

- php artisan make:controller MyFormController

Implement Methods: Open the generated controller file (app/Http/Controllers/MyFormController.php) and implement the methods to show the form and handle submission.

## Step 5: Create the Form View

Create the Form Blade File: Create a Blade view file at resources/views/form.blade.php.


## Step 6: Test the Integration

Run the Laravel Development Server:

php artisan serveCopy
Access Your Form: Open your web browser and navigate to 

http://localhost:8000/form

Submit the Form: Fill in the captcha and submit the form. Ensure that it validates correctly.

## Step 7: Additional Configuration (Optional)

Customize Captcha Options: 

You can customize the captcha's appearance and behavior in the below file.

Styling: Add CSS to enhance the form's appearance.

config/captcha.php