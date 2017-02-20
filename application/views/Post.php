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
	<h2><input class="form-control input-lg" name="title2" id="title2" placeholder="Give your post a title..." value="<?php echo $title2;?>"></h2>
		<p>by  	<?php
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
		<img src="https://s3.amazonaws.com/imgingdata/<?php echo $filename;?>" width="100%"><br>
		<textarea id="description" name="description" placeholder="Image description" class="form-control" rows="3"></textarea>
		
		<div class="list-group">
			<button type="button" class="list-group-item" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add another Image</button>
		</div>
	</div>
	<div class="col-md-4">
		<button type="button" class="btn btn-danger form-control">Share to community</button><br><br>
		<select class="form-control">
			<?php
			for ($x = 0; $x < count($topics); $x++)
			{
				echo '<option>';
				echo $topics[$x];
				echo '</option>';
			}
			?>
		</select><br><br>
			<input id="copyurl" name="copyurl" class="form-control"><br>
			<button type="button" class="btn btn-default form-control">Copy</button> <br><br>
		<div class="list-group">
			<button type="button" class="list-group-item" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add more images</button>
			<button type="button" class="list-group-item"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Post</button>
		</div>
	</div>
</div>