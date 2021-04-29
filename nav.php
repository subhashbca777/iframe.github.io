<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">I-forms</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                

    <?php
      include 'connection.php';
      $drop = "select * from content limit 10";
      $es = mysqli_query($con,$drop);
      while($ex = mysqli_fetch_assoc($es))
      {
        echo "<li><a class='dropdown-item' href='threads.php?contant_id=$ex[c_id]'>".$ex['c_name']."</a></li>";
      }
    ?>


                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-success" type="submit">Button</button>
            </form>
                <input class="btn btn-primary m-1" type="button" value="signin"data-bs-toggle="modal" data-bs-target="#exampleModal">

                <?php
                session_start();
                if(isset($_SESSION['name']))
                {
                echo '<a href="logout.php"><input class="btn btn-primary m-1" type="button" value="logout" data-bs-toggle="modal" data-bs-target="#exampleModa2"></a>';
                }
                else
                {
                  echo '<input class="btn btn-primary m-1" type="button" value="login"data-bs-toggle="modal" data-bs-target="#exampleModa2">';
                }
                ?>
          </div>
        </div>
      </nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">signin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="signin.php">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="ps">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="cps">
                  </div>
                <button type="submit" class="btn btn-primary" name="sign">Submit</button>
              </form>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="exampleModa2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="login.php">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label" >Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="ps">
                </div>
                <button type="submit" class="btn btn-primary" name="login">Submit</button>
              </form>
        </div>
       
      </div>
    </div>
  </div>


