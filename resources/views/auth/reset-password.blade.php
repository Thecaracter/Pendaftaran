 @extends('layout.forgotapp')


 @section('title', 'Reset Password')

 @section('content')
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
     <div class="loader"></div>
     <div id="app">
         <section class="section">
             <div class="container mt-5">
                 <div class="row">
                     <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                         <div class="card card-primary">
                             <div class="card-header">
                                 <h4>Reset Password</h4>
                             </div>
                             <div class="card-body">
                                 <p class="text-muted">Masukan Password Terbaru Anda</p>
                                 <form action="{{ route('password.update') }}" method="post"
                                     onsubmit="return checkPassword();">
                                     @csrf
                                     <input type="hidden" name="token" value="{{ $token }}">
                                     <input type="hidden" name="email" value="{{ request()->email }}">
                                     <div class="form-group password-field">
                                         <label for="password">New Password:</label>
                                         <div class="input-group">
                                             <input type="password" id="password" name="password"
                                                 class="form-control pwstrength" data-indicator="pwindicator" tabindex="2"
                                                 required>
                                             <div class="input-group-append">
                                                 <span id="password-toggle" class="input-group-text password-toggle"
                                                     onclick="togglePasswordVisibility()">Show</span>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-group password-field">
                                         <label for="password-confirm">Confirm Password:</label>
                                         <input id="password-confirm" type="password" class="form-control"
                                             name="password_confirmation" tabindex="3" required>
                                     </div>
                                     <div class="form-group">
                                         <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                             Reset Password
                                         </button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
     </div>
 @endsection
