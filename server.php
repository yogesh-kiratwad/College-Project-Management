<?php

$fname = $_POST['fname'];
$gender=$_POST['gender'];
$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
$pob = $_POST['pob'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$pass = $_POST['pass'];

if (!empty($fname) || !empty($gender) || !empty($dob)|| !empty($pob) || !empty($address) || !empty($mobile) || !empty($email) || !empty($pass)) {
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="project";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    }
    else {
        $sql = "INSERT INTO student(fname, gender, date, pob, address, mobile, email, password) values ('$fname','$gender', '$dob', '$pob', '$address', '$mobile', '$email', '$pass')";

            if ($conn->query($sql)) {
            echo "<script>alert('Success')</script>";
            
                header("Location: server.html");
            }
            else {
            echo "Error: ". $sql ."<br>". $conn->error;
            }
        $conn->close();
    }
}
else {
    echo "All fields are required.";
    die();
}

?>