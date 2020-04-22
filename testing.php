<?php include 'filesLogic.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>people</title>
<link rel="stylesheet" href="css/pstyle4.css" />
<link rel="stylesheet" href="css/pstyle3.css" />	
<link rel="stylesheet" href="css/domain-stylecss.css"/	>
<link rel="stylesheet" href="css/table.css">
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
<div class="contin">
			
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Project ID</th>
								<th class="column2">Student Name</th>
								<th class="column3">Domain Name</th>
								<th class="column4">Project Name</th>
								<th class="column5">Guide Name</th>
								<th class="column6">File Name</th>
								<th class="column7">Size in (/Kb)</th>
								<th class="column8">Downloads</th>
								<th class="column9">Action</th>
							</tr>
						</thead>
						<tbody>
								<?php foreach ($files as $file): ?>
								<tr>
									<td class="column1" rowspan="4"><?php echo $file['id']; ?></td>
	  								<td class="column2" style="border-bottom:1px solid #FFFFFF;" ><?php echo $file['stname1']; ?></td>
    			   				    <td class="column3" rowspan="4"><?php echo $file['dname']; ?></td>
	  								<td class="column4" rowspan="4"><?php echo $file['pname']; ?></td>
	  								<td class="column5" rowspan="4"><?php echo $file['tname']; ?></td>
	  								<td class="column6" rowspan="4"><?php echo $file['name']; ?></td>
     								<td class="column7" rowspan="4"><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      								<td class="column8" rowspan="4"><?php echo $file['downloads']; ?></td>
      								<td class="column9" rowspan="4"><a style="border-bottom-color:#FFFFFF"; class="a2" href="filesLogic.php?file_id=<?php echo $file['id'] ?>" ><i class="fa fa-download" aria-hidden="true"></i> Downloads</a></td>
								</tr>
							
								<tr>
									<td class="column2" style="border-bottom:1px solid #FFFFFF;"><?php echo $file['stname2']; ?></td>
								</tr>
								
								<tr>
									<td class="column2" style="border-bottom:1px solid #FFFFFF;"><?php echo $file['stname3']; ?></td>
								</tr>
	
								<tr>
									<td class="column2"><?php echo $file['stname4']; ?></td>
								</tr>
								<?php endforeach;?>
						</tbody>
					</table>
	</div>




	
</body>
</html>
