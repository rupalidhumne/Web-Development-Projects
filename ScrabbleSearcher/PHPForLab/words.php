<?php
$file = 'dict.txt';
$searchfor = $_REQUEST["first"];
$a=0;
function sortbylength($a,$b)
{
  if($a == $b) 
    return 0;
  return (strlen($a) > strlen($b) ? -1 : 1);
}
if($searchfor == null)
    {
        $searchfor=butterfly;
    }
        $pattern = preg_quote($searchfor, '/');
        $pattern = "/^.*$pattern.*\$/m";

$contents =file_get_contents($file);
if($_REQUEST["safe"]==1)
{
    //if(preg_match_all($pattern, $contents, $matches))
//{

   //sort($matches[0]);
   //usort($matches[0],'sortbylength');
   foreach(file('dict.txt') as $value)
   {
        if($value[0]==$searchfor)
        {
             $a=1;
              echo "\n";
              echo "Word: $value:<br />\n";
        }

   }
   if($a==0)
   {
      echo "No matches found";
    } 
}
else
{
   if(preg_match_all($pattern, $contents, $matches))
{
   echo "Found matches:<br />\n";
   echo "\n";
   
   sort($matches[0]);
   usort($matches[0],'sortbylength');

   foreach($matches[0] as $value)
   {
        echo "Word: $value:<br />\n";

   }

}
else{
   echo "No matches found";
    } 
}

?>

