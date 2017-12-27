<?
$user = "'".$_POST["user"]."'";
$city = "'".$_POST["city"]."'";
$state = "'".$_POST["state"]."'";
$zip = "'".$_POST["zip"]."'";
$url = "'".$_POST["url"]."'";
$email = "'".$_POST["email"]."'";
$dateForm = "'".$_POST["date"]."'";
$db=new SQLite3("newData.db");
$query = <<<EOD
CREATE TABLE IF NOT EXISTS users (
    username STRING PRIMARY KEY,
    city STRING,state STRING,zip STRING,url STRING,email STRING,date STRING)
EOD;
$db->exec("INSERT into users(user,city,state,zip,url,email,date) VALUES($user,$city,$state,$zip,$url,$email,$dateForm)");
print "<table border =1>";
	print "<tr><td>Username</td><td>City</td><td>State</td><td>Zip</td><td>Url</td><td>Email</td><td>Date</td></tr>";

	$table = $db->query('SELECT * from users');
	while($row = $table ->fetchArray())
	{
		print"<tr><td>".$row['user']."</td>";
		print"<td>".$row['state']."</td>";
		print"<td>".$row['zip']."</td>";
		print"<td>".$row['url']."</td>";
		print"<td>".$row['email']."</td>";
		print"<td>".$row['date']."</td></tr>";
	}
	print"</table>";
	?>
