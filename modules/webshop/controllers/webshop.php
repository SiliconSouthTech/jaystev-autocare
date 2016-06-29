<?php

class Webshop extends Shop_Controller {
  
  function  Webshop(){
    parent::Shop_Controller();
    // load the validation library
		$this->load->library('validation');
		
	
  }

  function index(){
   	// you need to change webshop_lang $lang['webshop_folder'] = 'webshop';
    // according to your folder name.
   	$webshop = $this->lang->line('webshop_folder');
	$page = $this->MPages->getPagePath($webshop); 
	
	
	// load slideshow preference
	$this->bep_assets->load_asset_group($this->preference->item('webshop_slideshow'));
	
	
	$data['title'] = $page['name'];
	$data['pagecontent'] = $page;
	$data['page'] = $this->config->item('backendpro_template_shop') . 'frontpage';
	$data['module'] = lang('webshop_folder');
	$this->load->view($this->_container,$data);
     
  }

  
	
	
  	function cat($id){
		$cat = $this->MCats->getCategory($id);
		/**
	      * $id is the third(3) in URI which represents the ID and any 
	      * variables that will be passed to the controller.
	      */
		if (!count($cat)){
			// if there is no such a category id, then redirect.
			redirect( lang('webshop_folder').'/index','refresh');
		}
		$data['title'] = lang('webshop_shop_name')." | ". $cat['name'];
		
		if ($cat['parentid'] < 1){
			/**
	          * If a parent id is 0, it must be a root category, so show children/sub-categories
	          */
			$data['listing'] = $this->MCats->getSubCategories($id);
			/**
	         * this will receive a series of array with id, name, shortdesc and thumbnail
			 * and store them in listing. Array ([0]=>array([id]=>14 [name]=>long-sleeve...))
	         */
			$data['level'] = 1;
		}else{
			// otherwise, it must be a category, so let's show products
			$data['listing'] = $this->MProducts->getProductsByCategory($id);
			// this will receive a series of product with array.id,name,shortdesc,thumbnail
			$data['level'] = 2;
		}
		$data['category'] = $cat;
		$data['page'] = $this->config->item('backendpro_template_shop') . 'category';
		$data['module'] = lang('webshop_folder');
		$this->load->view($this->_container,$data);
 	}



	function product(){
		if (empty($this->uri->segment(3))) {
			$id = $this->uri->segment(2);
		}
		else{
			$id = $this->uri->segment(3);
		}
		
		if (isset($id)) {
			
		
		$product = $this->MProducts->getProduct($id);
		/** this returns all, i.e. id, name, shortdesc, longdesc, thumbnail,
		 * image, grouping, status, category_id, featured and price
		 * from product db.
		 */
		if (!count($product)){
			// no product so redirect
			redirect( lang('webshop_folder').'/index','refresh');
		}
		$data['product'] = $product;
		$data['title'] = lang('webshop_shop_name')." | ". $product['description'];
		
		// I am not using colors and sizes, but you can. 
		$data['assigned_colors'] = $this->MProducts->getAssignedColors($id);
		$data['assigned_sizes'] = $this->MProducts->getAssignedSizes($id);
		
		$data['page'] = $this->config->item('backendpro_template_shop') . 'product';
		$data['module'] = lang('webshop_folder');
		$this->load->view($this->_container,$data);
		}
		else {
			//later add code to display some products 

			//but for now rediect back to the homepage
			rediect('', 'refresh');
		}
  	}
  

