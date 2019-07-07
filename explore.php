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
<?php

$errors = array();?>
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

<title>Home Page</title>
</head>
  <body>
<form method="post" action="explore.php">
  <div class="formx" method="post">
<div class="row">
  <div class="col-sm-6">
  <?php if(isset($_SESSION['username'])) : ?>
  
      
  <h1>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h1>

	  <?php endif ?>
</div>
<div class="col-sm-6">
        <nav>
             <ul>
             
               <li ><a href="index.php">Home</a></li>
               <li><a href="profile.php">Profile</a></li>
              
               
               <li class="active"><a href="explore.php">connect others &#128104</a></li>
               <li> <a href="index.php?logout='1'">logout</a> </li>
            </ul>

        </nav>

</div>
</div>
</div><br>
    <br>
<div class="row">
    <div class="col-sm-6">
        <div class="viewpula">
<?php

$y='con';

echo "
<input type='text' name='ress' placeholder='view others..' id='searchv' >
  <button name='$y' class='btn btn-primary' type='submit'  >search</button>
 ";
 ?>
</div></div></div></div>
<div class="row">
<?php 
$d='con';
if(isset($_POST[$d]))

{

  
    
    $db= mysqli_connect('localhost','root','', 'movie')or die("could not connect database..");
$sc=$_POST['ress'];
$_SESSION['pip']=$sc;
$usernamed= $_SESSION['username'];
echo $sc;
$db= mysqli_connect('localhost','root','', 'movie')or die("could not connect database..");
$sql="SELECT DISTINCT users, act FROM activites WHERE users='$sc' ";
$resultf=mysqli_query($db, $sql);

while($rowv=mysqli_fetch_array($resultf))
{   
    $act=$rowv['users'];
    ?>
     <div class=' col-sm-3'>
      <div class="backe">
      <img  src="avatar.png">
      <h5>user: <?php echo $act ?></h5>
      <button type="submit" class="btn btn-primary" name="pf">View profile</button>
       </div>
       </div>

     <?php
}}
if(isset($_POST['pf']))
{

    $name=$_SESSION['pip'];
   
    header("location: borm.php?ID=$name");
  

}
?>

</div>

</form>
</body>
	  
	   </html>
	   