
<?php 
if($this->data['customer_status']==0){
	redirect('login'); 
}

if (isset($_SESSION['cart'])){
	$count = 1;
}
else{

	redirect();
}
if(isset($_SESSION['totalprice'])){
$totalprice = $_SESSION['totalprice'];
$grandtotal = (int)$totalprice + $shippingprice ;

}

?>
<script src="<?php echo base_url(); ?>js/owl.carousel.min.js"></script>

<!--breadcrumbs-->
			<section class="breadcrumbs">
				<div class="container">
					<ul class="horizontal_list clearfix bc_list f_size_medium">
						<li class="m_right_10 current"><a href="<?php echo base_url() ?>" class="default_t_color">Home<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
						<li class="m_right_10 current"><a href="<?php echo base_url() ?>cart" class="default_t_color">Shopping Cart<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
						<li><a class="default_t_color">Checkout</a></li>
					</ul>
				</div>
			</section>


			<!--content-->
			<div class="page_content_offset">
				<div class="container">
					<div class="row clearfix">
						<!--left content column-->
						<section class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_30">
							<?php echo validation_errors('<div class="message error">','</div>'); ?>
						<!--tabs-->
							
							<div class="tabs m_bottom_45">
						<!--tabs navigation-->
						<nav>
							<ul class="tabs_nav horizontal_list clearfix">
								<li class="f_xs_none"><a href="#tab-1" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Shipping and Billing address</a></li>
								<li class="f_xs_none"><a href="#tab-2" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Order Summary and Payment</a></li>
								<li class="f_xs_none"><a href="#tab-3" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Reviews and Order Confirmation</a></li>
							</ul>
						</nav>
						<section class="tabs_content shadow r_corners">
							<div id="tab-1">
								<h2 class="color_dark tt_uppercase m_bottom_25">Billing &amp; Shipment Information</h2>
							<div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">
								<div class="row clearfix">
									<div class="col-lg-6 col-md-6 col-sm-6 m_xs_bottom_30">
										<h5 class="fw_medium m_bottom_15">Billing Info</h5>
										<?php echo form_open(lang('webshop_folder')."/insert_bill"); ?>
											<ul>
												<li class="m_bottom_15">
													<label for="company_name" class="d_inline_b m_bottom_5">Company Name</label>
													<input type="text" id="company_name" name="company_name" class="r_corners full_width" value="<?php if(isset($billing_info['company_name'])){ echo $billing_info['company_name']; }else{echo set_value('company_name');} ?>" required="required" size="30">
												</li>
												<li class="m_bottom_15">
													<label class="d_inline_b m_bottom_5">Title</label>
													<!--product name select-->
													<div class="custom_select relative">
														<div class="select_title type_2 r_corners relative color_dark mw_0"><?php if (isset($billing_info['title'])) {
															echo $billing_info['title'];
														} else{
															echo 'Select';
														} ?> </div>
														<ul class="select_list d_none"></ul>
														<select name="title">
															<option <?php if ($billing_info['title'] == 'Mr' ) echo 'selected' ; ?> value="Mr">Mr</option>
															<option <?php if ($billing_info['title'] == 'Mrs' ) echo 'selected' ; ?> value="Mrs">Mrs</option>
															<option <?php if ($billing_info['title'] == 'Ms' ) echo 'selected' ; ?> value="Ms">Ms</option>
															<option <?php if ($billing_info['title'] == 'Miss' ) echo 'selected' ; ?> value="Miss">Miss</option>
														</select>
													</div>
												</li>
												<li class="m_bottom_15">
													<label for="firstname" class="d_inline_b m_bottom_5 required">First Name</label>
													<input type="text" id="firstname" required="required" name="firstname" class="r_corners full_width" value="<?php if(isset($billing_info['firstname'])){ echo $billing_info['firstname']; }else{echo set_value('firstname');} ?>" size="30">
												</li>
												<li class="m_bottom_15">
													<label for="lastname" class="d_inline_b m_bottom_5 required">Last Name</label>
													<input type="text" id="lastname" required="required" name="lastname" value="<?php if(isset($billing_info['lastname'])){echo $billing_info['lastname'];}else{echo set_value('lastname');}?>" class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label for="address_1" class="d_inline_b m_bottom_5 required">Address 1</label>
													<input type="text" id="address_1" name="address_1" value="<?php if(isset($billing_info['address_1'])){echo $billing_info['address_1'];}else{echo set_value('address_1');}?>" class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label for="address_2" class="d_inline_b m_bottom_5 required">Address 2</label>
													<input type="text" id="address_2" name="address_2" value="<?php if(isset($billing_info['address_2'])){echo $billing_info['address_2'];}else{echo set_value('address_2');}?>" class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label for="zip" class="d_inline_b m_bottom_5">Zip / Postal Code</label>
													<input type="text" id="zip" name="zip" value="<?php if(isset($billing_info['zip'])){echo $billing_info['zip'];}else{echo set_value('zip');}?>" class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label for="city" class="d_inline_b m_bottom_5 required">City</label>
													<input type="text" id="city" name="city" value="<?php if(isset($billing_info['city'])){echo $billing_info['city'];}else{echo set_value('city');}?>" class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label for="state" class="d_inline_b m_bottom_5 required">State</label>
													<!--product name select-->
													<div class="custom_select relative">
														<div class="select_title type_2 r_corners relative color_dark mw_0"><?php if (isset($billing_info['state'])) {
															echo $billing_info['state'];
														} else{
															echo 'Please select';
														} ?></div>
														<ul class="select_list d_none"></ul>
														<select id="state" name="state" value="<?php if(isset($billing_info['state'])){echo $billing_info['state'];}else{echo set_value('state');}?>">
															
						                                                	<option>Abia</option>
																			<option>Adamawa</option>
																			<option>Akwa Ibom</option>
																			<option>Anambra</option>
																			<option>Bauchi</option>
																			<option>Bayelsa</option>
																			<option>Benue</option>
																			<option>Bornu</option>
																			<option>Cross River</option>
																			<option>Delta</option>
																			<option>Ebonyi </option>
																			<option>Edo</option>
																			<option>Ekiti</option>
																			<option>Enugu</option>
																			<option>FCT</option>
																			<option>Gombe</option>
																			<option>Imo</option>
																			<option>Jigawa</option>
																			<option>Kaduna</option>
																			<option>Kano</option>
																			<option>Katsina</option>
																			<option>Kebbi</option>
																			<option>Kogi</option>
																			<option>Kwara</option>
																			<option>Lagos</option>
																			<option>Nasarawa</option>
																			<option>Niger</option>
																			<option>Ogun</option>
																			<option>Ondo</option>
																			<option>Osun</option>
																			<option>Oyo</option>
																			<option>Plateau</option>
																			<option>Rivers</option>
																			<option>Sokoto</option>
																			<option>Taraba</option>
																			<option>Yobe</option>
																			<option>Zamfara</option>
														</select>
													</div>
												</li>
												<li class="m_bottom_15">
													<label for="phone" class="d_inline_b m_bottom_5 required">Phone</label>
													<input type="text" id="phone" name="phone" value="<?php if(isset($billing_info['phone'])){ echo $billing_info['phone'];}else{echo set_value('phone');}?>"  class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label for="phone_2" class="d_inline_b m_bottom_5">Mobile Phone</label>
													<input type="text" id="phone_2" name="phone_2" value="<?php if(isset($billing_info['phone_2'])){echo $billing_info['phone_2'];}else{echo set_value('phone_2');}?>" class="r_corners full_width">
												</li>
												<br>
												<li><button type="submit" class="button_type_4 r_corners bg_scheme_color color_light tr_all_hover">Submit & Next</button>
												</li>
											</ul>
										
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<h5 class="fw_medium m_bottom_15">Shipping Info</h5>
										
											<ul class="ship-to-ul">
												<li class="m_bottom_5">
													<input type="checkbox" name="shippingcheck" value="1" checked class="d_none ship-to" id="checkbox_6"><label for="checkbox_6">Same as Billing Info</label>
												</li>
										<tagi id="shipping_info_form">
												<li class="m_bottom_15">
													<label for="shippingCompanyname" class="d_inline_b m_bottom_5">Company Name</label>
													<input type="text" id="shippingCompanyname" name="shippingCompanyname" class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label class="d_inline_b m_bottom_5">Shipping Title</label>
													<!--product name select-->
													<div class="custom_select relative">
														<div class="select_title type_2 r_corners relative color_dark mw_0"><?php if (isset($billing_info['title'])) {
															echo $billing_info['title'];
														} else{
															echo 'Select';
														} ?> </div>
														<ul class="select_list d_none"></ul>
														<select id="shippingname" name="shippingname">
															<option <?php if ($billing_info['title'] == 'Mr' ) echo 'selected' ; ?> value="Mr">Mr</option>
															<option <?php if ($billing_info['title'] == 'Mrs' ) echo 'selected' ; ?> value="Mrs">Mrs</option>
															<option <?php if ($billing_info['title'] == 'Ms' ) echo 'selected' ; ?> value="Ms">Ms</option>
															<option <?php if ($billing_info['title'] == 'Miss' ) echo 'selected' ; ?> value="Miss">Miss</option>
														</select>
													</div>
												</li>
												<li class="m_bottom_15">
													<label for="shippingFirstname" class="d_inline_b m_bottom_5">First Name</label>
													<input type="text" id="shippingFirstname" name="shippingFirstname" class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label for="shippinglastname" class="d_inline_b m_bottom_5">Last Name</label>
													<input type="text" id="shippinglastname" name="shippinglastname" class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label for="shippingaddress1" class="d_inline_b m_bottom_5">Address 1</label>
													<input type="text" id="shippingaddress1" name="shippingaddress1" class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label for="shippingaddress2" class="d_inline_b m_bottom_5">Address 2</label>
													<input type="text" id="shippingaddress2" name="shippingaddress2" class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label for="shippingzip" class="d_inline_b m_bottom_5">Zip / Postal Code</label>
													<input type="text" id="shippingzip" name="shippingzip" class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label for="shippingcity" class="d_inline_b m_bottom_5">City</label>
													<input type="text" id="shippingcity" name="shippingcity" class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label for="shippingstate" class="d_inline_b m_bottom_5">State</label>
													<!--product name select-->
													<div class="custom_select relative">
														<div class="select_title type_2 r_corners relative color_dark mw_0">Please select</div>
														<ul class="select_list d_none"></ul>
														<select id="shippingstate" name="shippingstate">
															<option></option>
						                                                	<option>Abia</option>
																			<option>Adamawa</option>
																			<option>Akwa Ibom</option>
																			<option>Anambra</option>
																			<option>Bauchi</option>
																			<option>Bayelsa</option>
																			<option>Benue</option>
																			<option>Bornu</option>
																			<option>Cross River</option>
																			<option>Delta</option>
																			<option>Ebonyi </option>
																			<option>Edo</option>
																			<option>Ekiti</option>
																			<option>Enugu</option>
																			<option>FCT</option>
																			<option>Gombe</option>
																			<option>Imo</option>
																			<option>Jigawa</option>
																			<option>Kaduna</option>
																			<option>Kano</option>
																			<option>Katsina</option>
																			<option>Kebbi</option>
																			<option>Kogi</option>
																			<option>Kwara</option>
																			<option>Lagos</option>
																			<option>Nasarawa</option>
																			<option>Niger</option>
																			<option>Ogun</option>
																			<option>Ondo</option>
																			<option>Osun</option>
																			<option>Oyo</option>
																			<option>Plateau</option>
																			<option>Rivers</option>
																			<option>Sokoto</option>
																			<option>Taraba</option>
																			<option>Yobe</option>
																			<option>Zamfara</option>
														</select>
													</div>
												</li>
												<li class="m_bottom_15">
													<label for="shippingphone1" class="d_inline_b m_bottom_5">Phone</label>
													<input type="text" id="shippingphone1" name="shippingphone1" class="r_corners full_width">
												</li>
												<li class="m_bottom_15">
													<label for="shippingphone2" class="d_inline_b m_bottom_5">Mobile Phone</label>
													<input type="text" id="shippingphone2" name="shippingphone2" class="r_corners full_width">
												</li>
											</ul>
										</tagi>
										</form>

										<script type="text/javascript">
											jQuery(document).ready(function($) {					
												// Show/Hide Advanced Search
												$("#shipping_info_form").hide();
												$('#checkbox_6').bind('change', function () {

												   if ($(this).is(':checked'))
												     $("#shipping_info_form").hide();
												   else
												     $("#shipping_info_form").show();

												});
																	
																
											});				
										</script>
									</div>
								</div>
							</div>
							</div>
							<div id="tab-2">
								<h2 class="tt_uppercase color_dark m_bottom_30">Shipment Information</h2>
							<div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">
								<figure class="block_select clearfix relative m_bottom_15">
									<input type="radio" checked name="pay_on_delivery" class="d_none">
									<img src="<?php echo base_url(); ?>images/shipment_logo.jpg" alt="" class="f_left m_right_20 f_mxs_none m_mxs_bottom_10">
									<figcaption>
										<h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5">Jastev Delivery</h5>
										<p>Ship to your doorstep. </p>
									</figcaption>
								</figure>
							</div>
							<h2 class="tt_uppercase color_dark m_bottom_30">Payment</h2>
							<div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">
								<figure class="block_select clearfix relative m_bottom_15">
									<input type="radio" checked name="radio_2" class="d_none">
									<img src="<?php echo base_url(); ?>images/payment_logo.jpg" alt="" class="f_left m_right_20 f_mxs_none m_mxs_bottom_10">
									<figcaption class="d_table d_sm_block">
										<div class="d_table_cell d_sm_block p_sm_right_0 p_right_45 m_mxs_bottom_5">
											<h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5">Pay on delivery</h5>
											<p>Pay cash at your doorstep. </p>
										</div>
									</figcaption>
								</figure>
								<hr class="m_bottom_20">
								<figure class="block_select clearfix relative">
									<input type="radio" name="radio_2" class="d_none">
									<img src="<?php echo base_url(); ?>images/payment_logo.jpg" alt="" class="f_left m_right_20 f_mxs_none m_mxs_bottom_10">
									<figcaption>
										<h5 class="color_dark fw_medium m_bottom_15 m_sm_bottom_5">Pay online</h5>
										<p>Pay online with your debit or credit (ATM) card.</p>
									</figcaption>
								</figure>
							</div>
							</div>
							<div id="tab-3">
								<div class="row clearfix">
									<div class="col-lg-8 col-md-8 col-sm-8">
									<h2 class="tt_uppercase color_dark m_bottom_30">Terms of service</h2>
							<div class="bs_inner_offsets bg_light_color_3 shadow r_corners m_bottom_45">
								<p class="m_bottom_10">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus.Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. </p>
								<p>Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit agna,endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem, interdum vitae,dapibus ac, scelerisque vitae, pede. Donec eget tellus non erat lacinia fermentum. Donec in velit vel ipsum auctor pulvinar. </p>
							</div>
							<h2 class="tt_uppercase color_dark m_bottom_30">Notes and special requests</h2>
							<!--requests table-->
							<table class="table_type_5 full_width r_corners wraper shadow t_align_l">
								<tr>
									<td colspan="2">
										<label for="notes" class="d_inline_b m_bottom_5">Notes and special requests:</label>
										<textarea id="notes" class="r_corners notes full_width"></textarea>
									</td>
								</tr>
								<tr>
									<td class="t_align_r">
										<p class="f_size_large fw_medium">Subtotal:</p>
									</td>
									<td>
										<p class="f_size_large fw_medium color_dark"><?php echo number_format($totalprice,2,'.',','); ?></p>
									</td>
								</tr>
								<tr>
									<td class="t_align_r">
										<p class="f_size_large fw_medium">Shipment Fee:</p>
									</td>
									<td>
										<p class="f_size_large fw_medium color_dark"><?php echo number_format($shippingprice ,2,'.',',') ?></p>
									</td>
								</tr>
								<tr>
									<td class="t_align_r">
										<p class="f_size_large fw_medium scheme_color">Total:</p>
									</td>
									<td>
										<p class="f_size_large fw_medium scheme_color"><?php number_format($grandtotal,2,'.',',') ?></p>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="checkbox" name="checkbox_8" id="checkbox_8" class="d_none"><label for="checkbox_8">I agree to the Terms of Service (Terms of service)</label>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<button class="button_type_6 bg_scheme_color f_size_large r_corners tr_all_hover color_light m_bottom_20">Confirm Purchase</button>
									</td>
								</tr>
							</table>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4">
										<h5 class="fw_medium m_bottom_15">Write a Review</h5>
										<p class="f_size_medium m_bottom_15">Now please write a (short) review....(min. 100, max. 2000 characters)</p>
										<form>
											<textarea class="r_corners full_width m_bottom_10 review_tarea"></textarea>
											<p class="f_size_medium m_bottom_5">First: Rate the product. Please select a rating between 0 (poorest) and 5 stars (best).</p>
											<div class="d_block full_width m_bottom_10">
												<div class="d_block m_bottom_5 v_align_m">
													<p class="f_size_medium d_inline_middle m_right_5">Rating:</p>
													<!--rating-->
													<ul class="horizontal_list clearfix rating_list type_2 d_inline_middle">
														<li class="active">
															<i class="fa fa-star-o empty tr_all_hover"></i>
															<i class="fa fa-star active tr_all_hover"></i>
														</li>
														<li class="active">
															<i class="fa fa-star-o empty tr_all_hover"></i>
															<i class="fa fa-star active tr_all_hover"></i>
														</li>
														<li class="active">
															<i class="fa fa-star-o empty tr_all_hover"></i>
															<i class="fa fa-star active tr_all_hover"></i>
														</li>
														<li class="active">
															<i class="fa fa-star-o empty tr_all_hover"></i>
															<i class="fa fa-star active tr_all_hover"></i>
														</li>
														<li>
															<i class="fa fa-star-o empty tr_all_hover"></i>
															<i class="fa fa-star active tr_all_hover"></i>
														</li>
													</ul>
												</div>
												<div class="f_size_medium m_bottom_10 d_block">
													<p class="d_inline_middle">Characters written:</p>
													<input type="text" class="r_corners d_inline_middle type_2 m_left_5 m_sm_left_0 m_xs_left_5 mxw_0 small_field" value="0">
												</div>
											</div>
											<button type="submit" class="r_corners button_type_4 tr_all_hover mw_0 color_dark bg_light_color_2">Submit</button>
										</form>
									</div>
								</div>
							</div>
						</section>
					</div>
						</section>
					</div>
				</div>
			</div>
