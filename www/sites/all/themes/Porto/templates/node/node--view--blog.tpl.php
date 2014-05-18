<?php 

if ($items = field_get_items('node', $node, 'field_image')) {
  if (count($items) == 1) {
    $image_slide = 'false';
  }
  elseif (count($items) > 1) {
    $image_slide = 'true';
  }
  
  $uid = user_load($node->uid);
  $profile = profile2_load_by_user($uid, 'main');
}

?>
<?php if (theme_get_setting('blog_image') == 'full'): ?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post post-large-image blog-single-post"<?php print $attributes; ?>>

  <?php if (render($content['field_image'])) : ?> 
	  
	  <?php if ($image_slide == 'true'): ?>
		  <div class="post-image">
			  <div class="flexslider flexslider-center-mobile flexslider-simple" data-plugin-options='{"animation":"slide", "animationLoop": true, "maxVisibleItems": 1}'>
			    <ul class="slides">
					  <?php if (render($content['field_image'])) : ?>
					    <?php print render($content['field_image']); ?>
					  <?php endif; ?>
			    </ul>
			  </div>    
			</div>
		<?php endif; ?>
			
		<?php if ($image_slide == 'false'): ?>
		  <div class="single-post-image">
		    <?php print render($content['field_image']); ?>
		  </div>  
		<?php endif; ?>
			
  <?php endif; ?>
  
  <?php if ($display_submitted): ?>
    <div class="post-date">
			<span class="day"><?php print format_date($node->created, 'custom', 'd'); ?></span>
			<span class="month"><?php print format_date($node->created, 'custom', 'M'); ?></span>
		</div>
	<?php endif; ?>	
	
	<div class="post-content">

	  <?php print render($title_prefix); ?>
	    <h2 <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
	  <?php print render($title_suffix); ?>
	    
	  <?php if ($display_submitted && !$teaser): ?>
	  
	    <div class="post-meta">
				<span class="post-meta-user"><i class="icon-user"></i> <?php print t('By'); ?> <?php print $name; ?> </span>
				<?php if (render($content['field_tags'])): ?> 
				  <span class="post-meta-tag"><i class="icon-tag"></i> <?php print render($content['field_tags']); ?> </span>
				<?php endif; ?> 
				<span class="post-meta-comments"><i class="icon-comments"></i> <a href="<?php print $node_url;?>/#comments"><?php print $comment_count; ?> <?php print t('Comment'); ?><?php if ($comment_count != "1" ) { echo "s"; } ?></a></span>
			</div>
		
	  <?php endif; ?>
	   
	  <div class="article_content"<?php print $content_attributes; ?>>
	    <?php
	      // Hide comments, tags, and links now so that we can render them later.
	      hide($content['taxonomy_forums']);
	      hide($content['comments']);
	      hide($content['links']);
	      hide($content['field_tags']);
	      hide($content['field_image']);
	      hide($content['field_thumbnail']);
	      print render($content);
	    ?>
	  </div>
	  
		  <?php if (!$page && $teaser): ?>
	  
	    <div class="post-meta">
				<span class="post-meta-user"><i class="icon-user"></i> <?php print t('By'); ?> <?php print $name; ?></span>
				<?php if (render($content['field_tags'])): ?> 
				  <span class="post-meta-tag"><i class="icon-tag"></i> <?php print render($content['field_tags']); ?> </span>
				<?php endif; ?> 
				<span class="post-meta-comments"><i class="icon-comments"></i> <a href="<?php print $node_url;?>/#comments"><?php print $comment_count; ?> <?php print t('Comment'); ?><?php if ($comment_count != "1" ) { echo "s"; } ?></a></span>
				<a href="<?php print $node_url; ?>" class="btn btn-mini btn-primary pull-right"><?php print t('Read more...');?></a>
			</div>
		
	  
	  <?php endif; ?>
	  
	  <?php if(!$teaser): ?>
	  <div class="post-block post-share">
			<h3><i class="icon-share"></i><?php print t('Share this post'); ?></h3>

			<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style ">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_pinterest_pinit"></a>
				<a class="addthis_counter addthis_pill_style"></a>
			</div>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
			<!-- AddThis Button END -->

		</div>
	  
	  <div class="post-block post-author clearfix">
			<h3><i class="icon-user"></i><?php print t('Author'); ?></h3>
			<div class="thumbnail">
			 <?php print $user_picture; ?>
			</div>
			<p><strong class="name"><?php print $name; ?> </strong></p>
		    <?php if (isset($profile->field_bio['und'][0]['value'])): ?>
          <?php print ($profile->field_bio['und'][0]['value']); ?>
        <?php endif; ?>
		</div>
		<?php endif; ?>  
  
	</div>
  
  <?php print render($content['comments']); ?>

</article>
<?php endif; ?>

<?php if (theme_get_setting('blog_image') == 'medium'): ?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post post-medium-image"<?php print $attributes; ?>>
  <div class="row">
  <?php if (render($content['field_image'])) : ?> 
    <div class="span4">
		  <?php if ($image_slide == 'true'): ?>
			  <div class="post-image">
				  <div class="flexslider flexslider-center-mobile flexslider-simple" data-plugin-options='{"animation":"slide", "animationLoop": true, "maxVisibleItems": 1}'>
				    <ul class="slides">
						  <?php if (render($content['field_image'])) : ?>
						    <?php print render($content['field_image']); ?>
						  <?php endif; ?>
				    </ul>
				  </div>    
				</div>
			<?php endif; ?>
				
			<?php if ($image_slide == 'false'): ?>
			  <div class="single-post-image">
			    <?php print render($content['field_image']); ?>
			  </div>    
			<?php endif; ?>
    </div>	
  <?php endif; ?>
  
  <div class="span5">
		<div class="post-content">
	
		  <?php print render($title_prefix); ?>
		    <h2 <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
		  <?php print render($title_suffix); ?>

		  <div class="article_content"<?php print $content_attributes; ?>>
		    <?php
		      // Hide comments, tags, and links now so that we can render them later.
		      hide($content['taxonomy_forums']);
		      hide($content['comments']);
		      hide($content['links']);
		      hide($content['field_tags']);
		      hide($content['field_image']);
		      hide($content['field_thumbnail']);
		      print render($content);
		    ?>
		  </div>
		</div>
  </div>		
  </div>
		
  <div class="row">
		<div class="span9">  
		  
	   <?php if (!$page && $teaser): ?>
	  
	    <div class="post-meta">
				<span class="post-meta-user"><i class="icon-user"></i> <?php print t('By'); ?> <?php print $name; ?></span>
				<?php if (render($content['field_tags'])): ?> 
				  <span class="post-meta-tag"><i class="icon-tag"></i> <?php print render($content['field_tags']); ?> </span>
				<?php endif; ?> 
				<span class="post-meta-comments"><i class="icon-comments"></i> <a href="<?php print $node_url;?>/#comments"><?php print $comment_count; ?> <?php print t('Comment'); ?><?php if ($comment_count != "1" ) { echo "s"; } ?></a></span>
				<a href="<?php print $node_url; ?>" class="btn btn-mini btn-primary pull-right"><?php print t('Read more...');?></a>
			</div>
		
	  <?php endif; ?>
		</div>
	</div>
</article>
<?php endif; ?>