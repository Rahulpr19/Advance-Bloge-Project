<?php include('server.php') ?>
<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'blog_cms');
                 
$email=$_SESSION['email'];

                $sql="select * from users where email='$email'";
               $res=mysqli_query($db,$sql);
          $row=mysqli_fetch_assoc($res);
             $id=$row["id"];
// REGISTER USER
if(isset($_POST['submit_add']))
{

  // receive all input values from the form
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $birth = mysqli_real_escape_string($db, $_POST['birth']);
  $institute = mysqli_real_escape_string($db, $_POST['institute']);
  $bio = mysqli_real_escape_string($db, $_POST['bio']);
   
    $query = "INSERT INTO add_details (location, pincode, birth, institute, bio, your_id)
          VALUES('$location', '$pincode', '$birth', '$institute', '$bio',$id )";
    mysqli_query($db, $query);
   header("Location: profileinfo.php");
   } 

 ?>