<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>
</head>
<body>
    <div class="form-outer">
        <section class="form-container">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Password Reset Email Sent</h4>
                    </div>
                    <div class="card-body text-center">
                        <p>If the email you provided is registered, you will receive a password reset link shortly.</p>
                        <a href="{{ route('login') }}" class="btn btn-success mt-3">Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </section>
    </div>
</body>
</html>
