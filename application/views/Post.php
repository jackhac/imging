<div class="container">
<?php
if ($this->session->flashdata('status')==1)
{
	echo '<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!The image was uploaded successfully!</strong> 
</div>';
}
else if ($this->session->flashdata('status')==2)
{
	echo '<div class="alert alert-danger alert-dismissable">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error!</strong> The image failed to upload!
</div>';
}

?>

<div class="row">
	<div class="col-md-8">
		<h2><?php echo $title2;?></h2>
		<p>by <?php
				if (isset($user))
				{
					echo '<a href="'.$base_url.'user/index/'.$user.'">';
					echo $user;
					echo '</a>';
				}
				else
				{
					echo 'Anonymous';
				}
				?> <?php echo $timesince;?>
		<img src="https://s3.amazonaws.com/imgingdata/<?php echo $filename;?>" width="100%"><br>
		<div class="well">
		<button type="button" class="btn btn-primary glyphicon glyphicon-upload"></button>
		<button type="button" class="btn btn-primary glyphicon glyphicon-download"></button>
		<button type="button" class="btn btn-primary glyphicon glyphicon-heart-empty"></button><br>
		<?php echo $views;?> Views
		</div>
		
	</div>
	
	<div class="col-md-4">Most Viral<br>
	
</div>
      

</div>
