
<?php
// This file is part of Moodle - http://moodle.org/
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
 */

require_once('../../config.php');
require_once($CFG->dirroot . '/lib/formslib.php');
global $DB;
$booksid=$_GET['ebookid'];

$sql="select upload_file_name from mdl_books,mdl_ebook where mdl_books.book_id=mdl_ebook.book_id AND mdl_ebook.ebook_id = '$booksid'";

$result= $DB->get_records_sql($sql);

foreach($result as $row)
{
	$upload_file_name=$row->upload_file_name;
	echo "$row->upload_file_name";
}

echo $upload_file_name;
$upload_file_name="EBooks/".$upload_file_name;
//$filename ='C:/wamp/www/moodle/blocks/books/EBooks/PHP_simple.pdf';
$file_extension = strtolower(substr(strrchr($upload_file_name,"."),1));
function ob_clean_all ()
{
	$ob_active = ob_get_length ()!== FALSE;
	while($ob_active)
	{
		ob_end_clean();
		$ob_active = ob_get_length ()!== FALSE;
	}
	return FALSE;
}

switch( $file_extension )
{
	case "pdf": $ctype="application/pdf"; break;
	case "doc": $ctype="application/vnd.ms-word"; break;
	default: $ctype="application/force-download";
}
ob_clean_all();
header("Pragma: public");
header("Expires: 0");
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");

header("Content-Type: application/octet-stream");
header("Content-Transfer-Encoding: binary");
header("Content-Type: application/download");
header('Content-disposition: attachment; filename=' . basename($upload_file_name));
header("Content-Type: application/$ctype");
header('Content-Length: ' . filesize($upload_file_name));
@readfile($upload_file_name);
exit(0);

?>
