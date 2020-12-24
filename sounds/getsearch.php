<?php

// get the q parameter from URL

$q = $_REQUEST["q"];

include('includes/changeme.php');

$conn=NEW MySQLi($Server,$AdminUsername,$AdminPassword,$DatabaseName);

$sql="SELECT * FROM AUDIOS WHERE TITLE LIKE '%$q%'";

$result = $conn->query($sql);

if($result->num_rows<1){echo "<b> &#x2639;  Nothing found !! </b><br/>";}

else{echo "<b> &#x2633;  Search Results</b><br/>";}

while($row = $result -> fetch_assoc())

{

	$aupath=$row["AUDS"];

    $title=$row["TITLE"];

    $cpath=$row["COVERIMAGE"];

    $artist=$row["ARTIST"];

    

$printauds= "<div class='col-md-5-cols fixit hovertoplay'>
                        <audio src='$aupath' id='$title' loop></audio>
                        <a href='$aupath' $downbtn ><i  class='fa fa-arrow-down' style='display: inline;' aria-hidden='true'></i></a>
                        <img src='$cpath' alt='Avatar' class='image-music'>
                        <div class='overlay'>
                            <a class='icon play'>".'
                                <i onclick="'."toggleLike(this,"."'"."$artist"."',"."'"."$title"."'".')"'." class='fa fa-play-circle'></i>
                            </a>
                        </div>
                        <div>
                            <i style='display: none;' id='$artist' class='fa fa-play'></i><h4 style='display: inline;'>$title</h4>
                        </div>
                        <span>$artist</span>
                        </div>";
                        echo "$printauds";

}

?>