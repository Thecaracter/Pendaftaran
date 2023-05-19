<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 5px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            margin-top: 100px;
        }
    </style>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var passwordToggle = document.getElementById("password-toggle");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordToggle.innerText = "Hide";
            } else {
                passwordField.type = "password";
                passwordToggle.innerText = "Show";
            }
        }

        function checkPassword() {
            var passwordField = document.getElementById("password");
            var confirmPasswordField = document.getElementById("confirm-password");
            var message = document.getElementById("password-message");

            if (passwordField.value !== confirmPasswordField.value) {
                message.innerText = "Password and confirm password must match.";
                message.style.color = "red";
                return false;
            } else {
                message.innerText = "";
                return true;
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="form-container">
                    <h1 class="text-center mb-4">Reset Password</h1>

                    <form action="{{ route('password.update') }}" method="post" onsubmit="return checkPassword();">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ request()->email }}">
                        <div class="form-group password-field">
                            <label for="password">Password:</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control" required>
                                <div class="input-group-append">
                                    <span id="password-toggle" class="input-group-text password-toggle"
                                        onclick="togglePasswordVisibility()">Show</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group password-field">
                            <label for="confirm-password">Confirm Password:</label>
                            <input type="password" id="confirm-password" name="password_confirmation"
                                class="form-control" required>
                        </div>
                        <p id="password-message" style="color: red;"></p>

                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
