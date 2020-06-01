<?php
            include("config.php");
            $sql="select * from chats order by ID DESC";
            $result=$con->query($sql);
            if($result->num_rows>0)
            {  
                while($row=$result->fetch_assoc())
                {
                echo "<div id='cbox'>";
                echo 
                "<div>
                        <b id='u_name'>{$row['NAME']}</b>
                        <i id='time'>{$row['LOGS']}</i>
                        <span id='cmes'>{$row['MESSAGES']}</span>
                </div>";
                echo "<div>";
                }    
            }
            else
            {
                    echo "<p class='error'>No Chats Yet......</p>";
            }
?>