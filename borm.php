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
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="style1.css">
<script src= "main.js"></script>

<title>Home Page</title>
</head>
  <body>
 <form method="post">
  <div class="formx" >
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
             
               <li ><a href="index.php">Home</a></li>
               <li ><a href="profile.php">Profile</a></li>
               <li class="active"  ><a href="explore.php">connect others &#128104</a></li>
               <li> <a href="index.php?logout='1'">logout</a> </li>
            </ul>

        </nav>

</div>
</div>
<div id="output" class="row"></div>
</div>




<div class="row">
<div class="col-sm-2">
<div class="navform">
<nav>

             <div class="pic_base">

             <img src="avatar.png" class="avatar">
             <div class="bame"><p><?php echo $_SESSION['pip']; ?></p></div>
</div>

        </nav>



</div>
</div>
<div class="col-sm-6">
<div class="backab">
<h1>ACTIVITY</h1>
<?php
$usernameda= $_SESSION['pip'];
$db= mysqli_connect('localhost','root','', 'movie')or die("could not connect database..");
$sql="SELECT DISTINCT users, act FROM activites WHERE users='$usernameda' ";
$resultf=mysqli_query($db, $sql);

if($resultf)
{   $rowv=mysqli_fetch_array($resultf);
    $act=$rowv['act'];
?>
<?php if($act=='private'){?>
<button  type='submit' onclick="privatef()"  class='btn btn-basic'>PRIVATE  </button>
<?php }
}?>   
<ul class="list-group" >
    
    <?php 
$usernameda= $_SESSION['pip'];
$i=0;
$name=$usernameda.$i;
$db= mysqli_connect('localhost','root','', 'movie')or die("could not connect database..");
$sql="SELECT  * FROM `$name` ORDER BY `time` DESC ;";
$result=mysqli_query($db, $sql);

$usernameda= $_SESSION['pip'];
$db= mysqli_connect('localhost','root','', 'movie')or die("could not connect database..");
$sql="SELECT DISTINCT users, act FROM activites WHERE users='$usernameda' ";
$resultf=mysqli_query($db, $sql);

if($resultf)
{   $rowv=mysqli_fetch_array($resultf);
    $act=$rowv['act'];


    if($act=='not private'){
?>
<?php while($rows=mysqli_fetch_array($result)){?>
<?php  
$msg= $rows['message'];
$date=$rows['time'];

?> 

<li class="list-group-item"><strong><?php echo $date." "; ?></strong><?php echo $msg;?> </li>
    <?php }

  }
  if($act=='private'){
  ?>
<li class="list-group-item"><strong>SORRY! you can't view this profile's ACTIVITY</strong></li>

  <?php }
   }?>
</ul>
<?php 


?>
</div></div>
</div></div></div>
</form>
</body>
	  
       </html>
       

