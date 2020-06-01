<?php
include ("config.php");
if (isset($_POST["name"]))
{
            $name=$_POST["name"];
            if(strlen($name)>=6)
            {
                        $sql="SELECT USERNAME FROM user_registration where USERNAME='$name'";
                        $result=$con->query($sql);
                        if($result->num_rows>0)
                        {
                            echo "<li style='color:red;'>Username already Taken Try another One</li>";
                        }
                        else
                        {
                            echo "<li style='color:green'>Username available</li>";
                        }
            }
            else
            {
                        echo "Please Enter User Name Which has More than 6 characters";
            }
}
else
{
        header("location:new_user.php?err=Please Register Here!!!");
}
?>