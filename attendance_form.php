<!DOCTYPE html>
<html>
<head>
    <title>Attendance Form</title>
    <style>
        /* Add your CSS styling here */
    </style>
</head>
<body>
    <h1>Scan QR Code and Enter ID for Attendance</h1>

    <form action="attendance_process.php" method="post">
        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" id="student_id" autofocus>

        <input type="submit" value="Submit">
    </form>

    <script>
        // Add JavaScript code to capture QR code data from webcam or mobile device camera
    </script>
</body>
</html>
