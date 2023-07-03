<?php
    require_once('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
</head>

<style>
        .button {
          background-color: #25a2aa;
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }
        .login {
  	width: 400px;
  	background-color: #ffffff;
  	box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
  	margin: 100px auto;
}
.login h1 {
  	text-align: center;
  	color: #5b6574;
  	font-size: 24px;
  	padding: 20px 0 20px 0;
  	border-bottom: 1px solid #dee0e4;
}
.login form {
  	display: flex;
  	flex-wrap: wrap;
  	justify-content: center;
  	padding-top: 20px;
}
.login form label {
  	display: flex;
  	justify-content: center;
  	align-items: center;
  	width: 50px;
  	height: 50px;
  	background-color: #25a2aa;
  	color: #ffffff;
}
.login form input[type="password"], .login form input[type="text"] {
  	width: 310px;
  	height: 50px;
  	border: 1px solid #dee0e4;
  	margin-bottom: 20px;
  	padding: 0 15px;
}
.login form input[type="submit"] {
  	width: 100%;
  	padding: 15px;
 	margin-top: 20px;
  	background-color: #25a2aa;
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: background-color 0.2s;
}
.login form input[type="submit"]:hover {
	background-color: #555 ;
  	transition: background-color 0.2s;
}

nav {
  background-color: #25a2aa;
}

footer {
  background-color: #25a2aa;
  position: ;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
}

    </style>

<body>

<div>
	<?php
        if(isset($_POST['submit'])){
            echo 'User submitted';
        }
	?>	
</div>

<nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container px-lg-1">
                <a href="registration.php" class="navbar-brand fs-3 fw-bold" ><img src="img\favicon.ico">FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
                <!-- <a class="navbar-brand fs-3 fw-bold" href="#!">FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a> -->
                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item fs-5"><a class="nav-link active" aria-current="page" href="http://localhost/Futbook/">Home</a></li>
                        <li class="nav-item fs-5"><a class="nav-link" href="#!">Profile</a></li>
                        <li class="nav-item fs-5"><a class="nav-link" href="#!">Settings</a></li>
                    </ul>
                </div> -->
            </div>
        </nav>

<div>
	<form action="register2.php" method="post">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
					<h1>Registration</h1>
					<p>Fill up the form with your details</p>
					<hr class="mb-3">

					<label for="username"><b>Username</b></label>
					<input class="form-control" id="username" type="text" name="username" required>

					<label for="fullname"><b>Fullname</b></label>
					<input class="form-control" id="fullname" type="text" name="fullname" required>

					<label for="phonenumber"><b>Phone Number</b></label>
					<input class="form-control" id="phonenumber"  type="text" name="phonenumber" required>

					<label for="email"><b>Email Address</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>

					<label for="dateOfBirth"><b>Date of Birth</b></label>
					<input class="form-control" id="dateOfBirth"  type="date" name="dateOfBirth" required>

                    <!-- <label for="status"><b>Status</b></label>
					<input class="form-control" id="status"  type="text" name="status" required> -->

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>

					<label for="password2"><b>Confirm Password</b></label>
					<input class="form-control" id="password2"  type="password" name="password2" required>

					<hr class="mb-3">
					<input class="button" type="submit" id="register" name="submit" value="Sign Up">
				</div>
			</div>
		</div>
	</form>
</div>

<div>
            <!-- Footer-->
        <footer class="py-3">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Fundamental Online Guided Module to Perform Hajj and Umrah</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        </div>

</body>
</html>