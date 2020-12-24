<?php
session_start();
if ( ! empty($_FILES)) {
$fileName = $_FILES["cover"]["name"]; // The file name
$fileTmpLoc = $_FILES["cover"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["cover"]["type"]; // The type of file it is
$fileSize = $_FILES["cover"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["cover"]["error"]; // 0 for false... and 1 for true
$strn=$_POST["title"];
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
function makeDir($path)
{
    return is_dir($path) || mkdir($path);
}
makeDir("uploads/COVER/$strn/");
$updloc="uploads/COVER/$strn/$fileName";
if(move_uploaded_file($fileTmpLoc, "$updloc")){
    echo "&#x2705;";
    $_SESSION["updcover"]=$updloc;
} else {
    echo "move_uploaded_file function failed";
}}
?>