<?php
// Getting these lousy messages
$db = new PDO('mysql:host=127.0.0.1;dbname=Chat','root','');

// Get messages
$query = $db->prepare("SELECT * FROM messages);
$query->execute();

// Fetch
while($fetch = $query->fetch(PDO::FETCH_ASSOC))
{
      $name = $fetch['name'];
      $message = $fetch['message'];

       echp"<li class='cm'><b>".ucwords($name)."</b> -".$message."</li>";
}
?>