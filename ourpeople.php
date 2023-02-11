<?php
 	  include "includehome/header-home.php";
    include "includehome/home-navbar.php";
?>

<head>
  <style>
    body{
      font-family: Palatino Linotype;
    }
  	.card{
  		border: 2px solid #ddd;
  	}
    .card-content p{
      padding: 10px 10px;
    }
    .card-title{
    	padding: 10px;
    	text-align: center;
    }
    .bt{
      background-color: #f44336;
      border: none;
      width: 100%;
      height: 35px;
      line-height: 35px;
      display: inline-block;
      text-align: center;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
    }
    .ic{
      margin-top: 260px;
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

<!----------------main card  people----------------------->
<div class="card-panel" style="border: 1px solid #ddd; background: #f44336;"><br>
 <h1 class="text-center">Our People</h1>
 <h4 class="text-center">(We present for your help)</h4><br>
<div class="row  bg-white p-2 m-4">

      <?php

      	$con = mysqli_connect('localhost','root');
		mysqli_select_db($con,'blog_cms');

		
        $sql="select * from ourpeople order by id limit 4";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0)
        {
          while($row=mysqli_fetch_assoc($res))
          {
        ?>

      <div class="col-lg-3">
       <div class="card">
       	<span class="card-title text-uppercase"><?php echo $row['name'];?></span>
        <div class="card-image">
          <img src="<?php echo $row['image'];?>" class="card-img-top" style="height: 250px;">
          <div class="card-img-overlay ic">
          </div> 
        </div>
        <div class="card-content">
          <p><?php echo $row['description'];?></p>
   		</div>
   	</div>
        <a href="readmoreour.php?id=<?php echo $row['id'];?>"><span class="bt">Read More</span></a>
    </div><br>
<?php 

}
}
 ?>
</div>
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

<!-------------------------Some footer--------------------------------->
<br><br><br><br>
<div class="dropdown-divider"></div><br>
<!--------------down card------------------>
<center>
<h1 class="text-uppercase">Our Services</h1>
<h4>(We present for your help)</h4><br>
<h6 class="text-uppercase text-center">contact Us:</h6>
    <div class="row bg-white m-4">
      <div class="col-lg-1"></div>
      <div class="col-lg-3">
        <div class="card m-3" style="border:1px solid #ddd;">
          <a href="#"><img src="image/you.png" class="card-img-top" alt="" style="height: 150px; width: 150px;"></a>
          <div class="card-body">
            <a href="#"><p>visit on youtube</p></a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-12">
        <div class="card m-3" style="border:1px solid #ddd;">
          <a href="#"><img src="image/googli.png" class="card-img-top" alt="" style="height: 150px; width: 150px;"></a>
          <div class="card-body">
            <a href="#"><p>visit on G-mail</p></a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-12">
        <div class="card m-3" style="border:1px solid #ddd;">
          <a href="#"><img src="image/play.png" class="card-img-top" alt="" style="height: 150px; width: 150px;"></a>
          <div class="card-body">
            <a href="#"><p>App  are available</p></a>
          </div>
        </div>
      </div>
    </div>
  </center>
    <br><br>

</div>
</div>
<?php 
  include "includehome/footer.php";
 ?>
