<?php
session_start();
?>
<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
  
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Internal Assessment</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com"crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    <!-- <script src="back.js"></script> -->
    
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
        <p class="display-1 text-center pt-5" style="color: black; "><i>Choose Login</i></p>
        <div class="row mt-5">

            <div class=" col-md-3 mx-auto mt-5 ">
                <div class="shivam1 card ">
                    <div class=" card-body ">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="admin_login.php" class="app-brand-link gap-2">
                            <span class="app-brand-text demo text-body fw-bolder">Farmer Login</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <!-- <h4 class="mb-2">Admin Login</h4> -->
                    <a href="admin_login.php" class="app-brand-link gap-2">
                        <img src="images/farmer.png" alt="" class="mx-auto d-block my-5">
                    </a>
                     </div> 
                </div>
              </div>

            <div class=" col-md-3 mx-auto  mt-5 ">
                <div class="shivam2 card">
                    <div class="card-body ">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center ">
                        <a href="staff_login.php" class="app-brand-link gap-2">
                            <span class="app-brand-text demo text-body fw-bolder">Admin Login</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <!-- <h4 class="mb-2">Admin Login</h4> -->
                    <a href="staff_login.php" class="app-brand-link gap-2">
                        <img src="images/Admin.png" alt="" class="mx-auto d-block my-5">
                    </a>
                    </div>
                </div>
            </div>

            <div class=" col-md-3 mx-auto  mt-5">
                <div class="card">
                    <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="student_login.php" class="app-brand-link gap-2">
                            <span class="app-brand-text demo text-body fw-bolder">Student Login</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <!-- <h4 class="mb-2">Admin Login</h4> -->
                    <a href="student_login.php" class="app-brand-link gap-2">
                        <img src="images/student.png" alt="" class="mx-auto d-block my-5">
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->
     
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
  </body>
</html>