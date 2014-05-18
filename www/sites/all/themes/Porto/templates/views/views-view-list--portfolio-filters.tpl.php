<?php

/**
 * @file views-view-list--portfolio-filters.tpl.php
 * Porto's list template file for the Portfolio Filters view.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>

<ul class="nav nav-pills sort-source" data-sort-id="portfolio" data-option-key="filter">
  <li data-option-value="*" class="active"><a href="#"><?php echo t('Show All'); ?></a></li>
  <?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
  <?php endforeach; ?>
</ul>