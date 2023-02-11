<?php
    include "includehome/header-home.php";
    include "includehome/home-navbar.php";
    include "includehome/dbuserexit.php";
?>

<div class="row" style="background: #f44336;">
  <div class="col-lg-1"></div>
<!--main post ares area-->
<div class="col-lg-10 col-md-8 col-12"><br>
<?php

$con = mysqli_connect('localhost','root');
  mysqli_select_db($con,'blog_cms');

if(isset($_GET['id']))
{
  
  $id=$_GET['id'];
  $id=mysqli_real_escape_string($con,$id);
  $sql="select * from upload where id=$id";
  $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0)
  {
    $sql2="select view from upload where id=$id";
    $res2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($res2);
    $view=$row2['view'];
    $view=$view+1;
    $sql3="update upload set view=$view where id=$id";
    mysqli_query($con,$sql3);
    $row=mysqli_fetch_assoc($res);
    $head=$row['head'];
    $body=$row['body'];
    
?>
<div class="card-panel" style="border: 1px solid #ddd; margin-top: 50px; padding: 20px; background-color: #f8f9faed;">
 <a href="#" data-toggle="modal" data-target="#exampleModal">
  <img src="<?php echo $row['image'];?>" alt="Jane Doe" class="mr-3 mt-3 rounded-circle" style="width:120px; height: 120px;">
</a>
<!----------Image Viewer--------------->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <span class="modal-title" id="exampleModalLabel"><img src="<?php echo $row['image'];?>" alt="" style="max-width: 100%; box-shadow: black;"></span>
    </div>
  </div>
</div>

<!--------------End Img Viewer------------------>

<h4 class="text-center"><?php echo ucwords($head);?></h4><br>
<p class="flow-text"><?php echo ucwords($body);?></p><br>
</div>
<div class="card-panel" style="background-color: #f8f9faed;">
<div class="dropdown-divider"></div><br>
<div class="row">
<div class="col lg-8 offset-lg-2 col-md-10 offset-m1 col-s-12">

<?php
if(isset($_SESSION['message']))
{
  echo $_SESSION['message'];
  unset($_SESSION['message']);
}
?>

<!-----------Comment Part------------>
<?php include "comments/commentpage.php"; ?>
<!-- Display total number of comments on this post  -->
<?php 

$sql1="select count(id) as total from comment WHERE post_id = $id";
$res=mysqli_query($con,$sql1);
$values=mysqli_fetch_assoc($res);
$num_row=$values['total'];

 ?>
<h4>Comment(<span><?php echo $num_row; ?></span>)</h4>
<?php include "comments/fetch_comment.php"; ?>
</div>
</div>
</div>
<br><br>

<h3>Related Blogs</h3><br>
<div class="row" style="background: #fff;">
<?php
$sql="select * from upload order by rand() limit 3";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0)
{
  while($row=mysqli_fetch_assoc($res))
  {
?>
<div class="col-lg-4 p-2">
       <div class="card">
        <div class="card-image">
          <img src="<?php echo $row['image'];?>" class="card-img-top responsive-img" style="max-width: 350px; max-height: 280px;">
          <div class="card-img-overlay ic">
            <span class="card-title text-white head"><?php echo $row['head'];?></span>
          <a class="btn-floating" href="postcom.php?id=<?php echo $row['id'];?>"><i class="fa fa-share" style="background-color: #f44336; float: right; color: #fff; padding: 10px 10px; border-radius: 100%;"></i></a>
          </div>  
        </div>
        <div class="card-content">
          <p><?php echo $row['body'];?></p>
        </div>
      </div>
    </div>
<?php
  }
}
?>
</div><br><br>
</div>
<?php
}
}
?>
</div>
</div>

</div>
</div>

<script>
    $(document).ready(function(){

        $('.col-lg-4').hover(
            // trigger when mouse hover
            function(){
                $(this).animate({
                    marginTop: "-=1%",
                },100);
            },

            // trigger when mouse out
            function(){
                $(this).animate({
                    marginTop: "0%"
                },100);
            }
        );
    });


function pop(){
  var x = document.getElementById('more');
  if(x.style.display === "none"){
    x.style.display ="block";
      }else {
    x.style.display ="none";
      }
    }
</script>

<?php include "includehome/footer.php"; ?>

