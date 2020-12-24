<!DOCTYPE html>
<?php include('includes/header.php');
$ftname=$_SESSION['FNAME'];
$ltname=$_SESSION['LNAME'];
$ftemail=$_SESSION['USER'];
$dob=$_SESSION["DOB"];
?>
<section class="page-section">
        <div class="container" style="margin-top:20px";>
         <h2 class="text-center mt-0" style="margin-top: 15px !important;">PROFILE-EDIT</h2>
            <hr class="divider my-4" />
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-row">
                <div class="form-group upload-img col-md-10">
                        <label class="form-label" for="usercover">Profile Picture</label>
                        <input type="file" class="form-control-file" id="usercover" name="usercover" onchange="UImageValidation()">
                        <progress id="progressBar" value="" max="100" style="width:100%;"></progress><span id="stats" ></span>
			<w id="status" ></w><e id="loaded_n_total" style="display:none;" ></e>
                    </div>
                    <div class="form-group col-md-1">
                        <button type="button" class="btn btn-upload btn-primary" onclick="uploaduCover()">Upload</button>
                    </div>
                    <div class="form-group col-md-5">
                        <label class="form-label" for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value='<?php echo"$ftname";?>' required>
                    </div>
                    <div class="form-group col-md-5">
                        <label class="form-label" for="inputArtist">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value='<?php echo"$ltname";?>' required>
                    </div>
                    <div class="form-group col-md-10">
                        <label class="form-label" for="e">Email ID</label>
                        <input type="email" class="form-control" id="e" name="e" value='<?php echo"$ftemail";?>' required disabled>
                    </div>
                   <div class="form-group col-md-5">
                        <label class="form-label" for="pword">Password</label>
                        <input type="password" class="form-control" id="pword" name="pword" placeholder="Enter Password" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label class="form-label" for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Select Date of Birth" value = '<?php echo"$dob";?>' required>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn influence btn-primary" name="saveuser">Save Changes</button>
                </div>
            </form><?php echo"<h4>$info</h4>";?>
        </div>
</section>
<script>
function _(el){
	return document.getElementById(el);
}

function uploaduCover(){
	var file = _("usercover").files[0];
	if(file != null || file!= undefined || file.length!= 0 ){
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("usercover", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandlercover, false);
	ajax.addEventListener("load", completeHandlercover, false);
	ajax.addEventListener("error", errorHandlercover, false);
	ajax.addEventListener("abort", abortHandlercover, false);
	ajax.open("POST", "userimage_parser.php");
	ajax.send(formdata);}
}
function progressHandlercover(event){
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"%";
}
function completeHandlercover(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 100;
}
function errorHandlercover(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandlercover(event){
	_("status").innerHTML = "Upload Aborted";
}

function UImageValidation(){ 
	var fileInput = _("usercover");
	var filePath = fileInput.value; 
	var imageExtensions = /(\.jpg|\.jpeg|\.png)$/i;
	if (!imageExtensions.exec(filePath)) { 
		_("stats").innerHTML = "<w style='color: #E1868E'>invalid Image type choose again</w>";
    fileInput.value = '';}
    else{
        _("stats").innerHTML ="";
    }
}
</script>
<?php include('includes/footer.php');?> 