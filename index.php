<?php
        session_start();
        if(!isset($_SESSION['username']))
        {
            header("location:Signin.php?mes = <p class='correct'>please Login Here</p>");
        }
?>  
 
<html>
    <head>
      <title>Department of Industrial Management</title>  
      <link rel="stylesheet" type="text/css" href="css/style.css"/>

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
                        <li><a href="logout.php">logout</a></li>
                  
                  </ul>
          </center>
        </div>
        <div id="container">
                            <div id="lfbx"><br><br>
                            <ul id="lful">
                        <li><a href="#">Project</a></li>
                        <li><a href="#">Samples</a></li>
                        <li><a href="#">Programming</a></li>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Graphic Design</a></li>
                        <li><a href="#">Social Action</a></li>
                  
                  </ul>

                            </div>
                            <div id="rtbx">
                                   <p class="correct" id="welcome">HI!!<?php echo $_SESSION["username"]; ?> Welcome to Live Chat</p>
                                   <form name="frm" autocomplete="off">
                                   <input  name="message" id="message" placeholder="Type Message Here"></input>
                                   <input  type="hidden" id="user" name="user" value="<?php echo $_SESSION['username']; ?>"></input>
                                  <button id="btn" type="button">Post Message</button><br>
                                  <span id="status">-</span>
                                  </form>
                                   <div id="feedback">
                                                       
                                   </div>
        </div>
        <div id="footer">
          <center>
            copyright&copy; 2020|Designed by Thuvarakan
          </center>
          <script src="js/jquery.min.js"></script>
          <script src="jquery-3.4.1.min.js"></script>
          <script>
            $(document).ready(function(){
              $("#message").keypress(function(){
                $("#status").html("Typing Message.....");
              });
              setInterval(function(){loadchats()},100);
              $("#btn").click(function(){
                 var n=$("#user").val();
                 var m=$("#message").val();
                 $.post("post.php",{name:n,message:m},function(data)
                 {
                        $("#status").html(data);
                        $("#message").val("");
                 });
              });
            });
            function loadchats()
            {
              $.ajax({url:"log.php",success:function(result){
                $("#feedback").html(result);
              }});
            }

          </script>
        </div>
    </body>
</html>