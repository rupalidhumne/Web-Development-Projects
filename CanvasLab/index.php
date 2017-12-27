<<html>
<head>
	<title> Incrementation</title>
	<style>
	div{background-color:yellow;}
	</style>
</head>
<body>
<?php
$filename="visitct.txt";
if(file_exists($filename))
{
	$count= intval(file_get_contents($filename))+1;
}
else
{
	$count=1;
}
echo "This page has been visited". 
echo $ count;
echo "times.</div>"
//output count
//save to a file
?>
</body>
</html>