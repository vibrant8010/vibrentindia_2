<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>

</head>
<body>
    <div class="form-outer admin-login">
        <section class="form-container">
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="login-container login-container mx-lg-3 mx-0 reset-box">
              
        <h1 class="register-header">VERIFY EMAIL</h1>

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        <!-- OTP Form -->
        <form action="{{ route('user.otp.verify') }}" method="POST">
            @csrf
            <label for="otp" class="mt-3">OTP:</label><br>
            <input type="text" name="otp" placeholder="Enter your OTP" required><br><br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Resend OTP Section -->
        <form action="{{ route('otp.resend') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-link">Resend OTP</button>
        </form>

        <!-- Flash Messages for Success or Error -->
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
    </div>
            </div>
</div>
</div>
        </section>
    </div>
</body>
</html>
