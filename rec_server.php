<?php 
// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'blog_cms');

// lets assume a user is logged in with id $user_id
$con = mysqli_connect('localhost','root');
  mysqli_select_db($con,'blog_cms');
  $email=$_SESSION['email'];

    $sql1="select * from users where email='$email'";
    $res1=mysqli_query($con,$sql1);
    $row1=mysqli_fetch_assoc($res1);
    $user_id =$row1["id"];

if (!$conn) {
  die("Error connecting to database: " . mysqli_connect_error($conn));
  exit();
}

// Get total number of  dashboard No. of total-posts for a particular post
function getupload($id)
{
  global $conn;
  $sql6 = "SELECT COUNT(*) FROM upload";
  $rsc6 = mysqli_query($conn, $sql6);
  $result3 = mysqli_fetch_array($rsc6);
  return $result3[0];
}

// Get total number of dashboard Your recent for a particular post
function getuser($id)
{
  global $conn;
  $sql5 = "SELECT COUNT(*) FROM users";
  $rsc = mysqli_query($conn, $sql5);
  $result2 = mysqli_fetch_array($rsc);
  return $result2[0];
}

// Get total number of recent for a particular post
function getrecnt($id)
{
  global $conn;
  $sql5 = "SELECT COUNT(*) FROM upload 
        WHERE rec_id = $id";
  $rsc = mysqli_query($conn, $sql5);
  $result2 = mysqli_fetch_array($rsc);
  return $result2[0];
}


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

// Get total number of likes and dislikes for a particular post
function getRating($id)
{
  global $conn;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM rating_info WHERE post_id = $id AND rating_action='like'";
  $dislikes_query = "SELECT COUNT(*) FROM rating_info 
            WHERE post_id = $id AND rating_action='dislike'";
  $likes_rs = mysqli_query($conn, $likes_query);
  $dislikes_rs = mysqli_query($conn, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
    'likes' => $likes[0],
    'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}

// Check if user already likes post or not
function userLiked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
        AND post_id=$post_id AND rating_action='like'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    return true;
  }else{
    return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
        AND post_id=$post_id AND rating_action='dislike'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    return true;
  }else{
    return false;
  }
}

$sql = "SELECT * FROM upload";
$result = mysqli_query($conn, $sql);
// fetch all posts from database
// return them as an associative array called $posts
$upload = mysqli_fetch_all($result, MYSQLI_ASSOC);

