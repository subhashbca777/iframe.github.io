<!doctype html>
<html lang="en">
  <head>
    <?php include 'link.php' ?>
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
    
    <div class="container">
    
<?php
    include 'connection.php';
        //question and discuss
        $q_id = $_GET['q_no'];
        $select_question = "select * from thread where t_id=$q_id";
        $que_ex = mysqli_query($con,$select_question);
        
        while($data = mysqli_fetch_assoc($que_ex))
        {
    echo " <div class='jumbotron m-4 p-2' style='background:silver;'>
  <h1 class='display-4'>$data[t_title]</h1>
  <p class='lead'>$data[t_des]</p>
  <hr class='my-4'>
  <p>$data[t_date]</p>
  <hr class='my-4'>
</div>";
        }
?>
    </div>
    <div class="container">
    <h4 style="text-align:center;">discuss</h4>
    <hr>
    </div>

<!-- comments -->
<?php
if(isset($_SESSION['name']))
{
echo "
<div class='container'><form method='post' action=".$_SERVER['REQUEST_URI'].">

  <div class='mb-3'>
  <textarea class='form-control' placeholder='Leave a comment here' id='floatingTextarea' name='comment'></textarea>
  </div>
  <button type='submit' class='btn btn-success' name='cm'>Submit</button>
</form>
</div>";
}
?>
<?php
   if(isset($_POST['cm']))
   {
     $com = $_POST['comment'];
     $com = str_ireplace(">","&gt",$com);
     $com = str_ireplace("<","&lt",$com);
     $user=$_SESSION['name'];
   $se_com = "insert into `comment`(`com`, `t_id`,`user`) values ('$com','$q_id','$user')";
   $insert = mysqli_query($con,$se_com);
   }
?>

<div class="container">
          <h5>comments</h5>




          <?php
$select_thread = "select * from `comment` where t_id=$q_id";
   $ex_th = mysqli_query($con,$select_thread);
  $dis = true;
   while($thread = mysqli_fetch_assoc($ex_th))
   {
     $dis = false;
    echo "<div class='media m-5 p-2' style='border:1px solid black;'>
    <img src='img\uname.jfif' height='40px' class='mr-3 d-inline' alt='...'  style='background:silver;'>
    <b>$thread[user]</b>
    <div class='media-body'>
      <p>$thread[com]</p>
      <span> $thread[c_time]</span>
    </div>
    <hr>
  </div>";
   }
   if($dis)
   {
    echo  "<div class='container'>
     <h3 style='text-align:center;'>not any comments are availabe</h3>
     <hr>
     </div>";
   }
?>

</div>




<!-- thread_form -->

<footer class="d-flex bg-dark" style="height:6vh;margin-top:41.5vh;">
  <p style="margin:auto;color:#fff;">this awesome website created by anjan subhash</p>
</footer >
  </body>
</html>

