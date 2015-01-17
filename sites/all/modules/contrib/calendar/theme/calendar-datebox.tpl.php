<?php
/**
 * @file 
 * Template to display the date box in a calendar.
 *
 * - $view: The view.
 * - $granularity: The type of calendar this box is in -- year, month, day, or week.
 * - $mini: Whether or not this is a mini calendar.
 * - $class: The class for this box -- mini-on, mini-off, or day.
 * - $day:  The day of the month.
 * - $date: The current date, in the form YYYY-MM-DD.
 * - $link: A formatted link to the calendar day view for this day.
 * - $url:  The url to the calendar day view for this day.
 * - $selected: Whether or not this day has any items.
 * - $items: An array of items for this day.
 */

global $user;
$school = _get_school_node_id_for_school_admin_user($user->uid);
if ($selected) {
    $output = l($day, 'school-events-day/' . $school['nid'] . '/' . $date);
} else {
    $output = $day;
}
?>
<div class="<?php print $granularity ?> <?php print $class; ?>"> <?php print $output; ?> </div>