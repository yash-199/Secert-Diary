<?php
session_start();
if(array_key_exists("id",$_COOKIE)){
    $_SESSION['id']=$_COOKIE['id'];
}
if(array_key_exists("id",$_SESSION)){
}else{
    header("Location:index.php");
}  
?>

<?php
require 'connect.php';
$result="SELECT * FROM users";
$query= mysqli_query($con,$result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,iniial-scale=1.0">
<meta http-equiv="X-UA-Compataible" content="ie=edge">
<link rel="shortcut icon" type="image/logo" href="secret-diary-956733.png">
<link rel="stylesheet" href="https://use.fontawesome.com/release/v5.2.0/css/all.css" 
intergrity="sha384-hWVjflwFxL6sNzntih27bkxkr27Pmbbk/iSvj+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="javascript.js"></script>
<title>Secert Dairy</title>
</head>

<body>
<nav class="navbar navbar-light bg-faded">
<a class="navbar-brand" href="#">Secert Diary</a>
<div class="pull-xs-right">
<a href='#'><button class="btn btn-success-outline"  type="submit">Save</button></a>
<a href='index.php?logout=1'><button class="btn btn-success-outline" type="submit">Logout</a></button>
</nav>
</div>
<div id="shouts">
    
 <img src="1204217.jpg" alt="Nature" class="responsive">
 <form method="POST" action="updatedatabase.php">
 <div class="container-fluid">
    <textarea id="diary" class="form-control" name="diary">
    <?php while($row = mysqli_fetch_assoc($query)):?>
    <?php echo $row['diary'];?>
    <?php endwhile;
    ?>
     </textarea>
    <input  class="shout-btn" type="submit" name="submit" value="submit">
    </form>
</div>


