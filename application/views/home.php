<div class="container">
	<!-- Projects Row -->
	<div class="row">
		<?php
		if (isset($post))
		{
			$num=1;
			foreach($post as $row)
			{
				echo '<div class="col-xs-6 col-md-3">';
				echo '<a href="'.$base_url.'Gallery/'.$row->code.'" id="popoverData'.$num.'" data-content="'.$row->views.' views" rel="popover" data-placement="bottom" data-original-title="'.$row->title.'" data-trigger="hover" class="thumbnail">';
				echo '<img  class="img-responsive" src="https://s3.amazonaws.com/imgingdata/'.$row->filename.'" width="100%" height="250">';
				echo '</a>';
				echo '</div>';
				$num++;
			}
		}
		?>
    </div>
	<hr>
</div>
	
