<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Webshop Language Array
 *
 * Contains all language strings used by the webshop class.
 *
 * @subpackage		Languages
 * @author          Shin Okada
 * @copyright       Copyright (c) 2010
 * @license         http://www.gnu.org/licenses/lgpl.html
 * @link            http://www.okadadesign.no
 * @filesource
 */

// ---------------------------------------------------------------------------

/* Webshop field names */

// Change this according to your module folder name. 
$lang['webshop_shop_name'] = 'Jastev Autocare';
$lang['webshop_folder'] = 'webshop';
$lang['webshop_buy'] = 'BUY';


// modules/webshop/views/customerlogin.php
$lang['customer_login_enjoy_shopping'] = 'Enjoy your shopping!';
$lang['customer_login_plz_login'] = 'Please login. This will fill up your details at check out automatically.';


// modules/webshop/views/shoppingcart.php
$lang['webshop_update'] = 'Update';
$lang['webshop_delete'] = 'DELETE';
$lang['webshop_checkout'] = 'Go to Checkout';
$lang['webshop_no_items_to_show'] = 'No item to show';
$lang['webshop_will_be_added'] = 'will be added';
$lang['webshop_shipping_charge'] = 'Shipping charge';
$lang['webshop_currency'] = 'dollars';
$lang['webshop_currency_symbol'] = '₦'; // &#36;
$lang['webshop_shoppingcart_empty'] = 'Shopping cart is empty';
$lang['webshop_search'] = 'search';


// modules/webshop/views/registration.php
$lang['webshop_email'] = 'Email';
$lang['webshop_email_confirm'] = 'Email Confirmation';
$lang['webshop_pass_word'] = 'Password';
$lang['webshop_first_name'] = 'First Name';
$lang['webshop_last_name'] = 'Last Name';
$lang['webshop_mobile_tel'] = 'Mobile/Telephone';
$lang['webshop_shipping_address'] = 'Shipping Address';
$lang['webshop_post_code'] = 'Postal Code';
$lang['webshop_city'] = 'City';
$lang['webshop_register'] = 'Register';
$lang['webshop_regist_plz_here'] = 'Please register here. ';
$lang['webshop_price'] = 'Price';
$lang['webshop_registed_before'] = 'Your email is in our database. Please login.';
$lang['webshop_thank_registration'] = 'Thank you for your registration! You may log in now.';

// modules/webshop/controllers/webshop.php for function messages
$lang['webshop_message_contact_us'] = 'Contact us';
$lang['webshop_message_contact'] = 'Contact';
$lang['webshop_message_subject'] = 'Email message form Jastev Autocare.';
$lang['webshop_message_sender'] = 'Sender ';
$lang['webshop_message_sender_email'] = 'Sender email ';
$lang['webshop_message_message'] = 'Message ';
$lang['webshop_message_thank_for_message'] = 'Thanks for your message! You have sent email.';

$lang['message_message'] = 'Message ';


$lang['genral_login_msg'] = "Or click <span class='login'>%s</span> if you are already registered.";
$lang['genral_logged_in'] = "You are logged in";
$lang['general_hello'] = "Hello ";
$lang['general_web_shop'] = 'Web shop';
$lang['general_check_out'] = 'Go to check out';
$lang['genral_login'] = "Log in";


/* Strings used on general page */
$lang['general_login'] = 'Log in';
$lang['general_logout'] = 'Log out';
$lang['general_not_logged_in'] = 'You are not logged in.';
$lang['general_cart'] = 'Cart';
$lang['general_shopping_cart'] ='Shopping cart';
$lang['general_search_results'] ='Search Results';
$lang['general_name'] = "Name";
$lang['general_pass_word'] = "Password";
$lang['general_register'] = "Register";
$lang['genral_login_msg'] = "Or click <span class='login'>%s</span> if you are already registered.";
$lang['genral_logged_in'] = "You are logged in";
$lang['general_hello'] = "Hello ";
$lang['general_web_shop'] = 'Web shop';
$lang['general_check_out'] = 'Go to check out';

