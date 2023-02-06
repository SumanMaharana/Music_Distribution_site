<!DOCTYPE html>
<?php include('includes/header.php');?>
<section class="page-section">
        <div class="container" style="margin-top:20px";>
         <h2 class="text-center mt-0" style="margin-top: 15px !important;">CONTACT US</h2>
            <hr class="divider my-4" />
            <form action="" method="post">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label class="form-label" for="inputTitle">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label class="form-label" for="inputArtist">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label class="form-label" for="e">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" onkeyup="numaun()" minlength=10 maxlength=10 required>
                        <span id="demo"></span>
                    </div>
                    <div class="form-group col-md-5">
                        <label class="form-label" for="e">Email ID</label>
                        <input type="email" class="form-control" id="e" name="e" required>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn influence btn-primary" name="consubmit">Submit</button>
                </div>
            </form><?php echo"<h4>$info</h4>";?>
        </div>
</section>
<script>
function numaun() {
        console.log("Number validation started");
  var x, text;
  x = document.getElementById("mobile").value;
  if (isNaN(x)) {
    text = "input number only";
   document.getElementById("mobile").value="";
  } else {
  	 text = "";
  }
  document.getElementById("demo").innerHTML = text;
}
</script>
<?php include('includes/footer.php');?> 
