//alert("Hello World!");
function FirstValidation(){
	var flag = true;
	var usernameTextBox = document.getElementById('username');
	var passwordTextBox = document.getElementById('password');	
	
	if(usernameTextBox.value.length == 0 && passwordTextBox.value.length == 0){
		flag = false;
		alert("Enter Username and Password");
		return false;
	}
	if(usernameTextBox.value.length == 0){
		flag = false;
		alert("Enter Username");
		return false;
	}
	if(passwordTextBox.value.length == 0){
		flag = false;
		alert("Enter Password");
		return false;
	}
	
	return flag;
	
}

function registrationValidation(){
	var regiForm = document.forms[0];
	var flag = true;
	for(i = 0; i < regiForm.length-2; i++){
		if(regiForm[i].value.length == 0){
			flag = false;
			alert("Fill every field");
			break;
		}
	}
	console.log(regiForm.length);
	return flag;
}

function pictureUpload(){
	//alert("Ok Working");
	var imageAllow = new Array('.jpeg', '.jpg','.JPEG','.JPG','.PNG','.png');
	var flag = false,isImage = false;
	var imageText = document.getElementById('imageFileUploader').value;
	var fileType = imageText.substring(imageText.lastIndexOf('.'),imageText.length);
	//console.log(imageText.length);
	console.log(fileType);
	if(document.getElementById('imageFileUploader').value.length == 0){
		flag = false;
		alert("Please Select an Image");
	}else{
		for(i = 0; i < imageAllow.length; i++){
			if(imageAllow[i] == fileType){
				flag = true;
				isImage = true;
				break;
			}
				
		}	
	}
	if(!isImage){
		alert("One Image Needed");
	}
	return flag;
}