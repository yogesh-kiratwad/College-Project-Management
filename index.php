<?php

session_start();

if(!isset($_SESSION["id"])){
	if(isset($_REQUEST['userid']) || isset($_REQUEST['password']) || isset($_REQUEST['role'])){
$teacherid = $_POST['userid'];
$_SESSION["id"]=$teacherid;
$password = $_POST['password'];
$select=$_POST['role'];  // Storing Selected Value In Variable

switch($select)
{
case 'Admin':
//$s = " select * from teacher ";

//$result = mysqli_query($con, $s);
//$num = mysqli_num_rows($result);
$host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="project";
  //Create Connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
$sql = "SELECT * FROM teacher";
      $result = $conn->query($sql);

    if ($result->num_rows > 0) {
     
    while($row = $result->fetch_assoc()) {
      
if($teacherid == "1" && $password == "11" )
{
  
	$_SESSION["id"] = $_POST['userid'];

	echo"<script>alert('Login Successful');</script>";
  	header('location:home-admin.php');
}


}
}

break;

case 'Student':
$host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="mitcse";
  //Create Connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
$sql = "SELECT * FROM student";
      $result = $conn->query($sql);

    if ($result->num_rows > 0) {
     
    while($row = $result->fetch_assoc()) {
      
if($teacherid == $row["studid"] && $password == $row["password"])
{

//$_SESSION["id"] = $_POST['teacherid'];

  echo"<script>alert('Login Successful');</script>";
    header('location:StudentHome.php');
}
/*if ($num == 1) {
	
$_SESSION["teacherid"] = $_POST['teacherid'];

  echo"<script>alert('Login Successful');</script>";
  header('location:staff.php');
}*//*else{
  echo"<script>alert('Wrong id or password');</script>";
  header('location:attendance.html');
}*/
}
}

  break;
  case 'Faculty':
  $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="mitcse";
  //Create Connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
$sql = "SELECT * FROM teacher";
      $result = $conn->query($sql);

    if ($result->num_rows > 0) {
     
    while($row = $result->fetch_assoc()) {
 if($teacherid == $row["teacherid"] && $password == $row["password"] )
{
  
  //$_SESSION["id"] = $_POST['teacherid'];

  echo"<script>alert('Login Successful');</script>";
    header('location:FacultyHome.php');
} 
	}
}
}
}
}

else{
		echo "<script> location.href='home-admin.php' </script>";
	}
?>




<!--           HTML CODE           -->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel=stylesheet href="css/login.css">
</head>

<body>
	<div class="log">
		<div class="log1">
			<img src="images/mit2.png" height="800px" >
		</div>
		<div class="log3">
			<h1>Login Box</h1>
			<div class="login-box">
				<form action="" method="post">					  
					<div class="textbox">
						<i class="fa fa-user" aria-hidden="true"></i>
						<input type="text" placeholder="user" name="userid">
					</div>
					<div class="textbox">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input type="password" placeholder="Password" name="password">
					</div>
					<div class="textbox">
						<i class="fa fa-filter" aria-hidden="true"></i><select name="role" class="drop">
        				<option value="Admin">Admin</option>
        				<option value="Faculty">Faculty</option>
        				<option value="Student">Student</option>          
							</select>
					</div>
					<input type="submit" class="btn" value="Sign In">
				</form>
			</div>
		</div>
		<div class="log2"></div>
		
	</div>
</body>
</html>