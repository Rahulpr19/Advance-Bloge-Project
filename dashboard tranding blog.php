<head>
  <style>

    .card:hover{
    -webkit-box-shadow: -1px 9px 30px -12px rgba(0,0,0,0.75);
    -moz-box-shadow: -1px 9px 30px -12px rgba(0,0,0,0.75);
    box-shadow: -1px 9px 30px -12px rgba(0, 0, 0, 0.75);
    }
    .tex a{
        text-decoration: none;
    }
.ic{

      justify-content: space-around;
    }

  </style>
</head>

    <h4 style="font-family: Palatino Linotype;">Trending Blogs</h4>
    <div class="row">
      <?php
      $con = mysqli_connect('localhost','root');
        mysqli_select_db($con,'blog_cms');

        $sql="select * from upload order by view DESC limit 3";
        $res=mysqli_query($con,$sql);

        if(mysqli_num_rows($res)>0)
        {
          while($row=mysqli_fetch_assoc($res))
          {
        ?>

<!--------------Cards------------------>
  <div class="col-lg-4">
    <a class="nav-link" href="postcom.php?id=<?php echo $row['id'];?>">
    <div class="card" style="background: transparent; height: 350px; overflow: auto;">
      <div class="card-image">
          <img src="<?php echo $row['image'];?>" class="card-img-top" style="height: 220px;">
          <div class="card-img-overlay">
            <span class="card-title text-white"><?php echo $row['head'];?></span>
          </div>  
        </div>
      <span  style="color: #000;"><?php echo $row['body'];?></span>
    </div></a>
  </div>
<?php 
}
}

 ?>
</div>