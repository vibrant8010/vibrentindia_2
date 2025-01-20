{{-- @extends('layouts.app')

@section('content')
<style>
    body {
      font-family: "Arial", sans-serif;
      background: #fff;
      overflow-x: hidden;
    }

    .step {
      display: none;
      width: 100%; /* Ensures all steps have the same width */
      min-height: 100px; /* Adds consistent height to avoid shifting */
    }

    .step.active {
      display: block;
    }

    .input-type {
      margin-bottom: 24px;
      position: relative;
    }

    .input-field-lable {
      color: #333333bd;
      position: absolute;
      left: 4%;
      bottom: 75%;
      background-color: #fff;
      padding: 3px 5px;
      font-size: 12px;
      font-weight: 600;
    }
    .input-icon {
      position: absolute;
      bottom: 30%;
      left: 2%;
    }

    .progress-input-box {
      border-radius: 3px;
      padding: 16px 31px 12px 42px;
      font-size: 14px;
      width: 100%;
      border: 1px solid #ddd;
    }

    /* .custom-btn {
      background-color: rgb(45, 116, 107);
      border: none;
      color: white;
      padding: 12px;
      font-size: 1rem;
      border-radius: 8px;
      cursor: pointer;
      width: 100%;
      transition: background-color 0.3s ease;
    }

    .custom-btn:hover {
      background-color: rgb(57, 141, 130);
    } */

    .progressbar {
      margin-bottom: 30px;
      overflow: hidden;
      display: flex;
      justify-content: space-between;
      padding: 0;
      list-style-type: none;
      position: relative;
    }

    .progressbar .progress-item {
      list-style-type: none;
      color: #99a2a8;
      font-size: 9px;
      width: calc(100% / 3);
      float: left;
      text-align: center;
      position: relative;
      font: 500 13px / 1 "Roboto", sans-serif;
    }

    .progressbar .progress-item.active {
      color: #5cb85c;
    }

    .progressbar .progress-item.active::before {
      background-color: #004f43;
      color: white;
    }

    .progressbar .progress-item::before {
      content: "";
      font: normal normal normal 30px / 50px Ionicons;
      width: 50px;
      height: 50px;
      line-height: 50px;
      display: block;
      background: #004f43;
      border-radius: 50%;
      margin: 0 auto 10px auto;
      position: relative;
      z-index: 99;
    }
    .progressbar .progress-item::after {
      content: "";
      width: 100%;
      height: 2px;
      background: #eaf0f4;
      position: absolute;
      left: -50%;
      top: 21px;
      z-index: 0;
    }
    .progressbar .progress-item.active::after {
      background: #004f43;
      color: white;
    }
    .progressbar .progress-item:nth-child(1):after {
      content: "";
      display: none;
    }
    .progressbar .progress-item:nth-child(1)::before {
      content: "";
      background-image: url(./smartphone.png);
      background-repeat: no-repeat;
      background-position: center;
    }
    .progressbar .progress-item:nth-child(2)::before {
      content: "";
      background-image: url(./password-access.png);
      background-repeat: no-repeat;
      background-position: center;
    }
    .progressbar .progress-item:nth-child(3)::before {
      content: "";
      background-image: url(./save.png);
      background-repeat: no-repeat;
      background-position: center;
    }
    .custom_object_contain {
      object-fit: contain;
      filter: none !important;
    }
    .registration-step-area {
      background-color: transparent !important;
      color: #fff;
      z-index: 1090 !important;
    }
    .carousel-indicators [data-bs-target] {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      top: 0;
      bottom: 0;
      opacity: 0.4;
    }
    @media (max-width: 480px) {
      .registration-step-area {
        display: none;
      }
      .input-icon {
        left: 5%;
      }
    }
    .form-btn-box {
      display: flex;
      justify-content: space-between;
      padding: 15px;
    }
    .sign-link-btn {
      text-decoration: none;
    }
    .custom-btn {
      background-color: rgb(45, 116, 107);
      border: none;
      color: white;
      padding: 8px 20px;
      font-size: 17px;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      width: 20%;
      transition: background-color 0.3s ease;
    }
    .form-section {
      /* background-color: green; */
      padding: 30px;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      border-radius: 7px;
    }
  </style>
  <div class="container-fluid">
    <div class="row">
      <!-- slider -->
      <div class="col-lg-3 col-xl-2 col-md-3 col-sm-3 registration-step-area h-100 shadow p-0 sticky-top"
      >
        <div class="card p-0 border-0">
          <div class="card-body p-0 border-0">
            <div
              id="carouselExampleIndicators"
              class="carousel slide w-100"
              data-bs-ride="carousel"
            >
              <div class="carousel-indicators">
                <button
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="0"
                  class="active"
                  aria-current="true"
                  aria-label="Slide 1"
                ></button>
                <button
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="1"
                  aria-label="Slide 2"
                ></button>
                <button
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="2"
                  aria-label="Slide 3"
                ></button>
              </div>
              <div class="carousel-inner">
                <div
                  class="carousel-item active vh-100"
                  style="background-color: #141416"
                >
                  <img
                    src="./Registration_1-D.jpg"
                    class="d-block w-100 vh-100 custom_object_contain"
                    alt="..."
                  />
                </div>
                <div
                  class="carousel-item vh-100"
                  style="background-color: #ae2320"
                >
                  <img
                    src="./Registration_2-D.jpg"
                    class="d-block w-100 vh-100 custom_object_contain"
                    alt="..."
                  />
                </div>
                <div
                  class="carousel-item vh-100"
                  style="background-color: #ecd053"
                >
                  <img
                    src="./Registration_3-D.jpg"
                    class="d-block w-100 vh-100 custom_object_contain"
                    alt="..."
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-10 col-lg-11 col-sm-9 col-md-9 col-xl-9">
        <div class="row">
          <div class="col-12 pe-0 pe-sm-3">
            <div class="navbar d-flex flex-row-reverse my-2">
              <a class="navbar-brand" href="#">
                <img src="./company-logo.webp" width="150px" height="auto" />
              </a>
            </div>
          </div>
        </div>
        <div class="progressbar-main text-center py-2">
          <!-- progressbar -->
          <ul id="progressBar" class="progressbar">
            <li class="progress-item active">Verify Phone</li>
            <li class="progress-item">Upload Documents</li>
            <li class="progress-item">Security Questions</li>
          </ul>
        </div>
        <div class="form-section mt-2">
          <!-- form-section -->
          <div id="signupForm" class="row g-3 px-5 form-btn-box">
            <form
              id="signupForm"
              action="/submit-signup"
              method="POST"
              class="form-main row mt-3"
            >
              <div class="step active" id="step1">
                <div class="input-type col-12">
                  <span for="name" class="input-field-lable">Name</span>
                  <input
                    type="text"
                    class="progress-input-box"
                    id="name"
                    placeholder="Enter your name"
                    required
                  />
                  <span><i class="fa-solid fa-user input-icon"></i></span>
                </div>
                <div class="input-type col-12">
                  <span for="phone" class="input-field-lable"
                    >Phone Number</span
                  >
                  <input
                    type="tel"
                    class="progress-input-box"
                    id="phone"
                    placeholder="Enter your phone number"
                    required
                  />
                  <span><i class="fa-solid fa-phone input-icon"></i></span>
                </div>
                <div class="input-type col-12">
                  <span for="email" class="input-field-lable">Email</span>
                  <input
                    type="email"
                    class="progress-input-box"
                    id="email"
                    placeholder="Enter your email"
                    required
                  />
                  <span><i class="fa-solid fa-envelope input-icon"></i></span>
                </div>
                <div class="input-type col-12">
                  <span for="password" class="input-field-lable"
                    >Password</span
                  >
                  <input
                    type="password"
                    class="progress-input-box"
                    id="password"
                    placeholder="Enter your password"
                    required
                  />
                  <span><i class="fa-solid fa-lock input-icon"></i></span>
                </div>
                <div class="d-grid col-12">
                  <!-- <button type="button" class="custom-btn" id="sendOtp">
              Send OTP
          </button> -->
                  <div class="form-btn-box">
                    <p>
                      Have an account?
                      <a class="sign-link-btn" href="#">Sign In </a>now.
                    </p>
                    <input
                      type="button"
                      class="custom-btn"
                      id="sendOtp"
                      value="Send OTP"
                    />
                  </div>
                </div>
              </div>
            </form>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, quis inventore ex voluptate praesentium animi, quia minus ab consequatur quisquam consectetur nobis ratione. Dolorum ipsum, aspernatur sapiente laborum id quae.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident temporibus sint similique sed repellendus veritatis, consectetur perferendis explicabo quibusdam rerum quos totam nesciunt repellat ullam in. Odit itaque magni quaerat?</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, quis inventore ex voluptate praesentium animi, quia minus ab consequatur quisquam consectetur nobis ratione. Dolorum ipsum, aspernatur sapiente laborum id quae.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident temporibus sint similique sed repellendus veritatis, consectetur perferendis explicabo quibusdam rerum quos totam nesciunt repellat ullam in. Odit itaque magni quaerat?</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, quis inventore ex voluptate praesentium animi, quia minus ab consequatur quisquam consectetur nobis ratione. Dolorum ipsum, aspernatur sapiente laborum id quae.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident temporibus sint similique sed repellendus veritatis, consectetur perferendis explicabo quibusdam rerum quos totam nesciunt repellat ullam in. Odit itaque magni quaerat?</p>

            <!-- Step 2 -->
            <form
              id="signupForm"
              action="/submit-signup"
              method="POST"
              class="form-main row mt-3"
            >
              <div class="step" id="step2">
                <div class="input-type col-12">
                  <span for="otp" class="input-field-lable">Enter OTP</span>
                  <input
                    type="text"
                    class="progress-input-box"
                    id="otp"
                    placeholder="Enter the OTP sent to your phone"
                    required
                  /><span><i class="fa-solid fa-key input-icon"></i></span>
                </div>
                <div class="d-grid col-12">
                  <!-- <button type="button" class="custom-btn" id="verifyOtp">
              Verify OTP
          </button> -->
                  <div class="form-btn-box">
                    <p>
                      Have an account?
                      <a class="sign-link-btn" href="#">Sign In </a>now.
                    </p>
                    <input
                      type="button"
                      class="custom-btn"
                      id="verifyOtp"
                      value="Verify OTP"
                    />
                  </div>
                </div>
              </div>
            </form>
            <!-- Step 3 -->
            <form
              id="signupForm"
              action="/submit-signup"
              method="POST"
              class="form-main row mt-3"
            >
              <div class="step" id="step3">
                <div class="input-type col-12">
                  <span for="gst" class="input-field-lable">GST Number</span>
                  <input
                    type="text"
                    class="progress-input-box"
                    id="gst"
                    placeholder="Enter your GST number"
                    required
                  />
                  <span
                    ><i class="fa-solid fa-file-invoice-dollar input-icon"></i
                  ></span>
                </div>
                <div class="d-grid col-12">
                  <!-- <button type="button" class="custom-btn" id="submitSignup">
              Complete Signup
          </button> -->
                  <div class="form-btn-box">
                    <p>
                      Have an account?
                      <a class="sign-link-btn" href="#">Sign In </a>now.
                    </p>
                    <input
                      type="button"
                      class="custom-btn"
                      id="submitSignup"
                      value="Complete Signup"
                    />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- bootsrap js -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
  ></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      // Step 1: Send OTP
      $("#sendOtp").click(function () {
        alert("Step 1 completed! OTP has been sent.");
        $("#step1").removeClass("active");
        $("#step2").addClass("active");
        $("#progressBar li").eq(1).addClass("active");
      });

      // Step 2: Verify OTP
      $("#verifyOtp").click(function () {
        alert("Step 2 completed! OTP verified.");
        $("#step2").removeClass("active");
        $("#step3").addClass("active");
        $("#progressBar li").eq(2).addClass("active");
      });

      // Step 3: Complete Signup
      $("#submitSignup").click(function () {
        alert("Step 3 completed! Signup completed successfully.");
        $("#signupForm").submit(); // Submit the form or redirect as needed
      });

      // Submit form when Enter key is pressed
      $("#signupForm input").keypress(function (event) {
        if (event.which == 13) {
          // Check if Enter key (key code 13) is pressed
          event.preventDefault(); // Prevent default Enter key action (like form submission)

          // Check if we're on Step 1, Step 2, or Step 3, and trigger the respective action
          if ($("#step1").hasClass("active")) {
            $("#sendOtp").click(); // Trigger Step 1
          } else if ($("#step2").hasClass("active")) {
            $("#verifyOtp").click(); // Trigger Step 2
          } else if ($("#step3").hasClass("active")) {
            $("#submitSignup").click(); // Trigger final submission
          }
        }
      });

      // On form submit (to handle final submission)
      $("#signupForm").submit(function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Here, you can handle the form submission like sending data via AJAX,
        // or you can redirect to another page.
        alert("Form submitted successfully!");

        // Example of sending data via AJAX (use the correct URL for your backend)

        $.ajax({
          url: "your_backend_url",
          method: "POST",
          data: $("#signupForm").serialize(),
          success: function (response) {
            alert("Form submitted successfully!");
            // Handle success, maybe redirect or show success message
          },
          error: function (error) {
            alert("There was an error submitting the form.");
            // Handle errors
          },
        });

        // Redirect or handle other logic
        window.location.href = "thank_you_page.html"; // Example redirect to a thank you page
      });
    });
  </script>
