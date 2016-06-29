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
 * Shop_Controller
 *
 * Extends the Site_Controller class so I can declare special Shop controllers
 *
 * @package      
 * @subpackage     Controllers
 */
class Shop_Controller extends Site_Controller
{
	function Shop_Controller()
	{
		parent::Site_Controller();

		// Loading config
		$this->load->config('kaimonokago');
		
		// Set container variable
		$this->_container = $this->config->item('backendpro_template_shop') . "container.php";

		// Set public meta tags
		//$this->bep_site->set_metatag('name','content',TRUE/FALSE);

			
		// Load shop assets
		$this->load->module_library('site','kk_assets');
		
		// Load the PUBLIC asset group in bep_assets.php
		$this->bep_assets->load_asset_group('SHOP');
		
		log_message('debug','BackendPro : Shop_Controller class loaded');
		
		// Loading language helper
		$this->load->helper('language');
		
		$this->load->module_language('webshop','webshop');
		
		
		
		// $this->lang->load('webshop');
		
		// From CI shopping cart
		// Still using PHP session here.
		session_start();
		// loading Norwegian language files
		// $this->config->set_item('language', 'norwegian');
		// $this->lang->load('norwegian_general', 'norwegian');
		// Loading all the module models here instead of autoload.php 
		$this->load->module_model('categories','MCats');
		$this->load->module_model('menus','MMenus');
		$this->load->module_model('customers','MCustomers');
		$this->load->module_model('orders','MOrders');
		$this->load->module_model('pages','MPages');
		$this->load->module_model('products','MProducts');
		$this->load->module_model('subscribers','MSubscribers');
		
		// Loading libraries instead of autoload
		$this->load->library('form_validation');
		$this->load->library('validation'); // for BEP 0.6

		
		// Loading helpers 
		$this->load->helper( array('security', 'form', 'mytools') );
		
		
		// This part is used in all the pages so load it here
		// For customer login status
		if(isset($_SESSION['customer_first_name'])){
			$this->data['customer_status']=1;
			$this->data['loginstatus']=lang('general_hello').$_SESSION['customer_first_name'].". ".lang('general_logged_in')."<br />
			<a href=\"index.php/".$this->lang->line('webshop_folder')."/logout \">Log out</a>";
		}else{
			$this->data['customer_status']=0;
			$this->data['loginstatus']="You are not logged in. <a href=\"index.php/".$this->lang->line('webshop_folder')."/login \">".lang('general_login')."</a>
			<br /><a href=\"index.php/".$this->lang->line('webshop_folder')."/registration \">".lang('general_register')."</a>";
		}
		// Total price will be displayed
		// handlekurv means shopping cart in Norwegian
		// sorry for this. I will use English in future. 
		// It's too late and too much work to replace now.
		if(isset($_SESSION['totalprice'])){
			$this->data['handlekurv'] = $_SESSION['totalprice'];
		}else{
	  		$this->data['handlekurv'] =0;
		}
	
		// main nav
		// webshop config main_nav_parent_id
		$tree = array();
	    // it used to be like this $parentid = 107;
	    $parentid = $this->preference->item('main_nav_parent_id');
		$this->MMenus->generateTree($tree,$parentid);
	    $this->data['mainnav'] = $tree;
	    
	    // left category menu
	    // webshop config categories_parent_id
	    // it used to be like this $parentid=1;
	    $parentid = $this->preference->item('categories_parent_id');
		$this->data['navlist'] = $this->MCats->getCatNav($parentid);
		
	}
}

/* End of Shop_controller.php */
/* Location: ./system/application/libraries/Shop_controller.php */