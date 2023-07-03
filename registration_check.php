<?php
session_start();
include 'db_connect.php';

if (isset($_POST['fullname']) && isset($_POST['phonenumber']) && isset($_POST['email']) && isset($_POST['dateOfBirth']) && isset($_POST['status']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $fullname = validate($_POST['fullname']);
    $phonenumber = validate($_POST['phonenumber']);
    $email = validate($_POST['email']);
    $dateOfBirth = validate($_POST['dateOfBirth']);
    $status = validate($_POST['status']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm_password']);

    $user_data = 'fullname=' .$fullname. '&phonenumber=' .$phonenumber. '&email=' .$email. '&dateOfBirth=' .$dateOfBirth. '&status=' .$status. '&password=' .$password. '&confirm_password=' .$confirm_password;
    
    if (empty($fullname)) {
		header("Location: registration.php?error=Full Name is required&$user_data");
	    exit();
	}else if(empty($phonenumber)){
        header("Location: registration.php?error=Phone Number is required&$user_data");
	    exit();
	}
	else if(empty($username)){
        header("Location: registration.php?error=Username is required&$user_data");
	    exit();
	}

	else if(empty($email)){
        header("Location: registration.php?error=Email is required&$user_data");
	    exit();
	}

    else if(empty($dateOfBirth)){
        header("Location: registration.php?error=Date of birth is required&$user_data");
	    exit();
	}

    else if(empty($password)){
        header("Location: registration.php?error=Password is required&$user_data");
	    exit();
	}

    else if(empty($password !== $confirm_password)){
        header("Location: registration.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}


    else{

        //hashing password
        $password = md5($password);

        $sql = "SELECT * FROM user_account WHERE user_username='$username'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
                header("Location: registration.php?error=The username has been taken. Try another name&$user_data");
            exit();
            } else{
                $sql2 = "INSERT INTO user_account(user_username, user_password, user_fullname, user_email, user_phoneNo)";
                $result2 = "mysqli_query($conn,$sql2)";
                if($result2) {
                    header("Location: registration.php?success=Your account has been created successfully");
                    exit();
                }else {
                    header("Location: registration.php?error=unknown error occured&$user_data");
                    exit();
                }
            }

    }
} else{
    header("Location: registration.php");
    exit();
}


 
?>
