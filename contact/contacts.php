<?php

require_once('recaptchalib.php');
$privatekey = "6Lc6YwoAAAAAAOBG97cMaCAa_Eu34Kt07v3ne1GQ ";
$resp = recaptcha_check_answer ($privatekey,
$_SERVER["REMOTE_ADDR"],
$_POST["recaptcha_challenge_field"],
$_POST["recaptcha_response_field"]);
if(!$resp->is_valid) {
header("location:unauthorised.htm");
die();
}

if(isset($_POST['Submit']))
{
	$conn = mysql_connect("MRT", "mhsrobotics", "kikamana");
	mysql_select_db("robotics",$conn);

	$strNme = $_POST['namefield'];
	$strEml = $_POST['emailfield'];
	$strCom = $_POST['comments'];
	$strCon = $_POST['concerning'];
	$strPst = date("Y")."-".date("m")."-".date("d")." ".date("H").":".date("i").":".date("s");

	$strCom = addslashes($strCom);

	$query = "INSERT INTO contact (namefield, emailfield, comments, concerning, posted) VALUES ('$strNme', '$strEml', '$strCom', '$strCon', '$strPst')";
	$result = mysql_query($query);

	$strGoTo = "success.htm";
	echo "<script language=\"JavaScript\">";
	echo "window.location = '$strGoTo' ";
	echo "</script>";
}
else
{
	$strGoTo = "unauthorised.htm";
	echo "<script language=\"JavaScript\">";
	echo "window.location = '$strGoTo' ";
	echo "</script>";
}
?>