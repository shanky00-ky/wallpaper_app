<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .registration-section {
            max-width: 600px;
            margin: auto;
            padding: 40px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: red;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: red;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: red;
        }
        .form-control:focus {
            border-color: red;
            box-shadow: 0 0 5px red (0, 123, 255, 0.5);
        }
        .form-text {
            font-size: 0.875rem;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="registration-section">
        <h2>Register</h2>
        <form method="POST" action="{{ url_for('register') }}" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
                <div class="invalid-feedback">Please provide a username.</div>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
                <div class="invalid-feedback">Please provide a valid email address.</div>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                <div class="form-text">Your password must be at least 8 characters long.</div>
                <div class="invalid-feedback">Please provide a password.</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"> ReType Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                <div class="form-text">Your password must be at least 8 characters long.</div>
                <div class="invalid-feedback">Please provide a password.</div>
            </div>
            
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <div class="footer">
            <p>Already have an account? <a href="{{ url_for('login') }}" style="color: red ;">Login here</a></p>
        </div>
    </div>

    <script>
        // Bootstrap validation example
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');

            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>

</body>
</html>
