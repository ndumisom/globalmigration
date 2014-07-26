// JavaScript Document
var xmlhttp;
          function loadPage( str, url) {
			  
                if ( str.length==0 ) {
                     document.getElementById("pages").innerHTML="";
                            return;
                 }
				 
                 xmlhttp=GetXmlHttpObject( );
                 
				 if ( xmlhttp==null ) {
                     alert ("Your browser does not support XMLHTTP!");
                            return;
                  }
				  
                 var uniform_resource_locator = "";
				 if( str == "search" ) {
				     var str2 = document.getElementById("search-text1").value;
				     uniform_resource_locator=url+"?m="+str+"&id="+str2+"&sid="+Math.random();
				  }
                                  else{
				     uniform_resource_locator=url+"?m="+str+"&id="+str2+"&sid="+Math.random();
				  }
                 
                 xmlhttp.onreadystatechange=stateChanged;
                 xmlhttp.open("GET",uniform_resource_locator,true);
				 //if communication between our client and the server is slow, we inform the user about we are doing:
                 document.getElementById("pages").innerHTML = "<div align = 'center'><br /><br /><br /><br /><br /> Loading......</div>";
				 document.getElementById('pages').style.color ='blue'; //paint msg with red color
                  xmlhttp.send( null );//we send the request 
 
            }

            function stateChanged( ) {
                      
				  if ( xmlhttp.readyState==4 ) {
                      document.getElementById("pages").innerHTML=xmlhttp.responseText;
					  document.getElementById('pages').style.color ='#7D807A'; //reset the color
                  }
             }

            function GetXmlHttpObject( ) {
				     
                     if (window.XMLHttpRequest) {
                       // code for IE7+, Firefox, Chrome, Opera, Safari
                       return new XMLHttpRequest( );
                      }
					  
                     if (window.ActiveXObject) {
                       // code for IE6, IE5
                       return new ActiveXObject("Microsoft.XMLHTTP");
                     }
                    
					return null;
               }
			   
 
          function changePswdForm( form ) {
			  
			  document.getElementById("contact_form").innerHTML="";
			  
			   if( form.opassword.value.length == 0 ){
				    document.getElementById("contact_form").innerHTML="Please enter your old password.";
					return false;
			   } else if( form.npassword.value.length < 8 || form.npassword.value.length > 20 || form.npassword.value.length == 0 ){
				    document.getElementById("contact_form").innerHTML="Password must be consist of length between 8 and 20 characters.";
					return false;
			   }  else if( form.npassword.value != form.vpassword.value  ) {
					document.getElementById("contact_form").innerHTML="Please verify your password correcctly.";
					return false;
			   }  else {
				   document.getElementById("contact_form").innerHTML="This information will be sent shortly......";
				   document.getElementById('hideOK').style.display = 'none';
			       return;
			   }   
		  } 
		  
		function editEmploymentDetails( form ) {
			  
			  document.getElementById("contact_form").innerHTML="";
              
			   if( form.cname.value.length == 0 ) {
					document.getElementById("contact_form").innerHTML="Company name cannot be blank.";
					return false;
			   } else if( form.jtitle.value.length == 0 ) {
					document.getElementById("contact_form").innerHTML="Job title cannot be blank.";
					return false;
			   } else if( !validStaffNumber(form.snumber.value ) ) {
					document.getElementById("contact_form").innerHTML="Your staff number is invalid.";
					return false;
			   } else if( !validIDNumber( form.ID_number.value ) ) {
					document.getElementById("contact_form").innerHTML="Your SA ID number is invalid.";
					return false;
			   } else if( !validPhone( form.wphone.value ) ) {
					document.getElementById("contact_form").innerHTML="Your work phone number is invalid.";
					return false;
			   } else {
				   document.getElementById("contact_form").innerHTML="This information will be sent shortly......";
				   document.getElementById('hideOK').style.display = 'none';
			       return;
			   }   
		  } 
      function editContactDetails( form ) {
			  
			  document.getElementById("contact_form").innerHTML="";
              
			   if( form.fname.value.length == 0 ) {
					document.getElementById("contact_form").innerHTML="Please Enter Your First name.";
					return false;
			   } else if( form.lname.value.length == 0 ) {
					document.getElementById("contact_form").innerHTML="Please Enter Your Last name.";
					return false;
			   } else if( !emailValid(form.email.value ) ) {
					document.getElementById("contact_form").innerHTML="Your E-mail Address is invalid.";
					return false;
			   } else if( !validPhone( form.cphone.value ) ) {
					document.getElementById("contact_form").innerHTML="Your cellphone number is invalid.";
					return false;
			   } else {
				   document.getElementById("contact_form").innerHTML="This information will be sent shortly......";
				   document.getElementById('hideOK').style.display = 'none';
			       return;
			   }   
		  } 
		  
		  function add_article( form ) {
			  
			  document.getElementById("contact_form").innerHTML="";
			  
			   if( form.heading.value.length == 0 ){
				    document.getElementById("contact_form").innerHTML="Please enter article's heading.";
					return false;
			   } else if( form.article.value.length == 0 ) {
					document.getElementById("contact_form").innerHTML="Please enter article's content.";
					return false;
			   } else {
				   document.getElementById("contact_form").innerHTML="This information will be sent shortly......";
				   document.getElementById('hideOK').style.display = 'none';
			       return;
			   }     
		  } 
		  
		  function edit_article( form ) {
			  
			  document.getElementById("contact_form").innerHTML="";
			  
			   if( form.heading.value.length == 0 ){
				    document.getElementById("contact_form").innerHTML="Please enter article's heading.";
					return false;
			   } else if( form.article.value.length == 0 ) {
					document.getElementById("contact_form").innerHTML="Please enter article's content.";
					return false;
			   } else {
				   document.getElementById("contact_form").innerHTML="This information will be sent shortly......";
				   document.getElementById('hideOK').style.display = 'none';
			       return;
			   }     
		  } 
		  
		  function add_comments( form ) {
			  
			  document.getElementById("contact_form").innerHTML="";
			  
               if( form.comments.value.length == 0 ) {
					document.getElementById("contact_form").innerHTML="Please enter your comments.";
					return false;
			   } else {
				   document.getElementById("contact_form").innerHTML="This information will be sent shortly......";
				   document.getElementById('hideOK').style.display = 'none';
			       return;
			   }     
		  } 
		  
		  function send_message( form ) {
			  
			  document.getElementById("contact_form").innerHTML="";
			  
               if( form.msg.value.length == 0 ) {
					document.getElementById("contact_form").innerHTML="Please enter your text message.";
					return false;
			   } else {
				   document.getElementById("contact_form").innerHTML="This message will be sent shortly......";
				   document.getElementById('hideOK').style.display = 'none';
			       return;
			   }     
		  } 
		  
		  function img_upload( form ) {
			  
			  document.getElementById("login").innerHTML="";
			  
			   if( form.userfile.value.length == 0 ){
				    document.getElementById("login").innerHTML="Please browse your image to be uploaded.";
					return false;
			   }  else {
				    return true;
			   }     
		  } 
		  function overlay1( ) {
	            el = document.getElementById("overlay1");
		        el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
	      }
		  
		  
 function validStaffNumber( staff ) {
	
    var valid = "0123456789";

         if( staff=="" )
         {
         return false;
         }
         if(staff.length !=9)
         {
         return false;
         }
         for (var i=0; i < staff.length; i++)
          {
          temp = "" + staff.substring(i, i+1);
    
         if (valid.indexOf(temp) == "-1") 
           {
            return false;
           }
      }  
       return true;
}

