<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 *
 * @package         Codeingiter shopping cart v1.1
 * @author          Shin Okada
 * @copyright       Copyright (c) 2010
 * @license         http://www.gnu.org/licenses/lgpl.html
 * @link            http://www.okadadesign.no/blog
 * 
 */

// ---------------------------------------------------------------------------

/**
 * Shop_admin_controller
 *
 * Extends the Admin_controller class so I can declare special Shop_admin controllers
 *
 * @package      
 * @subpackage     Controllers
 */

class Shop_Admin_Controller extends Admin_Controller
{
	function Shop_Admin_Controller()
	{
		parent::Admin_Controller();

		// Loading libraries instead of autoload
		$this->load->library('form_validation');
		$this->load->library('validation'); // for BEP 0.6
		
		// Loading helpers 
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->helper('mytools' );

			
		// Load shop assets
		$this->load->module_library('site','kk_assets');
		
		// Load the SHOPADMIN asset group
		$this->bep_assets->load_asset_group('SHOPADMIN');
		
		
	}
}

/* End of Shop_controller.php */
/* Location: ./system/application/libraries/Shop_controller.php */