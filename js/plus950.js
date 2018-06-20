function pick(field)
		{
			return document.getElementById(field).value;
		}
		

function login()
{
	var uid=pick("uid");
	var passwd=pick("passwd");

 if(uid.length==7 && passwd.length>=1)
{
	dhtmlx.message("Authenticating <b>"+uid+"</b>...");
	$.post("login_check.php",{uid:uid,passwd:passwd},function(data){if(data.indexOf("invalid")!=-1){dhtmlx.message({ type:"error", text:"Invalid Credentials" })} else if(data.indexOf("success")!=-1){dhtmlx.message("<font style='color:green;font-weight:bold;'>Login successful</font>");location.reload();}else if(data.indexOf("not a student")!=-1){dhtmlx.message({ type:"error", text:"Not a E4 CSE Student" })} });

}
else
{
	dhtmlx.message({ type:"error", text:"*All fields are required" });
	return false;
}
}


function shwfac(val)
{
$("#fac").html("<img src='ajax-loading.gif'>");
var datastring="sno="+val;
$.ajax({
url:"shwfac.php",
type:"POST",
data:datastring,
cache:false,
success:function(data){$("#fac").html(data);}	
});	
}

function sub()
{
var val=$("#facval").val();	
$(".sb").html("<img src='ajax-loading.gif'>");
var datastring="sno="+val;
if(val!="" && isNaN(val)==false && val!=undefined)
{
$.ajax({
url:"doreg.php",
type:"POST",
data:datastring,
cache:false,
success:function(data){if(data.indexOf("success")!=-1){dhtmlx.alert({title:"Message", text:"Successfully Submitted"});window.location='index.php';}else{dhtmlx.message({ type:"error", text:data });}}	
});	
}

}
