<head>
  <style>
    .card-content p{
      padding: 10px 10px;
    }
    .more{
      background-color: #f44336;
      float: right;
      color: #fff;
      padding: 10px 10px;
      border-radius: 100%;
    }
    .ic{
      margin-top: 210px;
      display: flex;
      justify-content: space-around;
    }
    .card:hover{
    -webkit-box-shadow: -1px 9px 30px -12px rgba(0,0,0,0.75);
    -moz-box-shadow: -1px 9px 30px -12px rgba(0,0,0,0.75);
    box-shadow: -1px 9px 30px -12px rgba(0, 0, 0, 0.75);
    }
    .tex a{
        text-decoration: none;
    }
    .tex{
      font-size: 150%;
      line-height: 180px;
      margin-left: 70px;
      color: 
    }



  </style>
</head>
<!--------------Cards------------------>
<main style="background: #f44336;"><br>
    <h3 style="margin-left: 50px;">Related Blogs</h3><br>
    <div style="background: #fff; margin-left: 20px; margin-right: 20px;"><br>
    <div class="row">
      <?php
        $sql="select * from upload order by rand() limit 4";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0)
        {
          while($row=mysqli_fetch_assoc($res))
          {
        ?>

      <div class="col-lg-3">
       <div class="card" style="height: 400px; overflow: auto;">
        <div class="card-image">
          <img src="<?php echo $row['image'];?>" class="card-img-top" style="height: 250px; max-width: 100%;">
          <div class="card-img-overlay ic">
            <span class="card-title text-white"><?php echo $row['head'];?></span>
          <a class="btn-floating" href="postcom.php?id=<?php echo $row['id'];?>"><i class="fa fa-book more" aria-hidden="true"></i></a>
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
    
    </div>
  </div><br><br>
</main>

<script>
    $(document).ready(function(){

        $('.col-lg-3').hover(
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
</script>



