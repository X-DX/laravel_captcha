<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        .success {
            color: green;
            font-size: 14px;
            margin-top: 10px;
        }
        img {
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <form action="{{ route('form.submit') }}" method="POST">
        @csrf
        <div>
            <label for="captcha">Captcha</label>
            <div class="captcha-container">
                <img src="{{ captcha_src() }}" alt="captcha" id="captcha-img">
            </div>
            <input type="text" name="captcha" id="captcha" placeholder="Enter the captcha" required>
            <button type="button" class="btn btn-success btn-refresh" style="margin-top: 10px">
                <i class="fa fa-refresh"></i> Refresh Captcha
            </button>
            @error('captcha')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Submit</button>
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif
    </form>

    <script>
        $(".btn-refresh").click(function() {
            $('#captcha').val('');
            $.ajax({
                type: 'GET',
                url: '/refresh_captcha',
                success: function(data) {
                    // console.log(data);
                    $("#captcha-img").attr("src", data.captcha_src);
                },
                error: function(xhr, status, error) {
                    console.error('Captcha refresh failed:', error);
                }
            });
        });
    </script>
</body>
</html>
