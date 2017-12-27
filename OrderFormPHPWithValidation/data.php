<?
$db = new SQLite3('newData') or die('Unable to open database');
$query = <<<EOD
  CREATE TABLE IF NOT EXISTS users (user STRING, city STRING,state STRING,zip STRING,url STRING,email STRING,date STRING)
EOD;
$db->exec($query) or die('Create db failed');
$user = $_REQUEST["user"];
$city = $_REQUEST["city"];
$state = $_REQUEST["state"];
$zip = $_REQUEST["zip"];
$url = $_REQUEST["url"];
$email = $_REQUEST["email"];
$date = $_REQUEST["date"];
$m1 = $_REQUEST["menu1"];
$m2 = $_REQUEST["menu2"];
$m3 = $_REQUEST["menu3"];
$m4 = $_REQUEST["menu4"];
$m5 = $_REQUEST["menu5"];
$m6 = $_REQUEST["menu6"];
$m7 = $_REQUEST["menu7"];
$m8 = $_REQUEST["menu8"];
$m9 = $_REQUEST["menu9"];
$m10 = $_REQUEST["menu10"];
echo $user;
echo $m10;
$query = <<<EOD
  INSERT INTO users VALUES ( '$user', '$city', '$state', '$zip', '$url', '$email', '$date', '$m1', '$m2', '$m3', '$m4', '$m5', '$m6', '$m7', '$m8', '$m9', '$m10')
EOD;
$db->exec($query);
$result = $db->query('SELECT * FROM users') or die('Query failed');
echo "<table border =1>";
	echo "<tr><td>Username</td><td>City</td><td>State</td><td>Zip</td><td>Url</td><td>Email</td><td>Date</td></tr>";
while ($row = $result->fetchArray())
{
  echo "<tr><td>{$row['username']}</td><td>{$row['city']}</td><td>{$row['state']}</td><td>\n{$row['zip']}</td><td>\n{$row['url']}</td><td>\n{$row['email']}</td><td>\n{$row['date']}</td></tr>\n";
 //the  original table actually has the value username
}
echo"</table>";

?>