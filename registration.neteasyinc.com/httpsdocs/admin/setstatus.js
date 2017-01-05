var xmlhttp;


function setstatus(str)
{
	var answer = confirm("Are you sure you want to change the status?")
			if (answer){	
							
			//alert("str:"+ str);
	//alert("id:"+uid);
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
var url="setstatus.php";
url=url+"?q="+str;
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
alert("Status Changed!");
}
else
{
	alert("Status not changed");
	}
}

function stateChanged()
{
if (xmlhttp.readyState==4)
{
document.getElementById("updated_date").innerHTML=xmlhttp.responseText;
}
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
}
