<?php
ob_start();
include ("config.php");
?>
<!DOCTYPE html>
<html>
    <head>
      <title>Department of Industrial Management</title>  
      <link rel="stylesheet" type="text/css" href="css/style.css"/>
      
      
     
      <script src="jquery-validation/jquery.validate.js"></script>
      <script src="js/jquery.min.js"></script>
      <script src="jquery-3.4.1.min.js"></script>
      <script>
            $(document).ready(function(){
              
                $("#p2").bind("blur",password_check);
                $("#username_id").keyup(function()
                {
                    $.post("check.php",{name:frm.username.value},function(data)
                    {
                                $("#feedback").html(data);
                    });
                });

            });
            function password_check()
            {
                var p1=$("#p1").val();
                var p2=$("#p2").val();
                if(p1!=p2)
                {
                    $("#pass_err").html("<p class='error'>Missmatch Password</p>");
                }
                else
                {
                    $("#pass_err").html("");
                    $("#pass_err").html("<p class='correct'>Password is correct</p>");
                }
            }
            </script>

    </head>
    <body>
      
    <div id="header">
          <div id="logotxt">
                  <img src="img/chat.png" alt="logo">
          </div>
          <div id="logo">
          <h1>Chat in Online</h1>
                  <h3>Awesome creations|S.Thuvarakan</h3>
          </div>

        </div>
        <div id="nav">
          <center>
                  <ul id="navul">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="Product.php">Product</a></li>
                        <li><a href="Downloads.php">Downloads</a></li>
                        <li><a href="Aboutus.php">About us</a></li>
                        <li><a href="Contactus.php">Contact us</a></li>
                        <li><a href="Blog.php">Blog</a></li>
                        <li><a href="Signin.php">Signin</a></li>
                  
                  </ul>
          </center>
        </div>
        <div id="container">
                       <h1 id="userregistration">New User Registration</h1>
                       
                       <form id="user_form" name="frm"  method="post" action="new_user.php">
                       <fieldset id="user_login">
                       <span id="feedback" style="margin:10px "><?php
                                if(isset($_GET["err"]))
                                {
                                    echo "<p style='color:red;'>".$_GET["err"]."</p>";
                                }
                       ?></span>
                           <legend>User Login</legend>
                           <table id="user_table">
                                <tr>
                                   <td>Name</td>
                                   <td><input type="text" name="name" required></td>
                               </tr>
                               <tr>
                                   <td>Username</td>
                                   <td><input type="text" name="username" id="username_id" required></td>
                               </tr>
                               <tr>
                                   <td>Email ID</td>
                                   <td><input type="email" name="email" required></td>
                               </tr>
                               <tr>
                                   <td>Password</td>
                                   <td><input type="password" name="password" id="p1" min required></td>       
                                   <td><i class="error" id="pass_err"></i>
                                   <i class="correct" id="pass_cor"></i></td>
                                   <br><td><label ><input type="checkbox" id="chk">Show Passsword </label></td>
                               </tr>
                               <tr>
                                   <td>Confirm Password</td>
                                   <td><input type="password" name="conpassword" id="p2" required></td>
                               </tr>
                               <tr>
                                   <td>Security Question</td>
                                   <td>
                                       <select name="question">
                                       <option value="What is Your Pet?">What is Your Pet?</option>
                                       <option value="What is Your Favourite Colour?">What is Your Favourite Colour?</option>
                                       <option value="What is Your Favourite Bike?">What is Your Favourite Bike?</option>
                                       <option value="What is Your Favourie pen?">What is Your Favourie pen?</option>
                                       <option value="What is Your Pet Name?">What is Your Pet Name?</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>Your Answer</td>
                                   <td><input type="text" name="answer" required></td>
                               </tr>
                               <tr>
                                    <td><input type="submit" value="save" id="sbtn" name="submit"></td>
                                   <td><input type="reset" value="clear" id="rbtn"></td>
                               </tr>
                               <tr>
                                    <td><a href="signin.php">Already user</a></td>
                               
                               </tr>
                           </table>
                        

                           </fieldset>
                           </form> 
                        
                           <?php 
                                   if(isset($_POST["submit"]))
                                   {
                                    $name=$_POST["name"];
                                    $username=$_POST["username"];
                                    $email=$_POST["email"];
                                    $password=$_POST["password"];
                                    $conpassword=$_POST["conpassword"];
                                    $question=$_POST["question"];
                                    $answer=$_POST["answer"];
                                    if($name != "" && $username != "" && $email != "" && $password != ""  && $conpassword != "" && $question != "" && $answer != "")
                                            {
                                                if(strlen($password)>=8)
                                                {
                                                        if($password==$conpassword)
                                                        {
                                                                $sql="INSERT INTO user_registration(NAME,USERNAME,EMAIL,PASSWORD,SECURITY_Q,ANSWER) 
                                                                values ('$name','$username','$email','$password','$question','$answer');";
                                                                if($con->query($sql))
                                                                {
                                                                    header("location:Signin.php?mes = <p class='correct'> user account is creaated successfully.please Login Here</p>");
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    echo "<p class='error'>Try again later...!</p>";
                                                                }

                                                        }
                                                        else
                                                        {
                                                                            echo "<p class='error'>ConfirmPassword and password mustbe equal</p>";
                                                 
                                                          }
                                                 }
                                                 else
                                                 {
                                                     echo "<p class='error'>Password must  be in 8 characters</p>";
                                                 }
                                            } 

                                            else
                                            {
                                                 echo "<p class='error'>All fields are required</p>";
                                            }


                                   }
                                   else
                                   {
                                       echo "<p class='error'>please fill all the message</p>";
                                   }
                           ?>
                             


                             <script>
                                                $("#chk").click(function(){
                                                    if($(this).prop("checked")){
                                                        $("#p1").attr("type","text");
                                                    }
                                                    else{
                                                        $("#p1").attr("type","password");
                                                    }
                                                });
                                </script>
                               
        </div>
        <div id="footer">
          <center>
            copyright&copy; 2020|Designed by Thuvarakan
          </center>

        </div>
    </body>
</html>