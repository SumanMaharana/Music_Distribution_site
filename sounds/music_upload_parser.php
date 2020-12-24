<?php
session_start();
if ( ! empty($_FILES)) {
$fileName = $_FILES["aud"]["name"]; // The file name
$fileTmpLoc = $_FILES["aud"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["aud"]["type"]; // The type of file it is
$fileSize = $_FILES["aud"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["aud"]["error"]; // 0 for false... and 1 for true
$strn=$_POST["title"];
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
function makeDir($path)
{
    return is_dir($path) || mkdir($path);
}
makeDir("uploads/AUDIO/$strn/");
$updloc="uploads/AUDIO/$strn/$fileName";
if(move_uploaded_file($fileTmpLoc, "$updloc")){
    echo "&#x2705;";
    $_SESSION["updmusic"]=$updloc;
} else {
    echo "move_uploaded_file function failed";
}}
?>