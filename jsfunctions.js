function validateSubmit()
	{
		var err=0;

		var firstname = document.getElementById("firstname").value;
		var lastname =  document.getElementById("lastname").value;
		var email =  document.getElementById("email").value;
		var message =  document.getElementById("message").value;
		if(document.getElementById("firstname").value == "") 
			{	
				err=1;
				alert( "Please enter your first name" );
			}
		if(document.getElementById("lastname").value == "")
			{
				err=1;
				alert( "Please enter your last name" );
			}
		if(document.getElementById("email").value == "")
			{
				err=1;
				alert("please provide your email address");
			}  
		if(document.getElementById("message").value == "")
			{
				alert( "Please provide a message" );
				err=1;
			}  
		if (err==0) 
			{
				var alertMessage = "Please Confirm: First Name: " + firstname + "\nLast Name: " + lastname +  "\nEmail Address: "
				+ email + "\nMessage: " + message;
				if(confirm(alertMessage)==true)
					{
						alert("Thank you for contacting us on " + Date());
						firstname=undefined;
						//document.getElementById("footerForm").reset(); 
					}	
				else 	
					{
						alert("Ok. Please edit the form fields.");
						document.getElementById('firstname').value='Some Value';
					}
				return true;
			} 
	}

function validateSubmitRemove()
	{
		var err=0;

		if (document.removeform.imagename.value=='') //uses jquery to see if any of the radio buttons are selected. 
			{
				err=1;
				alert( "Please select an image to remove" );
				return false; 
			}
		if(err==0) 
			{   
				var imagename =  document.removeform.imagename.value;   //use querySelector to get the value of a radio button
				var filepath = imagename;  //gets the path to the file
				var filenameWithExtension = filepath.replace(/^.*[\\\/]/, ''); //uses reg expression to get rid of any information before the filename
				var alertMessage = "Please Confirm:  Image Name: " + filenameWithExtension;
				var answer = confirm(alertMessage);  //display a confirm box with the alert message built above
				if(answer)  //if the user selects 'ok'
					{
						return true;  //end the function here
					}
				else 	
					{
						alert("Ok. Please chose an image to remove.");
						return false; 
					}
				//return true;
			}
	}

function validateSubmitShare()
	{
		var err=0;

		if (document.shareForm.name.value=="") 
			{	
				err=1;
				alert( "Please enter your name" );
			}

		if( document.shareForm.shareemail.value == "" )
			{
				alert( "Please provide your email address" );
				err=1;
			}  
		if(document.shareForm.activity.value == "")
			{
				alert( "Please enter the description of your hike" );
				err=1;
			}  
		if(document.shareForm.description.value == "")
			{
				alert( "Please enter the location name" );
				err=1;
			}  
		if(document.getElementById("image").value == "")
			{
				alert("Please select an image to submit. For all other communications please use the contact me form in the footer or email Eva.");
				err=1;
			}
	

		if(err==0) 
			{   
				var name = document.getElementById("name").value;
				var shareemail =  document.getElementById("shareemail").value;
				var description =  document.getElementById("description").value;	
				var image = document.getElementById("image").value;
				var filepath = image;  //gets the path to the file
				var activity = document.getElementById("activity").value;
				var filenameWithExtension = filepath.replace(/^.*[\\\/]/, '');  //uses reg expression to get rid of any information before the filename
				var alertMessage = "Please Confirm: Name: " + name + "\nEmail Address: "+ shareemail + "\nDescription:" + description + "\nActivity:" +
					activity + "\nImage:" + filenameWithExtension;
				var answer = confirm(alertMessage);  //display a confirm box with the alert message built above
				if(answer)  //if the user selects 'ok'
					{
						alert("Thank you for submitting an activity on " + Date());  //display a thank you message and a date/time stamp
						
						return true;  //end the function here
					}
				else 	
					{
						alert("Ok. Please edit the form fields.");
						
						return false; 
					}
			} 
		 //document.getElementById("readersForm").reset();
	}
function validateSubmitAHike()
	{
		var err=0;

		if (document.hikersform.hikersname.value=="") 
			{	
				err=1;
				alert( "Please enter the hiker's name" );
			}

		if(document.hikersform.description.value == "")
			{
				alert( "Please enter the description of your hike" );
				err=1;
			}  
		if(document.getElementById("where").value == "")
			{
				alert( "Please enter the hike name or location" );
				err=1;
			}  
		if(document.hikersform.image.value == "")
			{
				alert("Please select an image to submit.");
				err=1;
			}
	

		if(err==0) 
			{   
				var hikersname = document.getElementById("hikersname").value;
				var description =  document.getElementById("description").value;	
				var image = document.hikersform.image.value;
				var filepath = image;  //gets the path to the file
				var where = document.getElementById("where").value;
				var filenameWithExtension = filepath.replace(/^.*[\\\/]/, '');  //uses reg expression to get rid of any information before the filename
				var alertMessage = "Please Confirm: Hiker's Name: " + hikersname  + "\nHike Description: " + description + "\nLocation: " +
					where + "\nImage: " + filenameWithExtension;
				var answer = confirm(alertMessage);  //display a confirm box with the alert message built above
				if(answer)  //if the user selects 'ok'
					{
						alert("Thank you for submitting a hike on " + Date());  //display a thank you message and a date/time stamp
						
						return true;  //end the function here
					}
				else 	
					{
						alert("Ok. Please edit the form fields.");
						
						return false; 
					}
			} 
		
	}


	




	