	function pages($path){
	
		if($path==lang('webshop_folder')){
			redirect('','refresh');
		}elseif($path =='contact_us'){
			redirect(lang('webshop_folder').'/contact','refresh');
		}elseif($path =='cart'){
		  	redirect(lang('webshop_folder').'/cart','refresh');
		}elseif($path =='checkout'){
		 	redirect(lang('webshop_folder').'/checkout','refresh');
		}else{
			$page = $this->MPages->getPagePath($path);
				if (!empty($page)){//$page will return empty array if there is no page
			$data['pagecontent'] = $page;
			$data['title'] = lang('webshop_shop_name')." | ".$page['name'];
				}else{
					// if there is no page redirect
					redirect(lang('webshop_folder').'/index','refresh');
				}
			$data['page'] = $this->config->item('backendpro_template_shop') . 'page';		
			$data['module'] = lang('webshop_folder');
			$this->load->view($this->_container,$data);
		}
  }
  	
  
  function contact(){
	  	
		$data['title'] = lang('webshop_shop_name')." | "."Contact us";
		//$data['cap_img'] = $this->_generate_captcha();	
		$data['page'] = $this->config->item('backendpro_template_shop') . 'contact';
		$data['module'] = lang('webshop_folder');
		$this->load->view($this->_container,$data);
  	}
  
  
	function _generate_captcha(){
		$this->bep_assets->load_asset('recaptcha');
		$this->load->module_library('recaptcha','Recaptcha');
		return $this->recaptcha->recaptcha_get_html();
	}
  
  
	
  
	function message(){
		
		$rules['name'] = 'trim|required|max_length[32]';
		$rules['email'] = 'trim|required|max_length[254]|valid_email';
		$rules['message'] = 'trim|required';
		$rules['recaptcha_response_field'] = 'trim|required|valid_captcha';
		
		$this->validation->set_rules($rules);
		
		$fields['name']	= lang('general_name');
		$fields['email']	= lang('webshop_email');
		$fields['message']	= lang('message_message');
		$fields['recaptcha_response_field']	= 'Recaptcha';
		
		$this->validation->set_fields($fields);
	    /**
		 * form_validation, next version of Bep will update to form_validation
		 */
		//$this->form_validation->set_rules('name', 'Name', 'required');
		//$this->form_validation->set_rules('email', 'Email',  'required|valid_email');
		//$this->form_validation->set_rules('message', 'Message', 'required');
		//$this->form_validation->set_rules('captcha', 'Captcha', 'required');
	
	
        if ($this->validation->run() == FALSE)
		{
			// if any validation errors, display them
			$this->validation->output_errors();
			
			$captcha_result = '';
			$data['cap_img'] = $this->_generate_captcha();
			
			$data['title'] = lang('webshop_shop_name')." | ". lang('webshop_message_contact_us');
			$data['page'] = $this->config->item('backendpro_template_shop') . 'contact';
			$data['module'] = lang('webshop_folder');
			$this->load->view($this->_container,$data);
		}
		else
		{
		    // you need to send email
		    // validation has passed. Now send the email
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$message = $this->input->post('message');
			// get email from preferences/settings
			$myemail = $this->preference->item('admin_email');
			$this->load->library('email');
			$this->email->from($email.$name);
			$this->email->to($myemail);
			$this->email->subject(lang('webshop_message_subject'));		
			$this->email->message(lang('webshop_message_sender'). 
			$name."\r\n".lang('webshop_message_sender_email').": ". 
			$email. "\r\n".lang('webshop_message_message').": " . $message);
			$this->email->send();
			flashMsg('success', lang('webshop_message_thank_for_message'));
		    // $this->session->set_flashdata('subscribe_msg', lang('webshop_message_thank_for_message'));
		    redirect(lang('webshop_folder').'/contact');
		}  	
  	}  
  
  	
  
