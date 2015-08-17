/**
 * @author Kishor Mali
 */


$(document).ready(function(){

    jQuery.validator.addMethod("notEqualTo", function(value, element)
       {
           if(value == $('#mobile1').val() && $('#mobile1').val() != "")
           {
                return false; 
           }
           else
           {
               return true; 
           }
       },"");
       
       jQuery.validator.addMethod("lessThanBrothers", function(value, element)
       {
           if(value <= $('#no_of_brothers').val())
           {
                return true; 
           }
           else
           {
               return false; 
           }
       },"");
       
       jQuery.validator.addMethod("lessThanSisters", function(value, element)
       {
           if(value <= $('#no_of_sisters').val())
           {
                return true; 
           }
           else
           {
               return false; 
           }
       },"");
       
       jQuery.validator.addMethod("selected", function(value, element)
       {
           if(value == 0) { return false; }
          else { return true; }
       },"This field is required.");
       
       
       jQuery.validator.addMethod("greaterThan", function(value, element)
       {
			var value = parseFloat(value);
			var smaller = parseFloat($("#part_anual_income_from").val());
	   
           if(value < smaller)     
                { return false; }
           else
                { return true; }
       },"To Salary is must greater than from.");
       
       
       jQuery.validator.addMethod("acceptImgExtension", function(value, element)
       {
           if(value == "")
           {
               return true;
           }
           else
           {
               var extension = (value.substring(value.lastIndexOf('.') + 1)).toLowerCase(); 
           
              if(extension == 'jpg'|| extension=='png' || extension == "jpeg" || extension == "gif") 
                    { return true; }
              else 
                    { return false; }
           }
                     
          
       }, "");
       
       
       jQuery.validator.addMethod("acceptDocExtension", function(value, element)
       {
           if(value == "")
           {
               return true;
           }
           else
           {
              var extension = (value.substring(value.lastIndexOf('.') + 1)).toLowerCase();
               
              if(extension == 'jpg'|| extension=='png' || extension == "jpeg" || extension == "gif") 
                    { return true; }
              else 
                    { return false; } 
           }       
       }, "");
       
       
       jQuery.validator.addMethod("checkUsername", function(value, element)
       {
           var response;
           var post_url_check_username = baseurl + "user/checkUsernameExist/";
           
               $.ajax({
                      type: "POST",
                      url: post_url_check_username,
                      data: {username : value},
                      dataType: "json",
                      async: false
               }).done(function(result){
                   //alert(result.status);
                    if(result.status == true){
                        response = false;
                    }else{
                        response = true;    
                    }
               });
               return response;
       }, "Username already taken.");
       
       
       jQuery.validator.addMethod("checkEmailExist", function(value, element)
       {
           var response = false;
           
           var post_url_check_email = baseurl +"user/checkEmailExist/";
           
           $.ajax({
                  type: "POST",
                  url: post_url_check_email,
                  data: {email : value},
                  dataType: "json",
                  async: false
           }).done(function(result){
                if(result.status == true){
                    response = false;
                }else{
                    response = true;    
                }
           });
           return response;
       }, "Email already taken.");
       
       
       jQuery.validator.addMethod("checkMobileExist", function(value, element)
       {
           var response = false;
           
           var post_url_check_mobile = baseurl + "user/checkMobileExist/";
           
           $.ajax({
                  type: "POST",
                  url: post_url_check_mobile,
                  data: {mob : value},
                  dataType: "json",
                  async: false
           }).done(function(result){
                if(result.status == true){
                    response = false;
                }else{
                    response = true;    
                }
           });
           return response;
       }, "Mobile number already registered.");
       
       jQuery.validator.addMethod("checkMobileExist2", function(value, element)
       {
           var response = false;
           
           var post_url_check_mobile2 = baseurl + "user/checkMobileExist2/";
           
           if(value == "")
           {
               response = true;
           }
           else
           {
               $.ajax({
                      type: "POST",
                      url: post_url_check_mobile2,
                      data: {mob : value},
                      dataType: "json",
                      async: false
               }).done(function(result){
                    if(result.status == true)
                    {
                        response = false;
                    }else
                    {
                        response = true;    
                    }
               });
           }
           return response;
       }, "Mobile number already registered.");
       
       
       jQuery.validator.addMethod("checkPhoneExist", function(value, element)
       {
           var response = false;
           
           var post_url_check_phone = baseurl +"user/checkPhoneExist/";
           
           if(value == "")
           {
               response = true;
           }
           else
           {
               $.ajax({
                      type: "POST",
                      url: post_url_check_phone,
                      data: {mob : value},
                      dataType: "json",
                      async: false
               }).done(function(result){
                    if(result.status == true)
                    {
                        response = false;
                    }else
                    {
                        response = true;    
                    }
               });
           }
           return response;
       }, "Phone number already registered.");
       
	   
	   jQuery.validator.addMethod('checkMobileExist1Same', function(value, element)
	   {			
			var response = false;
           
			var post_url_check_phone = baseurl +"profile/checkMobileExist1Same/";
           
			if(value == "")
			{
               response = true;
			}
			else
			{
				$.ajax({
                      type: "POST",
                      url: post_url_check_phone,
                      data: {mob : value},
                      dataType: "json",
                      async: false
				}).done(function(result){
                    if(result.status == true)
                    {
                        response = false;
                    }else
                    {
                        response = true;    
                    }
				});
			}
			return response;
	   }, "Mobile number already registered.");
	   
		
		jQuery.validator.addMethod('checkMobileExist2Same', function(value, element)
		{
			var response = false;
           
			var post_url_check_mobile2 = baseurl + "profile/checkMobileExist2Same/";
           
			if(value == "")
			{
				response = true;
			}
			else
			{
				$.ajax({
                      type: "POST",
                      url: post_url_check_mobile2,
                      data: {mob : value},
                      dataType: "json",
                      async: false
				}).done(function(result){
                    if(result.status == true)
                    {
                        response = false;
                    }else
                    {
                        response = true;    
                    }
				});
			}
			return response;
		}, "Mobile number already registered.");
		
		
		jQuery.validator.addMethod('checkPhoneExistSame', function(value, element)
		{
			var response = false;
           
			var post_url_check_mobile2 = baseurl + "profile/checkPhoneExistSame/";
           
			if(value == "")
			{
				response = true;
			}
			else
			{
				$.ajax({
                      type: "POST",
                      url: post_url_check_mobile2,
                      data: {mob : value},
                      dataType: "json",
                      async: false
				}).done(function(result){
                    if(result.status == true)
                    {
                        response = false;
                    }else
                    {
                        response = true;    
                    }
				});
			}
			return response;
		},"Phone number already registered.");
	   
	   
       
       jQuery.validator.addMethod('checkDateFormat', function(value, element){
           
           var stringPattern = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/gm;
           
           if(stringPattern.test(value))
           {
               return true;
           }
           else
           {
               return false;
           }
       },"Please enter correct date.");
       
	   
	   jQuery.validator.addMethod('checkWhiteSpaces', function(value, element){
           
           var stringPattern = /\s/;
           
           if(stringPattern.test(value))
           {
               return false;
           }
           else
           {
               return true;
           }
       },"Spaces are not allowed in username.");
	   
	   
	   jQuery.validator.addMethod('checkDateDifference', function(value, element){
           
		   var birthYear = parseInt( value.substring(value.lastIndexOf('/') + 1)),
				dateNow = new Date(),
				dateDiff = dateNow.getFullYear() - birthYear;
				
           if(dateDiff < 17)
           {
               return false;
           }
           else
           {
               return true;
           }
       },"Please enter less than 18 years of current date.");
	
	
	/* Make checkboxes work like radio buttons - Start 
    
    $('.radio_eating').click(function() {
        selectedBox = this.id;

        $('.radio_eating').each(function() {
            if ( this.id == selectedBox )
            {
                this.checked = true;
            }
            else
            {
                this.checked = false;
            };        
        });
    });
    
    $('.radio_drinking').click(function() {
        selectedBox = this.id;

        $('.radio_drinking').each(function() {
            if ( this.id == selectedBox )
            {
                this.checked = true;
            }
            else
            {
                this.checked = false;
            };        
        });
    });
    
    $('.radio_smoking').click(function() {
        selectedBox = this.id;

        $('.radio_smoking').each(function() {
            if ( this.id == selectedBox )
            {
                this.checked = true;
            }
            else
            {
                this.checked = false;
            };        
        });
    });
	*/
	
	
	/* Physical Disability Textbox enable disable - Start */
   
   $('#physical_status').prop('disabled',true);
   
   $('#chk_physical_status').click(function()
   {
       if($('#chk_physical_status').prop('checked') == false)
       {
           $('#physical_status').prop('disabled',true);
       }
       else
       {
           $('#physical_status').prop('disabled',false);
       }
   });
   
   
   /* Physical Disability Textbox enable disable - End */
  
  
  jQuery.validator.addMethod("checkEmailExistFranchise", function(value, element)
       {
           var response = false;
           
           var post_url_check_email_franchise = baseurl +"franchise/franchise/checkEmailExist/";
           
           $.ajax({
                  type: "POST",
                  url: post_url_check_email_franchise,
                  data: {email : value},
                  dataType: "json",
                  async: false
           }).done(function(result){
                if(result.status == true){
                    response = false;
                }else{
                    response = true;    
                }
           });
           return response;
       }, "Email already taken.");
  
	
});
