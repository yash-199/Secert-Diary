<?php
session_start();
?>
<?php
include 'connect.php';

//check if form submit 

if(isset($_POST['submit'])){
    $diary = $_POST['diary'];

    if(!isset($diary) || $diary ==''){
       $error="Please Message";
       header("location:updatadatabase.php?error=".urlencode($error));
       exit();
    }else {
        $query="UPDATE users SET diary='$diary' WHERE email='$email'";

        if(!mysqli_query($con,$query)){
die('Error:'.mysqli_error($con));
        }else{
header('location:secert.php');
exit();
        }
    }

}
?>