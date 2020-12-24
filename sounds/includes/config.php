<?php
//phpmyadmin credentials replace username and password with urs
include('includes/changeme.php');
$con=New MySQLi($Server,$AdminUsername,$AdminPassword);
if($con->connect_error){}
$sql = "CREATE DATABASE IF NOT EXISTS soundtomovie";
if($con->query($sql)){}
$con->close();
$conn=NEW MySQLi($Server,$AdminUsername,$AdminPassword,$DatabaseName);
if($conn->connect_error){echo "not connected";}
$sql="select 1 from USERS LIMIT 1";
if($conn->query($sql)==FALSE)
{
	$sql="CREATE TABLE USERS(
		EMAIL VARCHAR(250) PRIMARY KEY,
		FIRSTNAME VARCHAR(250),
		LASTNAME VARCHAR(250),
		PASSWORD VARCHAR(250),
		CREATED TIMESTAMP(6) DEFAULT CURRENT_TIMESTAMP(6))";
	if($conn->query($sql)){}
	$sql="CREATE TABLE PROFILE(
		EMAIL VARCHAR(250) PRIMARY KEY,
		PIMAGE VARCHAR(250),
		DOB DATE DEFAULT (CURRENT_DATE + INTERVAL 1 YEAR),
		FOREIGN KEY(EMAIL) REFERENCES USERS(EMAIL))";
	if($conn->query($sql)){}
	$sql="CREATE TABLE CONTACT(
		FIRSTNAME VARCHAR(250),
		LASTNAME VARCHAR(250),
		EMAIL VARCHAR(250),
		MOBILE INT,
		APPOINTMENT DATE,
		CREATED TIMESTAMP(6) DEFAULT CURRENT_TIMESTAMP(6))";
	if($conn->query($sql)){}
	$sql="CREATE TABLE AUDIOS(
		TITLE VARCHAR(250),
		ARTIST VARCHAR(250),
		COVERIMAGE VARCHAR(250),
		AUDS VARCHAR(250),
		USER VARCHAR(250),
		DOWNLOADS INT,
		UPLOADED TIMESTAMP(6) DEFAULT CURRENT_TIMESTAMP(6),
		FOREIGN KEY(USER) REFERENCES USERS(EMAIL))";
	if($conn->query($sql)){}
}
function makeDir($path){return is_dir($path) || mkdir($path);}
makeDir("uploads");
makeDir("uploads/AUDIO/");
makeDir("uploads/COVER/");
makeDir("uploads/PROFILE/");
session_start();
if (isset($_SESSION["ISLOGIN"])==FALSE) {
	$_SESSION["ISLOGIN"]=FALSE;
	$_SESSION["USER"]=NULL;
	$_SESSION["FNAME"]=FALSE;
	$_SESSION["LNAME"]=NULL;}
$info=NULL;
$regmdl=NULL;
function register()
{
	//FORM FIELDS VALUES MISSING
	$Fname=$_POST["fname"];
	$Lname=$_POST["lname"];
	$Email=$_POST["e"];
	$Pword=md5($_POST["pword"]);
	include('includes/changeme.php');
	$conn=NEW MySQLi($Server,$AdminUsername,$AdminPassword,$DatabaseName);
	$Fname=$conn->real_escape_string($Fname);
	$Lname=$conn->real_escape_string($Lname);
	$Email=$conn->real_escape_string($Email);
    $Pword=$conn->real_escape_string($Pword);
	
	$sql="SELECT * FROM USERS WHERE EMAIL='$Email'";
	$result=$conn->query($sql);
	if($result->num_rows==1)
	{
		//email exists
		$info="FAIL_USER_EXISTS";
	}
	else
	{
		//email not exists
		$sql="INSERT INTO USERS(EMAIL,FIRSTNAME,LASTNAME,PASSWORD) VALUES('$Email','$Fname','$Lname','$Pword')";
		if($conn->query($sql)==TRUE)
		{
			$sql="INSERT INTO PROFILE(EMAIL) VALUES('$Email')";
			if($conn->query($sql)==TRUE){}
			$info="PASS_NOW_LOGIN";
			$regmdl="<script>$(document).ready(function(){
						$('#afterregister').modal({
							backdrop: 'static'
					}); 
				});</script>";
			$_SESSION["ISLOGIN"]=TRUE;
			$_SESSION["USER"]=$Email;
			$sql="SELECT * FROM USERS WHERE EMAIL='$Email'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
				$row = $result->fetch_assoc();
				$fname=$row["FIRSTNAME"];
				$lname=$row["LASTNAME"];
				$_SESSION["FNAME"]=$row["FIRSTNAME"];
				$_SESSION["LNAME"]=$row["LASTNAME"];
				$_SESSION["NAME"]="$fname"." "."$lname";
				$_SESSION["usercover"]="$fname"."$lname";
				$_SESSION["GREET"]="<h4>Hello,"."$fname"." "."$lname".'<a href="profile">  <b>&#x266B;</b></a></h4>';
				$sql="SELECT * FROM PROFILE WHERE EMAIL='$Email'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{
					$row = $result->fetch_assoc();
					$_SESSION["DOB"]=date('Y-m-d', strtotime($row["DOB"]));
				}
			}
		}
		else{$info="FAIL_TRY_AGAIN_LATER";}
	}
	return "$regmdl";
}

