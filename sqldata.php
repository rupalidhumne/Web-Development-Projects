<? php
	$db= new SQLite("pd3.db");
	$db-> query('SELECT* FROM WEBSTUDENT');
	while($row = $result-> fetchArray())
		{
			var_dump($row);
			echo("<br>");
		}
?>