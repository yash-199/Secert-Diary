<?php
require 'connect.php';
$error="";
if(isset($_GET['logout'])){
    unset($_SESSION);
    setCookie("id","",time()-60+60);
    $_COOKIE["id"]="";
}else if(isset($_SESSION["id"]) OR isset($_COOKIE["id"])){
    header("Location:secert.php");
}

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=base64_encode($password);
    $error="";
	if(!$_POST['email']){
		$error.="An email address is required<br>";
	}
	if(!$_POST['password']){
		$error .="A passcode is required";
	}
	if($error!=""){
		$error="<p>There were error(s) in your form</p>".$error;
    }else{
        if($_POST['signup']==1){
        $query="SELECT id FROM users Where email='$email' LIMIT 1";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0){
            $error="That email address is taken";
        }else{
            $query="INSERT INTO users(email,password)VALUES('$email','$password')";
            if(!mysqli_query($con,$query)){
                $error="<p>Could not sign you up - Please try again later.</p>";
            }else{
                if($_POST['stayLoggedIn']=='1'){
                    setCookie("id",mysqli_insert_id($con),time()+60+60+24+365);
                }
                header("Location:secert.php");
            }
        }
    }else{
        if($_POST['stayLoggedIn']=='1'){
            setCookie("id",$row['id'],time()+60+60+24+365);
        }
        header("Location:secert.php");        
    }
    }
}
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
<title>Secert Diary</title>
</head>
<body>

<div class="container-fluid">
<img src="1204217.jpg" alt="Nature" class="responsive">
<div class="text-block">
<h1>Secert Dairy</h1>
<h5><strong>Store your thought permanently and securely.</strong></h5>
<br>
<p>Interested? Sign up now.</p>
<br>    
<div id="error" style="background-color:white;color:red;"><?php 
echo $error; ?></div>
<br>
<form method="POST" id="signUpForm">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email">
  </div>
  <div class="form-group">
    <input type="password" id="pass" class="form-control" data-type="password" name="password" 
    placeholder="Passcode">
<span class="show-pass" id="show-pass" onclick="toggle()">
<i class="fa fa-eye" onclick="myFunction(this)"></i>
</span>
  </div>
  <div class="form-check">
    <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="stayLoggedIn" value=1>Stay logged in
    <input type="hidden" name="signup" value="1">
    </label>
  </div>
  <button type="submit" class="btn btn-success" name="submit">Sign Up!</button>
  <br>
  <br>
  <p><a class="toggleForms">Log In</a></p>
</form>
<form method="POST" id="logInForm" onsubmit=" return validate()">
  <div class="form" >
  <p>Log is using your username and password.</p>
    <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email">
  </div>
  <br>
  <div class="form-group">
    <input type="password" id="pass" class="form-control" data-type="password" name="password" 
    placeholder="Passcode">
<span class="show-pass" id="show-pass" onclick="toggle()">
<i class="fa fa-eye" onclick="myFunction(this)"></i>
</span>
  </div>
  <br>
  <div class="form-check">
    <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="stayLoggedIn" value=1>Stay logged in
    <input type="hidden" name="signup" value="0">
    </label>
  </div>
  <button type="submit" class="btn btn-success" name="submit">Log In!</button>
  <br>
  <br>
  <p><a class="toggleForms">Sign Up</a></p>  
</form>
</div>
</div>
</div>
<script type="text/javascript">
$(".toggleForms").click(function(){

    $("#signUpForm").toggle();
    $("#logInForm").toggle();
});
</script>
</body>
</html>