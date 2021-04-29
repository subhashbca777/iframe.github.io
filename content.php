<?php
    include 'connection.php';
    $id = $_GET['contant_id'];
   echo $id;
   $select_data = "select * from `content` where c_id=$id";
   $select_query = mysqli_query($con,$select_data);
   $data = mysqli_fetch_assoc($select_query);
   print_r($data)

?>