<?php include('includes/header.php');?> 
<section class="page-section header-fix">
        <div class="trending-frame">
            <audio src="uploads/AUDIO/BRIDGE N° 98/mixkit-bridge-n-98-621.mp3" id="audiofileww" loop="" ></audio>
            <img src="uploads/COVER/BRIDGE N° 98/pexels-kaique-rocha-775201.jpg"  class="img-fluid trending-bg"  alt="Responsive image">
            <img src="uploads/COVER/BRIDGE N° 98/pexels-kaique-rocha-775201.jpg" class="trending"/>
            <i class="fa fa-play-circle trending-frame-icon" onclick="toggleLike(this,'','audiofileww')" aria-hidden="true"></i>
            <i class="fa fa-play-circle trending-frame-icon" hidden></i>
            <h1>Top Notch</h1>
            <p>Influennza</p>
        </div>
        <div class="container-fluid">
            <h2 class="text-center mt-0" style="margin-top: 15px !important;">TRENDING</h2>
            <hr class="divider my-4" />
            <div class="row">
                <!-- Music Cards -->
                <?php
                    include('includes/changeme.php');
                    $playcnt=1;
                    $conn=NEW MySQLi($Server,$AdminUsername,$AdminPassword,$DatabaseName);
                    $sql="SELECT * FROM AUDIOS LIMIT 5";
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
                                <i onclick="'."toggleLike(this,"."'"."$playcnt"."',"."'"."$title"."'".')"'." class='fa fa-play-circle' title='Hover and click to play/pause'></i>
                            </a>
                        </div>
                        <div>
                            <i style='display: none;' id='$playcnt' class='fa fa-play'></i><h4 style='display: inline;'>$title</h4>
                        </div>
                        <span>$artist</span>
                        </div>";
                        echo "$printauds";
                        $playcnt+=1;
                    }
                ?>
            </div>
        </div>
        <!--   LATEST -->
        <div class="trending-frame" style="margin-top:50px;">
            <img src="uploads/COVER/Life is a Dream/pexels-freestocksorg-127713.jpg"  class="img-fluid trending-bg"  alt="Responsive image">
            <img src="uploads/COVER/Life is a Dream/pexels-freestocksorg-127713.jpg" class="trending"/>
            <h1>CREATOR ON RISE</h1>
            <p>Artist name</p>
        </div>
            <div class="container-fluid">
            <h2 class="text-center mt-0" style="margin-top: 15px !important;">LATEST</h2>
            <hr class="divider my-4" />
            <div class="row">
                <!-- Music Cards -->
                <?php
                    include('includes/changeme.php');
                    $conn=NEW MySQLi($Server,$AdminUsername,$AdminPassword,$DatabaseName);
                    $sql="SELECT * FROM AUDIOS LIMIT 5";
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
        <!--    ends here   -->
    </section>
     <script>
        function _(e1)
        {
            return document.getElementById(e1);
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