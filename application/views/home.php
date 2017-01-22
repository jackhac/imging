	<div class="container">
        <!-- Projects Row -->
        <div class="row">
		<?php
		if (isset($post))
		{
			$num=1;
			foreach($post as $row)
			{
				echo '<div class="col-md-3 portfolio-item">';
				echo '<a href="'.$base_url.'A/index/'.$row->id.'" id="popoverData'.$num.'" data-content="'.$row->views.' views" rel="popover" data-placement="bottom" data-original-title="'.$row->title.'" data-trigger="hover">';
				echo '<img  class="img-responsive" src="https://s3.amazonaws.com/imgingdata/'.$row->filename.'">';
				echo '</a>';
				echo '</div>';
				$num++;
			}
		}
		?>
        </div>

        <hr>

    </div>
	
