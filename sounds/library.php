<!DOCTYPE html>

<?php include('includes/header.php');?>

<section class="page-section">

        <div class="container-fluid text-center" style="margin-top:20px";>

            <div class="row justify-content-center">
                <div class="col-md-5">
                    <form class="example text-center" action="" method="post">
                        <input type="text" placeholder="Search.." name="seach" id="seach" onkeyup="showsearch()">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

        </div>

		<div class="container-fluid" style="margin-top:50px;">

            <div class="row" id="txtsearch">

                <!-- Music Cards -->

            </div>
		
		<div class="container-fluid" style="margin-top:50px;">


            <div class="row">

               <!--  music cards here -->

               <?php

                    include('includes/changeme.php');

                    $conn=NEW MySQLi($Server,$AdminUsername,$AdminPassword,$DatabaseName);

                    $sql="SELECT * FROM AUDIOS";

					$result = $conn->query($sql);

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

            </div>

        </div>
	</div>

</section>

<script>

    function showsearch() {

        var str=_("seach").value;

        if (str.length == 0) {

            _("txtsearch").innerHTML = "";

            return;

        } else {

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                    _("txtsearch").innerHTML = this.responseText;

                }

            };

            xmlhttp.open("GET", "getsearch.php?q=" + str, true);

            xmlhttp.send();

        }

        }

        function _(el){

            return document.getElementById(el);

        }

        function toggleLike(ele,the,msc) {

        if (ele.classList.toggle('fa-pause-circle')){ _(the).style='display: inline;'; _(msc).play();}

        if (ele.classList.toggle('fa-play-circle')){  _(the).style='display: none;'; _(msc).pause();}

        }
		document.addEventListener('play', function(e){
    			var audios = document.getElementsByTagName('audio');
    			for(var i = 0, len = audios.length; i < len;i++){
        			if(audios[i] != e.target){
            				audios[i].pause();
        				}
    				}
		}, true);


</script>

<?php include('includes/footer.php');?>