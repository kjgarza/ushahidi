<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Pages controller
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author	   Ushahidi Team <team@ushahidi.com>
 * @package	   Ushahidi - http://source.ushahididev.com
 * @subpackage Controllers
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license	   http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL)
 */

class Mycontroller_Controller extends Main_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index($page_id = 1)
	{
		$this->template->header->this_page = "myview_".$page_id;
		$this->template->content = new View('myview');




				

			$this->template->content->page_title = "jal";//$page_title;
			$this->template->content->page_description = "lol";//$page_description;
			$this->template->content->page_id = 1;//$page->id;
	

		$this->template->header->header_block = $this->themes->header_block();
	}

}
