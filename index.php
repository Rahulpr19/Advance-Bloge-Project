<?php 

include "includehome/header-home.php";
include ('includehome/home-navbar.php');
?>

<body style="font-family: Palatino Linotype;">
<div class="row" style="background: #f44336; padding-top: 20px;">
  <div class="col-lg-6">
    <h4 class="text-uppercase text-white">hello user</h4>
  </div>
    <!--------------Search Bar----------------->
  <div class="col-lg-6">
     <?php include "search2.php"; ?>
  </div>
</div><br>

<!-----------MAin post part-------------->
<div class="row" style="background: #f44336;">
  <div class="col-lg-8"><br>
    <?php 
        // connect to database
        $conn = mysqli_connect('localhost', 'root', '', 'blog_cms'); 
        $sql = "SELECT * FROM upload";
        $result = mysqli_query($conn, $sql);
        $upload = mysqli_fetch_all($result, MYSQLI_ASSOC);
      ?>
    <?php foreach ($upload as $post): ?>


<div class="col lg-10 bg-white" style="border-radius: 20px;">
<!---------------card------------------> 
<img src="<?php echo $post['image'];?>" alt="Jane Doe" class="mr-3 mt-3 rounded-circle responsive-img" style="height:45px; width: 45px;">
<a href="profile.php?id=<?php echo $post['id'];?>" style="text-decoration: none;">
<span><?php echo $post['email']; ?></span>&nbsp;
(<span><?php echo $post['username']; ?></span>)
</a>
<span style="float: right;"><?php echo $post['date']; ?></span>
  <div class="media-body">
    <h6><?php echo $post['head'];?> &nbsp;</h6>
     <p><?php echo $post['body'];?></p>
      <a href="indexreadmore.php?id=<?php echo $post['id'];?>" style="text-decoration: none;">Read More</a>
  </div>

  <!------------------Like part--------------------->
  <div class="dropdown-divider" style="border-color: #fff;"></div>
  <div class="row">
    <div class="col-lg-8">
      <!-- if user likes post, style button differently -->
        <i class="fa fa-thumbs-o-up like-btn" style="color: red;"></i>
        <span class="likes"><?php echo getLikes($post['id']); ?></span>
        
        &nbsp;&nbsp;&nbsp;&nbsp;

      <!-- if user dislikes post, style button differently -->
        <i class="fa fa-thumbs-o-down dislike-btn" style="color: red;"></i>
        <span class="dislikes"><?php echo getDislikes($post['id']); ?></span>
      
      <!------------------Comment Part--------------------->
        <span class="" style="margin-left: 30px;">
            <i class="fa fa-comment" style="color: red;"></i>
            <span class="likes"><?php echo getcommt($post['id']); ?></span>
          </a>
        </span>

        <!---------------Share Part------------------->
        <span style="margin-left: 30px;">
          <i class="fa fa-share" style="color: red;"></i>
        </span>
    </div>
      <div class="col-lg-4">
        <span>views(<?php echo $post['view'];?>)</span>
      </div>
    </div>
<br>
</div><br>
    
   <?php endforeach ?>
  </div>

<!-- This is sidebar area-->
<div class="col-lg-4">
<?php include "trandingblog.php"; ?>
</div>
</div>
</div><!--------row div------------->
  <script src="scripts.js"></script>


</div>
<?php 
  include "includehome/footer.php";
 ?>

 <?php 
// Get total number of commnets for a particular post
function getcommt($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM comment 
        WHERE post_id = $id";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}
// Get total number of likes for a particular post
function getLikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM rating_info 
        WHERE post_id = $id AND rating_action='like'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM rating_info 
        WHERE post_id = $id AND rating_action='dislike'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}


 ?>


