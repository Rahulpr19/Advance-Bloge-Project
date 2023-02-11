<head>
  <style>
    .box{
      border: 1px solid #ddd;
      width: 75%; 
      padding: 6px; 
      align-item:left; 
      margin-bottom:4px;
    }
  </style>
</head>

<div id="previous">
<?php

$sql="select * from comment where post_id=$id order by id DESC";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0)
{
  while($row=mysqli_fetch_assoc($res))
  {
?>
<div class="box">
  <div class="panel-heading">
    By <a href="profileinfo2.php?id=<?php echo $row['id']; ?>" style="text-decoration:none;">
      <b><?php echo $row['email']; ?></b></a>
        <span style="float: right; color: #000; cursor: text; font-size: 13px;">
          <i><?php echo $row["date"]; ?></i>
        </span>
      </div>
  <div class="panel-body"><?php echo $row["comment_text"] ?></div>
  <div class="row">
  <div class="col-lg-10">
    <a href="editcomment.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color:#000;"><i class="fa fa-edit"></i> Edit</a>
    <button onclick="reply()" style="border-radius: 3px; float: right;">Reply</button>
  </div>
  <div class="col-lg-2">
  <div class="panel-footer">
    
  </div>
  </div>
 </div>
</div>

<?php

  }
}
?>
</div>

<script type="text/javascript">
  function pop2(){
  var x = document.getElementById('more');
  if(x.style.display === "none"){
  x.style.display ="block";
  }else {
  x.style.display ="none";
  }
  }

function reply(){
  var x = document.getElementById('comment_id');
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
  }

</script>

