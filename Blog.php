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
          
                       <h1 align="center">Blog</h1>
                    <img  src="img/car.jpg" alt="cricketer" id="photo" width="300px" height="200px"> 
                       <p>Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.
To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries.
Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme.
Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign.
Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.
</p>
     <div>
                  <form method="post" action="Blog.php" id="blog">
                       <fieldset id="blogcomments" >
                           <legend>User Comments</legend>
                           <table id="postcomment" >
                           <tr>
                           <td id="name" >name:</td>
                           <?php 
                           if(isset($_SESSION["username"]))
                           {
                             echo '<td id="uname"><input type="text" name="username" value="'.$_SESSION["username"].'" readonly required></td>'  ;
                            }
                            else
                            {
                                echo "<td><a href='Signin.php' >please login Here</a></td>";
                            }
                            ?>
                              
                        </tr>     
                         <tr>  <td id="comment">Comment:</td>
                                   <td><textarea name="comment" row="5" cols="30" required></textarea></td>
                          </tr>
                          <tr align="right">
                                    <td ><input  type="submit" value="Post Comment" id="sbtn" name="submit"></td>
                            </tr>
                      </table>
                       </fieldset>
                       </form>
                       <?php
                                if(isset($_POST["submit"]))
                                {
                                  $name=$_POST["username"];
                                  $comment=$_POST["comment"];
                                  $sql="INSERT INTO comments (USERNAME,COMMENTS,LOGS) VALUES ('$name','$comment',NOW())";
                                    $con->query($sql);
                                }
                       ?>
                 <?php
                        $sql="SELECT * FROM comments";
                        $result=$con->query($sql);
                        if($result->num_rows>0)
                        {
                                      while($row=$result->fetch_assoc())
                                      {
                                        echo"<p><b style='color:lime;'>{$row['USERNAME']}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <i>{$row['LOGS']}</i></p>
                                        <p>{$row['COMMENTS']}</p><hr>";
                                      }
                                      echo "<p>present</p>";
                        }
                        else
                        {
                          echo "<p class='correct'>No Comments Yet!!!!</p>";
                        }
                 ?>
                       </div>         

        </div>
        <div id="footer">
          <center>
            copyright&copy; 2020|Designed by Thuvarakan
          </center>

        </div>
    </body>
</html>