<?php
session_start();
if ( ! empty($_FILES)) {
$fileName = $_FILES["usercover"]["name"]; // The file name
$fileTmpLoc = $_FILES["usercover"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["usercover"]["type"]; // The type of file it is
$fileSize = $_FILES["usercover"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["usercover"]["error"]; // 0 for false... and 1 for true
$strn=$_SESSION["usercover"];
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
function makeDir($path)
{
    return is_dir($path) || mkdir($path);
}
makeDir("uploads/PROFILE/$strn/");
$updloc="uploads/PROFILE/$strn/$fileName";
if(move_uploaded_file($fileTmpLoc, "$updloc")){
    echo "&#x2705;";
    $_SESSION["updusercov"]=$updloc;
} else {
    echo "move_uploaded_file function failed";
    $_SESSION["updusercov"]="FAIL";
}}
?>