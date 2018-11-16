<!DOCTYPE html>
<html>
<head>



<style>

            mark{
                background-color: red;
                color: black;
            }

</style>

     <title>Admin | Registration</title>
        <link href="assets/style.css" rel="stylesheet" type="text/css" media="all"/>

        <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

    <script src="<?= base_url('assets/js/jQuery-2.1.4.min.js');?>"></script>


</head>

<body>

 <div class="Registration">    
                <div class="modal-content modal-info">
                    <div class="modal-header">
                        <h3>Registration</h3>    
                    </div>

                    <div class="modal-body modal-spa">
                        <div class="login-form">          
                                   <form action="<?php echo base_url(); ?>register" method="post">
                                    <div class="td">
                                       	<ol>
						                  <li>
							                 <input type="email" id="email" name="email" placeholder="Email" title="Name" required=""  />	
						                  </li>
                                        </ol>
                                    </div>
                                    <div class="td">
                                       <input type="text" name="mobile" placeholder="Mobile Number" required="" />
                                    </div>
                                       
                                    <div class="td">
                                        <input type="password" name="password" id="txtPassword" pattern="(?=.*[a-z]).{6,}" title="Must contain 6 and above characters" placeholder="Password" required="" />
                                    </div>
                                    <div class="tryregistrationFormAlert" id="trydivCheckPasswordMatch">
                                    </div>
                                    
                                    <div class="td">
                                        <input type="password" name="cpassword" id="txtConfirmPassword" pattern="(?=.*[a-z]).{6,}" title="Must contain 6 and above characters"    placeholder="Confirm Password" required="" onChange="checkPasswordMatch();" />
                                    </div>
                                    <div class="registrationFormAlert" id="divCheckPasswordMatch">
                                    </div>

                                    <input type="submit" id ="enter" disabled="true" name="enter" value="Submit New Password" oninput="checkPasswordMatch()">                   
                                </form>

								
                        </div>                              
                    </div>
       
                        <div class="clear"></div>
	                    <br>
                    </div> 
            
                <div class="clear"></div>
    </div>

<script>
function checkPasswordMatch() {
    var password = $("#txtPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("<span style='font-family:verdana; font-size:12px;'><mark>*Password do not match! <mark></span>");
    else
        $("#divCheckPasswordMatch").html("<span style='font-family:verdana; font-size:12px;'><mark>*Password match <mark></span>");
}


$(document).ready(function () {
   $("#txtConfirmPassword").keyup(checkPasswordMatch);

   $("#txtPassword").on("input",function(){
      var inputText = $("#txtPassword").val();
        if(inputText.length < 6){
            $("#trydivCheckPasswordMatch").html("<span style='font-family:verdana; font-size:12px;'><mark>*Minimum of 6 Characters.<mark></span>");
        }else{
            $("#trydivCheckPasswordMatch").html(" ");
        }

        $("#txtConfirmPassword").blur(function() {
            var user_pass = $("#txtPassword").val();
            var user_pass2 = $("#txtConfirmPassword").val();


            if (user_pass == user_pass2) {
            $("#enter").prop('disabled',false)//use prop()
            } 
        });

   });
});
</script>
</body>

</html>


