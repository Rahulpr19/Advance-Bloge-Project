<?php include "add2_comment.php"; ?>
<div class="card-panel">
<div class="row">
<div class="col-lg-9">
  <h3>Write Comment</h3>
<form action="postcom.php?id=<?php echo $id;?>" method="POST" id="comment_form"><br>
<div class="input-field">
  <label>Email:</label>
<?php
        $con = mysqli_connect('localhost','root');
          mysqli_select_db($con,'blog_cms');
          $email=$_SESSION['email'];
          $sql="select * from users where email='$email'";
          $res=mysqli_query($con,$sql);
          $row=mysqli_fetch_assoc($res);
          ?>

<?php echo "<input type=text name= email class=form-control value='".$row['email']. "'>" ?>
<label for="email" data-error="Invalid Email Format"></label>
</div><br>
<div class="input-field">  
<label>Comment:</label>
<textarea name="comment" id="comment_name" class="md-textarea form-control" rows="5" required="comment" placeholder="Your comment Goes Here..."></textarea>
</div><br>
<div class="center">
<input type="hidden" name="comment_id" id="comment_id" value="0" />
<input type="submit" value="Comment" name="submit" id="submit_comment" class="btn text-white">
</div><br>
</form>
</div>
</div>
</div>



<script type="text/javascript">
  function pop(){
  var x = document.getElementById('comment_id');
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
  }
</script>



