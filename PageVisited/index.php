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
$lastvisit="lastvists.txt";
if(file_exists($filename))
{
	$count= intval(file_get_contents($filename))+1;
}
else
{
	$count=1;
}

echo "<div>This page has been visited ";
echo $count;
echo " times.</div>";
file_put_contents($filename, $count);
if(file_exists($lastvisit))
{
	date_default_timezone_set('America/New_York');
	$time = file_get_contents($lastvisit);
}
else
{
	$time = date('m/d/Y h:i:s a', time());
}
echo "<div> This page was last visited";
echo $time;
echo " EST.</div>";
$time = date('m/d/Y h:i:s a', time());
file_put_contents($lastvisit, $time);

//output count
//save to a file
?>
</body>
</html>