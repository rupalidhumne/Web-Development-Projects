<?
try
{
 
  $db = new PDO("sqlite:grocery.db");
  $item = $_REQUEST["item"];
  $cost=$_REQUEST["cost"];
  $money = $_REQUEST["money"];
  $sql = $db -> exec ("INSERT INTO foodList(money, item, cost) VALUES ('$money', '$item', '$cost');");
  //echo 'Added <br />';
  //echo("<br>");
    $sql = "SELECT * FROM foodList";
  	foreach ($db -> query($sql) as $row)
  	{
  		echo $row['item'] .' - '. $row['cost']. '<br />';
  	}
  	 if($money==1)
  	 {
        //echo $money;
        $query = "DELETE FROM foodList";
        $db->exec($query);
        
  	 	  //need to figure this out
  	 }
  
}
 catch(PDOException $e)
{
	echo $e->getMessage();
}
	
?>
