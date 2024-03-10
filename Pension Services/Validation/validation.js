function checkemail(input)
{
   var returnval=true
   var x=input.value;
   var atpos=x.indexOf("@");
   var dotpos=x.lastIndexOf(".");
   if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
   {
         returnval=false;
    }
	else
	    returnval=true;
		
	return returnval
}


function addInput(f) {
var aInputs=f.getElementsByTagName('input');
for(var i=0; i<aInputs.length; i++) {
    if(aInputs[i].className=='hide') {
        aInputs[i].className='';
        }
    }

	var aInputs=f.getElementsByTagName('textarea');
for(var i=0; i<aInputs.length; i++) {
    if(aInputs[i].className=='hide') {
        aInputs[i].className='';
        }
    }	
	
	var aInputs=f.getElementsByTagName('input');
for(var i=0; i<aInputs.length; i++) {
    if(aInputs[i].className=='hide') {
        aInputs[i].className='';
        }
    }	
	
	var aInputs=f.getElementsByTagName('select');
for(var i=0; i<aInputs.length; i++) {
    if(aInputs[i].className=='hide') {
        aInputs[i].className='';
        }
    }	
	
	var aInputs=f.getElementsByTagName('label');
for(var i=0; i<aInputs.length; i++) {
    if(aInputs[i].className=='') {
        aInputs[i].className='hide';
        }
		else
		{
		aInputs[i].className='';
		}
    }	
	
	f.btnupdate.className='';
	f.btnedit.className='hide';
	f.btncancel.className='';
	f.btndelete.className='hide';

  }
				

				
function reloadPage()
{
  window.location.reload()
}
  
  function confirmSubmit()
{
var agree=confirm("Are you sure you wish to Delete?");
if (agree)
	return true ;
else
	return false ;
}



function checkphone(input)
{
   var validformat=/^\d{5}\-\d{6}$/ //Basic check for format validity


   var returnval=false
   
   if (!validformat.test(input.value))
           returnval=false;
   else
        returnval=true
   
   	if (returnval==false) 
	    input.select()
	
	return returnval
}

function checkmobile(input)
{
   var validformat=/^\d{10}$/ //Basic check for format validity
   var returnval=false
   
   if (!validformat.test(input.value))
         returnval=false
   else
        returnval=true
   
   	if (returnval==false) 
	    input.select()
	
	return returnval
}


function numbersonly(e, decimal) 
{
var key;
var keychar;

if (window.event) {
   key = window.event.keyCode;
}
else if (e) {
   key = e.which;
}
else {
   return true;
}
keychar = String.fromCharCode(key);

if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
   return true;
}
else if ((("0123456789").indexOf(keychar) > -1)) {
   return true;
}
else if (decimal && (keychar == ".")) { 
  return true;
}
else
   return false;
}

function checkdate(input)
{
   var validformat=/^\d{2}\/\d{2}\/\d{4}$/ //Basic check for format validity
   var returnval=false
   if (!validformat.test(input.value))
        returnval=false
   else
   { //Detailed check for valid date ranges
		var monthfield=input.value.split("/")[0]
		var dayfield=input.value.split("/")[1]
		var yearfield=input.value.split("/")[2]
		var dayobj = new Date(yearfield, monthfield-1, dayfield)
		if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
		    returnval=false
		else
		returnval=true
	}
	if (returnval==false) input.select()
		return returnval
}


   function CompareDate(f1,f2) {
       //Note: 00 is month i.e. January
       var dateOne = new Date(f1.value); //Year, Month, Date
       var dateTwo = new Date(f2.value); //Year, Month, Date
       if (dateOne > dateTwo) {
            return false;
        }else {
            return true;
        }
    }
	

	function Comparetdaydate(input)
	{
		var end = new Date();
		var c_month = end.getMonth()+1; 
		var c_day = end.getDate(); 
		var c_year = end.getFullYear(); 
		var td = "" + c_month + "/" + c_day + "/" + c_year; 
	
    	var x=input.value;
	
      	var d1 = new Date(x);
	  	var d2 = new Date(td);
	  
	    var dateOne = new Date(d1); //Year, Month, Date
       var dateTwo = new Date(d2); //Year, Month, Date
       if (dateOne >= dateTwo) {
            return true;
        }else {
            return false;
        }
	}