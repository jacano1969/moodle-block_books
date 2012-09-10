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
	$tabs = array();

	function tabs_header()
	{
	?>
	<style type="text/css">
	.tab {
	
	
		border-bottom: 1px solid black;
		text-align: center;
		font-family: arial, verdana;
		
       
	  }
	.tab-active { 
	
	align: center;
		border-left: 1px solid black; 
		border-top: 1px solid black; 
		border-right: 1px solid black; 
		text-align: center; 
		font-family: arial, verdana; 
		font-weight: bold;
		 
	  }
	.tab-content { 
		align: center;
		border-left: 1px solid black; 
		border-right: 1px solid black; 
		border-bottom: 1px solid black;
		  padding: 0 0 0 10px;
	  } 
	</style> 
	<?php
	}

	function tabs_start()
	{  
      ob_start(); 
	}

	function endtab() 
	{ 
	  global $tabs;

	  $text = ob_get_clean();
      $tabs[ count( $tabs ) - 1 ][ 'text' ] = $text;

	  ob_start();
	}

	function tab( $title ) 
	{
	  global $tabs;

	  if ( count( $tabs ) > 0 )
		endtab();
		$tabs []= array(
		  'title' => $title,
		  'text' => ""
		);
	  }

	  function tabs_end( )
	  {
		global $tabs;

		endtab( );
		ob_end_clean( );

		$index = 0;
		if ( $_GET['tabindex'] )
			$index = $_GET['tabindex'];

	  ?>
	  <table width="100%" cellspacing="0" cellpadding="0">
	  <tr>
	  <?php
		$baseuri = $_SERVER['REQUEST_URI'];
		$baseuri = preg_replace( "/\?.*$/", "", $baseuri );
		$curindex = 0;
		foreach( $tabs as $tab )
		{
		   $class = "tab";
		   if ( $index == $curindex )
		   $class ="tab-active";
		?>
		<td class="<?php echo($class); ?>">
		<a href="<?php echo( $baseuri."?tabindex=".$curindex ); ?>">
		<?php echo( $tab['title'] ); ?>
		</a>
		</td>
		<?php
			$curindex += 1;
		 }
		?>
		</tr>
		<tr><td class="tab-content" colspan="<?php echo( count( $tabs ) + 1 ); ?>">
		<?php echo( $tabs[$index ]['text'] ); ?>
		</td></tr>
		</table>
		<?php
		}
		?>
