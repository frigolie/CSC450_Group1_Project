<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8" />
      <!-- header.php - Global header for use on each page of the web app
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/03/21
      Revisions:
      -->

      <!-- Boostrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
      <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="style.css">
      <!-- Google Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;800&display=swap" rel="stylesheet">
   </head>
  <body>
    <nav class="navbar fixed-top py-3">
      <div class="container-xxl px-xxl-0">
        <div class="row w-100 mx-auto">
          <div class="col-12 col-lg-5 logoContainer mb-3 mb-lg-0 d-flex justify-content-center justify-content-lg-start">
            <a class="navbar-brand orange-text" href="#">
              <img src="graphic/logo.png" alt="" width="100" height="auto" class="d-inline-block align-text-middle">
              Site Name
            </a>
          </div>

          <div class="col-12 col-lg-7 loginContainer d-flex align-items-center justify-content-center justify-content-lg-end">
            <div class="row w-100">
              <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end">
                <p class="text-center mb-3 mb-lg-0">Login or create an account to begin!</p>
              </div>
              <div class="col-6 col-lg-3">
                <button class="globalButton orangeButton w-100">
                  Log In
                </button>
              </div>
              <div class="col-6 col-lg-3">
                <button class="globalButton blueButton w-100">
                  Register
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- JQuery CDN -->
    <script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>

    <!-- Adding sticky nav class on page scroll -->
    <script>
    jQuery(function($){

      $(window).scroll(function(){
        var margin = $('.navbar').height();
        if($(this).scrollTop()>=margin){
            $(".navbar").addClass("stickiedNav");
        } else{
        	$(".navbar").removeClass("stickiedNav");
        }
      });
    });
    </script>
  </body>
</html>
