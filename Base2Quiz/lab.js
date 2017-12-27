var questions = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];
var typed = []; // questions already used
var ans = [2, 4, 8, 16, 32, 64, 128, 256, 512, 1024, 2048, 4096, 8192, 16384, 32768,65536];
var answered = []; // questions answered correctly
var count = 0;
var x = null;
var time = null;
var seconds=300;

function next() { // goes to next question
    // x is between 1 and 16
	x = parseInt(Math.floor(Math.random() * 16)+1);
	while(typed.indexOf(x)>=0) // finds an unused number
	{
		x = parseInt(Math.floor(Math.random() * 16)+1);
	}
	// asks the question
	document.getElementById("question").innerHTML = "What is 2 to the power of " + x + "?";
}

function start() {
	document.getElementById("start").disabled = true;
	x=null;
	clearInterval(time);
	count=0;
	seconds=300;
	document.getElementById("textbox").disabled = false;
	document.getElementById("skip").disabled = false;
	document.getElementById("score").innerHTML = "Score: 0";
	//answered.length=0;
	answered = [];
	//usedQues.length = 0;
	typed = [];
	next();
	document.getElementById("timer").innerHTML = "Time: 5:00";
	time = setInterval(starttimer, 1000);
}

function validate() {
    // th is value that user enters
	var th = document.getElementById("textbox").value;
	if(th == ans[x-1]) // checks correct answer
	{
		typed[typed.length]=x; //adds used question to typed
		answered[answered.length]=th; //adds used answer to typed
		document.getElementById("prog").innerHTML=answered.toString(); //displays progress on screen ()
		document.getElementById("textbox").value = "";
		count++;
		document.getElementById("score").innerHTML = "Score:" + count;
	    /*	
		if(count==15)  
		{
			for(i=0; i<16; i++) 
			{
				if(typed.indexOf(i)<=0) 
				{
				document.getElementById("question").innerHTML = "What is 2 to the power of " + i + "?";
				}
			}
			
		}
		*/
		if(count==16)
		{
			document.getElementById("prog").innerHTML="You won!";
			seconds=0;
			clearInterval(time);
			document.getElementById("textbox").disabled = true;
			document.getElementById("start").disabled = false;
		}
		else { // count != 16
		    next();
		}
	}
				
}

function starttimer() // manage the timer on the HTML
{
	seconds--;
	document.getElementById("timer").innerHTML = "Time: " + Math.floor(seconds/60) + ":" + seconds%60;
	if(seconds%60 < 10)
			document.getElementById("timer").innerHTML = "Time: " + Math.floor(seconds/60) + ":0" + seconds%60;
	if(seconds == 0) 
	{
		if(count==0)
		{
			document.getElementById("prog").innerHTML = "You Lost...";
			clearInterval(time);
			document.getElementById("textbox").disabled = true; 
		}
		document.getElementById("prog").innerHTML = "You got " + count + "Questions!";
	}
				
}

function restart() {
	document.getElementById("timer").innerHTML = "Time: 5:00"; 
	document.getElementById("prog").innerHTML = "--";
	start();
}
function quit(){
	document.getElementById("skip").disabled = true;
	document.getElementById("textbox").disabled = true; 
	document.getElementById("timer").innerHTML = "Why Did you stop? You got " + count + " questions though!"; 
	clearInterval(time);
}
function skip() {
	document.getElementById("textbox").value = "";
	next();
}

