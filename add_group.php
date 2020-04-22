<?php
	session_start();
	if(isset($_SESSION["id"])){
		
	}
	else{
		echo "<script> location.href='index.php' </script>";
	}
	
		if(isset($_REQUEST['logout'])){
			session_unset();
			session_destroy();
			echo "<script> location.href='index.php'; </script>";
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>people</title>
<link rel="stylesheet" href="css/pstyle4.css" />
<link rel="stylesheet" href="css/pstyle3.css" />	
<link rel="stylesheet" href="css/domain-stylecss.css"/	>
</head>

<body>
<div class="header">
<h2>College Web Projects</h2>
</div>
<div class="form">
<form action="#" method="post">
<input class="inp" type="search" placeholder="Type Here" size="30px"  />
<button class="btn" type="submit">Search</button>
</form>
</div>
<div class="ol">
<form action="" method="post"><button class="btn" type="submit" name="logout">
	<i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button></form>
<a class="a" href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
<a class="a" href="#"><i class="fa fa-cog" aria-hidden="true"></i>
 Setting</a>
</div><br />
<hr color="#FFFFFF" width="1352px" size="2px" />


<div class="header2">

</div>

<div class="form1">
<a class="a1" href="home-admin.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
<a class="a1" href="project_under_me.php"><i class="fa fa-folder-open" aria-hidden="true"></i>
  ProjectUnderMe</a>
<a class="a1" href="all-projects.php"><i class="fa fa-globe" aria-hidden="true"></i>
  All Projects</a>
<a class="a1" href="admin-panel.php"><i class="fa fa-male" aria-hidden="true"></i>
  AdminPanel</a>
<a class="a1" href="setting.php" ><i class="fa fa-cogs" aria-hidden="true"></i> Setting</a>

</div>
<div class="main">
<ol>
<li style="text-decoration:inherit; text-height:10px;"><a><b><i class="fa fa-search" aria-hidden="true"></i>
Refer Us</b></a>
	<ol type="a">
    	<li><a>About</a></li>
        <li><a>Contacts</a></li>
        <li><a>Info</a></li>
        <li><a>Instagram</a></li>
        <li><a>Twitter</a></li>
        <li><a>Facebook</a></li>
        <li><a>Wikipedia</a></li>
        <li><a>Hike</a></li>
    </ol>
</li>
</ol>
</div>
<hr width="150px" size="20px" color="white" />
<div class="content">
<ul>
	<li><a class="a" href="register_stu.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i>  Add Student Data</a></li>
    <li><a class="a" href="add_teacher.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Teacher Data</a></li>
    <li><a class="a" href="add_domain.php"><i class="fa fa-users" aria-hidden="true"></i>  Add Project Domains</a></li>
    <li><a class="a" href="add_project.php"><i class="fa fa-plus" aria-hidden="true"></i> Add Projects</a></li>
	<li><a class="a" href="#"><i class="fa fa-table" aria-hidden="true"></i>  Add Project Groups</a></li>
</ul>
</div>
<div class="cont" style="height: 1000px;">
	<div class="registration">
		<h2><i class="fa fa-table" aria-hidden="true"></i> Add Groups</h2>
    </div>
	
	
		<?php
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="project";
   
  
  //Create Connection
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
 
  if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
  }
  else {
    $sql = "SELECT  did,dname FROM domain";
	$sql1 = "SELECT pid, pname FROM projects";
	$sql2 = "SELECT techid, fname FROM teacher";
	$sql3 = "SELECT stu_id, fname FROM student";
	$sql4 = "SELECT stu_id, fname FROM student";
	$sql5 = "SELECT stu_id, fname FROM student";
    $sql6 = "SELECT stu_id, fname FROM student";
      $result = $conn->query($sql);
	  $result1 = $conn->query($sql1);
	  $result2 = $conn->query($sql2);
	   $result3 = $conn->query($sql3);
	   $result4 = $conn->query($sql4);
	   $result5 = $conn->query($sql5);
	   $result6 = $conn->query($sql6);
	   
	  

if ($result->num_rows > 0) {
  ?>
  <form method="post" action="add_group.php">
	  
	  			 <div class="na">
	  				<input type="text" name="year" placeholder="Enter Current Year (ex. 2019-20)"> 
	  			</div>
                 <div class="na" name="dn">
					 <select class="drop" name="domains">
							<option>Domain Name</option>
						 	<?php
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
						?>
      
					<?php 	
					?>
               				<option value="<?php echo $row['dname']; ?>"> 
              					<?php echo $row['dname']; ?></option>
              		<?php }} ?>
         			</select>   
	  			</div>
	   
		 <div class="na" name="dn">
					 <select class="drop" name="projects">
			   			<option>Project Name</option>
						 	<?php
						 		if ($result1->num_rows > 0) {
									while($row = $result1->fetch_assoc()) {
						 	?>
      
						<?php 
						 ?>
               			<option value="<?php echo $row['pname']; ?>"> 
              	<?php echo $row['pname']; ?></option>
              	<?php }} ?>
         			</select>   
	  	</div>
	  		
	  				 <div class="na" name="tn">
					 <select class="drop" name="teacher">
						
							<option>Teacher Guide Name</option>
						 <?php
							if ($result2->num_rows > 0) {
								while($row = $result2->fetch_assoc()) {
						?>
      
					<?php 	
					?>
               				<option value="<?php echo $row['fname']; ?>"> 
              					<?php echo $row['fname']; ?></option>
              		<?php }} ?>
         			</select>   
	  			</div>
	
			<div class="na" name="stu1">
				<select class="drop" name="student1">
					<option>Student Name 1</option>
						<?php
							if ($result3->num_rows > 0) {
								while($row = $result3->fetch_assoc()) {
						?>
      
					<?php 	
					?>
               				<option value="<?php echo $row['fname']; ?>"> 
              					<?php echo $row['fname']; ?></option>
              		<?php }} ?>
         			</select>   
	  			</div>
	  
	  
			<div class="na" name="stu2">
					 <select class="drop" name="student2">
							<option>Student Name 2</option>
						 <?php
							if ($result4->num_rows > 0) {
								while($row = $result4->fetch_assoc()) {
						?>
      
					<?php 	
					?>
               				<option value="<?php echo $row['fname']; ?>"> 
              					<?php echo $row['fname']; ?></option>
              		<?php }} ?>
         			</select>   
	  			</div>
	  
	  
			<div class="na" name="stu3">
					 <select class="drop" name="student3">
							<option>Student Name 3</option>
						 <?php
							if ($result5->num_rows > 0) {
								while($row = $result5->fetch_assoc()) {
						?>
      
					<?php 	
					?>
               				<option value="<?php echo $row['fname']; ?>"> 
              					<?php echo $row['fname']; ?></option>
              		<?php }} ?>
         			</select>   
	  			</div>
	  
	  
			<div class="na" name="stu4">
					 <select class="drop" name="student4">
							<option>Student Name 4</option>
						 	<?php
							if ($result6->num_rows > 0) {
								while($row = $result6->fetch_assoc()) {
						?>
      
					<?php 	
					?>
               				<option value="<?php echo $row['fname']; ?>"> 
              					<?php echo $row['fname']; ?></option>
              		<?php }} ?>
         			</select>   
	  			</div>
	  		<div class="na" name="status">
	  			<select class="drop" name="statuspro">
					<option>Select Status</option>
					<option>Ongoing</option>
					<option>Completed</option>
				</select>
	  		</div>
			<div class="dom-but">
			<input type="submit" name="register" value="Register">
			</div>
		</form>
	</div>
		<?php 
  		}
  		}
	  	?>
	
	<?php

if(isset($_POST['register']))
{
$year = $_POST['year'];
$dname = $_POST['domains'];
$pname = $_POST["projects"];         
$tname = $_POST['teacher'];
$stname1 = $_POST['student1'];
$stname2 = $_POST['student2'];
$stname3 = $_POST['student3'];
$stname4 = $_POST['student4'];
$status= $_POST['statuspro'];
  $sql = "INSERT INTO groups (year,dname, pname,tname,stname1,stname2,stname3,stname4,status) values('$year','$dname','$pname','$tname','$stname1','$stname2','$stname3','$stname4','$status')";

      if ($conn->query($sql)) {
      @header('location:server.html');
    
      }
      else {
      echo "Error: ". $sql ."<br>". $conn->error;
      }
}
?>
</div>


</body>
</html>
