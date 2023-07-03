<!DOCTYPE html>
<html>
<head>
       <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity=" sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"> </script> -->

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title >FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</title>
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
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
}

</style>

<body>

        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container px-lg-1">
                <a href="login_admin.php" class="navbar-brand fs-3 fw-bold" ><img src="img\favicon.ico">FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
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

        <div class="login">
                        <h1>Admin Login</h1>
                        <form action="authenticate_admin.php" method="post">
                                <label for="admin_username">
                                        <i class="fas fa-user"></i>
                                </label>
                                <input type="text" name="admin_username" placeholder="Username" id="admin_username" required>
                                <label for="password">
                                        <i class="fas fa-lock"></i>
                                </label>
                                <input type="password" name="admin_password" placeholder="Password" id="admin_password" required>
                                <input type="submit" name="login" value="Login">
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