@endsection --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: "Arial", sans-serif;
            background: #fff;
            overflow-x: hidden;
        }

        .step {
            display: none;
            width: 100%;
            /* Ensures all steps have the same width */
            min-height: 100px;
            /* Adds consistent height to avoid shifting */
        }

        .step.active {
            display: block;
        }

        .input-type {
            margin-bottom: 24px;
            position: relative;
        }

        .input-field-lable {
            color: #333333bd;
            position: absolute;
            left: 4%;
            bottom: 75%;
            background-color: #fff;
            padding: 3px 5px;
            font-size: 12px;
            font-weight: 600;
        }

        .input-icon {
            position: absolute;
            bottom: 30%;
            left: 2%;
        }

        .progress-input-box {
            border-radius: 3px;
            padding: 16px 31px 12px 42px;
            font-size: 14px;
            width: 100%;
            border: 1px solid #ddd;
        }

        .progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            padding: 0;
            list-style-type: none;
            position: relative;
        }

        .progressbar .progress-item {
            list-style-type: none;
            color: #99a2a8;
            font-size: 9px;
            width: calc(100% / 3);
            float: left;
            text-align: center;
            position: relative;
            font: 500 13px / 1 "Roboto", sans-serif;
        }

        .progressbar .progress-item.active {
            color: #5cb85c;
        }

        .progressbar .progress-item.active::before {
            background-color: #004f43;
            color: white;
        }

        .progressbar .progress-item::before {
            content: "";
            font: normal normal normal 30px / 50px Ionicons;
            width: 50px;
            height: 50px;
            line-height: 50px;
            display: block;
            background: #004f43;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            position: relative;
            z-index: 99;
        }

        .progressbar .progress-item::after {
            content: "";
            width: 100%;
            height: 2px;
            background: #eaf0f4;
            position: absolute;
            left: -50%;
            top: 21px;
            z-index: 0;
        }

        .progressbar .progress-item.active::after {
            background: #004f43;
            color: white;
        }

        .progressbar .progress-item:nth-child(1):after {
            content: "";
            display: none;
        }

        .progressbar .progress-item:nth-child(1)::before {
            content: "";
            background-image: url(./smartphone.png);
            background-repeat: no-repeat;
            background-position: center;
        }

        .progressbar .progress-item:nth-child(2)::before {
            content: "";
            background-image: url(./password-access.png);
            background-repeat: no-repeat;
            background-position: center;
        }

        .progressbar .progress-item:nth-child(3)::before {
            content: "";
            background-image: url(./save.png);
            background-repeat: no-repeat;
            background-position: center;
        }

        .custom_object_contain {
            object-fit: contain;
            filter: none !important;
        }

        .registration-step-area {
            background-color: transparent !important;
            color: #fff;
            z-index: 1090 !important;
        }

        .carousel-indicators [data-bs-target] {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            top: 0;
            bottom: 0;
            opacity: 0.4;
        }

        @media (max-width: 480px) {
            .registration-step-area {
                display: none;
            }

            .input-icon {
                left: 5%;
            }
        }

        .form-btn-box {
            display: flex;
            justify-content: space-between;
            padding: 15px;
        }

        .sign-link-btn {
            text-decoration: none;
        }

        .custom-btn {
            background-color: rgb(45, 116, 107);
            border: none;
            color: white;
            padding: 8px 20px;
            font-size: 17px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            width: 20%;
            transition: background-color 0.3s ease;
        }

        .form-section {
            /* background-color: green; */
            padding: 30px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 7px;
        }
        .verification-status {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            display: none;
        }
        .status-success {
            background-color: #d4edda;
            color: #155724;
        }
        .status-failure {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- slider -->
            <div class="col-lg-3 col-xl-2 col-md-3 col-sm-3 registration-step-area h-100 shadow p-0 sticky-top">
                <div class="card p-0 border-0">
                    <div class="card-body p-0 border-0">
                        <div id="carouselExampleIndicators" class="carousel slide w-100" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active vh-100" style="background-color: #141416">
                                    <img src="./Registration_1-D.jpg" class="d-block w-100 vh-100 custom_object_contain"
                                        alt="..." />
                                </div>
                                <div class="carousel-item vh-100" style="background-color: #ae2320">
                                    <img src="./Registration_2-D.jpg" class="d-block w-100 vh-100 custom_object_contain"
                                        alt="..." />
                                </div>
                                <div class="carousel-item vh-100" style="background-color: #ecd053">
                                    <img src="./Registration_3-D.jpg" class="d-block w-100 vh-100 custom_object_contain"
                                        alt="..." />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-10 col-lg-11 col-sm-9 col-md-9 col-xl-9">
                <div class="row">
                    <div class="col-12 pe-0 pe-sm-3">
                        <div class="navbar d-flex flex-row-reverse my-2">
                            <a class="navbar-brand" href="#">
                                <img src="./company-logo.webp" width="150px" height="auto" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="progressbar-main text-center py-2">
                    <!-- progressbar -->
                    <ul id="progressBar" class="progressbar">
                        <li class="progress-item active">Verify Phone</li>
                        <li class="progress-item">Upload Documents</li>
                        <li class="progress-item">Security Questions</li>
                    </ul>
                </div>
                <div class="form-section mt-2">
                    <!-- form-section -->
                    <div id="signupForm" class="row g-3 px-5 form-btn-box">
                        <form id="registrationForm" action="{{ route('business.register.save') }}" method="POST"
                            class="form-main row mt-3">
                            <div class="step active" id="step1">
                                <div class="input-type col-12">
                                    <span for="name" class="input-field-lable">Name</span>
                                    <input type="text" name="name" class="progress-input-box" id="name"
                                        placeholder="Enter your name" required />
                                    <span><i class="fa-solid fa-user input-icon"></i></span>
                                </div>
                                <div class="input-type col-12">
                                    <span for="phone" class="input-field-lable">Phone Number</span>
                                    <input type="tel" class="progress-input-box" id="phone"
                                        placeholder="Enter your phone number" name="phone" required />
                                    <span><i class="fa-solid fa-phone input-icon"></i></span>
                                </div>
                                <div class="input-type col-12">
                                    <span for="email" class="input-field-lable">Email</span>
                                    <input type="email" name="email" class="progress-input-box" id="email"
                                        placeholder="Enter your email" required />
                                    <span><i class="fa-solid fa-envelope input-icon"></i></span>
                                </div>
                                <div class="input-type col-12">
                                    <span for="password" class="input-field-lable">Password</span>
                                    <input type="password" class="progress-input-box" id="password" name="password"
                                        placeholder="Enter your password" required />
                                    <span><i class="fa-solid fa-lock input-icon"></i></span>
                                </div>
                                <div class="d-grid col-12">
                                    {{-- <button type="submit" class="custom-btn" id="sendOtp">Send OTP</button> --}}
                                    <div class="form-btn-box">
                                        <p>
                                            Have an account?
                                            <a class="sign-link-btn" href="#">Sign In </a>now.
                                        </p>
                                        <input type="button" class="custom-btn" id="sendOtp" value="Send OTP" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Step 2 -->
                        <form id="signupForm2" action="{{ route('user.otp.verify') }}" method="POST"
                            class="form-main row mt-3">
                            @csrf
                            <div class="step active" id="step2">
                                <div class="input-type col-12">
                                    <span for="otp" class="input-field-lable">Enter OTP</span>
                                    <input type="text" class="progress-input-box" id="otp"
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
                                        <input class="custom-btn" id="verifyOtp" value="Verify OTP" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Step 3 -->
                        {{-- <form id="signupForm3" action="/submit-signup" method="POST" class="form-main row mt-3">
                            <div class="step" id="step3">
                                <div class="input-type col-12">
                                    <span for="gst" class="input-field-lable">GST Number</span>
                                    <input type="text" class="progress-input-box" id="gst"
                                        placeholder="Enter your GST number" required />
                                    <span><i class="fa-solid fa-file-invoice-dollar input-icon"></i></span>
                                </div>
                                <div class="d-grid col-12">
                                    <!-- <button type="button" class="custom-btn" id="submitSignup">
                Complete Signup
            </button> -->
                                    <div class="form-btn-box">
                                        <p>
                                            Have an account?
                                            <a class="sign-link-btn" href="#">Sign In </a>now.
                                        </p>
                                        <input type="button" class="custom-btn" id="submitSignup"
                                            value="Complete Signup" />
                                    </div>
                                </div>
                            </div>
                        </form> --}}
                        <form id="signupForm3" action="/submit-signup" method="POST"
                            class="form-main row mt-3">
                            <div class="step active" id="step3">
                                <div class="input-type col-12">
                                    <label for="gst" class="input-field-lable">GST Number</label>
                                    <input type="text" class="progress-input-box" id="gst"
                                        placeholder="Enter your GST number" required />
                                    <span><i class="fa-solid fa-file-invoice-dollar input-icon"></i></span>
                                </div>

                                <div class="input-type col-12">
                                    <button type="button" class="custom-btn" id="verifyGstBtn">Verify GST</button>
                                    <div id="verificationStatus" class="verification-status"></div>
                                    <span><i class="fa-solid fa-file-invoice-dollar input-icon"></i></span>
                                </div>

                                <div id="additionalInfo" style="display: none;">
                                    <div class="input-type col-12">
                                        <label class="input-field-lable" for="tradeName">Trade Name</label>
                                        <input type="text" id="tradeName" class="progress-input-box" readonly />
                                        <span><i class="fa-solid fa-file-invoice-dollar input-icon"></i></span>
                                    </div>

                                    <div class="input-type col-12">
                                        <label class="input-field-lable" for="pincode">Pincode</label>
                                        <input type="text" id="pincode" class="progress-input-box" readonly />
                                        <span><i class="fa-solid fa-file-invoice-dollar input-icon"></i></span>
                                    </div>

                                    <div class="input-type col-12">
                                        <label class="input-field-lable" for="state">State</label>
                                        <input type="text" id="state" class="progress-input-box" readonly />
                                        <span><i class="fa-solid fa-file-invoice-dollar input-icon"></i></span>
                                    </div>

                                    <div class="input-type col-12">
                                        <label class="input-field-lable" for="city">City</label>
                                        <input type="text" id="city" class="progress-input-box" readonly />
                                        <span><i class="fa-solid fa-file-invoice-dollar input-icon"></i></span>
                                    </div>

                                    <div class="input-type col-12">
                                        <label class="input-field-lable" for="status">Status</label>
                                        <input type="text" id="status" class="progress-input-box" readonly />
                                        <span><i class="fa-solid fa-file-invoice-dollar input-icon"></i></span>
                                    </div>

                                    <div class="input-type col-12">
                                        <label class="input-field-lable" for="registrationDate">Registration Date</label>
                                        <input type="text" id="registrationDate" class="progress-input-box"
                                            readonly />
                                            <span><i class="fa-solid fa-file-invoice-dollar input-icon"></i></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bootsrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Step 1: Send OTP
            $("#sendOtp").click(function() {
                alert("Step 1 completed! OTP has been sent.");
                //   $("#step1").removeClass("active");
                //   $("#step2").addClass("active");
                //   $("#progressBar li").eq(1).addClass("active");
                const formData = $("#registrationForm").serialize();
                //  console.log(formData);
                $.ajax({
                    url: "{{ route('business.register.save') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        alert(response.message);
                        $("#step1").removeClass("active");
                        $("#step2").addClass("active");
                        $("#progressBar li").eq(1).addClass("active");
                    },
                    error: function(error) {
                        alert("Error: " + error.responseJSON.message);
                    },
                });
            });

            // Step 2: Verify OTP
            // $("#verifyOtp").click(function() {
            //     // const otps = $("#signupForm2").serialize();
            //     const otps = $("input[name='otp']").val();
            //     console.log("OTP Value: ", otps);
            //     if (!otps) {
            //         alert("Please enter the OTP!");
            //         return;
            //     }

            //     $.ajax({
            //         url: "{{ route('user.otp.verify') }}",
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // CSRF token
            //         },
            //         method: "POST", // Specify the HTTP method
            //         data: { otp: otps}, // Pass the OTP as key-value
            //         success: function(response) {
            //             alert(response.message); // Display success message
            //             $("#step2").removeClass("active");
            //             $("#step3").addClass("active");
            //             $("#progressBar li").eq(2).addClass(
            //             "active"); // Activate the third step
            //         },
            //         error: function(error) {
            //             alert("Error: " + (error.responseJSON?.message ||
            //                 "OTP verification failed"));
            //         },
            //     });
            // });
            $("#verifyOtp").click(function() {
                const otps = $("#otp").val();

                console.log("OTP Value: ", otps); // Log OTP value to the console for debugging

                // Check if OTP is entered
                if (!otps || otps.trim() === "") {
                    alert("Please enter the OTP!");
                    return;
                }

                // Perform AJAX request
                $.ajax({
                    url: "{{ route('user.otp.verify') }}", // Ensure the route is correct
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST", // Use POST method
                    data: {
                        otp: otps
                    }, // Send OTP as form data
                    success: function(response) {
                        console.log(otps);
                        console.log(response);
                        alert(response.message); // Show success message
                        $("#step2").removeClass("active"); // Proceed to next step
                        $("#step3").addClass("active");
                        $("#progressBar li").eq(2).addClass(
                            "active"); // Activate next step in progress bar
                    },
                    error: function(error) {
                        console.log(otps);
                        // Show error message if something goes wrong
                        // alert("Error: " + (error.responseJSON?.message ||
                        //     "OTP verification failed"));
                    }
                });
            });


            // });

            // Step 3: Complete Signup
            $("#submitSignup").click(function() {
                alert("Step 3 completed! Signup completed successfully.");
                $("#signupForm").submit(); // Submit the form or redirect as needed
            });

            // Submit form when Enter key is pressed
            // $("#signupForm input").keypress(function(event) {
            //     if (event.which == 13) {
            //         // Check if Enter key (key code 13) is pressed
            //         event.preventDefault(); // Prevent default Enter key action (like form submission)

            //         // Check if we're on Step 1, Step 2, or Step 3, and trigger the respective action
            //         if ($("#step1").hasClass("active")) {
            //             $("#sendOtp").click(); // Trigger Step 1
            //         } else if ($("#step2").hasClass("active")) {
            //             $("#verifyOtp").click(); // Trigger Step 2
            //         } else if ($("#step3").hasClass("active")) {
            //             $("#submitSignup").click(); // Trigger final submission
            //         }
            //     }
            // });

            // // On form submit (to handle final submission)
            // $("#signupForm").submit(function(event) {
            //     event.preventDefault(); // Prevent the default form submission

            //     // Here, you can handle the form submission like sending data via AJAX,
            //     // or you can redirect to another page.
            //     alert("Form submitted successfully!");

            //     // Example of sending data via AJAX (use the correct URL for your backend)

            //     $.ajax({
            //         url: "your_backend_url",
            //         method: "POST",
            //         data: $("#signupForm").serialize(),
            //         success: function(response) {
            //             alert("Form submitted successfully!");
            //             // Handle success, maybe redirect or show success message
            //         },
            //         error: function(error) {
            //             alert("There was an error submitting the form.");
            //             // Handle errors
            //         },
            //     });

            //     // Redirect or handle other logic
            //     window.location.href = "thank_you_page.html"; // Example redirect to a thank you page
            // });
            $("#goBack").click(function() {
                $("#step2").removeClass("active");
                $("#step1").addClass("active");
                $("#progressBar li").eq(1).removeClass("active");
            });
            $('#verifyGstBtn').click(function() {
                const gstNumber = $('#gst').val().trim();

                if (!gstNumber) {
                    alert('Please enter a GST number.');
                    return;
                }

                // Replace with your API key
                const apiKey = '773d5f467578e282dac1d0c338c447cb';
                const apiUrl = `http://sheet.gstincheck.co.in/check/${apiKey}/${gstNumber}`;

                $.ajax({
                    url: apiUrl,
                    method: 'GET',
                    success: function(response) {
                        if (response.flag) {
                            $('#verificationStatus')
                                .removeClass('status-failure')
                                .addClass('status-success')
                                .text('GST Verified Successfully!')
                                .show();

                            // Populate fields with response data
                            $('#tradeName').val(response.data.tradeNam);
                            $('#pincode').val(response.data.pradr.addr.pncd);
                            $('#state').val(response.data.pradr.addr.stcd);
                            $('#city').val(response.data.pradr.addr.dst);
                            $('#status').val(response.data.sts);
                            $('#registrationDate').val(response.data.rgdt);

                            $('#additionalInfo').show();
                        } else {
                            $('#verificationStatus')
                                .removeClass('status-success')
                                .addClass('status-failure')
                                .text('GST Verification Failed: ' + response.message)
                                .show();

                            $('#additionalInfo').hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error Details:', xhr);
                        $('#verificationStatus')
                            .removeClass('status-success')
                            .addClass('status-failure')
                            .text('Error while verifying GST. Please try again.')
                            .show();

                        $('#additionalInfo').hide();
                    },
                });
            });

        });
    </script>
</body>

</html>
