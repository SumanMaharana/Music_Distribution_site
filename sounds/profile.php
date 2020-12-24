<?php include('includes/header.php');?>
<?php
include('includes/changeme.php');
$Email=$_SESSION["USER"];
$con=New MySQLi($Server,$AdminUsername,$AdminPassword);
$sql="SELECT * FROM PROFILE WHERE EMAIL='$Email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
	$row = $result->fetch_assoc();
	$pimage=$row["PIMAGE"];
}
?>
<section class="page-section">
    <div class="container">
    <div class="row profile">
		<div class="col-md-3" style="padding-top: 70px">
			<div class="profile-sidebar">
                <div class="text-center">					
                    <img src='<?php echo"$pimage"?>' alt="" class="img-thumbnail" style="">
					<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<h4><?php echo $_SESSION["NAME"];?></h4>
					</div>
					</div>
                <div class="profile-usermenu" style="padding-top: 50px">
					<ul class="list-unstyled" style="text-align: center;margin: 0 0 7px 0;">
						<li class="ill" >
							<a href="Audio_upload">
							<h3>UPLOAD</h3></a>
						</li>
					    <li class="ill">
							<a href="editprofile">
							<h3>PROFILE </h3></a>
						</li >
						<li class="ill">
							<a href="logoutuser" >
							<h3>LOGOUT </h3></a>
						</li>
					</ul>
				</div>
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
			</div>
		</div>
		<div class="col-md-9">
			<div class="container">
			    <h2 class="text-center mt-0" style="margin-top: 15px !important;">UPLOADS</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <?php
                        include('includes/changeme.php');
                        $conn=NEW MySQLi($Server,$AdminUsername,$AdminPassword,$DatabaseName);
                        $sql="SELECT * FROM AUDIOS WHERE USER='$Email'";
                        $result = $conn->query($sql);
                        while($row = $result -> fetch_assoc())
                        {
                            $aupath=$row["AUDS"];
                            $title=$row["TITLE"];
                            $cpath=$row["COVERIMAGE"];
                            $artist=$row["ARTIST"];
                            $printauds= "<div class='col-lg-4 col-md-6 fixit hovertoplay uploadpage'>
                            <audio src='$aupath' id='$title' loop></audio>
                            <a href='$aupath' download><i  class='fa fa-arrow-down' style='display: inline;' aria-hidden='true'></i></a>
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
	</div>
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
</section>
<?php include('includes/footer.php');?> 