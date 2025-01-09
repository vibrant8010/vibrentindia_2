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
            <div class="col-lg-12 col-md-12">
                <div class="login-container login-container mx-lg-3 mx-0 reset-box">
                    <div class="card-header text-center">
                        <h4 class="register-header">Forgot Your Password?</h4>
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

                        <!-- Forgot Password Form -->
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your registered email" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
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
