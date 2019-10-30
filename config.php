<?php
    $mysql_connect = mysqli_connect("localhost","root","","modul4wad");
    
    $reg = 0;
    
    if(!$mysql_connect){
        echo"<script>alert('Failed to connect do database');</script>";
    }
?>