function validation()
{	
	var firstname=document.getElementsByName("firstname")[0].value;
	var middlename=document.getElementsByName("middlename")[0].value;
	var lastname=document.getElementsByName("lastname")[0].value;
	var number=document.getElementsByName("number")[0].value;
	var email=document.getElementsByName("email")[0].value;
	var at=email.indexOf("@");
	var dot=email.lastIndexOf(".");

	if(at<1|| dot!=email.length-4 || dot-at!=6 || number.length!=10 || middlename.length>20 || lastname.length>20 || firstname.length>20 || email.length>40)
	{
		alert("please update proper info");
		return false;
	}
	
}