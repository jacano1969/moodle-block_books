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
			class block_books extends block_base {
			
			function init() {
			$this->title = get_string("books", "block_books");
			
			}
															// this function display form and form contents
	  
			function get_content() {
			global $CFG, $to,$msg_content,$PAGE,$COURSE,$DB, $OUTPUT;
			if ($this->content !== NULL) {
			  return $this->content;
			}

			 if (empty($this->instance)) { // Overrides: use no course at all
            $courseshown = false;
           

        } else {
			$context = get_context_instance(CONTEXT_COURSE,$COURSE->id);
			$this->content->footer = '';
			$this->content = new stdClass;
			$this->content->area='block_message';
			
			$this->content->text .= "\n".'<form class="messageform" id="message" method="post" action="'.$CFG->wwwroot.'/blocks/books/search.php">';
			$this->content->text .= '<div align="center"><font color="white" ><b>Search for the books.</b></font></div><div><font color="white"><br/><b>Title: </b></font>'.'<input type="textbox" name="books" size="15"  id="books" /></div>';
			$this->content->text .= '</br><div align="center"><b><input type="submit" align="center" value="Search" id="search"></b></div>';
		    $this->content->text .='</br><div align="center"><b><a href="'.$CFG->wwwroot.'/blocks/books/AdvanceSearch.php">Advance Search</a></b></div>';
			$this->content->text .= '</br><div align="center"><b><a href="'.$CFG->wwwroot.'/blocks/books/postBook.php">Post Books</a></b></div>';
			$this->content->text .= '</br><div align="center"><b><a href="'.$CFG->wwwroot.'/blocks/books/availableBooks.php">Available Books</a></b></div>';
			$this->content->text .= '</br><div align="center"><b><a href="'.$CFG->wwwroot.'/blocks/books/mybooks.php">My Books</a></b></div>';
			$this->content->text .='</form>';
			
			  if ($courseshown == SITEID) {
                // Being displayed at site level. This will cause the filter to fall back to auto-detecting
                // the list of courses it will be grabbing events from.
                $filtercourse    = NULL;
              
            } else {
                // Forcibly filter events to include only those from the particular course we are in.
                $filtercourse    = array($courseshown => $this->page->course);
             ;
            }
			}
				//assign capabilities to users in the course context
					// only the allowed users can access the block 
		if (!isloggedin()) {
			$this->content->text = 'Not loggedin Yet !';
		}
		else
		{ 		
		// retrieve user's data 
		
		return $this->content;
			}
		
		}
	  
	}
	
	    
	  			
	?>
