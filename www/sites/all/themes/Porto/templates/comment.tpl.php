<?php
/**
 * @file comment.tpl.php
 * Porto's comment template.
 */
 
global $parent_root;
?>

<ul class="comments">
  <li>
    <div class="comment">
		  <div class="thumbnail">
		    <?php 
		      if (!$picture) {
		        echo '<img src="'.$parent_root.'/img/anon.png" alt="anon">'; 
		      }
		      else { 
		        print $picture;   
		      }
		    ?>
		  </div>
		  <div class="comment-block">  
		    <div class="comment-arrow"></div>
        <span class="comment-by">
	        <strong><?php print $author; ?></strong>
	        <span class="pull-right">
	          <?php if (!empty($content['links'])) { print render($content['links']); } ?>
	        </span>
        </span>

		    <?php if ($new): ?>
		    <span class="new"><?php print $new ?></span>
		    <?php endif; ?>
		    
		    <div class="comment-content"<?php print $content_attributes; ?>>
		      <div class="row">
		      <p>
		      <?php hide($content['links']); print render($content); ?>
		      </p>
		      </div>
		      <?php if ($signature): ?>
		       <div class="user-signature clearfix">
		         <?php print $signature ?>
		      </div>
		     <?php endif; ?>
		    </div>
		    <span class="date pull-right">
		      <?php print format_date($comment->created, 'custom', 'M d, Y'); ?>
		    </span>  
      </div>
    </div>
  </li>
</ul>