function validIDNumber(id_number) {
	
    var valid = "0123456789";

         if(id_number=="")
         {
         return false;
         }
         if(id_number.length !=13)
         {
         return false;
         }
         for (var i=0; i < id_number.length; i++)
          {
          temp = "" + id_number.substring(i, i+1);
    
         if (valid.indexOf(temp) == "-1") 
           {
            return false;
           }
      }  
       return true;
}

var xmlhttp8;

          function send_an_sms( url ) {
			  
                if ( document.getElementById("cphone_sms").length==0 ) {
                     document.getElementById("sms").innerHTML="";
                            return;
                 }
				 
                 xmlhttp8=GetXmlHttpObject8( );
                 
				 if ( xmlhttp8 == null ) {
                     alert ("Your browser does not support XMLHTTP!");
                            return;
                  }
				  
                 var uniform_resource_locator = "";
				 var str = document.getElementById("cphone_sms").value;
                 uniform_resource_locator=url+"?elem="+str+"&sid="+Math.random();
                 
                 xmlhttp8.onreadystatechange=stateChanged8;
                 xmlhttp8.open("GET",uniform_resource_locator,true);
				 document.getElementById("sms").innerHTML="<div align = 'center'><img src = 'images/ajax-loader1.gif' width='60' height='20'/></div>";
                 xmlhttp8.send( null );

            }

            function stateChanged8( ) {
                 
				  if ( xmlhttp8.readyState==4 ) {
                      document.getElementById("sms").innerHTML=xmlhttp8.responseText;
                  }
             }

            function GetXmlHttpObject8( ) {
				
                     if (window.XMLHttpRequest) {
                       // code for IE7+, Firefox, Chrome, Opera, Safari
                       return new XMLHttpRequest( );
                      }
					  
                     if (window.ActiveXObject) {
                       // code for IE6, IE5
                       return new ActiveXObject("Microsoft.XMLHTTP");
                     }
                    
					return null;
               }	
