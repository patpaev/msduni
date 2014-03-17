<?php

/**
 * @file
 * This template is used to print a single field in a view.
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
<?php
$todayTime = strtotime('today');
?>
<?php if (strtotime($row->field_data_field_submission_date_field_submission_date_value) < $todayTime) { ?>
		<span style="color:#d29898;">Closed</span>
<?php } else { ?>
<?php 	if (time() > strtotime($row->field_data_field_submission_date_field_submission_date_value)) { ?>
			<span style="color:red;"><?php print $output; ?></span>
<?php 	} else { ?>
			<span style="color:#959595;"><?php print $output; ?></span>
<?php 	} ?>
<?php } ?>