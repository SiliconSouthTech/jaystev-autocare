
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
								<li class="f_xs_none"><a type="button" onclick"location.href('<?php echo base_url() ?>checkout');" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Shipping and Billing address</a></li>
								<li class="f_xs_none ui-state-default ui-corner-top ui-tabs-active ui-state-active"><a href="#tab-2" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Order Summary and Payment</a></li>
								<li class="f_xs_none"><a href="#tab-3" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Reviews and Order Confirmation</a></li>
							</ul>
						</nav>
						<section class="tabs_content shadow r_corners">
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
								<tr class="hidden">
									<td class="t_align_r">
										<p class="f_size_large fw_medium">Coupon Discount:</p>
									</td>
									<td>
										<p class="f_size_large fw_medium color_dark">$-74.96</p>
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
