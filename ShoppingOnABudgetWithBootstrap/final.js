var budget=0.0;
var numFruits=0;
var numVeggies=0;
var fruits = ["apple", "banana", "cherry", "peach", "melon", "watermelon", "pear", "orange", "tangerine"];
var veggies = ["lettuce", "carrot", "cauliflower", "broccoli", "peas", "celery", "squash", "onion"];
var prices = [3.00, 4.00, 5.00, 6.00, 1.00, 2.00, 3.00, 4.00, 5.00];
var numItems=0;
var broke=0; //0 is false 1 is true
function getBudget()
{
	budget = parseInt(Math.floor(Math.random() * 15)+15);
	document.getElementById("budget").disabled = true;
	document.getElementById("curBudget").innerHTML = "$"+ budget;
	//document.getElementById("rollBudget").disabled = true;
}
function getFoods()
{
	numFruits = parseInt(Math.floor(Math.random() * 2)+5);
	numVeggies = parseInt(Math.floor(Math.random() * 2)+5);
	document.getElementById("foodAmounts").innerHTML = numFruits + " fruits <br>" + numVeggies + " veggies";
	document.getElementById("amountFood").disabled = true;

	document.getElementById("buy").disabled = false;
}
function comparePricesFruit()
{
	var food1=document.getElementById("compare1").value.toUpperCase();
	var food2=document.getElementById("compare2").value.toUpperCase();
	var index1=0; //default apple or lettuce
	var index2=0;
	for(var i = 0; i<fruits.length; i++) //traverses fruits array
	{
		if(fruits[i].toUpperCase()===food1) //if "apple" equals that value
		{
			index1=i; //sets index1 to that of selected fruit
		}
		if(fruits[i].toUpperCase()===food2)//if "apple" equals whatever
		{
			index2=i;
		}
	}
	var price1=prices[index1]; // 1st select
	var price2=prices[index2]; //2nd select
	if(price1>price2)
	{
		document.getElementById("comparatorFruit").innerHTML = food1+ " costs more than " +food2;
	}
	else if(price1<price2)
	{
		document.getElementById("comparatorFruit").innerHTML = food2+ " costs more than " +food1;
	}
	else if(price1==price2)
	{
		document.getElementById("comparatorFruit").innerHTML = food1+ " costs the same as " +food1;
	}
}
function comparePricesVeggies()
{
	var food1=document.getElementById("compare3").value.toUpperCase();;
	var food2=document.getElementById("compare4").value.toUpperCase();;
	var index1=0;
	var index2=0;
	for(var i = 0; i<veggies.length; i++)
	{
		if(veggies[i].toUpperCase()===food1)
		{
			index1=i;
		}
		if(veggies[i].toUpperCase()===food2)
		{
			index2=i;
		}
	}
	var price1=prices[index1];
	var price2=prices[index2];
	if(price1>price2)
	{
		document.getElementById("comparatorVeggies").innerHTML = food1+ " costs more than " +food2;
	}
	else if(price1<price2)
	{
		document.getElementById("comparatorVeggies").innerHTML = food2+ " costs more than " +food1;
	}
	else if(price1==price2)
	{
		document.getElementById("comparatorVeggies").innerHTML = food1+ " costs the same as " +food1;
	}
}
function buyItem()
{
	var foodItem=document.getElementById("buying").value.toUpperCase();
	console.log("food item:");
	var index=-1; //sets index to -1
	var aFruit=0; //0 is false 1 is true

	for(var a = 0; a<fruits.length; a++) //goes through fruits array
	{
		if(fruits[a].toUpperCase()===foodItem)
		{
			index=a; //sets index to the index in fruits that matches what you typed in
			console.log("index:" + index);
			aFruit=1; //is a fruit
			if(budget-prices[index]<0) //ran out of money
			{
				document.getElementById("foodAmounts").innerHTML = "You don't have enough money!";
			}
			budget=budget-prices[index];
			document.getElementById("curBudget").innerHTML = "$"+ budget;
			numFruits=numFruits-1;
			document.getElementById("foodAmounts").innerHTML = numFruits + " fruits <br>" + numVeggies + " veggies";
			break;
		}
		else if(veggies[a].toUpperCase()===foodItem)
		{
			index=a;
				console.log("index:" + index);
				aFruit=0;
				if(budget-prices[index]<0)
				{
					document.getElementById("foodAmounts").innerHTML = "You don't have enough money!";
				}
				budget=budget-prices[index];
				document.getElementById("curBudget").innerHTML = "$"+ budget;
				numVeggies=numVeggies-1;
				document.getElementById("foodAmounts").innerHTML = numFruits + " fruits <br>" + numVeggies + " veggies";
				break;
		}
	}
	if(index==-1)
	{
		alert("You can't buy this item");
	}

	var price=prices[index];
	//budget=budget-price;
	numItems++;
	if(budget<=0) //if no money or fruit and veggies are all bought
	{
		broke=1;
		
		document.getElementById("curBudget").innerHTML = "You are out of money! Here's your final grocery list! You got " + numItems +" items!";
		document.getElementById("buy").disabled = true;
		document.getElementById("foodAmounts").innerHTML = "";
	}

	else if(numFruits==0 && numVeggies==0 && budget>=0)
	{
		document.getElementById("curBudget").innerHTML = "Congrats! You bought everything with " + budget+ " dollars left!";
		document.getElementById("buy").disabled = true;
		broke=1;
	}
	var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() 
			{
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
				{
					document.getElementById("list").innerHTML = xmlhttp.responseText;
				}
			}
			
	var args =
			 {
				'item':foodItem,
				'money':broke,
				'cost':price
			};
			xmlhttp.open("GET", "list.php?"+dw_encodeVars(args), true);
			xmlhttp.send();
}
		function dw_encodeVars(params) 
		{
			var str = '';
			for (var i in params ) 
			{
				str += encodeURIComponent(i) + '=' + encodeURIComponent( params[i] ) + '&';
			}
			return str.slice(0, -1);
		}