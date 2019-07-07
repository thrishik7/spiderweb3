<?php 
  session_start();


  $usernamed= $_SESSION['username'];
  $db= mysqli_connect('localhost','root','', 'movie')or die("could not connect database..");
  $sql="UPDATE `activites` SET `act`='not private' WHERE `users`='$usernamed'";
  mysqli_query($db, $sql);
 
  ?>