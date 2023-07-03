<?php
include 'db_connect.php';

$query = "SELECT * FROM attendance_records";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH - Attendance Records</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<style>
    /* Add custom styles for the table */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-table th,
    .custom-table td {
        padding: 8px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .custom-table th {
        background-color: #25a2aa;
        color: white;
    }

    .custom-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .custom-table tr:hover {
        background-color: #ddd;
    }

    /* Adjust the styles for the navigation and footer */
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
        color: white;
        padding: 10px;
    }
</style>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container px-lg-1">
        <a href="home_user.php" class="navbar-brand fs-3 fw-bold"><img src="img\favicon.ico">FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item fs-5"><a class="nav-link" href="profile_page_user.php">Profile</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="course_page.php">Course</a></li>
                    <li><a class="dropdown-item" href="question_page.php">Question</a></li>
                    <li><a class="dropdown-item" href="quiz_page.php">Quiz</a></li>
                    <li><a class="dropdown-item" href="answer_page.php">Answer</a></li>
                    <li><a class="dropdown-item" href="attendance_admin.php">Attendance</a></li>
                </ul>
            </li>
            <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <h2>Attendance Records</h2>

    <table class="custom-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phoneNo']; ?></td>
                <td><?php echo $row['date']; ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<br><br><br>
<div>
    <!-- Footer-->
    <footer class="py-3">
        <div class="container"><p class="m-0 text-center text-white">&copy; Fundamental Online Guided Module to Perform Hajj and Umrah</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</div>

</body>
</html>
