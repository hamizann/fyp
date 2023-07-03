<!DOCTYPE html>
<html>

    <head>
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

        <?php   
            include 'db_connect.php';
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container px-lg-1">
                        <a href="home_admin.php" class="navbar-brand fs-3 fw-bold" ><img src="img\favicon.ico"> FUNDAMENTAL ONLINE GUIDED MODULE TO PERFORM HAJJ AND UMRAH</a>
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item fs-5"><a class="nav-link" href="profile_user.php">Profile</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Menu
                                    </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="course_admin.php">Course</a></li>
                                    <li><a class="dropdown-item" href="question_page.php">Question</a></li>
                                    <li><a class="dropdown-item" href="quiz_page.php">Quiz</a></li>
                                    <li><a class="dropdown-item" href="answer_page.php">Answer</a></li>
                                    <li><a class="dropdown-item" href="attendance_page.php">Attendance</a></li>
                                    <!-- <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                                </ul>
                                <li class="nav-item fs-5"><a class="nav-link" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </nav>

        <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Manage Week 1 Video  </h1>
            <p class="lead">This is the page where you can manage Week 1 video materials by upload, edit and delete the file.</p>
            <hr class="hr"/>
    
        <form action="upload_w1_video.php" method="POST" enctype="multipart/form-data">
            <label>Title:</label>
            <input type="text" name="videoTitle">
            <label>Select a file to upload:</label>
            <input type="file" name="videoFile">
            <input type="submit" name="submit" value="Upload">
        </form>
        <hr class="hr"/>
        </div>
        </div>        

        <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover">
                <thead>
                    <?php //if (condition){?>
                    <tr>
                        <th>Id</th>
                        <th>Video Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php //}?>
                </thead>    
                <tbody>
    <?php 
    $ret = mysqli_query($con, "SELECT * FROM week1_video");
    $cnt = 1;
    $row = mysqli_num_rows($ret);
    
    if ($row > 0) {
        while ($data = mysqli_fetch_array($ret)) {
    ?>
        <tr>
            <td><?php echo $cnt; ?></td>
            <td><?php echo $data['week1_video_title']; ?></td>
            <td><a href="edit_video_week1.php?id=<?php echo $data['week1_video_id']; ?>"> <i class="fas fa-edit"></i> Edit</a></td>
            <td><a href="delete_video_week1.php?id=<?php echo $data['week1_video_id']; ?>"> <i class="fas fa-trash"></i>Delete</a></td>  
        </tr>
    <?php
        $cnt++;
        }   
    } else {
    ?>
        <tr>
            <th style="text-align:center; color:red;" colspan="6">No Record Found</th> 
        </tr>
    <?php
    }
    ?>
</tbody>
</table>
            </table>

        </div>

    <br>
    <br>
    </div>


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