<!--------------Cards------------------>
<main><br>
    <h4 style="margin-left: 30px;">Trending Blogs</h4>
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
<!---------------card------------------> 
<div class="media border p-3" style="background: #fff;">
<img src="<?php echo $row['image'];?>" alt="Jane Doe" class="mr-3 mt-3 rounded-circle" style="width:45px; height: 45px;">
  <div class="media-body">
    <h6><?php echo $row['head'];?> &nbsp; <small><?php echo $row['date']; ?></small></h6>
     <p></p>
      <a href="postcom.php?id=<?php echo $row['id'];?>" class="text-uppercase" style="text-decoration: none;">Read More</a>
  </div>
</div>
<?php 
}
}

 ?><br>
</main>