/* orders */
$lang['orders_added_cart'] = "We have added this product to the shopping cart.";
$lang['orders_product_removed'] = "Product removed.";
$lang['orders_not_in_cart'] = "Product not in shopping cart!";
$lang['orders_no_records'] = "No records";
$lang['orders_record'] = "record";
$lang['orders_records'] = "records";
$lang['orders_updated'] = "updated";
$lang['orders_no_changes_detected'] = "No changes detected";
$lang['orders_nothing_to_update'] = "Nothing to update";
$lang['orders_nothing_in_cart'] = "Nothing in cart!";
$lang['orders_no_item_yet'] = "You have no item yet!";
$lang['orders_total_price'] = "Total Price";


/* views/shoppingcart.php*/
$lang['orders_no_items_to_show'] = "No items to show here!";
$lang['orders_shipping_charge'] = "The shipping charge ";
$lang['orders_will_be_added'] = " will be added to this price.";
$lang['orders_delete'] = "delete";
$lang['orders_update'] = "update";
$lang['orders_checkout'] = "Go to Checkout";

/* view/confirmorder.php*/
$lang['orders_plz_confirm'] = "Please Confirm Your Order and Fill up Your Details";
$lang['orders_confirm_before'] = "Please confirm your order before clicking the Email Your Order Now button below. Vis du har changes, ";
$lang['orders_go_to_cart'] = "go back to your shopping cart";
$lang['orders_sub_total_nor'] = "SUB-TOTAL :NOR ";
$lang['orders_shipping_nor'] = "Shipping: NOR ";
$lang['orders_total_with_shipping'] = "TOTAL (with shipping):NOR ";
$lang['orders_name'] = "Name";
$lang['orders_first_name'] = "First Name";
$lang['orders_last_name'] = "Last Name";
$lang['orders_mobile_tel'] = "Mobile/Telephone";
$lang['orders_email'] = "Email";
$lang['orders_email_confirm'] = "Email Confirm";
$lang['orders_shipping_address'] = "Shipping Address";
$lang['orders_post_code'] = "Post number";
$lang['orders_city'] = "City";
$lang['orders_email_order'] = "Email Order";


/*ordersuccess.php */
$lang['orders_thank_you'] = "Thank you for your order! We will get in touch as soon as possible. Please check your email. We have sent confirmation email.";
 
 
/* controllers/webshop/emailorder*/

$lang['email_here_is'] = "Here is the details of order submitted to www.jastev.com";
$lang['email_number_of_order'] = "Nummer of bestilling";
$lang['email_product_name'] = "Product navn";
$lang['email_product_price'] = "product pris";
$lang['email_we_will_call'] = "Thank you for your order. We will call you as soon as possible.";
$lang['email_order_conf'] = "Order confirmation";


/* views/contact.php */

$lang['contact_your_message']="Your message";
$lang['contact_captcha']= "Type the two words please";
$lang['contact_send']= "Send";
$lang['contact_if_you_human'] = "If you are human, please input six letters or nummers. Please try again!";
$lang['contact_all_field_required'] = "All fields are required . Please try ingen!";


// modules/webshop/controllers/subscribe function
$lang['subscribe_newsletter'] = 'Newsletter';
$lang['subscribe_subscribe'] = 'Subscribe';
$lang['subscribe_unsubscribe'] = 'Unsubscribe';
$lang['subscribe_name'] = 'Name';
$lang['subscribe_registed_before'] = 'Your email is already in our list.';
$lang['subscribe_thank_for_subscription'] = 'Thanks for subscribing our newsletter!';
$lang['subscribe_you_been_subscribed'] = 'You have been unsubscribed!';
$lang['subscribe_need_login'] = 'You need to login first';
$lang['subscribe_you_been_unsubscribed'] = 'You have been unsubscribed from Newsletter';

// modules/webshop/controllers/login function
$lang['login_logged_in'] = 'You are logged in!';
$lang['login_email_pw_incorrect'] = 'Sorry, your email or password is incorrect!';


/* End of file webshop_lang.php */
/* Location: ./modules/webshop/language/english/webshop_lang.php */