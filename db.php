<?php
   require "libs/rb.php";
   R::setup( 'mysql:host=localhost;dbname=testregistration', // Set your login and password here
   'root', '' ); //for both mysql or mariaDB

   session_start();
?>