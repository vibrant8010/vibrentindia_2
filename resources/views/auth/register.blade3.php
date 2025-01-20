<form id="signupForm2" action="http://127.0.0.1:8000/otp-verification" method="POST" class="form-main row mt-3">
    @csrf
    <div class="step active" id="step2">
        <div class="input-type col-12">
            <span for="otp" class="input-field-lable">Enter OTP</span>
            <input type="number" class="progress-input-box" id="otp"
                placeholder="Enter the OTP sent to your phone" name="otp" /><span><i
                    class="fa-solid fa-key input-icon"></i></span>
        </div>
        <div class="d-grid col-12">
            <button type="button" id="goBack" class="custom-btn">Back</button>
            <div class="form-btn-box">
                <p>
                    Have an account?
                    <a class="sign-link-btn" href="#">Sign In </a>now.
                </p>
                <input class="custom-btn" id="verifyOtp"
                    value="Verify OTP" type="submit"/>
            </div>
        </div>
    </div>
</form>
