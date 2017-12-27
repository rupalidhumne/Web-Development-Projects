<!DOCTYPE html>
<html>

<head>
    <title> Grocery Shopping! </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    
    <script src = "final.js"></script>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            
            font: 400 15px Lato, sans-serif;
        }

        h1 {
            color: orange;
            text-align: center;
        }
        .jumbotron {
          background-color: #f4511e; /* Orange */
          color: #ffffff;
          padding: 100px 25px;
          font-family: Montserrat, sans-serif;
        }
        .container-fluid {
          padding: 60px 50px;
        }
        .navbar {
            margin-bottom: 0;
            background-color: #f4511e;
            z-index: 9999;
            border: 0;
            font-size: 12px !important;
            line-height: 1.42857143 !important;
            letter-spacing: 4px;
            border-radius: 0;
        }

        .navbar li a, .navbar .navbar-brand {
            color: #fff !important;
        }

        .navbar-nav li a:hover, .navbar-nav li.active a {
            color: #f4511e !important;
            background-color: #fff !important;
        }

        .navbar-default .navbar-toggle {
            border-color: transparent;
            color: #fff !important;
        }
        .button {
          font: 400 15px Lato, sans-serif;
        }
        #curBudget {
          text-align: center;
        }
        #option {

        }
        #buying{
            display: block;
            float: left;
            height: 20px;
            width: 250px;
        }

        #buy{
            display: block;
            float: left;
            height: 40px;
            margin: -1px -2px -2px;
            width: 41px;
        }
    </style>
</head>
<body>
  <!--<nav class="navbar navbar-default navbar-fixed-top" style="text-align: center;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Logo</a>
    </div>
      <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#about">FRUIT</a></li>
            <li><a href="#services">VEGGIES</a></li>
            <li><a href="#portfolio">GRAIN</a></li>
            <li><a href="#pricing">POULTRY</a></li>
            <li><a href="#contact">DAIRY</a></li>
          </ul>
        </div>
      </div>
  </nav>-->

<div class="jumbotron text-center">
  <h1> On a Budget! </h1>
  <p>Buy the most things you can on a budget!</p>
</div>


<div id = "curBudget" class="pull-right" style="margin: 30px; padding-bottom: 50px; padding-top: 10px; padding-right: 30px; padding-left: 10px; background-color: #B19CD9; text-align: center"> 
  <h2 style="text-align: left">Budget: </h2>
  <button id = "rollBudget" class="btn btn-large btn-success" onclick="getBudget()" style="width: 200px; height: 30px; text-align: center;">Get my Budget</button>
</div>

<div id = "numFruits" class="pull-right" style="margin-top: 30px; margin-left: 15px; margin-right: 15px; padding-bottom: 50px; padding-top: 10px; padding-right: 30px; padding-left: 10px; background-color: #B19CD9; text-align: center"> 
  <h2 style="text-align: left">Goal: </h2> <p id="foodAmounts"></p>
  <button id = "amountFood" onclick="getFoods()" class="btn btn-large btn-success" style="width: 100px; height: 30px">Roll</button>
</div>  

  <div id = "boughtitems" class="pull-right" style="margin: 30px; padding-left: 10px; padding-top: 10px; padding-right: 100px; padding-bottom: 300px; background-color: #d7d7d7"><h2 style="text-align: left">Bought items: </h2>
    <div id="list"></div>
  </div>

<div id = "option" class="container-fluid">
  <select id="compare1">
    <option value="apple">Apple</option>
    <option value="banana">Banana</option>
    <option value="orange">Orange</option>
    <option value="cherry">Cherry</option>
    <option value="peach">Peach</option>
    <option value="melon">Melon</option>
    <option value="watermelon">Watermelon</option>
    <option value="pear">Pear</option>
    <option value="tangerine">Tangerine</option>
  </select>
  <select id="compare2">
    <option value="apple">Apple</option>
    <option value="banana">Banana</option>
    <option value="orange">Orange</option>
    <option value="cherry">Cherry</option>
    <option value="peach">Peach</option>
    <option value="melon">Melon</option>
    <option value="watermelon">Watermelon</option>
    <option value="pear">Pear</option>
    <option value="tangerine">Tangerine</option>
  </select>
    

  <br><button id = "pricesFruit" class="btn btn-default btn-lg" onclick="comparePricesFruit()" style="width: 200px; height: 30px">Compare Prices</button>
<div id="comparatorFruit">--</div>

<select id="compare3">
  <option value="lettuce">Lettuce</option>
  <option value="carrot">Carrot</option>
  <option value="cauliflower">Cauliflower</option>
  <option value="broccoli">Broccoli</option>
  <option value="peas">Peas</option>
  <option value="celery">Celery</option>
  <option value="squash">Squash</option>
  <option value="onion">Onion</option>
</select>
<select id="compare4">
  <option value="lettuce">Lettuce</option>
  <option value="carrot">Carrot</option>
  <option value="cauliflower">Cauliflower</option>
  <option value="broccoli">Broccoli</option>
  <option value="peas">Peas</option>
  <option value="celery">Celery</option>
  <option value="squash">Squash</option>
  <option value="onion">Onion</option>
</select>
<br><button id = "pricesVeggies" class="btn btn-default btn-lg" onclick="comparePricesVeggies()" style="width: 200px; height: 30px">Compare Prices</button>
<div id="comparatorVeggies">--</div>

  <input type="text" class="form-control" id="buying" placeholder="Buy an item">
  <button id = "buy" disabled onclick="buyItem()" style="width: 100px; height: 30px" class="btn btn-danger">Purchase</button>
</div>
<div> Link to our code </div>
</html>
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

