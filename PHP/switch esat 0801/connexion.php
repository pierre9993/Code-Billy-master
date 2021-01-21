<?php
        $db = "mysql:host=localhost;dbname=new";
        $user = "root";
        $password = "root";
        $dbh = new PDO($db,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        ?>