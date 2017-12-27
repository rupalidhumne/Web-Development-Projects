<?php
$xval[]=$_REQUEST["xval"];
$yval[]=$_REQUEST["yval"];
$file='dots.txt';
foreach ($xval as $val1) 
{
    foreach($yval as $val2)
    {
    	$current=file_get_contents($file);
    	$current .= "$val1, $val2\n";
    	file_put_contents ( $file , $current);
    	echo file_get_contents( "dots.txt" ); //
    }
    
}
?>