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

use App\Http\Controllers\MyFormController;
Route::get('/form', [MyFormController::class, 'showForm'])->name('form.show');
Route::post('/form', [MyFormController::class, 'submitForm'])->name('form.submit');

## Step 4: Create the Controller

Create Controller:

- php artisan make:controller MyFormController

Implement Methods: Open the generated controller file (app/Http/Controllers/MyFormController.php) and implement the methods to show the form and handle submission.

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mews\Captcha\Facades\Captcha;
class MyFormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }
    public function submitForm(Request $request)
    {
        $request->validate([
            'captcha' => 'required|captcha',
        ]);
        // Handle successful form submission
        return back()->with('success', 'Form submitted successfully!');
    }
}

## Step 5: Create the Form View

Create the Form Blade File: Create a Blade view file at resources/views/form.blade.php.

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha Form-chirags.in</title>
</head>
<body>
    <form action="{{ route('form.submit') }}" method="POST">
        @csrf
        <div>
            <label for="captcha">Captcha</label>
            {!! captcha_img() !!}
            <input type="text" name="captcha" id="captcha" required>
            @error('captcha')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Submit</button>
        @if(session('success'))
            <div style="color:green;">{{ session('success') }}</div>
        @endif
    </form>
</body>
</html>

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