	function registration(){
	/* If you are using recaptcha, don't forget to configure modules/recaptcha/config/recaptcha.php
	 * Add your own key
	 * */	
		$captcha_result = '';
		//$data['cap_img'] = $this->_generate_captcha();
		
	if ($this->input->post('email')){
		
	 	$data['title'] = lang('webshop_shop_name')." | "."Registration";
		
		// set rules
		$rules['email'] = 'trim|required|valid_email';
		//$rules['emailconf'] = 'trim|required|valid_email';
		$rules['password'] = 'trim|required';
		$rules['customer_first_name'] = 'trim|required|min_length[3]|max_length[20]';
		$rules['customer_last_name'] = 'trim|required|min_length[3]|max_length[20]';
		$rules['username'] = 'trim|required|min_length[3]|max_length[10]';
		//$rules['phone_number'] = 'trim|required|min_length[8]|max_length[12]|numeric';
		//$rules['address'] = 'trim|required';
		//$rules['city'] = 'trim|required|alpha_dash';
		//$rules['post_code'] = 'trim|required|numeric';
		// if you want to use recaptcha, set modules/recaptcha/config and uncomment the following
		//$rules['recaptcha_response_field'] = 'trim|required|valid_captcha';
		
		$this->validation->set_rules($rules);
		
		// set fields. This will be used for error messages
		// for example instead of customer_first_name, First Name will be used in errors
		$fields['email']	= lang('webshop_email');
		$fields['emailconf']	= lang('webshop_email_confirm');
		$fields['password']	= lang('webshop_pass_word');
		$fields['customer_first_name']	= lang('webshop_first_name');
		$fields['customer_last_name']	= lang('webshop_last_name');
		$fields['username']	= "Username is required";
		$fields['phone_number']	= lang('webshop_mobile_tel');
		$fields['address']	= lang('webshop_shipping_address');
		$fields['city']	= lang('webshop_city');
		$fields['post_code']	= lang('webshop_post_code');
		//$fields['recaptcha_response_field']	= 'Recaptcha';
		
		$this->validation->set_fields($fields);
		
		// run validation 
		if ($this->validation->run() == FALSE)
			{	
				// if false outputs errors
				$this->validation->output_errors();
				// and take them to registration page to show errors
				$data['page'] = $this->config->item('backendpro_template_shop') . 'registration';
				$data['module'] = lang('webshop_folder');
				$this->load->view($this->_container,$data);
			}
			else
			{	
				$e = $this->input->post('email');
				// otherwise check if the customer's email is in the database
				$numrow = $this->MCustomers->checkCustomer($e);
				if ($numrow == TRUE){
					// you have registered before, set the message and redirect to login page.
					flashMsg('info', lang('webshop_registed_before'));
					// $this->session->set_flashdata('msg', lang('webshop_registed_before'));
					redirect( lang('webshop_folder').'/login','refresh');
				}
				$u = $this->input->post('username');
				// otherwise check if the customer's username is in the database
				$numrow = $this->MCustomers->checkCustomerUsername($u);
				if ($numrow == TRUE){
					// username not available message, set the message and redirect to login page.
					flashMsg('info', lang('webshop_registed_before'));
					// $this->session->set_flashdata('msg', lang('webshop_registed_before'));
					redirect( lang('webshop_folder').'/login','refresh');
				}
			
			// a customer is new, so create the new customer, set message and redirect to login page.
			$this->MCustomers->addCustomer();
			flashMsg('success', lang('webshop_thank_registration'));
			// $this->session->set_flashdata('msg', lang('webshop_thank_registration'));
			redirect( lang('webshop_folder').'/login');
			}
	}// end of if($this->input->post('email'))
		
	$data['title'] = lang('webshop_shop_name')." | ". "Registration";
	$data['page'] = $this->config->item('backendpro_template_shop') . 'registration';
	$data['module'] = lang('webshop_folder');
	$this->load->view($this->_container,$data);
	
  }

  
	function login(){

		//check if the user is already logged in 
		if ($this->data['customer_status'] > 0) {
			//set flash message
			flashMsg('info', 'Already logged in');
			//redirect to homepage
			redirect('','refresh');
		}
		//get and save last page url
		$referrer = $this->agent->referrer();
		if ($this->input->post('email')){
			$e = $this->input->post('email');
			$pw = $this->input->post('password');
			$this->MCustomers->verifyCustomer($e,$pw);
			if (isset($_SESSION['customer_id'])){
				//flashMsg('info',lang('login_logged_in'));
				redirect( $referrer,'refresh');
			}
			flashMsg('info',lang('login_email_pw_incorrect'));
			redirect( lang('webshop_folder').'/login','refresh');
		}			
		$data['title'] = lang('webshop_shop_name')." | "."Customer Login";
		$data['page'] = $this->config->item('backendpro_template_shop') . 'customerlogin';
		$data['module'] = lang('webshop_folder');
		$this->load->view($this->_container,$data);			
  }
  
  
	function logout(){
		//get and save last page url
		$referrer = $this->agent->referrer();

		unset(
			$_SESSION['customer_id'],
			$_SESSION['customer_first_name']);

		//destroy the session
		//session_destroy(); 

		
		
		redirect( $referrer,'refresh'); 	
	 }
  
