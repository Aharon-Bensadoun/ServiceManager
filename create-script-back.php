<?php
include 'dbConfig.php';

// Create the file into the directory 
if(isset($_POST["Create"])) {
    $content = $_POST['Content'];
    $ScriptName = $_POST['ScriptName'];
    $description = $_POST['Description'];
    $pathtofile = $_SERVER["DOCUMENT_ROOT"] . '/ServiceManager/Scripts/'.$ScriptName.'.ps1'; 
    $file = fopen($pathtofile, "w");
    if((fwrite($file, $content) == false) && (!file_exists($pathtofile))) {
    fclose($file);
    echo 'File not written, check permissions!';
    } else {
    fclose($file);
    echo 'File'.$ScriptName. '.ps1 created successfully ';
    }
}
else{

    echo "Failed to create the file";
}

// Check if the file name already exist in the database
$fullScriptName = $ScriptName.  '.ps1';
$select = mysqli_query ($con ,"SELECT * from scripts where file_name like '%$fullScriptName%'");
$num_rows = mysqli_num_rows($select);
// while ($row = $select->fetch_assoc()) {
//     echo $row['file_name']."<br>";
// }
if(mysqli_num_rows($select) > 0){
    echo "The file " .$ScriptName.".ps1 already exist";
}
else{

    echo "The file is not exist in the database";
    // Insert the file into the table 
    $insert = $con->query("INSERT into scripts (description, file_name, uploaded_on) VALUES ('$description', '$ScriptName', NOW())");
    if($insert){
        echo "The file ".$ScriptName.".ps1 has been uploaded successfully.";
    }else{
        echo "Error description: " . $con -> error;
    }
}

?>
