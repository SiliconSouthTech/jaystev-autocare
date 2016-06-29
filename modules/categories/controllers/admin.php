<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Shop_Admin_Controller {
  	function Admin(){
	    parent::Shop_Admin_Controller();
	    // Check for access permission
		check('Categories');
		$this->load->model('MCats');
		// Set breadcrumb
		$this->bep_site->set_crumb($this->lang->line('backendpro_categories'),'categories/admin');	
		mb_internal_encoding('UTF-8');
  	}
  

  	function index(){
		$data['title'] = "Manage Categories";
		$data['categories'] = $this->MCats->getAllCategories();
		$data['header'] = $this->lang->line('backendpro_access_control');
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_cat_home";
		$data['module'] = 'categories';
		$this->load->view($this->_container,$data);
  	}
  

  
  	function create(){
		$this->bep_assets->load_asset_group('TINYMCE');
		
	   	if ($this->input->post('name')){
	  		$this->MCats->addCategory();
			$string = $this->input->post('name');
			// createdirname function is from plugin mytools.php
			$folder = createdirname($string);
			$folder = 'assets/images/'.$folder;
			create_path($folder);
			
	  		// we used to use like this. $this->session->set_flashdata('message','Category created');
	  		// now we are using Bep's flashMsg function to show messages.
			flashMsg('success',$this->lang->line('userlib_category_created'));
			redirect('categories/admin/index','refresh');
	  	}else{
			$data['title'] = "Create Category";
			$data['categories'] = $this->MCats->getTopCategories();
			$data['right'] = 'admin/category_right';
	
			// Set breadcrumb
			$this->bep_site->set_crumb($this->lang->line('userlib_category_create'),'categories/admin/create');	
			
			$data['header'] = $this->lang->line('backendpro_access_control');
			
			// This is how BackendPro do 
			$data['page'] = $this->config->item('backendpro_template_admin') . "admin_cat_create";
			$data['module'] = 'categories';
			$this->load->view($this->_container,$data);
		} 
  	}
  
  	function edit($id=0){
	  	$this->bep_assets->load_asset_group('TINYMCE');
	  	
	  	if ($this->input->post('name')){
	  		$this->MCats->updateCategory();
	  		
	  		flashMsg('success',$this->lang->line('userlib_category_updated'));
	  		redirect('categories/admin/index','refresh');
	  	}else{
			//$id = $this->uri->segment(4);
			$data['title'] = "Edit Category";
			// $data['main'] = 'admin_cat_edit';
			$data['page'] = $this->config->item('backendpro_template_admin') . "admin_cat_edit";
			$data['category'] = $this->MCats->getCategory($id);
			$data['categories'] = $this->MCats->getTopCategories();
			$data['right'] = 'admin/category_right';
			if (!count($data['category'])){
				redirect('admin/categories/index','refresh');
			}
			
			// Set breadcrumb
			$this->bep_site->set_crumb($this->lang->line('userlib_category_edit'),'categories/admin/edit');	
	
			$data['header'] = $this->lang->line('backendpro_access_control');
			$data['module'] = 'categories';
			$this->load->view($this->_container,$data);
		}
  	}
  
  	function delete($id){
	
		$cat = $this->MCats->getCategory($id);
		$string = $cat['name'];
		$catname = createdirname($string);
		$catname = 'assets/images/'.$catname;
		recursive_remove_directory($catname, $empty=FALSE);	
			
		$orphans = $this->MCats->checkOrphans($id);
		if (count($orphans)){
			$this->session->set_userdata('orphans',$orphans);
			redirect('categories/admin/reassign/'.$id,'refresh');	
		}else{
		    $this->MCats->deleteCategory($id);
		    
			flashMsg('success',$this->lang->line('userlib_category_deleted'));
		    redirect('categories/admin/index','refresh');
		}
  	}


  	function export(){
	  	$this->load->helper('download');
	  	$csv = $this->MCats->exportCsv();
	  	$name = "category_export.csv";
	  	force_download($name,$csv);
	 }

  
  	function reassign($id=0){
		if ($_POST){
			$this->load->module_model('products','MProducts');
			$this->MProducts->reassignProducts();
			$id = $this->input->post('id');
			$this->MCats->deleteCategory($id); // this is not working at the moment. 
			
			flashMsg('success',$this->lang->line('userlib_category_reassigned'));
			redirect('categories/admin/index','refresh');
		}else{
			//$id = $this->uri->segment(4);
			$data['category'] = $this->MCats->getCategory($id);
			$data['title'] = "Reassign Products";
			$data['header'] = $this->lang->line('backendpro_access_control');
			$data['categories'] = $this->MCats->getCategoriesDropDown();
			// Set breadcrumb
			$this->bep_site->set_crumb($this->lang->line('userlib_category_reassign'),'categories/admin/reassign');	
	
			
			$data['page'] = $this->config->item('backendpro_template_admin') . "admin_cat_reassign";
			$data['module'] = 'categories';
			$this->load->view($this->_container,$data);
		}	
	}
	
	
	function changeCatStatus($id){
		//$id = $this->uri->segment(4);
		$this->MCats->changeCatStatus($id);
		
		flashMsg('success',$this->lang->line('userlib_category_status'));
		redirect('categories/admin/index','refresh');
  	}
	
	
  	function _remove_path($folder){
	  
	    $files = glob( $folder . DIRECTORY_SEPARATOR . '*');
	    foreach( $files as $file ){
	        if($file == '.' || $file == '..'){continue;}
	        if(is_dir($file)){
	            $this->_remove_path( $file );
	        }else{
	            unlink( $file );
	        }
	    }
	    rmdir( $folder ); 
  	}

 
}//end class
?>