  	function subscribe(){
		$data['title']=lang('webshop_shop_name')." | ".'Subscribe to our News letter';
		
		$captcha_result = '';
		$data['cap_img'] = $this->_generate_captcha();
		if ($this->input->post('name')){
			$rules['name'] = 'required';
			$rules['email'] = 'required|valid_email';
			$rules['recaptcha_response_field'] = 'trim|required|valid_captcha';
			
			$this->validation->set_rules($rules);
			
			$fields['email']	= lang('webshop_email');
			$fields['name']	= lang('subscribe_name');
			$fields['recaptcha_response_field']	= 'Recaptcha';
			
			$this->validation->set_fields($fields);
			
					if ($this->validation->run() == FALSE)
					{
						// if false outputs errors
						$this->validation->output_errors();
					}
					else
					{
						$email = $this->input->post('email');
						// otherwise check if the customer's email is in the database
						$numrow = $this->MSubscribers->checkSubscriber($email);
						if ($numrow == TRUE){
						// you have registered before, set the message and redirect to login page.
						flashMsg('info',lang('subscribe_registed_before'));
						redirect( lang('webshop_folder').'/subscribe','refresh');
						}
						$this->MSubscribers->createSubscriber();
						flashMsg('success',lang('subscribe_thank_for_subscription'));
						redirect( lang('webshop_folder').'/subscribe','refresh');		
					}	
		}
		$data['page'] = $this->config->item('backendpro_template_shop') . 'subscribe';
		$data['module'] = lang('webshop_folder');
		$this->load->view($this->_container,$data);
  	}
  

  	function unsubscribe($email=''){
  		if (!$this->input->post('email')){
  			$data['title']=lang('webshop_shop_name')." | ".'Unsubscribe our Newsletter';
  			$captcha_result = '';
			$data['cap_img'] = $this->_generate_captcha();
  			$data['page'] = $this->config->item('backendpro_template_shop') . 'unsubscribe';
			$data['module'] = lang('webshop_folder');
			$this->load->view($this->_container,$data);
  		}else{
  			
  			$rules['email'] = 'trim|required|max_length[254]|valid_email';
			$rules['recaptcha_response_field'] = 'trim|required|valid_captcha';
			
			$this->validation->set_rules($rules);
			
			$fields['email']	= lang('webshop_email');
			$fields['recaptcha_response_field']	= 'Recaptcha';
			
			$this->validation->set_fields($fields);
  			
			if ($this->validation->run() == FALSE)
					{
						// if false outputs errors
						$this->validation->output_errors();
						redirect( lang('webshop_folder').'/unsubscribe','refresh');
					}
					else
					{
						$email = $this->input->post('email');
						$this->MSubscribers->removeSubscriber($email);
						flashMsg('success',lang('subscribe_you_been_unsubscribed'));
						redirect( lang('webshop_folder').'/index','refresh');
					}
  		}
  	}
  
  
	function cart($productid=0){
		$shippingprice = $this-> shippingprice();
		$data['shippingprice']=$shippingprice['shippingprice'];
		if ($productid > 0){
			$fullproduct = $this->MProducts->getProduct($productid);
			$this->MOrders->updateCart($productid,$fullproduct);
			redirect( lang('webshop_folder').'/product/'.$productid, 'refresh');
		}else{
			$data['title'] = lang('webshop_shop_name')." | Shopping Cart";
		
			if (isset($_SESSION['cart'])){
				$data['page'] = $this->config->item('backendpro_template_shop') . 'shoppingcart';
				$data['module'] = lang('webshop_folder');
				$this->load->view($this->_container,$data);
			}else{
				flashMsg('info',lang('orders_no_item_yet'));
				// $this->session->set_flashdata('msg',lang('orders_no_item_yet'));
				$data['page'] = $this->config->item('backendpro_template_shop') . 'shoppingcart';
				$data['module'] = lang('webshop_folder');
				$this->load->view($this->_container,$data);
			}
		}
  }
  

