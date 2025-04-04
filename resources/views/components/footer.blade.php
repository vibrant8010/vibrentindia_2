{{-- <footer>
    <section class="footer-section">
        <div class="footer-section-alldetails">
            <div class="container">

            <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="footer-all-details">
              <a href="/about" class="footer-text-link">About Us</a>
              <a href="/privacy&policy" class="footer-text-link">Privacy Policy</a>
              <a href="/terms&condition" class="footer-text-link border-none">Terms of Use</a>
            </div>
          </div>

          <div class="mt-1 mb-1 col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="footer-main-social">
              <div class="footer-social-icon">
                <a class="footer-icon-link" href="#"><i class="fa-brands fa-facebook-f footer-icon"></i></a>
              </div>

              <div class="footer-social-icon">
                <a class="footer-icon-link" href="#"><i class="fa-brands fa-linkedin-in footer-icon"></i></a>
              </div>

              <div class="footer-social-icon">
                <a class="footer-icon-link" href="#"> <i class="fa-brands fa-twitter footer-icon"></i></a>
              </div>


              <div class="footer-social-icon">
                <a class="footer-icon-link" href="#"> <i class="fa-brands fa-instagram footer-icon"></i></i></a>
              </div>

              <div class="footer-social-icon">
                <a class="footer-icon-link" href="#"><i class="fa-brands fa-youtube footer-icon"></i></a>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="footer-main-copyright">
              <div class="footer-copyright-text">
                Copyright <span><i class="fa-regular fa-copyright"></i></span> 2024 Vibrant India, All Right Reserved.
              </div>
            </div>
          </div>
  <!--          <div class="whatsapp-main-box">-->
  <!--   <a href="https://wa.me/+918511684938?text=Hi,%20I%20have%20an%20inquiry%20about%20your%20services.%20Can%20you%20please%20assist%20me?" class="popmake-470 mx-auto">-->
  <!--       <img class="whatsapp-icon" src="{{ asset('images/whatsapp.png') }}" alt="WhatsApp Icon">-->
  <!--   </a>-->
  <!--</div>-->
</div>
 </div>
      </div>
    </section>
</footer> --}}


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 text-white d-flex justify-content-center">
                <ul class="footer-all-details">
                    <li>
                        <a href="/about" class="footer-text-link">About Us</a>
                    </li>
                    <li>
                        <a href="/privacy&policy" class="footer-text-link">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="/terms&condition" class="footer-text-link border-none">Terms of Use</a>
                    </li>
                    <li>
                        <a href="/blog" class="footer-text-link border-none">Blogs</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-7 text-white">
                <div class="d-flex justify-content-center flex-column align-items-center">
                    <div class="d-flex justify-content-end flex-column">
                        <div>
                            <h4 class="text-white">Our Newsletter</h4>
                        </div>
                        <div class="mt-4 mb-4 d-flex ">
                            <div class="footer-main-social">
                                <div class="footer-social-icon">
                                    <a class="footer-icon-link" href="#"><i
                                            class="fa-brands fa-facebook-f footer-icon"></i></a>
                                </div>

                                <div class="footer-social-icon">
                                    <a class="footer-icon-link" href="#"><i
                                            class="fa-brands fa-linkedin-in footer-icon"></i></a>
                                </div>

                                <div class="footer-social-icon">
                                    <a class="footer-icon-link" href="#"> <i
                                            class="fa-brands fa-twitter footer-icon"></i></a>
                                </div>


                                <div class="footer-social-icon">
                                    <a class="footer-icon-link" href="#"> <i
                                            class="fa-brands fa-instagram footer-icon"></i></i></a>
                                </div>

                                <div class="footer-social-icon">
                                    <a class="footer-icon-link" href="#"><i
                                            class="fa-brands fa-youtube footer-icon"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="footer-main-copyright">
                            <div class="footer-copyright-text">
                                Copyright <span><i class="fa-regular fa-copyright"></i></span> 2025 Vibrant India, All
                                Right Reserved.
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- Overlay to prevent clicks outside -->
        <div id="overlay" class="overlay-body"></div>

        <!-- Popup Modal -->
        <div id="customModal3" class="register-form">
            <div class="custom-modal-box">
                <div class="d-flex justify-content-end w-100">
                <button id="closeModal3">
                    ×
                </button>
            </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="progressbar-main text-center py-2">
                            <ul id="progressBar" class="progressbar">
                                <li class="progress-item d-flex flex-column active">
                                    <span>
                                        Create Account
                                    </span>
                                    <span class="registation-icon">
                                        {{-- <img src="{{ asset('images/verify.png') }}" width="30px" height="30px" /> --}}
                                        <i class="fa-regular fa-user fa-2x" style="color: #ffffff;"></i>
                                    </span>

                                </li>
                                <li class="progress-item d-flex flex-column">
                                    <span>
                                        OTP Verification
                                    </span>
                                    <span class="registation-icon">
                                        <img src="{{ asset('images/verify.png') }}" width="30px" height="30px" />
                                    </span>

                                </li>
                                <li class="progress-item d-flex flex-column">
                                    <span>
                                        Gst No
                                    </span>
                                    <span class="registation-icon"><i class="fa-brands fa-wpforms fa-2x"
                                            style="color: #ffffff;"></i>
                                    </span>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-section mt-2">
                            <!-- Step 1 -->
                            <form id="registrationForm" action="{{ route('business.register.save') }}" method="POST"
                                class="form-main row mt-3 registration-form">
                                @csrf
                                <div class="step active" id="step1">
                                    <div class="input-type-content">
                                        {{-- <span for="name" class="input-field-lable">Name</span> --}}
                                        <input type="text" name="name" class="progress-input-box custom-input" id="name"
                                            placeholder="Enter your name" required />
                                        {{-- <span><i class="fa-solid fa-user input-icon"></i></span> --}}
                                    </div>
                                    <div class="input-type-content">
                                        {{-- <span for="phone" class="input-field-lable">Phone Number</span> --}}
                                        <input type="tel" class="progress-input-box custom-input" id="phone"
                                            placeholder="Enter your phone number" name="phone" required />
                                        {{-- <span><i class="fa-solid fa-phone input-icon"></i></span> --}}
                                    </div>
                                    <div class="input-type-content">
                                        {{-- <span for="email" class="input-field-lable">Email</span> --}}
                                        <input type="email" name="email" class="progress-input-box custom-input" id="email"
                                            placeholder="Enter your email" required />
                                        {{-- <span><i class="fa-solid fa-envelope input-icon"></i></span> --}}
                                    </div>
                                    <div class="input-type-content">
                                        {{-- <span for="password" class="input-field-lable">Password</span> --}}
                                        <input type="password" class="progress-input-box custom-input" id="password"
                                            name="password" placeholder="Enter your password" required />
                                        {{-- <span><i class="fa-solid fa-lock input-icon"></i></span> --}}
                                    </div>
                                    <div class="d-grid col-12">
                                        <div class="form-btn-box">
                                            <input type="button" class="custom-btn form-btn" id="sendOtp"
                                                value="Send OTP" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Step 2 -->
                            <form id="signupForm2" action="{{ route('user.otp.verify') }}" method="POST"
                                class="form-main mt-3 active">
                                @csrf
                                <div class="step" id="step2">
                                    <div class="input-type-content">
                                        {{-- <span for="otp" class="input-field-lable">Enter OTP</span> --}}
                                        <input type="text" class="progress-input-box custom-input" id="otp"
                                            placeholder="Enter the OTP sent to your phone" name="otp" />
                                        {{-- <span><i class="fa-solid fa-key input-icon"></i></span> --}}
                                    </div>
                                    <div class="d-grid col-12">
                                        <div class="form-btn-box">
                                            {{-- <p>Have an account? <a class="sign-link-btn custom-btn" href="#">Sign In</a>
                                                now.</p> --}}
                                            <div class="d-flex justify-content-between" style="gap: 60px;">
                                                <button type="button" id="goBack"
                                                    class="custom-btn form-btn">Back</button>
                                                <input class="custom-btn tex form-btn text-center" id="verifyOtp" value="Verify OTP" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Step 3 -->
                            <form id="signupForm3" action="/submit-signup" method="POST" class="form-main mt-3">
                                @csrf
                                <div class="step" id="step3">
                                    <div class="input-type-content">
                                        {{-- <label for="gst" class="input-field-lable">GST Number</label> --}}
                                        <input type="text" class="progress-input-box custom-input" id="gst"
                                            placeholder="Enter your GST number" required />
                                        {{-- <span><i class="fa-solid fa-file-invoice-dollar input-icon"></i></span> --}}
                                    </div>
                                    <div class="input-type-content">
                                        <button type="button" class="custom-btn form-btn" id="verifyGstBtn">Verify
                                            GST</button>
                                        <div id="verificationStatus" class="verification-status"></div>
                                    </div>
                                    <div id="additionalInfo" style="display: none">
                                        <!-- Additional GST info fields -->
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-type-content">
                                                    <label class="input-field-lable" for="tradeName">Trade
                                                        Name</label>
                                                    <input type="text" id="tradeName" class="progress-input-box"
                                                        readonly />
                                                    <span><i class="fa-solid fa-arrow-trend-up input-icon"></i></span>
                                                </div>
                                                <div class="input-type-content">
                                                    <label class="input-field-lable" for="pincode">Pincode</label>
                                                    <input type="text" id="pincode" class="progress-input-box"
                                                        readonly />
                                                    <span><i class="fa-solid fa-map-pin input-icon"></i></span>
                                                </div>
                                                <div class="input-type-content">
                                                    <label class="input-field-lable" for="state">State</label>
                                                    <input type="text" id="state" class="progress-input-box"
                                                        readonly />
                                                    <span><i class="fa-solid fa-city input-icon"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-type-content">
                                                    <label class="input-field-lable" for="city">City</label>
                                                    <input type="text" id="city" class="progress-input-box"
                                                        readonly />
                                                    <span><i class="fa-solid fa-city input-icon"></i></span>
                                                </div>
                                                <div class="input-type-content">
                                                    <label class="input-field-lable" for="status">Status</label>
                                                    <input type="text" id="status" class="progress-input-box"
                                                        readonly />
                                                    <span><i class="fa-regular fa-circle-check input-icon"></i></span>
                                                </div>
                                                <div class="input-type-content">
                                                    <label class="input-field-lable"
                                                        for="registrationDate">Registration Date</label>
                                                    <input type="text" id="registrationDate"
                                                        class="progress-input-box" readonly />
                                                    <span><i class="fa-solid fa-calendar-check input-icon"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</footer>

