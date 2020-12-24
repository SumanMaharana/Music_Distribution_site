<!DOCTYPE html>

<?php include('includes/header.php');?>

<section class="page-section">

        <div class="container" style="margin-top:20px";>

            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-row">

                    <div class="form-group col-md-6">

                        <label class="form-label" for="title">Title</label>

                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Song Title" required>

                    </div>

                    <div class="form-group col-md-6">

                        <label class="form-label" for="artist">Artist</label>

                        <input type="text" class="form-control" id="artist" name="artist" placeholder="Enter Artist Name" required>

                    </div>

                    <div class="form-group upload-img col-md-6">

                        <label class="form-label" for="cover">Cover Image</label>

                        <input type="file" class="form-control-file" id="cover" name="cover" onchange="ImageValidation()" required>

                        <progress id="progressBar" value="" max="100" style="width:100%;"></progress><span id="stats" ></span>

						<w id="status" ></w><e id="loaded_n_total" style="display:none;" ></e>

                    </div>

                    <div class="form-group col-md-6">

                        <button type="button" class="btn btn-upload btn-primary" onclick="uploadCover()" required>Upload</button>

                        

                    </div>

                    <div class="form-group upload-img col-md-6">

                        <label class="form-label" for="aud">Audio &#x266A;</label>

                        <input type="file" class="form-control-file" id="aud" name="aud" onchange="AudioValidation()" required>

                        <progress id="progressBar1" value="" max="100" style="width:100%;"></progress><span id="stats1" ></span>

						<w id="status1" ></w><e id="loaded_n_total1" style="display:none;" ></e>

                    </div>

                    <div class="form-group col-md-6">

                        <button type="button" class="btn btn-upload btn-primary"  onclick="uploadAud()" required>Upload</button>

                        

                    </div>

                </div>

                <div class="col-md-12 text-center">

                    <input type="submit" class="btn influence btn-primary" name="proceed" value="Proceed"/>

                </div>

            </form>

			<?php echo"<h4>$info</h4>";?>

        </div>

</section>



<script>

function _(el){

	return document.getElementById(el);

}

function uploadAud(){

	var str= _("title").value;

	var file = _("aud").files[0];

	if(str == null || str == undefined || str.length == 0){}

	else{

	if(file != null || file!= undefined || file.length!= 0 ){

	// alert(file.name+" | "+file.size+" | "+file.type);

	var formdata = new FormData();

	formdata.append("aud", file);

	formdata.append("title", str);

	var ajax = new XMLHttpRequest();

	ajax.upload.addEventListener("progress", progressHandler, false);

	ajax.addEventListener("load", completeHandler, false);

	ajax.addEventListener("error", errorHandler, false);

	ajax.addEventListener("abort", abortHandler, false);

	ajax.open("POST", "music_upload_parser.php");

	ajax.send(formdata);}}

}

function progressHandler(event){

	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;

	var percent = (event.loaded / event.total) * 100;

	_("progressBar1").value = Math.round(percent);

	_("status1").innerHTML = Math.round(percent)+"%";

}

function completeHandler(event){

	_("status1").innerHTML = event.target.responseText;

	_("progressBar1").value = 100;

}

function errorHandler(event){

	_("status1").innerHTML = "Upload Failed";

}

function abortHandler(event){

	_("status1").innerHTML = "Upload Aborted";

}





function uploadCover(){

	var str= _("title").value;

	var file = _("cover").files[0];

	if(str == null || str == undefined || str.length == 0){}

	else{

	if(file != null || file!= undefined || file.length!= 0 ){

	// alert(file.name+" | "+file.size+" | "+file.type);

	var formdata = new FormData();

	formdata.append("cover", file);

	formdata.append("title", str);

	var ajax = new XMLHttpRequest();

	ajax.upload.addEventListener("progress", progressHandlercover, false);

	ajax.addEventListener("load", completeHandlercover, false);

	ajax.addEventListener("error", errorHandlercover, false);

	ajax.addEventListener("abort", abortHandlercover, false);

	ajax.open("POST", "cover_upload_parser.php");

	ajax.send(formdata);}}

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



function showHint() {

	var str=_("inp").value;

    if (str.length == 0) {

        _("txtHint").innerHTML = "";

        return;

    } else {

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                _("txtHint").innerHTML = this.responseText;

            }

        };

        xmlhttp.open("GET", "gethint.php?q=" + str, true);

        xmlhttp.send();

    }

}

function ImageValidation(){ 

	var fileInput = _("cover");

	var filePath = fileInput.value; 

	var imageExtensions = /(\.jpg|\.jpeg|\.png)$/i;

	if (!imageExtensions.exec(filePath)) { 

		_("stats").innerHTML = "<w style='color: #E1868E'>invalid Image type choose again</w>";

    fileInput.value = '';}

    else{

        _("stats").innerHTML ="";

    }

}

function AudioValidation(){ 

	var fileInput = _("aud");

	var filePath = fileInput.value; 

	var audioExtensions = /(\.mp3|\.wav|\.m4a)$/i;

	if (!audioExtensions.exec(filePath)) { 

		_("stats1").innerHTML = "<w style='color: #E1868E'>invalid Audio type choose again</w>";

    fileInput.value = '';}

    else{

        _("stats1").innerHTML ="";

    }

}

</script>



<?php include('includes/footer.php');?> 