  	function ajax_cart(){
	  	// this is called by assets/js/shopcustomtools.js 
	  	// this is used when a customer click a update button in /index.php/webshop/cart page 
	   	$this->MOrders->updateCartAjax($this->input->post('ids'));
  	}

  
	function ajax_cart_remove(){
		// this is called by assets/js/shopcustomtools.js 
	  	// this is used when a customer click a delete button in /index.php/webshop/cart page
	   	$this->MOrders->removeLineItem($this->input->post('id'));
	}
  
  
  
  	function shippingprice(){
		// You need to modify this. This is for Norwegian system. At the moment, if a max of individual product is more
		// than 268 kr, then shipping price will be 65 kr otherwise 0 kr or 25 kr. 
		$maxprice = 0;
		if(isset($_SESSION['cart'])){
		foreach ($_SESSION['cart'] as $item) {
					    if ($item['price'] > $maxprice) {
					        $maxprice = $item['price'];
					    }
					}
		$data['maxprice']=$maxprice;
		$shippingprice = 0;
		if ($maxprice > 268 ){
			  $shippingprice = 65.0;
		}elseif($maxprice == 0){
			  $shippingprice = 0;
		}else{
			  $shippingprice = 25.0;
		}
		$_SESSION['shippingprice'] = $shippingprice;
		$data['shippingprice']=$shippingprice;
		return $data;
		}
  	}
  
  
  function checkout(){
  	$customer_id = $_SESSION['customer_id'];
  	$ref_str = $this->MOrders->return_checked_str(10, '', array('uppercase', 'number', 'uppercase', 'lowercase')); //output 1xQRPl4ZYrP6FBO)
    //$ref = $this->generateRef->return_ref_val();
    $email = $_SESSION['email'];  
     
    $data['ref'] = $ref_str;
    
                    
    $data['data_resp'] = $this->MOrders->return_payment_info($customer_id);

  	


  	
  	if ($this->data['customer_status']==0) {
  		redirect('webshop/login');
  	}

	// $this->MOrders->verifyCart();
	//$data['main'] = 'webshop/confirmorder';// this is using views/confirmaorder.php
	$data['page'] = $this->config->item('backendpro_template_shop') . 'confirmorder';
	$data['title'] = lang('webshop_shop_name')." | ". "Order Confirmation";
	
	
	$shippingprice = $this-> shippingprice();
	$data['shippingprice']=$shippingprice['shippingprice'];
	
	$data['grandtotal']= 0;
	
	if(isset($_SESSION['customer_id'])){
		$data['fname'] = $_SESSION['customer_first_name'];
		$data['lname'] = $_SESSION['customer_last_name'];
		$data['telephone'] = $_SESSION['phone_number'];
		$data['email'] = $_SESSION['email'];
		$data['address'] = $_SESSION['address'];
		$data['city'] = $_SESSION['city'];
		$data['pcode'] = $_SESSION['post_code'];
	}
	else{
		
	}



	//get the users billing info
	$billing_info = $this->MOrders->getBillingInfo($customer_id);
	$data['billing_info'] = $billing_info;



	
	
	$data['module'] = lang('webshop_folder');
	if ($this->uri->segment(2) == 'step2') {
		//redirect to step one if step 2 is not completed
		if (empty($create_shipping)) {
			redirect('checkout');
		}
		//get the just saved shipping data
		$shipping_info = $this->MOrders->getShippingInfo($create_shipping);
		$data['shipping_info'] = $shipping_info;
		print_r($shipping_info);
  		$data['page'] = $this->config->item('backendpro_template_shop') . 'confirmorder2';
  	}
	$this->load->view($this->_container,$data);
  }
  


