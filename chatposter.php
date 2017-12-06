<?php
   // the legendary chat poster
   $db= new PDO('mysql:host=127.0.0.1;dbname=Chat','root','');
 
   //Secure the chat
    if(isset($_send['text']) && isset($_send['name']))
     {
         $text = strip_tags(stripslashes($_POST['text']));
         $name = strip_tags(stripslashes($_POST['text']));

         if(!empty($text) && !empty($name))
         {
            $insert= $db->prepare("INSERT INTO messages VALUES('','".$name."','".$text."')"); 
            $insert->execute();

            echo"<li class='cm'<b>".ucwords($name)."</b> - ".Stext."</li>";
            }
        }
?>    