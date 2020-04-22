<?php

$dname = $_POST['dname'];
$text = $_POST['text'];


if (!empty($dname) || !empty($text)) {
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="project";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    }
    else {
        $sql = "INSERT INTO domain(dname, text) values ('$dname', '$text')";

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