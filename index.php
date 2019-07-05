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

   movieshome();
   serieshome();
</script>
<title>Home Page</title>
</head>
  <body>
 
  <form class="formx" method="post">
<div class="row">
  <div class="col-sm-6">
  <?php if(isset($_SESSION['username'])) : ?>
  
      
  <h1>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h1>
  <input type="text" placeholder="Search Movies...." id='search' onkeyup="showResult(this.value)">
  <button class="btn btn-primary" onclick="getPosts();" type="button" id='search1'>search</button>
	  <?php endif ?>
</div>
<div class="col-sm-6">
        <nav>
             <ul>
             
               <li class="active"><a href="">Home</a></li>
               <li><a href="profile.php">Profile</a></li>
              
               
               <li><a href="">Favourites</a></li>
               <li> <a href="index.php?logout='1'">logout</a> </li>
            </ul>

        </nav>

</div>
</div>
<br>
    <br><br>
<div id="output" class="row">
<br>
    <br><br>


<div class="row">
    <div class="moviehome">
<h1>MOVIES</h1>
</div></div>
<br><br>
<div id="output1" class="row"></div><br>
    <br><br>
<div class="row">
    <div class="moviehome">  
<h1>SERIES</h1>
</div></div>
<br><br>
<div id="output2" class="row"></div>

</div>
</form>


</body>
	  
	   </html>
	   