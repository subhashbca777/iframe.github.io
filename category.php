<?php

include 'connection.php';

$data = "select * from `content`";
$query_ex = mysqli_query($con,$data);
while($res= mysqli_fetch_assoc($query_ex))
{
    $p = $res['c_data'];
echo " <div class='card m-2 ' style='width: 18rem;min-width:200px;'>
<h5 class='card-title'>$res[c_id]</h5>
<img src='img\mountains-1547302_1920.jpg' class='card-img-top' alt='...'>
<div class='card-body'>
  <h5 class='card-title'>$res[c_name]</h5>
  <p class='card-text'>".substr($p,0,50)."</p>
  <a href='threads.php?contant_id=$res[c_id]' class='btn btn-primary'>Go somewhere</a>
</div>
</div>";
}
?>