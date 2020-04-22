<!-- connection with database -->



<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'project');

// Uploads files
if (isset($_POST['submit'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

	//project name
	$name = $_POST['project_id'];
	
    // destination of the file on the server
    $destination = 'uploaded_projects/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip','rar'])) {
        echo "You file extension must be .zip or .rar";
    } elseif ($_FILES['myfile']['size'] > 5000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (id,name, size, downloads) VALUES ('$name','$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                // Display the alert box  
				echo '<script>alert("File Uploaded Successfully")</script>'; 	            }
        } else {
            echo "Failed to upload file.";
        }
    }
}

// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'project');

// download
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploaded_projects/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploaded_projects/' . $file['name']));
        readfile('uploaded_projects/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

 }

?>


<?php
// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'project');

$sql = "SELECT * FROM groups,files where groups.id=files.id and tname='Prof. Jayanand'";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

