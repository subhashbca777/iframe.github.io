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
 
  </div>
  <?php
  if(isset($_GET['error']))
  {
    $er = $_GET['error'];
    echo $er;
  }
  
  ?>
      <!-- slider -->
      <div class="container d-flex p-2 ">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img\mountain-477832_1920.jpg" class="d-block w-100" alt=".." style="height: 60vh;">
          </div>
          <div class="carousel-item">
            <img src="img/mountains-1899264_1920.jpg" class="d-block w-100" alt="..." style="height: 60vh;">
          </div>
          <div class="carousel-item">
            <img src="img/lake-1581879_1920.jpg" class="d-block w-100" alt="..." style="height: 60vh;">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>

      <!-- cards -->
<div class="container d-flex" style="flex-wrap:wrap;">
     <?php include 'category.php '?>
</div>
<footer class="d-flex bg-dark" style="height:6vh; ">
  <p style="margin:auto;color:#fff;">this awesome website created by anjan subhash</p>
</footer >
  </body>
</html>

