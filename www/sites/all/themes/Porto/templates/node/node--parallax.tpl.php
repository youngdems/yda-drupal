<?php

/**
 * @file node--parallax.tpl.php
 * Porto's node template for the Parallax content type.
 */
?>

<section class="parallax" data-stellar-background-ratio="0.5" style="background-image: url(<?php if (render($content['field_image'])) { echo file_create_url($node->field_image['und'][0]['uri']); } ?>);">
	<div class="container">
		<div class="row center">
			<div class="span12">
			
			  <?php if (render($content['field_parallax_icon'])) :?>
				  <i class="icon icon-featured <?php print render($content['field_parallax_icon']); ?>" data-appear-animation="bounceIn"></i>
				<?php endif; ?>
				
				<?php if (render($content['field_big_caption'])) :?>
				  <h1 class="short text-shadow big <?php print render($content['field_text_color']); ?> bold"><strong><?php print render($content['field_big_caption']); ?></strong></h1>
				<?php endif; ?>
				
				<?php if (render($content['field_small_caption'])) :?>
				  <h3 class="lead <?php print render($content['field_text_color']); ?>"><?php print render($content['field_small_caption']); ?></h3>
				<?php endif; ?>
				
			</div>
		</div>
	</div>
</section>