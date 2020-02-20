function validation()
{	
	var firstname=document.getElementsByName("firstname")[0].value;
	var middlename=document.getElementsByName("middlename")[0].value;
	var lastname=document.getElementsByName("lastname")[0].value;
	var prn=document.getElementsByName("prn")[0].value;
	var number=document.getElementsByName("number")[0].value;
	var email=document.getElementsByName("email")[0].value;
	var pass1=document.getElementsByName("pass")[0].value;
	var pass2=document.getElementsByName("password")[0].value;
	var at=email.indexOf("@");
	var gmail=email.indexOf("@gmail.com");
	var outlook=email.indexOf("@outlook.com");
	var yahoo=email.indexOf("@yahoo.com");
	var inbox=email.indexOf("@inbox.com");
	var icloud=email.indexOf("@icloud.com");
	var aol=email.indexOf("@aol.com");
	var zoho=email.indexOf("@zoho.com");

	var prn1=prn.indexOf("10303320");
	var prn2=prn.indexOf("2016");

	if(firstname.length>20)
		document.getElementById("fname1").innerHTML="Please enter valid first name";
	else
		document.getElementById("fname1").innerHTML="";
	if(middlename.length>20)
		document.getElementById("mname1").innerHTML="Please enter valid middle name";
	else
		document.getElementById("mname1").innerHTML="";
	if(lastname.length>20)
		document.getElementById("lname1").innerHTML="Please enter valid last name";
	else
		document.getElementById("lname1").innerHTML="";
	if(prn.length!=20&&prn.length!=8)
		document.getElementById("prnnum").innerHTML="Please enter valid PRN";
	else
	{
		if(prn2!=0&&prn1!=0)
			document.getElementById("prnnum").innerHTML="Please enter valid PRN";
		else
		{
			if(prn2==-1&&prn1==-1)
				document.getElementById("prnnum").innerHTML="Please enter valid PRN";
			else
				document.getElementById("prnnum").innerHTML="";	
		}			
	}
	if(number.length!=10)
		document.getElementById("num").innerHTML="Please enter valid mobile number";
	else
		document.getElementById("num").innerHTML="";
	if(at<3|| email.length>40)
		document.getElementById("emailid").innerHTML="Please enter valid email id";
	else
	{
		if(gmail==-1 && outlook==-1 && yahoo==-1 && inbox==-1 && icloud==-1 && aol==-1 && zoho==-1 )
			document.getElementById("emailid").innerHTML="Please enter valid email id";
		else
			document.getElementById("num").innerHTML="";
	}
	if(pass1.length<6 || pass2.length>20)
		document.getElementById("pass").innerHTML="Password length must be in between 6 to 20 characters";
	else
		document.getElementById("pass").innerHTML="";
	if(pass1!=pass2)
		document.getElementById("confirmpass").innerHTML="Passwords do not match!";
	else
		document.getElementById("confirmpass").innerHTML="";
	if(at<3||  pass1!=pass2 || number.length!=10 || pass1.length<6 || middlename.length>20 || lastname.length>20 || firstname.length>20 || pass1.length>20 || email.length>40)
		return false;
	if (prn.length!=20&&prn.length!=8)
		return false;
	if (prn2!=0&&prn1!=0)
		return false;
	if(prn2==-1&&prn1==-1)
		return false;
	if(gmail==-1 && outlook==-1 && yahoo==-1 && inbox==-1 && icloud==-1 && aol==-1 && zoho==-1 )
		return false;
}