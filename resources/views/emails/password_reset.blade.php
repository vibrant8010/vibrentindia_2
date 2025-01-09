<!DOCTYPE html>
<html lang="en">

<head>
    <x-head />

</head>

<body>
    <div class="form-outer admin-login">
        <section class="form-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="login-container login-container mx-lg-3 mx-0 reset-box">

                            <h2>Password Reset Request</h2>
                            <p>We received a request to reset your password. You can reset your password by clicking the
                                link below:</p>
                            <a href="{{ $resetLink }}"
                                style="padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px;">Reset
                                Password</a>
                            <p>If you did not request a password reset, please ignore this email.</p>
                        </div>
                    </div>
                </div>
        </section>

    </div>
</body>

</html>
