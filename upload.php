<?php
if (isset($_POST['submit'])) {
 $file = $_FILES['file'];
 
 $fileName = $_FILES['file']['name'];
 $fileTmpName = $_FILES['file']['tmp_name'];
 $fileSize = $_FILES['file']['sizee'];
 $fileError = $_FILES['file']['error'];
 $fileType = $_FILES['file']['type'];
 
 $fileExt = explode('.', $fileName);
 $fileActualExt = strtolower(end($fileExt));
 
 $allowed = array('jpg', 'jpeg');
 
 if (in_array($fileActualExt, $allowed)){
  if ($fileError === 0) {
    if ($fileSize < 5242880) {
        $fileNameNew = uniqid('', true)."."$fileActualExt;
        $fileDestination = 'uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        header("Location: index.php?uploadsuccess");
   } else {
      echo "Your file is too big!"; 
   }
  } else {
     echo "There was an error uploading your file!";
    }
 } else {
    echo "You cannot upload files of this type!"; 
 }
}