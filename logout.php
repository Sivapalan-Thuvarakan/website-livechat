<?php
        session_start();
        session_destroy();
        header("Location:Signin.php?mes=You are Logout.");
?>