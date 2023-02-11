<?php
 	  include "includehome/header-home.php";
    include "includehome/home-navbar.php";
?>

<head>
	<style>
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


<center>
 <h1>Our People</h1>
 <h4 style="margin-bottom: 60px;">(We present for your help)</h4>
</center>

  <div class="row">
<div class="col-lg-6 col-md-4 col-12">

  <form method="POST" action="ourpeopleinsert.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Image</label>
   <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="file">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="description" class="md-textarea form-control" rows="5" placeholder="Your Description Goes Here..."></textarea>
  </div>

  <button type="submit" name="submit_ok" style="padding: 10px 20px; font-size: 15px; background-color:#000; border: none; border-radius: 5px; color: #fff;">Submit</button>
</form>
</div>

<div class="col-lg-6 col-md-3 col-12">
  <?php 
  include "socialmedia.php";
 ?>
</div>


</div>
</div>
<br><br>
<!--------------------Show and Edit Our People Detalis---------------------->

<div class="row">
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
          <img src="<?php echo $row['image'];?>" class="card-img-top responsive-img" style="height: 250px;">
          <div class="card-img-overlay ic">
          </div> 
        </div>
        <div class="card-content">
          <p><?php echo $row['description'];?></p>
   		</div>
   	</div>
        <a href="readmoreour.php?id=<?php echo $row['id'];?>"><span class="bt">Read More</span></a>

<!------------------Edit Button--------------------->
<div class="dropdown-divider"></div>
<div class="col-lg-12">
<span class="center">
  <a href="ourpeopleedit.php?id=<?php echo $row['id']; ?>" style="text-decoration: none;"><i class="fa fa-edit">
   </i> Edit</a>
  |<a href="delete.php?id=<?php echo $row['id']; ?>" onclick="DeleteUser()" class="delete" style="text-decoration: none;">
  	<i class="fa fa-delete"></i> Delete</a>
</span>
</div>
</div><br>
<?php 

}
}
 ?>
</div>

<!-------------------Footer------------------------->
<?php 
  include "includehome/footer.php";
 ?>




<?php 

$con = mysqli_connect('localhost','root');
					mysqli_select_db($con,'blog_cms');

			          $sql="select * from ourpeople";
			         $res=mysqli_query($con,$sql);
					$row=mysqli_fetch_assoc($res);

					if (isset($_POST['submit_ok'])) {
						
						
						$name = $_POST['name'];
						$files = $_FILES['file'];
						$description = $_POST['description'];

						//print_r($title);
						//echo "<br>";
						//print_r($body);

						$filename = $files['name'];
						//print_r($filename);

						$fileerror = $files['error'];
						$filetmp = $files['tmp_name'];

						$fileext = explode('.', $filename);
						$filecheck = strtolower(end($fileext));

						$fileextstored = array('png', 'jpg', 'jpeg');

						if (in_array($filecheck, $fileextstored)) {
							$destinationfile = 'images/'. $filename;
							move_uploaded_file($filetmp, $destinationfile);


							$q = "INSERT INTO `ourpeople`(`title`,`name`, `image` ,`description`)
							VALUES ('$filename' , '$name', '$destinationfile' ,'$description')";

							$query = mysqli_query($con, $q);

							 if($query)
							{
							header("Location: ourpeople.php");
							}
							else
							{
							 
							  header("Location: ourpeople.php");
							}
							}
							}
							

 ?>



