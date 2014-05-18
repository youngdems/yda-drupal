<?php

/**
 * @file views-view-fields--portfolio-filters.tpl.php
 * Porto's field template file for the Portfolio Filters view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>

<?php foreach ($fields as $id => $field): ?>
  <li data-option-value=".<?php print str_replace('&amp;', 'and', str_replace(' ', '-', $field->content)); ?> "><a href="#"><?php print $field->content; ?></a></li>
<?php endforeach; ?>