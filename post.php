<?php
        include("config.php");
        $name=$_POST["name"];
        $message=$_POST["message"];
        $sql="INSERT INTO chats (NAME,MESSAGES,LOGS) values ('$name','$message',NOW())";
  if($con->query($sql))
  {
      echo "Message Posted";
  }
  else
  {
      echo "error";
  }
?>