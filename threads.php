<!doctype html>
<html lang="en">
  <head>
    <?php include 'link.php'; 
    include 'connection.php';
    $id2 = $_GET['contant_id']; ?>
    <title>I-FORMS</title>
  </head>
  <body>
     
    <!-- VAN SECTION -->
  <?php include 'nav.php'?>  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">signin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModa2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
       
      </div>
    </div>
  </div>
     
     <!-- jambo drop -->
<?php
     include 'connection.php';
    $id = $_GET['contant_id'];
   $select_data = "select * from `content` where c_id=$id";
   $select_query = mysqli_query($con,$select_data);
while($data = mysqli_fetch_assoc($select_query))
    echo " <div class='jumbotron m-4 p-2' style='background:silver;'>
  <h1 class='display-4'>$data[c_name]</h1>
  <p class='lead'>$data[c_data]</p>
  <hr class='my-4'>
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <hr class='my-4'>
</div>";


?>
<?php
if(isset($_SESSION['name']))
{
  echo "<div class='container'><form method='post' action=".$_SERVER['REQUEST_URI'].">
  <div class='mb-3'>
    <label for='exampleInputEmail1' class='form-label'>question name </label>
    <input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' name='q_title'>
   </div>
    <div class='mb-3'>
  <textarea class='form-control' placeholder='Leave a comment here' id='floatingTextarea' name='q_des'></textarea>
  </div>
  <button type='submit' class='btn btn-success' name='post'>Submit</button>
</form>
</div>";
}

else
{
  echo '<div class="container>
  <h4>if you want to add question please signinin and login</h4>
  </div>
  ';
}
?>

<?php

if(isset($_POST['post']))
{
  $title = $_POST['q_title'];
  $title = str_ireplace("<","&lt",$title);
  $title = str_ireplace(">","&gt",$title);
  $dec = $_POST['q_des'];
 $dec = str_ireplace("<","&lt",$dec);
 $dec = str_ireplace(">","&gt",$dec);

  $c_n = $data['c_name'];
  $name = $_SESSION['name'];
$insert_qu = "insert into `thread`(`t_title`, `t_des`, `t_c_name`, `t_c_id`,`user`) values ('$title','$dec','$c_n','$id2','$name')";
$ok= mysqli_query($con,$insert_qu);
}
?>



















<div class="container">
<h3>browse question ???</h3>
<hr>
</div>

<?php
$select_thread = "select * from `thread` where t_c_id=$id2";
   $ex_th = mysqli_query($con,$select_thread);
  $dis = true;
   while($thread = mysqli_fetch_assoc($ex_th))
   {
     $dis = false;
    echo "<div class='media m-5 p-2' style='border:1px solid black;'>
    <img src='img\uname.jfif' height='40px' class='mr-3 d-inline' alt='...'  style='background:silver;'>
    <span>$thread[user]</span>
    <div class='media-body'>
      <h5 class='mt-0'><a href='discuss.php?q_no=$thread[t_id]'>$thread[t_title]</a></h5>
      <p>$thread[t_des]</p>
      <span> $thread[t_date]</span>
    </div>
    <hr>
  </div>";
   }
   if($dis)
   {
    echo  "<div class='container'>
     <h3 style='text-align:center;'>not any question</h3>
     <hr>
     </div>";
   }
?>





<footer class="d-flex bg-dark" style="height:6vh;margin-top:29.4vh;">
  <p style="margin:auto;color:#fff;">this awesome website created by anjan subhash</p>
</footer >
  </body>
</html>

