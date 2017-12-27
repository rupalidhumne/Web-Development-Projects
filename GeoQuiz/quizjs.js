var count = 0;
var time;
var seconds=300;
var curScore = "Score:  ";
var states = ["AK","AL","AR","AZ","CA","CO","CT","DC","DC2","DE","FL","GA","GU","HI","IA","ID",
        "IL","IN","KS","KY","LA","MA","MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ","NM","NV","NY",
        "OH","OK","OR","PA","PR","RI","SC","SD","TN","TX","UT","VA","VT","WA","WI","WV","WY"];
//var array = new boolean[50];
//Arrays.fill(array, Boolean.false)
//var a = new Array(50);
//for (var i = 0; i < states.length; ++i) { a[i] = false; }
var typed = new Array();
var time = null; 
//var seconds = 299;
function validate(wd){
	if((states.indexOf(wd.value) >= 0) && typed.indexOf(wd.value) < 0)
		{
			typed[typed.length] = wd.value.toUpperCase();
	        document.getElementById("prog").innerHTML = typed.toString();
			document.getElementById("textbox").value="";
			count++;
			document.getElementById("score").innerHTML = curScore + count;
		}
	if((states.indexOf(wd.value) >= 0) && (typed.indexOf(wd.value) >= 0))
	{
		alert("You already tried that!");
	}
}
function start() 
{
	clearInterval(time);
	count=0;
	document.getElementById("score").innerHTML = curScore + count;
	document.getElementById("textbox").disabled = false; 
	typed.length = 0;
    document.getElementById("stuff").innerHTML = "Time: 5:00";
	seconds=300;
	time = setInterval( starttimer, 1000); 
}
function starttimer()
{
	seconds--;
	document.getElementById("stuff").innerHTML = "Time: " + Math.floor(seconds/60) + ":" + seconds%60;
	if(seconds%60 < 5)
			document.getElementById("stuff").innerHTML = "Time: " + Math.floor(seconds/60) + ":0" + seconds%60;
	if(seconds == 0) 
	{
		if(count==0)
		{
			document.getElementById("stuff").innerHTML = "You Lost...";
		}
		document.getElementById("stuff").innerHTML = "You got " + count + "States!";
	}	

}

function quit(){
	document.getElementById("textbox").disabled = true; 
	document.getElementById("stuff").innerHTML = "Why Did you stop? You got " + count + " states though!"; 
	clearInterval(time)
}
function restart(){
	document.getElementById("stuff").innerHTML = "Time: 5:00"; 
	document.getElementById("prog").innerHTML = "--";
	start();
}
