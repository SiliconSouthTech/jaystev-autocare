<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MOrders extends Model{
	 function  __construct(){
	    parent::Model();
	 }
 
	 
	 function getAllOrders(){
		$this->db->from('omc_order');
		$this->db->join('omc_customer', 'omc_order.customer_id = omc_customer.customer_id');
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
			$data[] = $row;
		}
		$Q->free_result();    
		return $data; 
		}
	 }

	 
	 function getOrders(){
		 $Q = $this->db->get('omc_order');
		 return $Q;
	 }
 
	 
	 function ordersToComplete(){
	 	$Q = $this->db->get_where('omc_order', array('delivery_date' => 0));	
	  	return $Q;
	      
	 }
 
	function getOrderDetails($id){
		 $this->db->select('omc_order_item.order_item_id,omc_order_item.order_id,omc_order_item.product_id,
						   omc_order_item.quantity,omc_order_item.price,omc_product.name,
						   omc_order.order_date, omc_order.delivery_date, omc_order.payment_date');
		 $this->db->from('omc_order_item');
		 $this->db->join('omc_product', 'omc_product.id = omc_order_item.product_id');
		 $this->db->join('omc_order', 'omc_order.order_id = omc_order_item.order_id');
		 $this->db->where('omc_order_item.order_id', $id);
		 $Q = $this->db->get();
		 
		 if ($Q->num_rows() > 0){
		       foreach ($Q->result_array() as $row){
		         $data[] = $row;
		       }
		 }
		 $Q->free_result();    
		 return $data; 
	 
	}
	
	
	function updateCart($productid,$fullproduct){
		$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
		$productid = id_clean($productid);
		$totalprice = 0;
		if (count($fullproduct)){
			if (isset($cart[$productid])){
				$prevct = $cart[$productid]['count'];
				$prevname = $cart[$productid]['name'];
				$prevprice = $cart[$productid]['price'];
				$cart[$productid] = array(
						'name' => $prevname,
						'price' => $prevprice,
						'count' => $prevct + 1
						);
			}else{
				$cart[$productid] = array(
						'name' => $fullproduct['description'],
						// 'price' => $this->format_currency($fullproduct['price']),
						// This should be done in view
						'price' => $fullproduct['price'],
						'count' => 1
						);			
			}				
				foreach ($cart as $id => $product){
					   	$totalprice += $product['price'] * $product['count'];
				} 
				
			// This format should be done later in a view otherwise it will mess up.
			$_SESSION['totalprice'] = $totalprice;
			$_SESSION['cart'] = $cart;
			$msg = lang('orders_added_cart');
			$this->session->set_flashdata('conf_msg', $msg); 
		}	
	}

	
	function removeLineItem($id){
		$id = id_clean($id);
		$totalprice = 0;
		$cart = $_SESSION['cart'];//$this->session->userdata('cart');
		if (isset($cart[$id])){
			unset($cart[$id]);
			foreach ($cart as $id => $product){
				$totalprice += $product['price'] * $product['count'];
			}		
			// this should be done later
			$_SESSION['totalprice'] = $totalprice;
			$_SESSION['cart'] = $cart;
			$msg = lang('orders_product_removed');
			echo $msg;
		}else{
			 $msg = lang('orders_not_in_cart');
			echo "Product not in cart!";
		}
	}

	
	function updateCartAjax($idlist){
		$cart = $_SESSION['cart'];//$this->session->userdata('cart');
		//split idlist on comma first
		$records = explode(',',$idlist);
		$updated = 0;
		$totalprice = $_SESSION['totalprice'];
		if (count($records)){
			foreach ($records as $record){
				if (strlen($record)){
					//split each record on colon
					$fields = explode(":",$record);
					$id = id_clean($fields[0]);
					$ct = $fields[1];
					
					if ($ct > 0 && $ct != $cart[$id]['count']){
						$cart[$id]['count'] = $ct;
						$updated++;
					}elseif ($ct == 0){
						unset($cart[$id]);
						$updated++;
					}
				}
			}
			if ($updated){
				$totalprice=0;
				$shippingprice = 0;
					foreach ($cart as $id => $product){
					   	$totalprice += $product['price'] * $product['count'];
					 	$maxprice = 0;
						foreach ($_SESSION['cart'] as $item) {
						    if ($item['price'] > $maxprice) {
						        $maxprice = $item['price'];
						    }
						}
					   if ($maxprice > 268 ){
					       $shippingprice = 65.0;
					   }else{
					   		$shippingprice = 25.0;
					   }
					} 
				$_SESSION['shipping'] = $shippingprice;
				$_SESSION['totalprice'] = $totalprice;
				$_SESSION['cart'] = $cart;
				switch ($updated){
					case 0:
					$string = lang('orders_no_records');
					break;
					
					case 1:
					$string = $updated . " " . lang('orders_record'); 
					break;
					
					default:
					$string = $updated . " " . lang('orders_records'); 
					break;
				}
				echo $string . $updated . " " . lang('orders_updated'); 
			}else{
				echo lang('orders_no_changes_detected');
			}
		}else{
			echo lang('orders_nothing_to_update');
		}
	}

	function verifyCart(){
		$cart = $_SESSION['cart'];
		$change = false;
		
		if (count($cart)){
			foreach ($cart as $id => $details){
				$idlist[] = $id;		
			}
			$ids = implode(",",$idlist);			
			$this->db->select('id,price');
			$this->db->where("id in ($ids)");
			$Q = $this->db->get('omc_product');
	    	if ($Q->num_rows() > 0){
				foreach ($Q->result_array() as $row){
					$db[$row['id']] = $row['price'];
				}
			}			
			foreach ($cart as $id => $details){
				if (isset($db[$id])){
					if ($details['price'] != $db[$id]){
						$details['price'] = $db[$id];
						$change = true;
					}
					$final[$id] = $details;
				}else{
					$change = true;
				}
			}
			$totalprice=0;
			foreach ($final as $id => $product){
				$totalprice += $product['price'] * $product['count'];
			}
			$_SESSION['totalprice'] = $totalprice;
			$_SESSION['cart'] = $final;
			$this->session->set_flashdata('change',$change);		
		}else{
			//nothing in cart!
			$this->session->set_flashdata('error',lang('orders_nothing_in_cart'));
		}	
	}

	
	 function format_currency($number){
		 return number_format($number,2,'.',',');
	 }
 
	 function enterorder($data,$totalprice){
	  
		  $data = array (
			  'customer_last_name' => db_clean($this->input->post('customer_last_name')),
			  'customer_first_name' => db_clean($this->input->post('customer_first_name')),
			  'phone_number' => db_clean($this->input->post('telephone')),
			  'email' => db_clean($this->input->post('email')),
			  'address' => db_clean($this->input->post('shippingaddress')),
			  'city' => db_clean($this->input->post('city')),
			  'post_code' => db_clean($this->input->post('post_code'))
		  );
		
		  	$e = $this->input->post('email');
			$numrow = $this->MCustomers->checkCustomer($e);
			if ($numrow == TRUE){
				// if there is email in db, then update the details
				$this->db->where('email', $e);
				$this->db->update('omc_customer',$data);
				// get the customer_id
				$customer_details = $this -> MCustomers->getCustomerByEmail($e);
				$customer_id = $customer_details['customer_id'];
			}else{
				// no email entry, then insert the details
		  		$this->db->insert('omc_customer',$data);
		  		// get the customer_id
		  		$customer_id = $this->db->insert_id();
			}
		
		  $data = array (
			   'customer_id'=> $customer_id,
			   'total' => $totalprice
		  );
		  $this->db->set('order_date', 'NOW()', FALSE);
		  $this->db->insert('omc_order', $data);
		  $order_id = $this->db->insert_id();
		  $cart = $_SESSION['cart'];
		  foreach ($cart as $id => $product){
				$data = array(
						'order_id' => $order_id,
						'product_id'=> $id ,
						'quantity' => $product['count'],
						'price'=> $product['price']
				);
		  $this->db->insert('omc_order_item', $data);
				}				
	 }
 
 
	 function setpayment($id){
		  $this->db->where('order_id', $id);
		  $this->db->set('payment_date', 'NOW()', FALSE);
		  $this->db->update('omc_order');
	 }
 
	  function setdelivery($id){
		  $this->db->where('order_id', $id);
		  $this->db->set('delivery_date', 'NOW()', FALSE);
		  $this->db->update('omc_order');
	 }
 
 
	 function deleteOrderItem($id){
			$this->db->where('order_item_id', id_clean($id));
			$this->db->delete('omc_order_item');	
	 }
 
	 function deleteOrder($id){
			$this->db->where('order_id', id_clean($id));
			$this->db->delete('omc_order');	
	 }
 
 
	 function checkOrphans($id){
		 	$data = array();
		 	$this->db->select('order_item_id,name');
		 	$this->db->where('order_id',id_clean($id));
		 	$Q = $this->db->get('omc_order_item');
		    if ($Q->num_rows() > 0){
				return TRUE;
		    }else{
			 	return FALSE;
			}
		    $Q->free_result();   	
	 }
	 
 
	 function findParent($order_item_id){
		  $this->db->where('order_item_id', $order_item_id);
		  $Q = $this->db->get('omc_order_item');
		    	if ($Q->num_rows() > 0){
					foreach ($Q->result_array() as $row){
						$data[] = $row;
					}
				}
		   $Q->free_result();  
		   return $data; 	
	 }
	 
	 
	 function findsiblings($order_id){
		  $this->db->where('order_id', $order_id);
		  $Q = $this->db->get('omc_order_item');
		    	if ($Q->num_rows() > 0){
					foreach ($Q->result_array() as $row){
						$data[] = $row;
					}
				}
		   $Q->free_result();  
		   return $data; 
	 }

	 function check_billing($customer_id)
	 {
	 	$this->db->where('customer_id', $customer_id);
	 	$Q = $this->db->get('omc_billing_info');
	 	if ($Q->num_rows() > 0) {
	 		return TRUE;
	 	}
	 	else {
	 		return FALSE;
	 	}
	 }

	 function saveBilling($customer_id)
	 {
	 	$data = array('customer_id' => $customer_id,
	 					'company_name' => $this->input->post('company_name'),
	 					'title' => $this->input->post('title'),
						'firstname' => $this->input->post('firstname'),
						'midname' => $this->input->post('midname'),
						'lastname' => $this->input->post('lastname'),
						'address_1' => $this->input->post('address_1'),
						'address_2' => $this->input->post('address_2'),
						'zip' => $this->input->post('zip'),
						'city' => $this->input->post('city'),
						'state' => $this->input->post('state'),
						'phone' => $this->input->post('phone'),
						'phone_2' => $this->input->post('phone_2'));
	 	//check if the user has an already existing billing info
		$billing_status = $this->check_billing($customer_id);
		if ($billing_status == TRUE) {
			// do update of user billing info
			$this->db->update('omc_billing_info', $data);
		} else {
			// do insert of user billing info
			$this->db->insert('omc_billing_info', $data);
		}
	 	
	 }

	 function createShipping()
	 {
	 	$shippingData = array('customer_id' => $_SESSION['customer_id'],
	 							'shipping_info_name' => $this->input->post('shippingname'),
	 							'company_name' => $this->input->post('shippingCompanyname'),
	 							'firstname' => $this->input->post('shippingFirstname'),
	 							'midname' => $this->input->post('shippingmiddlename'),
	 							'lastname' => $this->input->post('shippinglastname'),
	 							'address_1' => $this->input->post('shippingaddress1'),
	 							'address_2' => $this->input->post('shippingaddress2'),
	 							'zip' => $this->input->post('shippingzip'),
	 							'city' => $this->input->post('shippingcity'),
	 							'state' => $this->input->post('shippingstate'),
	 							'phone' => $this->input->post('shippingphone1'),
	 							'phone_2' => $this->input->post('shippingphone2') );
	 	$this->db->insert('omc_shipping_info', $shippingData);
	 	return $this->db->insert_id();
	 }

	 function createOrder($shipping_id,$customer_id,$totalprice,$shipping_check)
	 {
	 	$orderDetail = array('customer_id'=> $customer_id,
			   					'total' => $totalprice,
			   					'shipping_check' => $shipping_check,
			   					'shipping_info_id' => $shipping_id,
			   					 );
	 	$this->db->set('order_date', 'NOW()', FALSE);
	 	$this->db->insert('omc_order', $orderDetail);
	 	$shipping_id = $this->db->insert_id();
		return  $shipping_id;
		//$order_id = $this->db->insert_id();


	 }

	 function getBillingInfo($customer_id)
	 {
	 	$this->db->where('customer_id', $customer_id);
	 	$Q = $this->db->get('omc_billing_info');
	 	if ($Q->num_rows() > 0){
					foreach ($Q->result_array() as $row){
						$data = $row;
					}
				}
		   $Q->free_result();  
		   return $data;
	 }

	 //start of function for the payment

	 public function generate_random_str($length, $type = 'alphanumeric', $combination = array()) {
    if (!is_numeric($length) || $length < 0) {
        return '';
    }
     
    $str = '';
    $uppercase = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $lowercase = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    $number = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
    $special = array('~', '!', '@', '#', '$', '%', '^' . '&amp;amp;', '*', '+', '=', '.', '-', '_', '(', ')', '{', '}', '[', ']');
    $stock = array();
    $stockMinIndex = 0;
 
    if ($combination) {
        foreach ($combination as $element) {
            if (isset($$element)) {
                $stock[] = $$element;
            }
        }
    } 
    else 
    {
        switch ($type) {
            case 'uppercase' :
                $stock = array($uppercase);
                break;
            case 'lowercase' :
                $stock = array($lowercase);
                break;
            case 'letter' :
                $stock = array($uppercase, $lowercase);
                break;
            case 'number' :
                $stock = array($number);
                break;
            case 'special' :
                $stock = array($special);
                break;
            case 'alphanumeric' :
                $stock = array($uppercase, $lowercase, $number);
                break;
            case 'password' :
            case 'all' :
                $stock = array($uppercase, $lowercase, $number, $special);
                break;
            default :
                $stock = array($uppercase, $lowercase, $number);
                break;
        }
    }
     
    if (empty($stock)) {
        return '';
    }
 
    $stockMaxIndex = count($stock) - 1;
 
    $i = 0;
    while ($i < $length) {
        $stockIndex = mt_rand($stockMinIndex, $stockMaxIndex);
        $str .= $stock[$stockIndex][mt_rand(0, count($stock[$stockIndex]) - 1)];
        $i++;
    }
    return $str;
}

public function return_checked_str($length, $type = 'alphanumeric', $combination = array()) 
{
	$str = $this->generate_random_str($length, $type , $combination);
	///for checking the database for exitence of reference number
     	$this->db->select('ref');
        $this->db->from('reference');
        $this->db->where('ref', $str);
        

        $query = $this->db->get();

        if($query->num_rows() == 1) {
        	$str = $this->generateRandomStr($length, $type , $combination);
        	$data = array
        	(
        		'ref' =>$str
        	);
        	$this->db->insert('reference',$data);
       
        }
        else
        {
        	$data = array
        	(
        		'ref' =>$str,
        		'used' =>0
        	);
        	$this->db->insert('reference',$data);
        }

        return $str;


}
public function return_ref_val() 
{
		
		$ref="";
     	$this->db->select('used,ref');
        $this->db->from('reference');
       // $this->db->where('ref', $ref);
        

        $query = $this->db->get();


        if($query->num_rows() != 0) 
        {
        	     $row = $query->row();
        	     $used = $row->used;
        	if($used == 0)
        	{
        		$ref = $row->ref;
        	}
       
        }
        

        return $ref;


}
public function return_user_email($user_id)
{

	 $this->db->select('email');
        $this->db->from('omc_customer');
        $this->db->where('customer_id', $user_id);
        

        $query = $this->db->get();

        if($query->num_rows() == 1) {
           $row = $query->row();

          
               $user_email = $row->email;
               
              
               return $user_email;
         
        }
}
public function return_auth_code($last4)
{

	 $this->db->select('auth_code');
        $this->db->from('card_log');
        $this->db->where('last4', $last4);
     

        $query = $this->db->get();

      if($query->num_rows() == 1) {
           $row = $query->row();

         
               $array['auth_code'] = $row->auth_code;
               /*$array['card_type'] = $row->card_type;
               $array['last4'] = $row->last4;
               $array['bank'] = $row->bank;
               $array['first_name'] = $row->first_name;
               $array['last_name'] = $row->last_name;
               $array['email'] = $row->email;*/
               return $array;
         
        }
       /*  else
        {
        	$array['resp'] = "not_found";
        	return $array;
        }*/

       // return $query->result();
}
public function return_payment_info($user_id)
{

	 $this->db->select('auth_code, card_type, last4, bank, first_name, last_name, email');
        $this->db->from('card_log');
        $this->db->where('user_id', $user_id);
     

        $query = $this->db->get();

      /* if($query->num_rows() == 1) {
           $row = $query->row();

         
               $array['auth_code'] = $row->auth_code;
               $array['card_type'] = $row->card_type;
               $array['last4'] = $row->last4;
               $array['bank'] = $row->bank;
               $array['first_name'] = $row->first_name;
               $array['last_name'] = $row->last_name;
               $array['email'] = $row->email;
               return $array;
         
        }
        else
        {
        	$array['resp'] = "not_found";
        	return $array;
        }*/

        return $query->result();
}
public function log_payment_info($auth_code,$card_type,$last4,$bank,$user_id,$first_name,$last_name,$user_email,$first_trans_date,$status,$reference,$domain)
{
    	$this->db->select('user_id');
        $this->db->from('card_log');
        $this->db->where('last4', $last4);
        

        $query = $this->db->get();

        if($query->num_rows() == 1) {
        	
        }
        else
        {
        	
          	$log_data_array = array(
          		"auth_code"=>$auth_code,
          		"card_type"=>$card_type,
          		"last4"=>$last4,
          		"bank"=>$bank,
          		"user_id"=>$user_id,
          		"first_name"=>$first_name,
          		"last_name"=>$last_name,
          		"email"=>$user_email,
          		"first_trans_date"=>$first_trans_date,
          		"status"=>$status,
          		"reference"=>$reference,
          		"domain"=>$domain
          		);
        	
        	$this->db->insert('card_log',$log_data_array);
        }


    }
public function payment_details($first_trans_date,$type_of_payment,$status,$amount,$user_id,$reference,$reference,$goal_type,$message,$domain)
{
    	
          $log_array = array(

          		"date_time"=>$first_trans_date,
          		"type_of_payment" => $type_of_payment,
          		"status"=>$status,
          		"amount"=>$amount,
          		"user_id"=>$user_id,
          		"ref"=>$reference,
          		"trans_id" => $reference,
          		"goal_type"=>$goal_type,
          		"message"=>$message,          		
          		"domain"=>$domain
          		);
            
        	
        	$this->db->insert('payment_log',$log_array);
       

    }

	 
}//end class
?>