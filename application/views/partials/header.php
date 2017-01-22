<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
	<!-- Optional theme -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap_new.css"); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/custom.min.css"); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/default.css"); ?>" />
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" >
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand" href="<?php echo $base_url;?>">IMGing</a> 
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li>
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
				New Post
				</button>
			</li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
		  <?php
		  if (isset($_SESSION['logged_in']))
		  {
			  $login_data=$_SESSION['logged_in'];
			  //echo $login_data;
			  echo '<li><a href="'.$base_url.'account/logout" <a href="#">Logout</a></li>';
			  echo '<li><a href="'.$base_url.'account/profile" <a href="#">'.$login_data.'</a></li>';
		  }
		  else
		  {
			  echo '<li><a href="'.$base_url.'account/loginform">Login</a></li>
              <li><a href="'.$base_url.'account/registerform">Register</a></li>';
		  }
		  ?> 
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Upload Image</h4>  
      </div>
      <div class="modal-body">
		<?php echo validation_errors(); ?>
		<?php echo form_open_multipart('home/upload');?>
			<input class="form-control" name="title2" id="title2" placeholder="Give your post a title..."><br>
			<input name="file" id="file" type="file" /><br>
			<button type="submit" class="btn btn-primary">Upload</button>
		</form>
      </div>
    </div>
  </div>
</div>