function login()
{
	//form fields missing
	$Email=$_POST["mail"];
	$Pword=md5($_POST["pass"]);
	include('includes/changeme.php');
	$conn=NEW MySQLi($Server,$AdminUsername,$AdminPassword,$DatabaseName);
	$Email=$conn->real_escape_string($Email);
    $Pword=$conn->real_escape_string($Pword);
	
	$sql="SELECT * FROM USERS WHERE EMAIL='$Email' AND PASSWORD='$Pword'";
	$result=$conn->query($sql);
	if($result->num_rows==1)
	{
		//login pass
		$_SESSION["ISLOGIN"]=TRUE;
		$_SESSION["USER"]=$Email;
		$sql="SELECT * FROM USERS WHERE EMAIL='$Email'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			$row = $result->fetch_assoc();
			$fname=$row["FIRSTNAME"];
			$lname=$row["LASTNAME"];
			$_SESSION["FNAME"]=$row["FIRSTNAME"];
			$_SESSION["LNAME"]=$row["LASTNAME"];
			$_SESSION["NAME"]="$fname"." "."$lname";
			$_SESSION["usercover"]="$fname"."$lname";
			$_SESSION["GREET"]="<h4>Hello,"."$fname"." "."$lname".'<a href="profile">  <b>&#x266B;</b></a></h4>';
			$sql="SELECT * FROM PROFILE WHERE EMAIL='$Email'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
				$row = $result->fetch_assoc();
				$_SESSION["DOB"]=date('Y-m-d', strtotime($row["DOB"]));
				header("Location:profile");
			}
		}
	}
	else
	{
		$info="FAIL_WRONG_CREDENTIALS";
		//login failed
	}
}

function contact()
{
	//MISSING
	$Fname=$_POST["fname"];
	$Lname=$_POST["lname"];
	$Email=$_POST["e"];
	$Mobile=$_POST["mobile"];
	include('includes/changeme.php');
	$conn=NEW MySQLi($Server,$AdminUsername,$AdminPassword,$DatabaseName);
	$sql="INSERT INTO CONTACT(FIRSTNAME,LASTNAME,EMAIL,MOBILE) VALUES('$Fname','$Lname','$Email',$Mobile)";//date
	if($conn->query($sql)==TRUE)
	{
		$info="WE_WILL_REACHOUT_TO_YOU";
	}
	else
	{
		$info="FAIL_TRY_AGAIN";
	}
	return "$info";
}

function profile()
{
	$ucover=$_SESSION["updusercov"];
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_SESSION["USER"];
	$pword=md5($_POST["pword"]);
	include('includes/changeme.php');
	$conn=NEW MySQLi($Server,$AdminUsername,$AdminPassword,$DatabaseName);
	$sql="SELECT * FROM USERS WHERE EMAIL='$email' AND PASSWORD='$pword'";
	$result=$conn->query($sql);
	if($result->num_rows==1)
	{
		$dob=date('Y-m-d', strtotime($_POST['dob']));
		$sql="UPDATE PROFILE SET PIMAGE='$ucover',DOB='$dob' WHERE EMAIL='$email'";
		if($conn->query($sql)==TRUE)
		{
			$sql="UPDATE USERS SET FIRSTNAME='$fname',LASTNAME='$lname' WHERE EMAIL='$email'";
			if($conn->query($sql)==TRUE)
			{
				$info="CHANGES_SAVED_WILL_AFFECT_ON_NEXT_LOGIN";
			}
				else{
			$info="FAIL_TRY_AGAIN_LATER";
			}
		}
		else
		{
			$info="FAIL_TRY_AGAIN_LATER";
		}
	}
	else
	{
		$info="WRONG_PASSWORD";
	}
	return "$info";
}

function upload()
{
	$mtitle=$_POST["title"];
	$martist=$_POST["artist"];
	$mcover=$_SESSION["updcover"];
	$mauds=$_SESSION["updmusic"];
	$muser=$_SESSION["USER"];
	include('includes/changeme.php');
	$conn=NEW MySQLi($Server,$AdminUsername,$AdminPassword,$DatabaseName);
	$mtitle=$conn->real_escape_string($mtitle);
	$martist=$conn->real_escape_string($martist);
	$muser=$conn->real_escape_string($muser);
	$sql="INSERT INTO AUDIOS(TITLE,ARTIST,COVERIMAGE,AUDS,USER) VALUES('$mtitle','$martist','$mcover','$mauds','$muser')";
	if($conn->query($sql)==TRUE)
	{
		$info="&#x266A; MUSIC_UPLOADED";
		header("Location:profile");
	}
	else
	{
		$info="FAIL_TRY_AGAIN_LATER";
	}
	return "$info";
}

function logout()
{
	$SESSION["ISLOGIN"]=FALSE;
}
if(isset($_POST['register'])){$regmdl=register();}
if(isset($_POST['login'])){login();}
if(isset($_POST['proceed'])){$info=upload();}
if(isset($_POST['saveuser'])){$info=profile();}
if(isset($_POST['consubmit'])){$info=contact();}
if(isset($_POST['gtoprf'])){header("Location:profile");}
?>