<script>
    $(document).ready(function () {
 // Set up CSRF token for AJAX requests
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });

 // Hide Steps 2 and 3 initially
 $("#step2").hide();
 $("#step3").hide();

 // Step 1: Send OTP
 $("#sendOtp").click(function () {
     const name = $("#name").val();
     const phone = $("#phone").val();
     const email = $("#email").val();
     const password = $("#password").val();

     // Validate Step 1 fields
     if (!name || !phone || !email || !password) {
         alert("Please fill out all fields in Step 1.");
         return;
     }

     const formData = $("#registrationForm").serialize();

     $.ajax({
         url: "{{ route('business.register.save') }}",
         method: "POST",
         data: formData,
         success: function (response) {
             alert(response.message);
             $("#step1").hide();
             $("#step2").show();
             $("#progressBar li").eq(1).addClass("active");
         },
         error: function (xhr) {
             alert("Error: " + (xhr.responseJSON?.message || "Something went wrong. Please try again."));
         }
     });
 });

 // Step 2: Verify OTP
 $("#verifyOtp").click(function () {
     const otps = $("#otp").val();

     if (!otps || otps.trim() === "") {
         alert("Please enter the OTP!");
         return;
     }

     $.ajax({
         url: "{{ route('user.otp.verify') }}",
         method: "POST",
         data: { otp: otps },
         success: function (response) {
             alert(response.message);
             $("#step2").hide();
             $("#step3").show();
             $("#progressBar li").eq(2).addClass("active");
         },
         error: function (xhr) {
             alert("Error: " + (xhr.responseJSON?.message || "OTP verification failed."));
         }
     });
 });

 // Step 3: Verify GST
 $("#verifyGstBtn").click(function () {
     const gstNumber = $("#gst").val().trim();

     if (!gstNumber) {
         alert("Please enter a GST number.");
         return;
     }

     const apiKey = "773d5f467578e282dac1d0c338c447cb";
     const apiUrl = `http://sheet.gstincheck.co.in/check/${apiKey}/${gstNumber}`;

     $.ajax({
         url: apiUrl,
         method: "GET",
         success: function (response) {
             if (response.flag) {
                 $("#verificationStatus").removeClass("status-failure").addClass("status-success").text("GST Verified Successfully!").show();
                 $("#tradeName").val(response.data.tradeNam);
                 $("#pincode").val(response.data.pradr.addr.pncd);
                 $("#state").val(response.data.pradr.addr.stcd);
                 $("#city").val(response.data.pradr.addr.dst);
                 $("#status").val(response.data.sts);
                 $("#registrationDate").val(response.data.rgdt);
                 $("#additionalInfo").show();
             } else {
                 $("#verificationStatus").removeClass("status-success").addClass("status-failure").text("GST Verification Failed: " + response.message).show();
                 $("#additionalInfo").hide();
             }
         },
         error: function (xhr) {
             console.error("Error Details:", xhr);
             $("#verificationStatus").removeClass("status-success").addClass("status-failure").text("Error while verifying GST. Please try again.").show();
             $("#additionalInfo").hide();
         }
     });
 });

 // Go back to Step 1 from Step 2
 $("#goBack").click(function () {
     $("#step2").hide();
     $("#step1").show();
     $("#progressBar li").eq(1).removeClass("active");
 });
});
 </script>