  function search(){
  	/**
	 * form in views/frontpage.php point to this search
	 * form_open("webshop/search");
	 * This will look in name, shortdesc and longdesc
	 *
	 */
  	//get all the input 
  	if ($this->input->post('year')) {
  		$year = $this->input->post('year');
  		$data['year'] = $year;
  	}else{
		redirect( lang('webshop_folder').'','refresh');
		/**
		 * if nothing in search form, then redirect to index
		 */
	}
  	
  	if ($this->input->post('car_make')) {
  		$car_make = $this->input->post('car_make');
  		$data['car_make'] = $car_make;
  	}else{
		redirect( lang('webshop_folder').'','refresh');
		/**
		 * if nothing in search form, then redirect to index
		 */
	}

  	if ($this->input->post('car_model')) {
  		$car_model = $this->input->post('car_model');
  		$data['car_model'] = $car_model;
  	}else{
		redirect( lang('webshop_folder').'','refresh');
		/**
		 * if nothing in search form, then redirect to index
		 */
	}
  	
  	if ($this->input->post('fuel_capacity')) {
  		$fuel_capacity = $this->input->post('fuel_capacity');
  		$data['fuel_capacity'] = $fuel_capacity;
  	}else{
		redirect( lang('webshop_folder').'','refresh');
		/**
		 * if nothing in search form, then redirect to index
		 */
	}

  	//convert to data


	$data['results'] = $this->MProducts->search($year,$car_make,$car_model,$fuel_capacity);
		
	//$data['main'] = 'webshop/search';// this is using views/search.php. Output will be displayed in views/search.php
	$data['title'] = lang('webshop_shop_name')." | ". "Search Results";
	
	//$this->load->vars($data);
	//$this->load->view('webshop/template');  
	
	
	$data['page'] = $this->config->item('backendpro_template_shop') . 'search';
	$data['module'] = lang('webshop_folder');
	$this->load->view($this->_container,$data);
			
  }


  function search_partnumber(){
  	/**
	 * form in views/frontpage.php point to this search
	 * form_open("webshop/search");
	 * This will look in name, shortdesc and longdesc
	 *
	 */
  	//get all the input 
  	if ($this->input->post('part_number')) {
  		$part_number = $this->input->post('part_number');
  		$data['part_number'] = $part_number;
  	}else{
		redirect( lang('webshop_folder').'','refresh');
		/**
		 * if nothing in search form, then redirect to index
		 */
	}
  	
  	

  	//convert to data


	$data['results'] = $this->MProducts->search_partnumber($part_number);
	if ($data['results'] > 0) {
		redirect( lang('webshop_folder').'/product/'.$data['results'],'refresh');
	}
		
	redirect( lang('webshop_folder').'/search','refresh');
			
  }

	
  
  
  
