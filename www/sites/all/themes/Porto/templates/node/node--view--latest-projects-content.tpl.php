<div id="popupProject_<?php print $node->nid; ?>" class="popup-inline-content">
	<h2><?php print $title; ?></h2>

	<div class="row">
	  <?php if (render($content['field_image'])): ?>
		<div class="span6">
			<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="item">
		</div>
		<?php endif;?>

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
</div>