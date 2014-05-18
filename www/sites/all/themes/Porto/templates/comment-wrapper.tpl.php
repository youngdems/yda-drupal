<?php
/**
 * @file comment-wrapper.tpl.php
 * Porto's custom comment wrapper template.
 */
?>
<div id="comments" class="post-block post-comments clearfix <?php print $classes; ?>" <?php print $attributes; ?>>

  <?php if ($content['comments'] && $node->type != 'forum'): ?>
    <?php print render($title_prefix); ?>
    	<h3><i class="icon-comments"></i><?php print t('Comments'); ?> (<?php print $node->comment_count; ?>)</h3>
    <?php print render($title_suffix); ?>
  <?php endif; ?>
  
  <?php print render($content['comments']); ?>

  <?php if ($content['comment_form']): ?>
  <div class="post-block post-leave-comment">
    <section id="comment-form-wrapper">
      <h3><?php print t('Leave a comment'); ?></h3>
      <?php print render($content['comment_form']); ?>
    </section> <!-- /#comment-form-wrapper -->
  </div>  
  <?php endif; ?>

</div> <!-- /#comments -->