function fncValidate()
{
	var fn=document.formal.fname.value;
    var ln=document.formal.lname.value;
	var pass1=document.formal.Password.value;
	var pass2=document.formal.ConPassword.value;
	
	if(fn=="")
	{
		alert('Please input Firstname');
		return false;
	}
	
	if(ln=="")
	{
		alert('Please input Lastname');
		return false;
	}
	
	var m=document.getElementById('male');
	var f=document.getElementById('female');
	
	if((m.checked==false)&&(f.checked==false))
	{
		alert("Please choice the gender");
		document.getElementById("gen").style.border="2px solid red";
		return false;
	}
	
	else{
	   document.getElementById("gen").style.border="";
	}
	
	if(pass1=="")
	{
		alert('Please input Password');
		return false;
	}
	
	if(pass1.length<6)
	{
		alert('Password length should not less than 6 characters');
		return false;
	}
	
	if (pass2=="")
	{
		alert('Please input confirm Password');
		return false;
	}
	
	if(pass1!= pass2)
	{
		alert('Confirm Password not match');
		return false;
	}
	
	alert('Successfully registered');
	document.formal.submit();
}
	
	