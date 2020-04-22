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
<?php

$dsn = 'mysql:host=localhost;dbname=project';
$username = 'root';
$password = '';

try{
    
    $con = new PDO($dsn, $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $ex) {

    echo 'Not Connected '.$ex->getMessage();
}

$tableContent = '';
$downloads = " Download";
$domain = '';
$start = '';
$ongoing = "Ongoing"; 
$completed = "Completed";
$year = '';
$selectStmt = $con->prepare('SELECT * FROM groups,files where groups.id=files.id');
$selectStmt->execute();
$files = $selectStmt->fetchAll();

	foreach ($files as $file)
		{
			$tableContent = $tableContent.'<tr class="tr-shadow">'.
				'<td class="column1" rowspan="4">'.$file['id'].'</td>'
				.'<td class="column2">'.$file['stname1'].'</td>'
				.'<td class="column3" rowspan="4">'.$file['dname'].'</td>'
				.'<td class="column4" rowspan="4">'.$file['pname'].'</td>'
				.'<td class="column5" rowspan="4">'.$file['tname'].'</td>'
				.'<td class="column6" rowspan="4">'.$file['year'].'</td>'
				.'<td class="column7" rowspan="4">'.$file['status'].'</td>'
				.'<td class="column9" rowspan="4">'.floor($file['size'] / 1000) . 'KB'.'</td>'
				.'<td class="column10" rowspan="4">'.$file['downloads'].'</td>'
.'<td classs="11" rowspan="4">'.'<a class="a2" href="filesLogic.php?file_id='.$file['id'].'">'.'<i class="fa fa-download" aria-hidden="true">'.'</i>'.$downloads.'</a>'.'</td>'.'</tr>'
				
				.'<tr class="tr-shadow">'.
				'<td style="border-bottom:1px solid #FFFFFF;">'.$file['stname2'].'</td>'.'</tr>'
				
				.'<tr class="tr-shadow">'.
				'<td style="border-bottom:1px solid #FFFFFF;">'.$file['stname3'].'</td>'.'</tr>'
				
				.'<tr class="tr-shadow">'.
				'<td>'.$file['stname4'].'</td>'.'</tr>'
				
				.'<tr class="spacer">'.'</tr>';		
	}

//filter for status

if(isset($_POST['search_status']))
{

$start = $_POST['start'];
$fill = $file['size'];
$fill1 = $file['downloads'];
$tableContent = '';

$selectStmt = $con->prepare('SELECT * FROM groups where status like :start');

$selectStmt->execute(array(
        
	     ':start'=>$start.'%'
	
    
));
$files = $selectStmt->fetchAll();

foreach ($files as $file)
{
    $tableContent = $tableContent.'<tr class="tr-shadow">'.
				'<td class="column1" rowspan="4">'.$file['id'].'</td>'
				.'<td class="column2">'.$file['stname1'].'</td>'
				.'<td class="column3" rowspan="4">'.$file['dname'].'</td>'
				.'<td class="column4" rowspan="4">'.$file['pname'].'</td>'
				.'<td class="column5" rowspan="4">'.$file['tname'].'</td>'
				.'<td class="column6" rowspan="4">'.$file['year'].'</td>'
				.'<td class="column7" rowspan="4">'.$file['status'].'</td>'
				.'<td class="column9" rowspan="4">'.floor($fill / 1000) . 'KB'.'</td>'
				.'<td class="column10" rowspan="4">'.$fill1.'</td>'
.'<td classs="11" rowspan="4">'.'<a class="a2" href="filesLogic.php?file_id='.$file['id'].'">'.'<i class="fa fa-download" aria-hidden="true">'.'</i>'.$downloads.'</a>'.'</td>'.'</tr>'
				
				.'<tr class="tr-shadow">'.
				'<td style="border-bottom:1px solid #FFFFFF;">'.$file['stname2'].'</td>'.'</tr>'
				
				.'<tr class="tr-shadow">'.
				'<td style="border-bottom:1px solid #FFFFFF;">'.$file['stname3'].'</td>'.'</tr>'
				
				.'<tr class="tr-shadow">'.
				'<td>'.$file['stname4'].'</td>'.'</tr>'
				
				.'<tr class="spacer">'.'</tr>';
}
    
}

//filter for year wise

if(isset($_POST['search_year']))
{

$year = $_POST['year'];
$domain = $_POST['domain'];
$fill = $file['size'];
$fill1 = $file['downloads'];
$tableContent = '';

$selectStmt = $con->prepare('SELECT * FROM groups where year like :start');

$selectStmt->execute(array(
        
	     ':start'=>$year.'%'
	
    
));
$files = $selectStmt->fetchAll();

foreach ($files as $file)
{
    $tableContent = $tableContent.'<tr class="tr-shadow">'.
				'<td class="column1" rowspan="4">'.$file['id'].'</td>'
				.'<td class="column2">'.$file['stname1'].'</td>'
				.'<td class="column3" rowspan="4">'.$file['dname'].'</td>'
				.'<td class="column4" rowspan="4">'.$file['pname'].'</td>'
				.'<td class="column5" rowspan="4">'.$file['tname'].'</td>'
				.'<td class="column6" rowspan="4">'.$file['year'].'</td>'
				.'<td class="column7" rowspan="4">'.$file['status'].'</td>'
				.'<td class="column9" rowspan="4">'.floor($fill / 1000) . 'KB'.'</td>'
				.'<td class="column10" rowspan="4">'.$fill1.'</td>'
.'<td classs="column11" rowspan="4">'.'<a class="a2" href="filesLogic.php?file_id='.$file['id'].'">'.'<i class="fa fa-download" aria-hidden="true">'.'</i>'.$downloads.'</a>'.'</td>'.'</tr>'
				
				.'<tr class="tr-shadow">'.
				'<td style="border-bottom:1px solid #FFFFFF;">'.$file['stname2'].'</td>'.'</tr>'
				
				.'<tr class="tr-shadow">'.
				'<td style="border-bottom:1px solid #FFFFFF;">'.$file['stname3'].'</td>'.'</tr>'
				
				.'<tr class="tr-shadow">'.
				'<td>'.$file['stname4'].'</td>'.'</tr>'
				
				.'<tr class="spacer">'.'</tr>';
}
    
}

//filter for domain wise

if(isset($_POST['search_domain']))
{
$domain = $_POST['domain'];
$fill2 = $file['size'];
$fill3 = $file['downloads'];
$tableContent = '';

$selectStmt = $con->prepare('SELECT * FROM groups where dname like :start');

$selectStmt->execute(array(
        
	     ':start'=>$domain.'%'
	
    
));
$files = $selectStmt->fetchAll();

foreach ($files as $file)
{
    $tableContent = $tableContent.'<tr class="tr-shadow">'.
				'<td class="column1" rowspan="4">'.$file['id'].'</td>'
				.'<td class="column2">'.$file['stname1'].'</td>'
				.'<td class="column3" rowspan="4">'.$file['dname'].'</td>'
				.'<td class="column4" rowspan="4">'.$file['pname'].'</td>'
				.'<td class="column5" rowspan="4">'.$file['tname'].'</td>'
				.'<td class="column6" rowspan="4">'.$file['year'].'</td>'
				.'<td class="column7" rowspan="4">'.$file['status'].'</td>'
				.'<td class="column9" rowspan="4">'.floor($fill2 / 1000) . 'KB'.'</td>'
				.'<td class="column10" rowspan="4">'.$fill3.'</td>'
.'<td classs="11" rowspan="4">'.'<a class="a2" href="filesLogic.php?file_id='.$file['id'].'">'.'<i class="fa fa-download" aria-hidden="true">'.'</i>'.$downloads.'</a>'.'</td>'.'</tr>'	
				
				.'<tr class="tr-shadow">'.
				'<td style="border-bottom:1px solid #FFFFFF;">'.$file['stname2'].'</td>'.'</tr>'
				
				.'<tr class="tr-shadow">'.
				'<td style="border-bottom:1px solid #FFFFFF;">'.$file['stname3'].'</td>'.'</tr>'
				
				.'<tr class="tr-shadow">'.
				'<td>'.$file['stname4'].'</td>'.'</tr>'
				
				.'<tr class="spacer">'.'</tr>';
}
    
}
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>people</title>
<link rel="stylesheet" href="css/pstyle4.css" />
<link rel="stylesheet" href="css/pstyle3.css" />	
<link rel="stylesheet" href="css/all-project.css"/	>
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
<a class="a" href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
<a class="a" href="#"><i class="fa fa-cog" aria-hidden="true"></i>
 Setting</a>
<a class="a" href="../../../Users/hp/Documents/Unnamed Site 2/login.htm"><i class="fa fa-sign-out" aria-hidden="true"></i>
 LogOut</a>
</div><br />
<hr color="#FFFFFF" width="1352px" size="2px" />


<div class="header2">

</div>

<div class="form1">
<a class="a1" href="home-admin.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
<a class="a1" href="project_under_me.php"><i class="fa fa-folder-open" aria-hidden="true"></i>
  ProjectUnderMe</a>
<a class="a1" href="#"><i class="fa fa-globe" aria-hidden="true"></i>
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

<div class="contin" style="height: 1500px; background:#E8E8E8">
	 <form action="all-projects.php" method="post">
	<h3 class="all-pro-head">All Projects</h3><br>
	<div class="filter-1">
			
		<div class="filter-2">
			<select class="statuswise" name="start">
				<option value="">Select Status</option>
				 <option value="Ongoing" <?php if($year == "Ongoing"){echo "selected";}?>>Ongoing</option>
				 <option value="Completed" <?php if($year == "Completed"){echo "selected";}?>>Completed</option>
			</select>
			<div class="dropdownn"></div>
		</div>
		<div class="filter-2">
		<button class="sub" type="submit" name="search_status"><i class="fa fa-filter" aria-hidden="true"></i>Filters</button>
			</div>
		
		<div class="filter-2">
			<select class="yearwise" name="year">
				<option value="">Select Year</option>
				 <option value="2013-14" <?php if($year == "2013-14"){echo "selected";}?>>2013-14</option>
				 <option value="2014-15" <?php if($year == "2014-15"){echo "selected";}?>>2014-15</option>
				 <option value="2015-16" <?php if($year == "2015-16"){echo "selected";}?>>2015-16</option>
				 <option value="2016-17" <?php if($year == "2016-17"){echo "selected";}?>>2016-17</option>
				 <option value="2017-18" <?php if($year == "2017-18"){echo "selected";}?>>2017-18</option>
				 <option value="2018-19" <?php if($year == "2018-19"){echo "selected";}?>>2018-19</option>
				 <option value="2019-20" <?php if($year == "2019-20"){echo "selected";}?>>2019-20</option>
			</select>
			<div class="dropdown"></div>
		</div>
		<div class="filter-2">
		<button class="sub" type="submit" name="search_year"><i class="fa fa-filter" aria-hidden="true"></i>Filters</button>
			</div>
		
		<div class="filter-2">
			<select class="domainwise" name="domain">
				<option  value="">Select Domain</option>
				<option value="Department Projects" <?php if($domain == "Department Projects"){echo "selected";}?>>Department Projects</option>
				<option value="Two Wheeler Projects" <?php if($domain == "Two Wheeler Projects"){echo "selected";}?>>Two Wheeler Projects</option>
				<option value="Diabetes Projects" <?php if($domain == "Diabetes Projects"){echo "selected";}?>>Diabetes Projects</option>
				<option value="Eclipse Projects" <?php if($domain == "Eclipse Projects"){echo "selected";}?>>Eclipse Projects</option>
			</select>
			<div class="dropdown"></div>
		</div>	
		<div class="filter-2">
		<button class="sub" type="submit" name="search_domain"><i class="fa fa-filter" aria-hidden="true"></i>Filters</button>
			</div> 
	</div>
	
	
								<div class="all-table">
                                    <table class="table-2">
                                        <thead>
                                            <tr class="table100-head">
												<th>Project ID</th>
												<th>Student Name</th>
												<th >Domain Name</th>
												<th>Project Name</th>
												<th>Guide Name</th>
												<th>Year</th>
												<th class="column">Status</th>
												<th>Size in (/Kb)</th>
												<th>Downloads</th>
												<th>Action</th>
											</tr>
                                        </thead>
                                        <tbody>
                                             <?php
                								echo $tableContent;
											 ?>
										</tbody>
                                    </table>
                                </div>
	</form>
</div>

</body>
</html>