  function gallery($id){
	$data['title'] = lang('webshop_shop_name')." | ". "Gallery " . $id;
	$data['products'] = $this->MProducts->getGallery($id);
	// getGalleryone returns id, name shortdesc thumbnail image class grouping category
	$data['main'] = 'gallery';// this is using views/galleryone.php etc
	$data['galleriid']=$id; // used for if statement to add top sub-category 
	$this->load->vars($data);
	$this->load->view('webshop/template'); 
  }
  
  
  function emailorder(){
  	
		$data['title'] = lang('webshop_shop_name')." | ". "checkout";
		
		// old way of validation, I hope Bep will update to CI 1.7.2 
		$fields['customerr_first_name'] = lang('orders_first_name');
		$fields['customerr_last_name'] = lang('orders_last_name');
		$fields['telephone'] = lang('orders_mobile_tel');
		$fields['email'] = lang('orders_email');
		$fields['emaildonf'] = lang('orders_email_confirm');
		$fields['shippingaddress'] = lang('orders_shipping_address');
		$fields['city'] = lang('orders_post_code');
		$fields['post_code'] = lang('orders_city');
		
		$this->validation->set_fields($fields);	
		
		$rules['customer_first_name'] = 'trim|required|min_length[3]|max_length[20]';
		$rules['customer_last_name'] = 'trim|required|min_length[3]|max_length[20]';
		$rules['telephone'] = 'trim|required|min_length[8]|max_length[12]|numeric';
		$rules['email'] = 'trim|required|matches[emailconf]|valid_email';
		$rules['emailconf'] = 'trim|required|valid_email';
		$rules['shippingaddress'] = 'required';
		$rules['city'] = 'trim|required';
		$rules['post_code'] = 'trim|required';
		
		$this->validation->set_rules($rules);
		
		$shippingprice = $this-> shippingprice();
		$data['shippingprice']=$shippingprice['shippingprice'];
		
		if ($this->validation->run() == FALSE)
		{
			// $this->session->set_flashdata('msg', 'Please fill all the fields. Please try again!');
				
			// send back to confirmorder. validation error will be displayed automatically

			$this->validation->output_errors();
			$data['page'] = $this->config->item('backendpro_template_shop') . 'confirmorder';
			$data['module'] = lang('webshop_folder');
			$this->load->view($this->_container,$data);
			}
			else
			{
			/*
			 * If validation is ok, then
			 * 1. enter customer info to db through $this->MOrders->entercustomerinfo();
			 * 2. enter oder info to db through $this->MOrders->enterorderinfo();
			 * 3. enter oder items to db $this->MOrders->enterorderitems();
			 * 4. send email to the customer and me
			 * 5. redirect to ordersuccess page and display thanks message
			 *
			 */
			$totalprice = $_SESSION['totalprice'];
			
			$this->MOrders->enterorder($totalprice);
			
			//Create body of message by cleaning each field and then appending each name and value to it
			
			$body = "<h1>".lang('email_here_is')."</h1><br />";
			$email = db_clean($this->input->post('email'));
			$lastname = db_clean($this->input->post('lname'));
			$firstname = db_clean($this->input->post('fname'));
			$name = $firstname + " " + $lastname;
			
			// $shipping= 65;
			$shipping = $_SESSION['shippingprice'];
			$body .= "<table border='1' cellspacing='0' cellpadding='5' width='80%'><tr><td><b>".lang('email_number_of_order')."</b></td><td><b>".lang('email_product_name')."</b></td><td><b>".lang('email_product_price')."</b></td></tr>";
			if (count($_SESSION['cart'])){
				$count = 1;
				foreach ($_SESSION['cart'] as $PID => $row){
				  
					$body .= "<tr><td><b>". $row['count'] . "</b></td><td><b>" . $row['name'] . "</b></td><td><b>" . $row['price']."</b></td></tr>";
				}
			}
			$grandtotal = (int)$totalprice + $shipping;
			$body .= "<tr><td colspan='2'><b>".lang('orders_sub_total_nor')." </b></td><td colspan='1'><b>".number_format($totalprice,2,'.',','). "</b></td></tr>";
			$body .= "<tr><td colspan='2'><b>".lang('orders_shipping_nor')." </b></td><td colspan='1'><b>". number_format($shipping ,2,'.',',') . "</b></td></tr>";
			$body .= "<tr><td colspan='2'><b>".lang('orders_total_with_shipping')." </b></td><td colspan='1'><b>".number_format($grandtotal,2,'.',','). "</b></td></tr>";
			$body .= "</table><br />";
			
			$body .= "<table border=\"1\" cellspacing='0' cellpadding='5' width='80%'>";
			$body .= "<tr><td><b>".lang('orders_name').": </b></td><td><b>". $_POST['customer_first_name']." ". $_POST['customer_last_name']."</b></td></tr>";
			$body .= "<tr><td><b>".lang('orders_email').": </b></td><td><b>". $_POST['email']. "</b></td></tr>";
			$body .= "<tr><td><b>".lang('orders_mobile_tel').": </b></td><td><b>". $_POST['telephone']. "</b></td></tr>";
			$body .= "<tr><td><b>".lang('orders_shipping_address').": </b></td><td><b>". $_POST['shippingaddress']. "</b></td></tr>";
			$body .= "<tr><td><b>".lang('orders_post_code').": </b></td><td><b>". $_POST['post_code']. "</b></td></tr>";
			$body .= "<tr><td><b>".lang('orders_city').": </b></td><td><b>". $_POST['city']. "</b></td></tr>";
			$body .= "</table>";
			$body .= "<p><b>".lang('email_we_will_call')."</b></p>";
			extract($_POST);
			//removes newlines and returns from $email and $name so they can't smuggle extra email addresses for spammers
			
			$headers = "Content-Type: text/html; charset=UTF-8\n";
			$headers .= "Content-Transfer-Encoding: 8bit\n\n";
			
			//Create header that puts email in From box along with name in parentheses and sends bcc to alternate address
			$from='From: '. $email . "(" . $name . ")" . "\r\n" . 'Bcc: admin@gmail.com' . "\r\n";
			
			
			//Creates intelligible subject line that also shows me where it came from
			$subject = 'webshop.com Order confirmation';
			
			//Sends mail to me, with elements created above
			 mail ('admin@gmail.com', $subject, $body, $headers, $from);
			// Send confirmation email to the customer
			 mail ($email, $subject, $body, $headers, 'post@webshop.com');
	
			// $this->session->set_flashdata('msg', 'Thank you for your order! We will get in touch as soon as possible.');
			redirect(lang('webshop_folder').'/ordersuccess');
		}
  	}
	
  
  function ordersuccess(){
	
	unset($_SESSION['cart']);
	unset($_SESSION['totalprice']);
	$data['title'] = lang('webshop_shop_name')." | ". "Contact us";
	$data['page'] = $this->config->item('backendpro_template_shop') . 'ordersuccess';
	$data['module'] = lang('webshop_folder');
	$this->load->view($this->_container,$data);
  }

