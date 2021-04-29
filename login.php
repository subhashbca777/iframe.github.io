<?php

if(isset($_POST['login']))
{
    include "connection.php";
    $email = $_POST['email'];
    $ps = $_POST['ps'];
$insert = "select * from user where name='$email'";
$ex = mysqli_query($con,$insert);
$noem = mysqli_num_rows($ex);
$data = mysqli_fetch_assoc($ex);
if($noem==1)
{
    if(password_verify($ps,$data['ps']))
    {
        $error ="<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>you logged successfully</strong><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        session_start();
        $_SESSION['logged']=true;
        $_SESSION['name'] = $email;
        header("location:index.php?error=$error");
        exit();
    }
    else
    {
        $error ="<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>invalid password</strong><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        header("location:index.php?error=$error");
        exit();
    }
}
else
{
    $error ="<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>invalid username</strong><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    header("location:index.php?error=$error");

}

}


?>