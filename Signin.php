<?php
        session_start();
        include("config.php");
?>
<html>
    <head>
      <title>Department of Industrial Management</title>  
      <link rel="stylesheet" type="text/css" href="css/style.css"/>
      <script src="jquery-validation/jquery.validate.js"></script>
      <script src="js/jquery.min.js"></script>
     

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
                       <h1 id="signin">Signin</h1>
                       <?php
                           if(isset($_GET["mes"]))
                           {
                             echo $_GET["mes"];
                           }
                       ?>
                       
                       <fieldset id="user_login">
                       <legend>User Login</legend>
                       <form method="post" action="Signin.php">
                        
                      
                           <table id="user_table">
                           
                               <tr>
                                   <td>Username</td>
                                   <td><input type="text" name="username" required></td>
                               </tr>
                               <tr>
                                   <td>Password</td>
                                   <td><input type="password" name="password" required></td>
                                  
  
                               </tr>
                               <tr>
                                    <td><input type="submit" value="Login" id="sbtn" name="submit"></td>
                                   <td><input type="reset" value="clear" id="rbtn"></td>
                               </tr>
                               <tr>
                                    <td><a href="#">Forget Password</a></td>
                                   <td><a href="new_user.php">New User Registration</a></td>
                               </tr>
                           </table>
                           </form>
                       </fieldset>
                       <?php
                                    if(isset($_POST["submit"]))
                                    {
                                            $name=$_POST["username"];
                                            $pass=$_POST["password"];
                                            if($name !="" && $pass !="")
                                            {
                                                $sql="SELECT ID,USERNAME,PASSWORD FROM user_registration WHERE USERNAME='$name' AND PASSWORD='$pass'";
                                                $result=$con->query($sql);
                                                //print_r($result);
                                                if($result->num_rows==1)
                                                {
                                                    $_SESSION["username"]=$name;      
                                                  header("location:index.php");
                                                }
                                                else
                                                {
                                                        echo "<p class='error'>Invalid User or password</p>";
                                                }
                                            }
                                            else
                                            {
                                                  echo  "<p class='error'>Please Fill All Details</P>";

                                            }
                                    }
                                    else
                                    {
                                      echo "<p class='error'>Please Fill The Details for complete Access</p>";
                                    }
                       ?>
                      
        </div>
        <div id="footer">
          <center>
            copyright&copy; 2020|Designed by Thuvarakan
          </center>

        </div>
    </body>
</html>