  //function ro save the customer review
  function save_review()
  {
  	$customer_id = $_SESSION['customer_id'];
	$data['customer_id'] = $customer_id;

	//Insert review
	$this->MProducts->review_insert($customer_id);
  }

  //function for saving the biling info
  function insert_bill() {

	//find customer id and assing it as $customer_id
	if ($this->data['customer_status']==0) {
		redirect('webshop/login');
	}

	//check if the cart is empty
	if (isset($_SESSION['cart'])) {
		# code...
	}
	else {
		redirect('webshop');
	}

	//check if the form was filled at all
	if (empty($this->input->post('firstname'))) {
		//set flash message
		flashMsg('fail', 'Please fill out the form');
		redirect('webshop/checkout', 'refresh');
	}

	//start form validation

	// set rules
		
	$rules['firstname'] = 'trim|required|min_length[3]|max_length[20]';
	$rules['lastname'] = 'trim|required|min_length[3]|max_length[20]';
	//$rules['address_1'] = 'trim|required|min_length[3]|max_length[10]';
	
	$this->validation->set_rules($rules);
	
	// set fields. This will be used for error messages
	// for example instead of customer_first_name, First Name will be used in errors
	if ($this->validation->run() == FALSE) {
		flashMsg('fail', 'Some fields are required');

		redirect('webshop/checkout', 'refresh');
	}

	//get the user id
	$customer_id = $_SESSION['customer_id'];
	$data['customer_id'] = $customer_id;

	//assing default value to shipping_check
	$data['shipping_check'] = 1;

	//assing empty array for shipping_info_id
	$shipping_id = '';


	//add other needed info 
	$data['order_status'] = 0;
	$data['payment_status'] = 0;
	$totalprice = $_SESSION['totalprice'];

	//save the billing details details 
	$this->MOrders->saveBilling($customer_id);
	

	// check if biling is same as shipping
	$checked = $this->input->post('shippingcheck');
	if ((int) $checked == 1) {
		
		$shipping_check = $data['shipping_check'];

		
			
		//$this->MOrders->enterorder($totalprice);
		
		//create oder info
		$create_shipping = $this->MOrders->createOrder($shipping_id,$customer_id,$totalprice,$shipping_check);
		//redirecting 
		$data['shipping_id'] = $create_shipping;
		redirect('webshop/checkout#tab-2', $create_shipping);
		
	} 
	else{

		//assing value to the shipping check column
		//means that the billing info is different from the shipping info
		$data['shipping_check'] = 0;
		$shipping_check = $data['shipping_check'];

		//check if a particular shipping info is selected

		if (empty($this->input->post('shippingSelect'))) {
			//save the shipping info
			$shipping_id = $this->MOrders->createShipping();
			$data['shipping_id'] = $shipping_id;
		} else {
			$data['shipping_id'] = $this->input->post('shippingcheck');
		}

		//create oder info
		$create_shipping = $this->MOrders->createOrder($shipping_id,$customer_id,$totalprice,$shipping_check);
		//redirecting 
		$data['shipping_id'] = $create_shipping;
		redirect('webshop/checkout#tab-2', $data);
	}
	
	
}
  
  
  
}//end controller class

?>