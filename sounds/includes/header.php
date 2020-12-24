<!DOCTYPE html>

<?php include('includes/config.php');

if (isset($_SESSION["ISLOGIN"])) { if($_SESSION["ISLOGIN"]){  $userprofile=$_SESSION["GREET"];$downbtn="download";}else{$userprofile='<button type="button" class="btn-header" data-toggle="modal" data-target="#loginmodal">GET STARTED</button>'; 
$downbtn="data-toggle='modal' data-target='#loginmodal'";}}
?> 

<html lang="en">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="" />

    <meta name="author" content="" />

    <title>SoundToMovie</title>

    <!-- Favicon-->

    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <!-- Font Awesome icons (free version)-->

    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>

    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

    <!-- Third party plugin CSS-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 



	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"

		integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"

		crossorigin="anonymous"> 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> 

	</script> 

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"> 

	</script> 

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"> 

	</script> 

    <!-- Core theme CSS (includes Bootstrap)-->

    <link href="css/styles.css" rel="stylesheet" />

    <link href="css/custom.css" rel="stylesheet" />

</head>

<body id="page-top">

    <!-- Navigation-->

    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-1" id="mainNav">

        <div class="container-fluid">

            <a class="navbar-brand js-scroll-trigger" href="home">SoundToMovie</a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ml-auto my-2 my-lg-0">

                    <li class="nav-item"><a class="nav-link" href="library">LIBRARY</a></li>

                    <li class="nav-item"><a class="nav-link" href="contact">CONTACT</a></li>

                    <li class="nav-item"><a class="nav-link" href="#">ABOUT</a></li>

                </ul>

                <ul class="navbar-nav ml-auto my-2 my-lg-0"><li class="nav-item"><?php echo "$userprofile";?></ul>

            </div>

        </div>

    </nav>

<!-- Button trigger modal -->



<!-- LOgin Modal -->

<div class="modal fade bd-example-modal-sm" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodaltitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-sm" role="document" >

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="loginmodaltitle">LOGIN</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <form action="" method="post">

              <div class="form-group">

                <label for="exampleFormControlInput1">Username</label>

                <input type="email" class="form-control" id="mail" name="mail" placeholder="" required >

              </div>

              <div class="form-group">

                <label for="exampleFormControlInput2">Password</label>

                <input type="password" class="form-control" id="pass" name="pass" placeholder="" required>

              </div> 

              <div class="modal-footer">

                <input type="submit" class="btn-header" value="Login" name="login">

                <button type="button" class="btn-header" data-toggle="modal" class="close" data-dismiss="modal" data-target="#registermodal">New User?</button>

              </div>

        </form>

      </div>

    </div>

  </div>

</div>



<!-- Register Modal -->

<div class="modal fade bd-example-modal-sm" id="registermodal" tabindex="-1" role="dialog" aria-labelledby="registermodaltitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document" >

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="registermodaltitle">Register</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <form action="" method="POST">

                <div class="row">

                    <div class="col">

                        <div class="form-group">

                            <label for="e">First Name</label>

                            <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" required>

                        </div>

                    </div>

                    <div class="col">

                        <div class="form-group">

                            <label for="e">Last Name</label>

                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" required>

                        </div>

                    </div>

                  </div>

              <div class="form-group">

                <label for="e">E-mail</label>

                <input type="email" class="form-control" id="e" name="e" placeholder="" required >

              </div>

              <div class="form-group">

                <label for="pword">Password</label>

                <input type="password" class="form-control" id="pword" name="pword" placeholder="" minlength=8 maxlength=8 required  >

              </div>

                <div class="form-group">

                <label for="pword2">Confirm-Password</label>

                <input type="password" class="form-control" id="pword2" name="pword2" placeholder="" minlength=8 maxlength=8 required>

              </div>

              <div class="modal-footer">

                <input type="submit" class="btn-header" value="Register" name="register">

                <button type="button" class="btn-header" data-toggle="modal" class="close" data-dismiss="modal" data-target="#loginmodal">Already Registered?</button>

              </div>

        </form>

      </div>

    </div>

  </div>

</div>

<!-- REGISTER MESSAGE -->

<div class="modal fade bd-example-modal-sm" id="afterregister" tabindex="-1" role="dialog" aria-labelledby="loginmodaltitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-sm" role="document" >

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="loginmodaltitle"> Registered ! </h5>

      </div>

      <div class="modal-body">

        <div class="justify-content-center" >
            <form action="" method="post">
            
                    <p >Thankyou  for Registering !</p><p>Welcome to SoundToMovie .</p>

                    <input type="submit" class="btn-header" value="Go to Profile" name="gtoprf" >

            </form>
        </div>
      </div>

    </div>

  </div>

</div>

<?php echo "$regmdl";?>