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
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Bootstrap icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap-icons.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap) -->
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

        .button1 {
            width: 120px;
            justify-content: center;
            align-items: center;
            display: flex;
        }
            
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #25a2aa;
        }

        li a {
            display: block;
            color: #000;
            padding: 8px 0 8px 16px;
            text-decoration: none;
        }

        /* Change the link color on hover */
        li a:hover {
            background-color: #555;
            color: white;
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

        .center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100px;
        }
    </style>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container px-lg-1">
                <a href="home_admin.php" class="navbar-brand fs-3 fw-bold" ><img src="img\favicon.ico">FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item fs-5"><a class="nav-link" href="profile_page_admin.php">Profile</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="course_page.php">Course</a></li>
                            <li><a class="dropdown-item" href="question_page.php">Question</a></li>
                            <li><a class="dropdown-item" href="quiz_page.php">Quiz</a></li>
                            <li><a class="dropdown-item" href="answer_page.php">Answer</a></li>
                            <li><a class="dropdown-item" href="attendance_page.php">Attendance</a></li>
                        </ul>
                    </li>
                    <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>

<?php
session_start();
if (!isset($_SESSION['loggedin1'])) {
    header('Location: login_admin.php');
    exit();
}

// Get the current user ID
$userId = $_SESSION['loggedin1'];

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission and update user details
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Perform necessary validation and sanitization

    // Update user details in the database
    $query = $con->prepare("UPDATE admin_account SET admin_username = ?, admin_fullname = ?, admin_email = ?, admin_phoneNo = ? WHERE admin_id = ?");

    if ($query) {
        $query->bind_param('ssssi', $username, $fullname, $email, $phone, $userId);
        $query->execute();

        // Redirect back to the profile page after updating
        header('Location: profile_page_admin.php');
        exit();
    } else {
        echo "Query error: " . $con->error;
    }
} else {
    // Retrieve the user details to pre-fill the form
    $query = $con->prepare("SELECT * FROM admin_account WHERE admin_id = ?");
    
    if ($query) {
        $query->bind_param('i', $userId);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Display the form to edit user details
            echo "<h1 class='text-center'>Edit Profile</h1>";
            echo "<div class='container d-flex justify-content-center'>";
            echo "<div class='col-md-6'>";
            echo "<form action='' method='POST'>";
            echo "   <div class='form-group'>";
            echo "       <strong><label for='username'>Username:</label></strong>";
            echo "       <input type='text' class='form-control' id='username' name='username' value='" . $user['admin_username'] . "'>";
            echo "   </div><br>";
            echo "   <div class='form-group'>";
            echo "       <strong><label for='fullname'>Name:</label></strong>";
            echo "       <input type='text' class='form-control' id='fullname' name='fullname' value='" . $user['admin_fullname'] . "'>";
            echo "   </div><br>";
            echo "   <div class='form-group'>";
            echo "       <strong><label for='email'>Email:</label></strong>";
            echo "       <input type='email' class='form-control' id='email' name='email' value='" . $user['admin_email'] . "'>";
            echo "   </div><br>";
            echo "   <div class='form-group'>";
            echo "       <strong><label for='phone'>Phone:</label></strong>";
            echo "       <input type='tel' class='form-control' id='phone' name='phone' value='" . $user['admin_phoneNo'] . "'>";
            echo "   </div><br>";
            // echo "   <div class='form-group'>";
            // echo "       <strong><label for='dob'>DOB:</label></strong>";
            // echo "       <input type='date' class='form-control' id='dob' name='dob' value='" . $user['admin_dateOfBirth'] . "'>";
            // echo "   </div><br>";
            echo "   <div class='center'>";
            echo "       <button type='submit' class='button button1'>Update</button>";
            echo "   </div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "User not found";
        }
    } else {
        echo "Query error: " . $con->error;
    }
}
?>
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