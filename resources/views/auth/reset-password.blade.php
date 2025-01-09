<!DOCTYPE html>
<html lang="en">
<head>
     <x-head/>
</head>
<body>
    <div class="form-outer admin-login">
        <section class="form-container">
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="login-container login-container mx-lg-3 mx-0 reset-box">
             
                    <div class="card-header text-center">
                        <h4 class="register-header">Reset Your Password</h4>
                    </div>
                    <div class="card-body">
                        <!-- Success Message -->
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Error Messages -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                       
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <!-- Token is required for the reset process -->
                            <input type="hidden" name="token" value="{{ $token }}">
                        
                            <!-- Email Field -->
                            <div>
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" value="{{ old('email', request('email')) }}" placeholder="Enter your email" required>
                            </div>
                        
                            <!-- Password Field -->
                            <div>
                                <label for="password">New Password</label>
                                <input type="password" id="password" name="password" placeholder="Enter Your Password" required>
                            </div>
                        
                            <!-- Confirm Password Field -->
                            <div>
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter Your Confirm Password" required>
                            </div>
                        
                            <button type="submit">Reset Password</button>
                        </form>
                        
                        
                        
                    </div>
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none">Back to Login</a>
                </div>
                </div>
            </div>
        </div>
    </div>
        </section>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
