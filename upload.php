<?php
if (isset($_POST['submit'])) {
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allloed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allloed)) { 
		if ($fileError === 0) {
			if ($fileSize < 15000000 ) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				header("Location: index.php?uploadsuccess");
				# code...
			} else {
				echo "Your file is too big!";
			}
            # code...
		} else {
			echo "There was an error uploading this file!";

		}
	} else {
		echo "You cannot upload files of this type!";
	}
}