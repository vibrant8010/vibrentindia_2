<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Creative Login Pop-up</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Custom CSS -->
    <style>
      body {
        background: #fff;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .modal-content {
        border-radius: 20px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
      }
      .modal-header {
        border-bottom: none;
      }
      .modal-footer {
        border-top: none;
      }

      .login-btn {
        background-image: linear-gradient(
          135deg,
          rgb(45, 116, 107),
          rgb(80, 200, 180)
        );
        box-sizing: border-box;
        color: #ffffff;
        border: none;
        border-radius: 50px;
        font-size: 15px;
        font-weight: 500;
        padding: 10px 45px;
        transition: background 0.3s ease;
      }

      .login-btn:hover {
        background-image: linear-gradient(
          135deg,
          rgb(80, 200, 180),
          rgb(45, 116, 107)
        );
      }

      .forgot-password {
        font-size: 15px;
        color: #000;
      }
      .Skip {
        text-decoration: none;
        font-size: 20px;
        font-weight: 500;
        color: #525151;
      }
      .forgot-password:hover {
        text-decoration: none;
      }

      .login-type {
        margin-bottom: 24px;
        position: relative;
      }

      .login-field-lable {
        color: #333333bd;
        position: absolute;
        left: 4%;
        bottom: 75%;
        background-color: #fff;
        padding: 3px 5px;
        font-size: 15px;
        font-weight: 600;
      }
      .input-icon {
        position: absolute;
        bottom: 30%;
        left: 2%;
      }

      .login-input-box {
        border-radius: 3px;
        padding: 12px 31px 12px 35px;
        font-size: 15px;
        width: 100%;
        border: 1px solid #ddd;
      }
      .login-logo {
        max-width: 150px;
        position: relative;
      }
      .login-logo img {
        width: 100%;
        height: 100%;
      }
      .login-logo::before {
        content: "";
        position: absolute;
        width: 1px;
        height: 30px;
        background-color: #000;
        left: 113%;
      }
      .login-header {
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .txt-header {
        font-size: 15px;
        line-height: 1.2;
        padding: 0px 30px;
      }
      @media (max-width: 575px) {
        .txt-header {
          display: none;
        }
        .login-logo::before {
          display: none;
        }
        .login-input-box {
          padding: 10px 20px 10px 34px;
        }
      }
    </style>
  </head>
  <body>
    <!-- Trigger Button -->
    <button
      type="button"
      class="btn login-btn"
      data-bs-toggle="modal"
      data-bs-target="#loginModal"
      id="loginButton"
      style="display: none"
    >
      Sign UP
    </button>

    <!-- Login Modal -->
    <div
      class="modal fade"
      id="loginModal"
      tabindex="-1"
      aria-labelledby="loginModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header mt-2 login-header">
            <div class="login-logo">
              <a href="#"><img src="./company-logo.webp" alt="" /></a>
            </div>
            <div class="txt-header">
              Wel Come, <br />
              Login for a seamless experience
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div id="basicForm">
              <div class="login-type">
                <span for="email" class="login-field-lable">Email</span>
                <input
                  type="email"
                  class="login-input-box"
                  id="email"
                  placeholder="Enter your email"
                  required
                />
                <span><i class="fa-solid fa-envelope input-icon"></i></span>
              </div>
              <span
                >"Don't have an account? "
                <a
                  type="button"
                  class="forgot-password mt-2"
                  id="showDetailsForm"
                >
                  Sign UP
                </a></span
              >
            </div>
            <div id="detailedForm" style="display: none">
              <div class="login-type">
                <span for="name" class="login-field-lable">Name</span>
                <input
                  type="text"
                  class="login-input-box"
                  id="name"
                  placeholder="Enter your name"
                  required
                />
                <span><i class="fa-solid fa-user input-icon"></i></span>
              </div>
              <div class="login-type">
                <span for="email" class="login-field-lable">Email</span>
                <input
                  type="email"
                  class="login-input-box"
                  id="email"
                  placeholder="Enter your email"
                  required
                />
                <span><i class="fa-solid fa-envelope input-icon"></i></span>
              </div>
              <div class="login-type">
                <span for="phone" class="login-field-lable">Phone Number</span>
                <input
                  type="tel"
                  class="login-input-box"
                  id="phone"
                  placeholder="Enter your phone number"
                  required
                />
                <span><i class="fa-solid fa-phone input-icon"></i></span>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="forgot-password">Forgot Password?</a>
                <a
                  type="button"
                  class="forgot-password mt-2 form-btn"
                  id="showBasicForm">
                  Login
                </a>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn login-btn w-100">Sign UP</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
      // Open modal automatically after page loads
      window.onload = function () {
        setTimeout(function () {
          var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
          loginModal.show();
        }, 3000); // 3000 milliseconds = 3 seconds
      };

      document
        .getElementById("showDetailsForm")
        .addEventListener("click", function () {
          document.getElementById("basicForm").style.display = "none";
          document.getElementById("detailedForm").style.display = "block";
        });

      document
        .getElementById("showBasicForm")
        .addEventListener("click", function () {
          document.getElementById("basicForm").style.display = "block";
          document.getElementById("detailedForm").style.display = "none";
        });
    </script>
  </body>
</html>
