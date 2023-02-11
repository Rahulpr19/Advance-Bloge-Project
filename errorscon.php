<?php  if (count($errorscon) > 0) : ?>
  <div class="error">
  	<?php foreach ($errorscon as $errorcon) : ?>
  	  <p><?php echo $errorcon ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
