<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Shop_Admin_Controller {
  	function Admin(){
	   	parent::Shop_Admin_Controller();
		// Check for access permission
		check('Products');
		// load modules/categories/model/mcats
		 $this->load->module_model('categories','MCats');
		// load the MProducts model
		$this->load->model('MProducts');
		// Set breadcrumb
		$this->bep_site->set_crumb($this->lang->line('backendpro_products'),'products/admin');		 
  	}
  
  	
  	function index(){
  		// Setting variables 
		$data['title'] = "Manage Products";
		$data['products'] = $this->MProducts->getAllProducts();
		$data['categories'] = $this->MCats->getCategoriesDropDown();
		// we are pulling a header word from language file
		$data['header'] = $this->lang->line('backendpro_access_control');
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_product_home";
		$data['module'] = 'products';
		$this->load->view($this->_container,$data);
	}
  

  	function create(){
  		// we are using TinyMCE in this page, so load it
  		$this->bep_assets->load_asset_group('TINYMCE');
  	
	   	if ($this->input->post('name')){
	   		// fields are filled up so do the followings
	  		$this->MProducts->insertProduct();
	  		// CI way to set flashdata, but we are not using it
	  		// $this->session->set_flashdata('message','Product created');
	  		// we are using Bep function for flash msg
	  		flashMsg('success','Product created');
	  		redirect('products/admin/index','refresh');
	  	}else{
	  		// this must be the first time, so set variables
			$data['title'] = "Create Product";
			$data['categories'] = $this->MCats->getCategoriesDropDown();
			// loading this for giving some instructions.
			$data['right'] = 'admin/product_right';
			// Set breadcrumb
			$this->bep_site->set_crumb($this->lang->line('userlib_product_create'),'products/admin/create');	
			$data['header'] = $this->lang->line('backendpro_access_control');
			$data['page'] = $this->config->item('backendpro_template_admin') . "admin_product_create";
			$data['module'] = 'products';
			$this->load->view($this->_container,$data);
		} 												
  	}
  
  	
  	function edit($id=0){
  		// we are using TinyMCE in edit as well
	  	$this->bep_assets->load_asset_group('TINYMCE');
	  	if ($this->input->post('name')){
	  		// fields filled up so,
	  		$this->MProducts->new_updateProduct();
	  		// CI way to set flashdata, but we are not using it
	  		// $this->session->set_flashdata('message','Product updated');
	  		// we are using Bep function for flash msg
	  		flashMsg('success','Product updated');
	  		redirect('products/admin/index','refresh');
	  	}else{
			//$id = $this->uri->segment(4);
			$data['title'] = "Edit Product";
			// $data['main'] = 'admin_product_edit';
			$data['page'] = $this->config->item('backendpro_template_admin') . "admin_product_edit";
			$data['product'] = $this->MProducts->getProduct($id);
			$data['categories'] = $this->MCats->getCategoriesDropDown();
			// I am not using colors and sizes any more. But they are available if you want to use them.
			$data['assigned_colors'] = $this->MProducts->getAssignedColors($id);
			$data['assigned_sizes'] = $this->MProducts->getAssignedSizes($id);
			// I am loading product_right here which gives instructions.
			$data['right'] = 'admin/product_right';
			if (!count($data['product'])){
				redirect('products/admin/index','refresh');
			}
			// 	Set breadcrumb
			$this->bep_site->set_crumb($this->lang->line('userlib_product_edit'),'products/admin/edit');	
			$data['header'] = $this->lang->line('backendpro_access_control');
			$data['module'] = 'products';
			$this->load->view($this->_container,$data);
		}
  	}
  
	function delete($id){
		$this->MProducts->deleteProduct($id);
		$this->session->set_flashdata('message','Product deleted');
		redirect('products/admin/index','refresh');
	}
  
	function changeProductStatus($id){
		$this->MProducts->changeProductStatus($id);
		$this->session->set_flashdata('message','Page status changed');
		redirect('products/admin/index','refresh');
	}
  
  	function batchmode(){
  		$this->MProducts->batchUpdate();
  		redirect('products/admin/index','refresh');
  	}

	function export(){
	  	$this->load->helper('download');
	  	$csv = $this->MProducts->exportCsv();
	  	$name = "product_export.csv";
	  	force_download($name,$csv);
	
	}
  
  	function import(){
		if ($this->input->post('csvinit')){
			$data['csv'] = $this->MProducts->importCsv();
			$data['title'] = "Preview Import Data";
			// Set breadcrumb
			$this->bep_site->set_crumb($this->lang->line('userlib_product_import'),'products/admin/import');	
			$data['header'] = $this->lang->line('backendpro_access_control');
			$data['page'] = $this->config->item('backendpro_template_admin') . "admin_product_csv";
			$data['module'] = 'products';
			$this->load->view($this->_container,$data);
	
		}elseif($this->input->post('csvgo')){
			if (eregi("finalize", $this->input->post('submit'))){
				$this->MProducts->csv2db();
				$this->session->set_flashdata('message','CSV data imported');
			}else{
				$this->session->set_flashdata('message','CSV data import cancelled');
			}
			redirect('products/admin/index','refresh');
		}
  	}

}


?>