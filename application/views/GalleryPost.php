<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="well">
				<h3><?php echo $title2;?></h3>
				<p>by <?php
				if (isset($user))
				{
					echo '<a href="'.$base_url.'user/'.$user.'">';
					echo $user;
					echo '</a>';
				}
				else
				{
					echo 'Anonymous';
				}
				?> 
				<?php echo $timesince;?>
				<img src="https://s3.amazonaws.com/imgingdata/<?php echo $filename;?>" width="100%">
				<p><?php echo $description; ?></p>
				<hr>
				<img src="<?php echo base_url("assets/img/iconmonstr-arrow-81.svg"); ?>" width="50"><img src="<?php echo base_url("assets/img/iconmonstr-arrow-80.svg"); ?>" width="50"><br>
				<?php echo $views; ?> Views
			</div>
			<div class="well">
				<textarea class="form-control" id="newcomment" name="newcommment" rows="3"></textarea>
				remember the community rules <button type="button" class="btn btn-primary pull-right">Post</button>
			</div>
			<h4> ? COMMENTS</h4>
			<?php
			if (isset($comment))
			{
				foreach($comment as $row)
				{
					echo '<div class="well">';
					echo 'test';
					echo '</div>';
					$num++;
				}
			}
			?>
		</div>
		<div class="col-md-4">
		MOST VIRAL IMAGES
		</div>
	</div>
</div>
