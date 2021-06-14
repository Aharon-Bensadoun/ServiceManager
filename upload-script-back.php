<?php
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';

// File upload path

$targetDir = "scripts/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$shortFileName = $fileName ;
$shortFileName2 = strtok($shortFileName, '.');


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $description = $_POST['description'];
    $allowTypes = array('ps1','psd1');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $con->query("INSERT into scripts (description, file_name, uploaded_on) VALUES ('$description', '".$shortFileName2."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "Error description: " . $con -> error;
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only ps1 & psd1 files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;

?>