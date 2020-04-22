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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>people</title>
<link rel="stylesheet" href="css/pstyle4.css" /> 
<link rel="stylesheet" href="css/pstyle3.css" />
<link rel="stylesheet" href="css/domain-stylecss.css" />

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
	<li><a class="a" href="add_group.php"><i class="fa fa-table" aria-hidden="true"></i>  Add Project Groups</a></li>
</ul>
</div>
<div class="cont">
	<div class="registration">
		<h2><i class="fa fa-plus" aria-hidden="true"></i> Add Projects</h2>
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
      $result = $conn->query($sql);

if ($result->num_rows > 0) {
  ?>
  <form method="post" action="add_project.php">
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
	   <?php 
  }
}
?>
		
			<div class="na" name="dn" >
				<input name="proname" type="text" placeholder="Project Name">
			</div>
			
			<div class="info">
				<textarea name="ptext" class="texting" cols="18" rows="10" placeholder="Add Description About Project...."></textarea>
			</div>
			
			<div name="dom-but" style="float: left;margin-left: 40%;margin-top: 40px;width: 500px;height:100px;">
				<input style="width: 100px;
	height: 40px;
	border-radius:5px 5px 5px 5px;	
	font-size: 15px;
" type="submit" name="subtn" value="Submit">
			</div>
		</form>
	
	<?php

if(isset($_POST['subtn']))
{
$proname = $_POST['proname'];
$ptext = $_POST["ptext"];         
$dname = $_POST['domains'];
  $sql = "INSERT INTO projects (dname, pname,pdescription) values ('$dname','$proname','$ptext')";

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
