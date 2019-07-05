<?php 
  session_start();
  $C=$_POST['Id'];
  print_r($_POST);
  print_r($C);
  $usernamed= $_SESSION['username'];
  $i=0;
  $url='http://www.omdbapi.com/?i='.$C.'&apikey=adc9f2be';
  $api_json= file_get_contents($url);
  $api_array=json_decode($api_json,true);
  
 
  $Title=$api_array['Title'];
 $message=' Watched '.$Title;
  date_default_timezone_set("Asia/Kolkata");
  $dt=date("Y-m-d H:i:s");
  $name=$usernamed.$i;
  $db= mysqli_connect('localhost','root','', 'movie')or die("could not connect database..");
  $sql="UPDATE `$usernamed` SET `status`='WATCHED' WHERE `favouritesid`='$C'";
  mysqli_query($db, $sql);
  $sql="INSERT INTO `$name` (`message`,`time`) VALUES ('$message','$dt');";
  mysqli_query($db, $sql);
  ?>