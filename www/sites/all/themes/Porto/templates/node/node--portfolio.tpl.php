<div class="row portfolio-wrap">
	<div class="span6">
	  <div class="flexslider flexslider-center-mobile flexslider-simple" data-plugin-options='{"animation":"slide", "animationLoop": true, "maxVisibleItems": 1}'>
	    <ul class="slides">
	      <?php print render ($content['field_image']); ?>
	    </ul>
	  </div>  
	</div>
	<div class="span6">
	<?php
	  // Hide comments, tags, and links now so that we can render them later.
	  hide($content['field_portfolio_slider']);
	  hide($content['field_image']);
	  hide($content['links']);
	  hide($content['field_portfolio_category']);
	  print render($content);
  ?>
	</div>
</div>