<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class MProducts extends Model{
	 function MProducts(){
	 	parent::Model();
	 }

	 //modify table to fetch all the data from the new table... >> or Modify the existing table
	 
 	function getProduct($id){
 		// getting info of single product.
	    $data = array();
	    //$options = array('part_number' => id_clean($id));
	    $this->db->where('part_number', id_clean($id));
	    $Q = $this->db->get('omc_product');
	    if ($Q->num_rows() > 0){
	      	$data = $Q->row_array();
	    }
	    else{
	    	$options = array('id' => id_clean($id));
		    $Q = $this->db->getwhere('omc_product',$options,1);
		    if ($Q->num_rows() > 0){
		      	$data = $Q->row_array();
		    }
	    }
	    $Q->free_result();    
	    return $data;    
 	}

 	function getAllProducts(){
 		// getting all the products of the same categroy.
     	$data = array();
	    $Q = $this->db->query('SELECT P.*, C.Name AS CatName FROM omc_product AS P LEFT JOIN omc_category AS C ON C.id = P.category_id');
	    if ($Q->num_rows() > 0){
	    	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	       }
	    }
	    $Q->free_result();    
	    return $data; 
 }
 
/* Not used any more
 * This was used to get featured products. Need to replace featured_name_here to a featured name.
 	function getProducts(){
    	$data = array();
	    $Q = $this->db->query('SELECT P.*, C.Name AS CatName 
	    FROM omc_product AS P 
	    LEFT JOIN omc_category AS C ON C.id = P.category_id 
	    WHERE featured = "featured_name_here"'); 
	    return $Q;
 }
 */
 
	 function getProductsByCategory($catid){
	  // this is used in function cat($id) in the shop frontend
	  // When a product is clicked this will be used.
	  // If not $cat['parentid'] < 1
	  // $catid is given in URI, the third element
	     $data = array();
	     $this->db->where('category_id', id_clean($catid));
	     $this->db->where('status', 'active');
	     $this->db->orderby('name','asc');
	     $Q = $this->db->get('omc_product');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[] = $row;
	       }
	    }
	    $Q->free_result();    
	    return $data; 
	 } 
 
 
	  function getProductsByGroup($limit,$group,$skip){
	   // page 99
	   // for the shop fron-end controller function product($id)
	     $data = array();
	     if ($limit == 0){
	     	$limit=3;
	     }
	     $this->db->select('id,name,shortdesc,thumbnail');
	     $this->db->where('grouping', db_clean($group,16));
	     $this->db->where('status', 'active');
	     $this->db->where('id !=', id_clean($skip));
	     $this->db->orderby('name','asc');
	     $this->db->limit($limit);
	     $Q = $this->db->get('omc_product');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[] = $row;
	       }
	    }
	    $Q->free_result();    
	    return $data; 
	 } 
 
	  function getGallery($id){
	   
	   $data = array();
	    
	     $Q = $this->db->query('SELECT P.*, C.Name AS CatName
				   FROM omc_product AS P
				   LEFT JOIN omc_category C
				   ON C.id = P.category_id
				   WHERE C.Name = "Galleri ' . $id . '"
				   AND P.status = "active"
				   ');
	   
	     
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[] = $row;
	       }
	      }
	    
	    $Q->free_result();
	    
	    return $data;
	 }
 
	 function getMainFeature(){
	     $data = array();
	     $this->db->select("id,name,shortdesc,image"); 
	     $this->db->where('featured','true');
	     $this->db->where('status', 'active');
	     $this->db->order_by('name','random'); 
	     
	     $Q = $this->db->get('omc_product');
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[] = $row;
	       }
	    }
	    $Q->free_result();    
	    return $data;  
	 }
 
	 
	 function getFrontFeature($feature){
	     $data = array();
	     $this->db->where('featured',$feature);
	     $this->db->where('status', 'active');
		 $this->db->LIMIT(9);
	     $this->db->order_by('name','random'); 
	     $Q = $this->db->get('omc_product');
	     if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	       }
	    }
	    $Q->free_result();    
	    return $data;  
	 }
 
	 
	 function getFeatureProducts($catname){
	     $data = array();
	     $Q = $this->db->query("SELECT P.*, C.Name AS CatName 
	                   FROM omc_product AS P
	                   LEFT JOIN omc_category AS C
	                   ON C.id = P.category_id
	                   WHERE C.Name = '$catname'
	                   AND P.status = 'active'
	                   ORDER BY RAND()
	                   ");
	     if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[] = $row;
	       }
	    }
	    $Q->free_result();    
	    return $data;  
	 }
 
	 function getFrontbottom(){
	     $data = array();
	     $Q = $this->db->query("SELECT P.*, C.Name AS CatName 
	                   FROM omc_product AS P
	                   LEFT JOIN omc_category AS C
	                   ON C.id = P.category_id
	                   WHERE C.Name = 'Front bottom'
	                   AND P.status = 'active'
	                   ORDER BY RAND()
	                   ");
	     if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        $data[] = $row;
	       }
	    }
	    $Q->free_result();    
	    return $data;  
	 
	 }
	 
	function getRandomProducts($limit,$skip){
		// when you want to select three random products, use this.
		$data = array();
		$temp = array();
		if ($limit == 0){
			$limit=3; // change this number 
		}
		$this->db->select("id,name,thumbnail,category_id");
		$this->db->where('id !=', id_clean($skip));
		$this->db->where('status','active');
		$this->db->orderby("category_id","asc"); 
		$this->db->limit(100);
		$Q = $this->db->get('omc_product');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$temp[$row['category_id']] = array(
					"id" => $row['id'],
					"name" => $row['name'],
					"thumbnail" => $row['thumbnail']
	         	);
			}
		}
	
		shuffle($temp);
		if (count($temp)){
			for ($i=1;$i<=$limit; $i++){
				$data[] = array_shift($temp);
			} 
		}
		$Q->free_result();    
		return $data;  
	}
	
	
	
	function search($year,$car_make,$car_model,$fuel_capacity){

		//add code for finding year in between
		//try checking if its greater than or it is less than
		//for each of the columns
		
		$this->db->where("(Make LIKE '%$car_make%' OR Model LIKE '%$car_model%' OR Fuel_System LIKE '%$fuel_capacity%')");
	    $this->db->select("filter_reference");
	    $Q = $this->db->get('product_info');
	    if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	       		$search_string = $row['filter_reference'];
	       		//$data['product_category'] = $row['category'];
				$this->db->where('part_number',$search_string);
			    $Q = $this->db->get('omc_product');
			    if ($Q->num_rows() > 0){
			       foreach ($Q->result_array() as $row){
			         $data[] = $row;
			       }
			    }
			    $Q->free_result();    
			    return $data;
	       }
	    }
	    
	}


	function search_partnumber($part_number){

		//add code for finding year in between
		//try checking if its greater than or it is less than
		//for each of the columns
		
		$this->db->where("(part_number LIKE '%$part_number%')");
	    $this->db->select("id");
	    $Q = $this->db->get('omc_product');
	    if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	       		$data = $row['id'];
	       		
			    $Q->free_result();    
			    return $data;
	       }
	    }
	    
	}


	 
	 
	 function addProduct(){
		$data = $this->_uploadFile();
		$this->db->insert('omc_product', $data);	
		$new_product_id = $this->db->insert_id();
		if (isset($_POST['colors'])){
			foreach ($_POST['colors']  as $value){
				$data = array('product_id' => $new_product_id, 
						'color_id' => $value);
				$this->db->insert('omc_product_colors',$data);
			}
		}
		
		if (isset($_POST['sizes'])){
			foreach ($_POST['sizes']  as $value){
				$data = array('product_id' => $new_product_id, 
						'size_id' => $value);
				$this->db->insert('omc_product_sizes',$data);
			}	
		}	
	 }
	 
	function insertProduct(){
	 	$data = array( 
			'name' 			=> db_clean($_POST['name']),
			'shortdesc' 	=> db_clean($_POST['shortdesc']),
			'longdesc' 		=> db_clean($_POST['longdesc'],5000),
			'status' 		=> db_clean($_POST['status'],8),
	 		'product_order' => db_clean($_POST['product_order']),
			'class' 		=> db_clean($_POST['class'],30),
			'grouping' 		=> db_clean($_POST['grouping'],16),
			'category_id' 	=> id_clean($_POST['category_id']),
			'featured' 		=> db_clean($_POST['featured'],20),
			'price' 		=> db_clean($_POST['price'],16),
			'other_feature' => db_clean($_POST['other_feature'],20),
	 		'thumbnail'		=> db_clean($_POST['thumbnail']),
	 		'image'			=> db_clean($_POST['image'])
		);
		$this->db->insert('omc_product', $data);	
		$new_product_id = $this->db->insert_id();
	 }
	 
	 function updateProduct(){
		$data = $this->_uploadFile();
	 	$this->db->where('id', $_POST['id']);
		$this->db->update('omc_product', $data);	
		$this->db->where('product_id', $_POST['id']);
		$this->db->delete('omc_product_colors');
		$this->db->where('product_id', $_POST['id']);
		$this->db->delete('omc_product_sizes'); 
		if (isset($_POST['colors'])){
		 	foreach ($_POST['colors']  as $value){
				$data = array('product_id' => $_POST['id'], 
						'color_id' => $value);
				$this->db->insert('omc_product_colors',$data);
			}
		}
		
		if (isset($_POST['sizes'])){
			foreach ($_POST['sizes']  as $value){
				$data = array('product_id' => $_POST['id'], 
						'size_id' => $value);
				$this->db->insert('omc_product_sizes',$data);
			}	
		}		
	 }
	 
	function new_updateProduct(){
		$data = array( 
			'name' 			=> db_clean($_POST['name']),
			'shortdesc' 	=> db_clean($_POST['shortdesc']),
			'longdesc' 		=> db_clean($_POST['longdesc'],5000),
			'status' 		=> db_clean($_POST['status'],8),
	 		'product_order' => db_clean($_POST['product_order']),
			'class' 		=> db_clean($_POST['class'],30),
			'grouping' 		=> db_clean($_POST['grouping'],16),
			'category_id' 	=> id_clean($_POST['category_id']),
			'featured' 		=> db_clean($_POST['featured'],20),
			'price' 		=> db_clean($_POST['price'],16),
			'other_feature' => db_clean($_POST['other_feature'],20),
	 		'thumbnail'		=> db_clean($_POST['thumbnail']),
	 		'image'			=> db_clean($_POST['image'])
		);
	 	$this->db->where('id', $_POST['id']);
		$this->db->update('omc_product', $data);			
	 }
	 
	 
	 function getFeaturedProducts($feature){
	  	$data = array();
	    $this->db->from('omc_product');
		$this->db->where('other_feature', $feature);
		$this->db->where('status', 'active');
		$this->db->limit(1);
		$this->db->order_by("id", "random"); 
		$Q = $this->db->get();
	    if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[] = $row;
	       }
	    }
	    $Q->free_result();    
	    return $data;  
	 }
	 
	 
	 function _uploadFile(){
	 	$data = array( 
			'name' => db_clean($_POST['name']),
			'shortdesc' => db_clean($_POST['shortdesc']),
			'longdesc' => db_clean($_POST['longdesc'],5000),
			'status' => db_clean($_POST['status'],8),
			'class' => db_clean($_POST['class'],30),
			'grouping' => db_clean($_POST['grouping'],16),
			'category_id' => id_clean($_POST['category_id']),
			'featured' => db_clean($_POST['featured'],20),
			'price' => db_clean($_POST['price'],16),
			'other_feature' => db_clean($_POST['other_feature'],20)
		);
	  	$catname = array();
		$category_id = $data['category_id'];
		$catname = $this->MCats->getCategoryNamebyProduct($category_id);
		foreach ($catname as $key => $name){
			$foldername = createdirname($name);
			}
		if ($_FILES){
			$config['upload_path'] = './assets/images/'.$foldername.'/';
			$config['allowed_types'] = 'gif|jpg|png|ico';
			$config['max_size'] = '400';
			$config['remove_spaces'] = true;
			$config['overwrite'] = true;
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			// Here we are loading CI's file uploading class
			$this->load->library('upload', $config);	
			if (strlen($_FILES['image']['name'])){
				if(!$this->upload->do_upload('image')){
					$this->upload->display_errors();
					 exit("unable to open file ($foldername). The folder does not exist. You need to create a category first.");
				}
				$image = $this->upload->data();
				if ($image['file_name']){
					$data['image'] = "assets/images/".$foldername."/".$image['file_name'];
				}
			}
			$config['upload_path'] = './assets/images/'.$foldername.'/thumbnails/';
			$config['allowed_types'] = 'gif|jpg|png|ico';
			$config['max_size'] = '200';
			$config['remove_spaces'] = true;
			$config['overwrite'] = true;
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			//initialize otherwise thumb will take the first one
			$this->upload->initialize($config);			
			if (strlen($_FILES['thumbnail']['name'])){
				if(!$this->upload->do_upload('thumbnail')){
					$this->upload->display_errors();
					exit("unable to open a thumbnail folder in the folder ($foldername). You need to contact Admin.");
				}
				$thumb = $this->upload->data();
				if ($thumb['file_name']){
					$data['thumbnail'] = "assets/images/".$foldername."/thumbnails/".$thumb['file_name'];
				}
			}
		}
		return $data;
	 }
	 
	 
	 function deleteProduct($id){
	 	// $data = array('status' => 'inactive');
	 	$this->db->where('id', id_clean($id));
	 	//change the deleting mode to update and add delete flag 
		$this->db->delete('omc_product');	
	 }
		
		
	 function changeProductStatus($id){
		// getting status of page
		$productinfo = array();
		$productinfo = $this->getProduct($id);
		$status = $productinfo['status'];
		if($status =='active'){	
			$data = array('status' => 'inactive');
			$this->db->where('id', id_clean($id));
			$this->db->update('omc_product', $data);	
		}else{
			$data = array('status' => 'active');
			$this->db->where('id', id_clean($id));
			$this->db->update('omc_product', $data);	
		}
	 }
		
	  function batchUpdate(){
	  	if (count($this->input->post('p_id'))){
				$data = array('category_id' => id_clean($this->input->post('category_id')),
		  					'grouping' => db_clean($this->input->post('grouping'))
		  					);
		  		$idlist = implode(",",array_values($this->input->post('p_id')));
				$where = "id in ($idlist)";
		  		$this->db->where($where);
		  		$this->db->update('omc_product',$data);
		  		$this->session->set_flashdata('message', 'Products updated');
	  	}else{
	    		$this->session->set_flashdata('message', 'Nothing to update!');
		} 
	  
	  }
	
	 function exportCsv(){
	 	$this->load->dbutil();
	 	$Q = $this->db->query("select * from omc_product");
	 	return $this->dbutil->csv_from_result($Q,",","\n");
	 }
	 
	 function importCsv(){
		$config['upload_path'] = './csv/';
		$config['allowed_types'] = 'csv';
		$config['max_size'] = '2000';
		$config['remove_spaces'] = true;
		$config['overwrite'] = true;
		// Here we are loaind CI's File Uploading class
		$this->load->library('upload', $config);
		$this->load->library('CSVReader'); 
		if(!$this->upload->do_upload('csvfile')){
			$this->upload->display_errors();
			exit();
		}
		$csv = $this->upload->data();
		$path = $csv['full_path'];
		return $this->csvreader->parseFile($path);
	 }
	 
	 
	 function csv2db(){
	 	unset($_POST['submit']);
	 	unset($_POST['csvgo']);
	 	foreach ($_POST as $line => $data){
	 		if (isset($data['id'])){
	 			$this->db->where('id',$data['id']);
	 			unset($data['id']);
	 			$this->db->update('omc_product',$data);	
	 		}else{
	 			$this->db->insert('omc_product',$data);
	 		}
	 	}
	 }
	 
	 
	 function reassignProducts(){
	 	$data = array('category_id' => $this->input->post('categories'));
		$idlist = implode(",",array_keys($this->session->userdata('orphans')));
		$where = "id in ($idlist)";
	 	$this->db->where($where);
	 	$this->db->update('omc_product',$data);
	 } 
	 
	 
	 function getAssignedColors($id){
	 	// not using anymore
	 	$data = array();
	 	$this->db->select('color_id');
	 	$this->db->where('product_id',id_clean($id));
	 	$Q = $this->db->get('omc_product_colors');
	    if ($Q->num_rows() > 0){
	     /**
	      * products_colors table have product_id and color_id
	      * This will select color_id. where product_id=$id.
	      * e.g. product id = 7 may have color_id 2, 3, 4.
	      */
	      
	       foreach ($Q->result_array() as $row){
	         $data[] = $row['color_id'];
	       }
	    }
	    $Q->free_result();    
	    return $data; 	
	 }
	 
	 
	 function getAssignedSizes($id){
	 	// not using anymore
	  /**
	   * products_sizes table has product_id and size_id fields
	   * This will be the same as getAssignedColors() function above
	   * It will returns size_id where product_id is $id
	   * e.g product id=7 may have size_id 2,3,4 etc
	   */
	 	$data = array();
	 	$this->db->select('size_id');
	 	$this->db->where('product_id',id_clean($id));
	 	$Q = $this->db->get('omc_product_sizes');
	    if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data[] = $row['size_id'];
	       }
	    }
	    $Q->free_result();    
	    return $data; 	
	 }

	 function getImage($PID)
	 {
	 	$this->db->select('image_url');
	 	$this->db->where('id', $PID);
	 	$this->db->limit(1);
	 	$Q = $this->db->get('omc_product');
	 	if ($Q->num_rows() > 0){
	       foreach ($Q->result_array() as $row){
	         $data = $row['image_url'];
	       }
	    }
	    $Q->free_result();    
	    return $data; 

	 	

	 }

	 function review_insert($customer_id){
		//Grab customer's ID
		//Code to get Customer's ID

		$data = array(
	'order_id' => $this->input->post('order_id'),
	'customer_id' => $customer_id,
	'customer_review' => $this->input->post('review'),
	'customer_request' => $this->input->post('request'),
	'customer_rating' => $this->input->post('rating'),
	);

	// Inserting in Table(omc_billing_info) of Database(cart)
	$this->db->insert('omc_review', $data);

	}
	 
 
}//end class
?>