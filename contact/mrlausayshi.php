<html>

<head>
<title>2012 Contact Form Comments</title>
</head>

<body style="width:1000px; margin-left:auto; margin-right:auto">
<h1 style="margin-top:20px" align="center">2012 Contact Form Comments</h1>
<hr style="border-style:dashed" />
<?
	$conn = mysql_connect("MRT", "mhsrobotics", "kikamana");
	mysql_select_db("robotics",$conn);

if(isset($_POST['delete']))
{
	$strID = $_POST['id'];
	
	$query = "DELETE FROM contact WHERE ID='$strID'";
	$result = mysql_query($query);
}

	echo "<form name=\"frmReview\" action=\"mrlausayshi.php\" method=\"post\">";
	echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
			
	$query = "SELECT * FROM contact ORDER BY posted";
	$result=mysql_query($query);
	
	$i = 0;
	$rowset = array();
	
	while ($row = mysql_fetch_array($result)){
		extract($row);
		$rowset[$i] = $row;
		$i++;
	}
	
	$rowset = array_reverse($rowset);
	$j = 0;
	
	while ($j < $i){
		if(strpos($rowset[$j][posted], "012") == 1){
			echo "<div style=\"width:90%; margin-left:auto; margin-right:auto\">";
			echo "<br /><strong>Posted:</strong> ".$rowset[$j][posted]."<br />";
			echo "<strong>Name:</strong> ".$rowset[$j][namefield]."<br />";
			echo "<strong>Email:</strong> ".$rowset[$j][emailfield]."<br />";
			echo "<strong>Comment:</strong> ".$rowset[$j][comments]."<br />";
			//echo "Concerning: ".$rowset[$j][concerning]."<br />";
			echo "</div>";
			echo "<div align=\"right\"><input type=\"submit\" name=\"delete\" value=\"Delete\" onClick=\"javascript:window.frmReview.id.value = '".$rowset[$j][id]."'\"></div>";
			echo "<hr style=\"border-style:dashed\" />";
			
		}
		$j++;				
	}
	
	
	echo "</form>";
?>

<br />
</body>

</html>