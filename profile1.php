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
<script>
    function removef(movieId)
{
   
    $.ajax({
       url:"remove.php",
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
function watchf(movieId)
{
   
    $.ajax({
       url:"watch.php",
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
function notwatchf(movieId)
{
   
    $.ajax({
       url:"awatch.php",
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
               <li class="active" ><a href=>Profile</a></li>
                <li><a href="">Favourites</a></li>
               <li> <a href="index.php?logout='1'">logout</a> </li>
            </ul>

        </nav>

</div>
</div>
</div>




<div class="row">
<div class="col-sm-2">
<div class="navform">
<nav>

             <div class="pic_base">

             <img src="avatar.png" class="avatar">
             <div class="bame"><p><?php echo $_SESSION['username']; ?></p></div>
</div><ul>
               <li><a href="profile.php">Favourites</a></li>
               <li  class="active"><a href="profile1.php">YET TO WATCH</a></li>
           
            </ul>

        </nav>



</div>
</div>
<div class="col-sm-9">


<?php 
$usernamed= $_SESSION['username'];
$db= mysqli_connect('localhost','root','', 'movie')or die("could not connect database..");
$sql="SELECT DISTINCT favouritesid FROM `$usernamed` WHERE  status ='NEED TO WATCH';";
$result=mysqli_query($db, $sql);
echo "<div class='row'>";
echo"<div class='col-sm-6'>";?>
<?php while($row=mysqli_fetch_array($result)):?>
 <?php   $id=$row['favouritesid']; $url='http://www.omdbapi.com/?i='.$id.'&apikey=adc9f2be';
$api_json= file_get_contents($url);
$api_array=json_decode($api_json,true);

$poster=$api_array['Poster'];
$Title=$api_array['Title'];


echo"<div class='backa'>
       <div class='row'>
        <div class='col-sm-4'>
           <img src='$poster' class='thumbnail'/>
       </div>
   <div class='col-sm-8'>
<h4>$Title</h4>";
?>
<button  type='submit' onclick = "watchf('<?php echo $id ?>');"  class='btn btn-success'>WATCHED</button>

<?php
echo "<div class='sot'>";

echo "</div>
</div>
</div>
</div>" ;
?>


<?php endwhile;?>

</div>

</div></div></div>
</form>
</body>
	  
       </html>
       

