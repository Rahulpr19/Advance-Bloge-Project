<?PHP

					$con = mysqli_connect('localhost','root');
					mysqli_select_db($con,'blog_cms');
					$query = " SELECT * FROM `upload` order by id ASC ";

							$queryfire = mysqli_query($con, $query);

							$num = mysqli_num_rows($queryfire);

							if(mysqli_num_rows($queryfire)>0)
							{
							while($row=mysqli_fetch_assoc($queryfire))
							{

								?>
								<div class="col-lg-4">
								<div class="card-body">
									<h6 class="card-title bg-info text-white p-2 text-uppercase">
									<?php echo $row['head'];  ?>
								</h6>
						     	<img src="<?php echo $row['image'];  ?>" alt="" class="img-fluid mb-2" width="350" height="300">
						     	<div class="card-body">
						<?php echo $row['body'];  ?>
					</div>
						     </div>
						 </div>
		     <?php 

		 }
		}

		      ?>