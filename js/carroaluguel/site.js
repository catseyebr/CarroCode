function validateonsubmit(){
	var myForm=document.getElementById('email_newsletter');
	var SS= Spry.Widget.Form.validate(myForm);
	if(SS==true){
	myForm.submit();
	}
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
	window.open(theURL,winName,features);
}