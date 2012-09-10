<?php // This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package   block-books
 * @copyright 2012 Hina Yousuf
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */?>
<html>
<body>
<?php
require_once('../../config.php');

require_once($CFG->dirroot . '/lib/formslib.php');
require_login();
$navlinks[] = array('name' => 'Advanced Search', 'link' => null, 'type' => 'activityinstance');
$navigation = build_navigation($navlinks);		
//echo $OUTPUT->heading();
if(!$export)
print_header('Advanced Search Form', 'Contact Form', $navigation, '', '', true, '', user_login_string($SITE).$langmenu);
require_once('breadcrumb.php');
echo "<p><b>Your message was sent</b></p>

<p>Your message was successfully sent!
Thank you for contacting, You will get reply
to your inquiry as soon as possible!</p>";

echo $OUTPUT->footer();
?>

</body>
</html>
