<?php

if(isset($_POST['sign']))
{
    include "connection.php";
    $email = $_POST['email'];
    $ps = $_POST['ps'];
    $cps = $_POST['cps'];

$insert = "select * from user where name='$email'";
$ex = mysqli_query($con,$insert);
$noem = mysqli_num_rows($ex);
if($noem==0)
{
    if($ps == $cps)
    {
        $ps = password_hash($ps,PASSWORD_BCRYPT);
        $inse_us = "insert into `user`(`name`, `ps`) values ('$email','$ps')";
        $em_ins = mysqli_query($con,$inse_us);
        $error ="<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>you siggned successfully !!! now you can login</strong><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
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