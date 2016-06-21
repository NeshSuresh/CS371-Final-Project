
var	clsStopwatch = function() {
		// Private vars
		var	startAt	= 0;	// Time of last start / resume. (0 if not running)
		var	lapTime	= 0;	// Time on the clock when last stopped in milliseconds

		var	now	= function() {
				return (new Date()).getTime(); 
			}; 
 
		// Public methods
		// Start or resume
		this.start = function() {
				startAt	= startAt ? startAt : now();
			};

		// Stop or pause
		this.stop = function() {
				// If running, update elapsed time otherwise keep it
				lapTime	= startAt ? lapTime + now() - startAt : lapTime;
				startAt	= 0; // Paused
			};

		// Reset
		this.reset = function() {
				lapTime = startAt = 0;
			};

		// Duration
		this.time = function() {
				return lapTime + (startAt ? now() - startAt : 0); 
			};
	};

var x = new clsStopwatch();
var $time;
var $money;
var clocktimer;
var hourlyrate = 0;
var buttontimer = 0;
var clockin ="";
var clockout ="";
var outmath =0;
var inmath = 0;
var user ="";
function pad(num, size) {
	var s = "0000" + num;
	return s.substr(s.length - size);
}
function setHourlyPay(){
				
		var cat = document.getElementById("pay").value;
		hourlyrate = cat;
		var cat2 = document.getElementById("user").value;
		user = cat2;
}
function formatTime(time) {
	var h = m = s = ms = 0;
	var newTime = '';

	h = Math.floor( time / (60 * 60 * 1000) );
	time = time % (60 * 60 * 1000);
	m = Math.floor( time / (60 * 1000) );
	time = time % (60 * 1000);
	s = Math.floor( time / 1000 );
	ms = time % 1000;

	newTime = pad(h, 2) + ':' + pad(m, 2) + ':' + pad(s, 2) + ':' + pad(ms, 3);
	return newTime;
}
function money(time) {
	var h = m = s = ms = 0;
	var moneyper = '';

//	h = Math.floor( time / (60 * 60 * 1000) );
//	time = time % (60 * 60 * 1000);
	m = Math.floor( time / (60 * 1000) );
//	time = time % (60 * 1000);
	s = Math.floor( time / 1000 );
	//ms = time % 1000;

	moneyper = Math.round(s*(hourlyrate/3600)*100)/100;
	cashin = moneyper;
	return moneyper;
}

function show() {
	$time = document.getElementById('time');
	$money = document.getElementById('money');
	update();
}

function update() {
	$time.innerHTML = formatTime(x.time());
	$money.innerHTML = money(x.time());
}

function start() {
	var d = new Date();
	var hours = d.getHours();
	var minu = d.getMinutes();
	clocktimer = setInterval("update()", 1);
	x.start();
	if (buttontimer < 1){
		clockin = (hours +minu);
		inmath =d.getTime();
		buttontimer++;
	}
}

function stop() {
	x.stop();
	clearInterval(clocktimer);
}


 function writeToFile(data){
            var fso = new ActiveXObject("Scripting.FileSystemObject");
            var fh = fso.OpenTextFile("data.txt", 8);
            fh.WriteLine("cats");
            fh.Close(); 
        } 
function reset() {
	stop();
	x.reset();
	update();
	buttontimer =0;
}
function submit() {
	
	stop();
	var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 

today = mm+'/'+dd+'/'+yyyy;

	//"insert into prjrecords (user,Date, ClockIn,ClockOut,hours,Money) values ('$user', '$pass', '$name')";
	
	var d = new Date();
	var hours1 = d.getHours();
	;
	var minu = d.getMinutes();
	var date = today;
	
	var clockout = (hours1+":"+minu);

	outmath = d.getTime();
	//var user ="sureshv";
	var hours = (outmath - inmath);
	//var cashin = 10;
	var insertString = ('"'+user+'"' +","+'"'+date+'"'+","+ clockin+","+'"'+clockout+'"'+","+hours1+","+ cashin);
	//	alert(insertString);
	//$.post('ADAD.php',{input: insertString}
	document.getElementById('insert').value = insertString;
	
}
