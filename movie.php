<?php
session_start();
if(!isset($_SESSION['username']))
{

    $_SESSION['msg']="You must log in first to view this page";
    header("location : login1.php");
}

if(isset($_GET['logout']))
{
      
   
    unset($_SESSION['username']);
    session_destroy();
    header("location: login1.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="style1.css">
<script src= "main.js"></script>
<script>

//function initf()
//{
  //  if(localStorage.fa1Records){
    // farray=JSON.parse(localStorage.fa1Records);
     //console.log(farray);
     //sessionStorage.setItem('movieIda',farray);
//} 
//}


    getMovies();
    var farray=[];
    function addf()
{
    var movieId= sessionStorage.getItem('movieId');
    $.ajax({
       url:"add.php",
       method:"post",
       data:{Id:movieId},
       success: function(res){
           console.log(res);
       }
    })  

     console.log(movieId);
   
    // farray.push(movieId);

    // localStorage.fa1Records=JSON.stringify(farray);
     //if(localStorage.fa1Records){
     //fdarray=JSON.parse(localStorage.fa1Records);
     //console.log(fdarray);
//}
}





    </script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://apis.google.com/js/client.js?onload=init"></script>   
<title>Home Page</title>
</head>
  <body >
 
  <form class="formx" action="movie.php" method="post">
<div class="row">
  <div class="col-sm-6">
  <?php if(isset($_SESSION['username'])) : ?>
  
      
  <h1>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h1>
  <input type="text" placeholder="Search Movies...." id='search'>
  <button class="btn btn-primary" onclick="getPosts();" type="button" id='search1'>search</button>
	  <?php endif ?>
</div>
<div class="col-sm-6">
        <nav>
             <ul>
             
               <li class="active"><a href="index.php">Home</a></li>
               <li><a href="profile.php">Profile</a></li>
              
               
               <li><a href="explore.php">connect others &#128104</a></li>
               <li> <a href="index.php?logout='1'">logout</a> </li>
            </ul>

        </nav>

</div>
</div>

<div id="output" class="row"></div>
<div class="row" id='trailer'>
  
</div> 

</form>




</body>
	  
	   </html>
       
       
       <?php

$errors = array();

$servername = "localhost";
$username = "root";
$password = "";
$usernamed= $_SESSION['username'];
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$i=0;
$name=$usernamed.$i;
// Create database
$sql = "CREATE DATABASE `movie`";
mysqli_query($conn, $sql);
$db= mysqli_connect('localhost','root','', 'movie')or die("could not connect database..");
$sql = "CREATE TABLE `$usernamed` (
    id  INT(6) UNSIGNED AUTO_INCREMENT , 
    favouritesid VARCHAR(255) ,
    status VARCHAR(255),
    PRIMARY KEY(id)
  )";
  mysqli_query($db, $sql);
 
  $sql = "CREATE TABLE `$name` (
    id  INT(6) UNSIGNED AUTO_INCREMENT , 
    message VARCHAR(255) ,
    time VARCHAR(255),
    PRIMARY KEY(id)
  )";
  mysqli_query($db, $sql);
 
  $sql = "CREATE TABLE `activites` (
    id  INT(6) UNSIGNED AUTO_INCREMENT , 
    users VARCHAR(255) ,
     act VARCHAR(255),
    PRIMARY KEY(id)
  )";
  mysqli_query($db, $sql);
  $sql="INSERT INTO `activites` (`users`,`act`) VALUES ('$usernamed','not private');";
  mysqli_query($db, $sql);

?>