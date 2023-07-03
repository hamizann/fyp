<?php
// Include the database connection file
include 'db_connect.php';

// Array to store the average data
$averages = [];

// Query and calculate average data from Table 1
$queryTable1 = "SELECT AVG(score) AS average_score FROM user_scores";
$resultTable1 = $con->query($queryTable1);
$rowTable1 = $resultTable1->fetch_assoc();
$averageTable1 = $rowTable1['average_score'];
$averages[] = number_format($averageTable1, 2);

// Query and calculate average data from Table 2
$queryTable2 = "SELECT AVG(score) AS average_score FROM user_scores_w2";
$resultTable2 = $con->query($queryTable2);
$rowTable2 = $resultTable2->fetch_assoc();
$averageTable2 = $rowTable2['average_score'];
$averages[] = number_format($averageTable2, 2);

// Query and calculate average data from Table 3
$queryTable3 = "SELECT AVG(score) AS average_score FROM user_scores_w3";
$resultTable3 = $con->query($queryTable3);
$rowTable3 = $resultTable3->fetch_assoc();
$averageTable3 = $rowTable3['average_score'];
$averages[] = number_format($averageTable3, 2);

$queryTable4 = "SELECT AVG(score) AS average_score FROM user_scores_w4";
$resultTable4 = $con->query($queryTable4);
$rowTable4 = $resultTable4->fetch_assoc();
$averageTable4 = $rowTable4['average_score'];
$averages[] = number_format($averageTable4, 2);

$queryTable5 = "SELECT AVG(score) AS average_score FROM user_scores_w5";
$resultTable5 = $con->query($queryTable5);
$rowTable5 = $resultTable5->fetch_assoc();
$averageTable5 = $rowTable5['average_score'];
$averages[] = number_format($averageTable5, 2);

$queryTable6 = "SELECT AVG(score) AS average_score FROM user_scores_w6";
$resultTable6 = $con->query($queryTable6);
$rowTable6 = $resultTable6->fetch_assoc();
$averageTable6 = $rowTable6['average_score'];
$averages[] = number_format($averageTable6, 2);

$queryTable7 = "SELECT AVG(score) AS average_score FROM user_scores_w7";
$resultTable7 = $con->query($queryTable7);
$rowTable7 = $resultTable7->fetch_assoc();
$averageTable7 = $rowTable7['average_score'];
$averages[] = number_format($averageTable7, 2);

$queryTable8 = "SELECT AVG(score) AS average_score FROM user_scores_w8";
$resultTable8 = $con->query($queryTable8);
$rowTable8 = $resultTable8->fetch_assoc();
$averageTable8 = $rowTable8['average_score'];
$averages[] = number_format($averageTable8, 2);

$queryTable9 = "SELECT AVG(score) AS average_score FROM user_scores_w9";
$resultTable9 = $con->query($queryTable9);
$rowTable9 = $resultTable9->fetch_assoc();
$averageTable9 = $rowTable9['average_score'];
$averages[] = number_format($averageTable9, 2);

$queryTable10 = "SELECT AVG(score) AS average_score FROM user_scores_w10";
$resultTable10 = $con->query($queryTable10);
$rowTable10 = $resultTable10->fetch_assoc();
$averageTable10 = $rowTable10['average_score'];
$averages[] = number_format($averageTable10, 2);

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html>
    <head>
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    </style>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container px-lg-1">
            <a href="home_admin.php" class="navbar-brand fs-3 fw-bold" ><img src="img\favicon.ico">FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item fs-5"><a class="nav-link" href="profile_user.php">Profile</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="course_admin_page.php">Course</a></li>
                            <li><a class="dropdown-item" href="q&a_page_admin.php">Q&A</a></li>
                            <li><a class="dropdown-item" href="">x</a></li>
                            <li><a class="dropdown-item" href="">x</a></li>
                            <li><a class="dropdown-item" href="bar_chart.php">Analysis</a></li>
                    </ul>
                </li>
                <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    
    <canvas id="myChart"></canvas>

    <script>
        // JavaScript code to create the chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7', 'Week 8', 'Week 9', 'Week 10'],
                datasets: [{
                    label: 'Average Data',
                    data: [<?php echo implode(',', $averages); ?>],
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <br><br><br><br>
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
