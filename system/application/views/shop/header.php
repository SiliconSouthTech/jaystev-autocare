<?php if (isset($_SESSION['cart'])) {
	$count = 0; foreach ($_SESSION['cart'] as $PID => $row) {
	$count++;
} 
}
	
if ($count = 0) {
	$this->cart->destroy();
}?>
			<header role="banner" class="type_5">
				<!--header top part-->
				<section class="h_top_part">
					<div class="container">
						<div class="row clearfix">
							<div class="col-lg-4 col-md-4 col-sm-5 t_xs_align_c">
								<ul class="d_inline_b horizontal_list clearfix f_size_small users_nav">
									<?php if ($this->data['customer_status']==0) {
										echo '<li><a href="#" class="default_t_color" data-popup="#login_popup">Log in</a></li>
										<li><a href="#" class="default_t_color" data-popup="#register_popup">Register</a></li>';
									} else {
										echo '<li><a class="default_t_color">Welcome '.$_SESSION['customer_first_name'].' </a></li>
											<li class="default_t_color"><a href="'.base_url().'logout" class="default_t_color">Logout</a></li>';
									}
									 ?>
									
									
									<li><a href="<?php echo base_url(); ?>cart" class="default_t_color">List Cart</a></li>
									<li><a href="<?php echo base_url(); ?>checkout" class="default_t_color">Checkout</a></li>
								</ul>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-2 t_align_c t_xs_align_c">
								<p class="f_size_small">Call us toll free: <b class="color_dark">(123) 456-7890</b></p>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-5 t_align_r t_xs_align_c">
								<ul class="horizontal_list clearfix d_inline_b t_align_l f_size_small site_settings type_2">
									<li class="container3d relative">
										<a role="button" href="#" class="color_dark" id="lang_button"><img class="d_inline_middle m_right_10" src="https://stripe.com/img/flags/ng.png" alt="">English</a>
										<ul class="dropdown_list type_2 top_arrow color_light">
											<li><a href="#" class="tr_delay_hover color_light"><img class="d_inline_middle" src="https://stripe.com/img/flags/ng.png" alt="">English</a></li>
										</ul>
									</li>
									<li class="m_left_20 relative container3d">
										<a role="button" href="#" class="color_dark" id="currency_button"><span class="scheme_color">₦</span> NGN Nira</a>
										<ul class="dropdown_list type_2 top_arrow color_light">
											<li><a href="#" class="tr_delay_hover color_light"><span class="scheme_color">N</span> NGN Nira</a></li>
										</ul>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
				</section>
				<!--header bottom part-->
				<section class="h_bot_part">
				<div class="menu_wrap">
						<div class="container">
							<div class="clearfix row">
								<div class="col-lg-2 t_md_align_c m_md_bottom_15">
									<a href="<?php echo base_url(); ?>" class="logo d_md_inline_b">
										<img src="<?php echo base_url(); ?>images/logo.png" alt="">
									</a>
								</div>
								<div class="col-lg-10 clearfix t_sm_align_c">
									<div class="clearfix t_sm_align_l f_left f_sm_none relative s_form_wrap m_sm_bottom_15 p_xs_hr_0 m_xs_bottom_5">
										<!--button for responsive menu-->
										<button id="menu_button" class="r_corners centered_db d_none tr_all_hover d_xs_block m_xs_bottom_5">
											<span class="centered_db r_corners"></span>
											<span class="centered_db r_corners"></span>
											<span class="centered_db r_corners"></span>
										</button>
										<!--main menu-->
										<nav role="navigation" class="f_left f_xs_none d_xs_none m_right_35 m_md_right_30 m_sm_right_0">	
											<ul class="horizontal_list main_menu type_2 clearfix">
												<li class="current relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0"><a href="<?php echo base_url() ?>" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Home</b></a>
													<!--sub menu-->
													<!--<div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
														<ul class="sub_menu">
															<li><a class="color_dark tr_delay_hover" href="index_layout_wide.html">Home Variant 3</a></li>
														</ul>
													</div>-->
												</li>
												<li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0"><a href="<?php echo base_url(); ?>air_filters" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Air Filters</b></a>
													<!--sub menu-->
													<div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
														<ul class="sub_menu">
															<li><a class="color_dark tr_delay_hover" href="<?php echo base_url() ?>automotive_airfilters">AUTOMOTIVE AIRFILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="<?php echo base_url() ?>motocycle_airfilters">MOTOCYCLE /ATV AIR FILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="<?php echo base_url() ?>universal_airfilters">UNIVERSAL AD CLAMP-ON AIR FILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="<?php echo base_url() ?>cabin_air_filters">CABIN AIR FILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="index.html">INDUSTRIAL/ SMALL ENGINE AIR FILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="index_layout_2.html">HEAVY DUTY DIESEL AIR FILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="index_layout_wide.html">CLEANING KITS</a></li>
															<li><a class="color_dark tr_delay_hover" href="index.html">RACING AND CUSTOM AIR FILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="index_layout_2.html">MARINE FLAME ARRESTORS</a></li>
															<li><a class="color_dark tr_delay_hover" href="index_layout_wide.html">CRANKCASE VENT FILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="index_layout_wide.html">AIR FILTERS FACTS</a></li>
															<li><a class="color_dark tr_delay_hover" href="index.html">AIR FILTERS BY VEHICLE MANUFACTURER</a></li>
															<li><a class="color_dark tr_delay_hover" href="index_layout_wide.html">CABIN AIR FILTER BY VEHICLE MANUFACTURER</a></li>
														</ul>
													</div>
												</li>
												<li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0"><a href="category_grid.html" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Air Intakes</b></a>
													<!--sub menu-->
													<div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
														<ul class="sub_menu">
															<li><a class="color_dark tr_delay_hover" href="portfolio_two_columns.html">AUTOMOTIVE AIR INTAKES</a></li>
															<li><a class="color_dark tr_delay_hover" href="index.html">MOTOCYCLE /ATV AIR INTAKES</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_four_columns.html">DIESEL TRUCK AIR INTAKES</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_masonry.html">RV AIR INTAKES</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_single_1.html">AIR INTAKE INSTALLATIONS VIDEO</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_single_2.html">AIR INTAKE INSTALLATIONS INSTRUCTIONS</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_single_2.html">AIR INTAKE BY VEHICLE MANUFACTURER</a></li>
														</ul>
													</div>
												</li>
												<li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0"><a href="category_grid.html" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Oil FIlters</b></a>
													<!--sub menu-->
													<div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
														<ul class="sub_menu">
															<li><a class="color_dark tr_delay_hover" href="portfolio_two_columns.html">AUTOMOTIVE OIL FILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_three_columns.html">MOTOCYCLE ATV/ OIL FILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_four_columns.html">MARINE OIL FILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_masonry.html">HEAVY DUTY OIL DIESEL FILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_single_2.html">OIL FILTER BY VEHICLE MANUFACTURER</a></li>
														</ul>
													</div>
												</li>
												<!--<li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0"><a href="category_grid.html" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Category</b></a>
													<div class="sub_menu_wrap top_arrow d_xs_none tr_all_hover clearfix r_corners w_xs_auto">
														<div class="f_left f_xs_none">
															<b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Dresses</b>
															<ul class="sub_menu first">
																<li><a class="color_dark tr_delay_hover" href="#">Evening Dresses</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Casual Dresses</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Party Dresses</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Maxi Dresses</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Midi Dresses</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Strapless Dresses</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Day Dresses</a></li>
															</ul>
														</div>
														<div class="f_left m_left_10 m_xs_left_0 f_xs_none">
															<b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Accessories</b>
															<ul class="sub_menu">
																<li><a class="color_dark tr_delay_hover" href="#">Bags and Purces</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Belts</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Scarves</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Gloves</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Jewellery</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Sunglasses</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Hair Accessories</a></li>
															</ul>
														</div>
														<div class="f_left m_left_10 m_xs_left_0 f_xs_none">
															<b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Tops</b>
															<ul class="sub_menu">
																<li><a class="color_dark tr_delay_hover" href="#">Evening Tops</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Long Sleeved</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Short Sleeved</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Sleeveless</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Tanks</a></li>
																<li><a class="color_dark tr_delay_hover" href="#">Tunics</a></li>
															</ul>
														</div>
														<img src="images/woman_image_1.jpg" class="d_sm_none f_right m_bottom_10" alt="">
													</div>
												</li>-->
												<li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0"><a href="category_grid.html" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>Performance Parts</b></a>
													<!--sub menu-->
													<div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
														<ul class="sub_menu">
															<li><a class="color_dark tr_delay_hover" href="portfolio_two_columns.html">AUTOMOTIVE PERFORMANCE PARTS</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_three_columns.html">MOTORCYCLE ATV/ PERFORMANCE PARTS</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_four_columns.html">DIESEL FUEL FILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_masonry.html">INLINE FUEL FILTERS</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_single_1.html">INLINE FUEL PUMPS</a></li>
															<li><a class="color_dark tr_delay_hover" href="portfolio_single_2.html">MARINE PERFORMANCE PARTS</a></li>
														</ul>
													</div>
												</li>
											
												<li class="relative f_xs_none m_xs_bottom_5 m_left_10 m_xs_left_0"><a href="<?php echo base_url(); ?>about" class="tr_delay_hover color_dark tt_uppercase r_corners"><b>About us</b></a>
													<!--sub menu-->
													<div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
														<ul class="sub_menu">
															<li><a class="color_dark tr_delay_hover" href="contact.html">CONTACT US</a></li>
															<li><a class="color_dark tr_delay_hover" href="contact.html">BLOG</a></li>
															<li><a class="color_dark tr_delay_hover" href="index_layout_wide.html">WARRANTY</a></li>
															<li><a class="color_dark tr_delay_hover" href="index.html">FAQS</a></li>
															<li><a class="color_dark tr_delay_hover" href="index_layout_2.html">NEWS AND EVENTS</a></li>
															<li><a class="color_dark tr_delay_hover" href="index_layout_wide.html">TESTIMONIALS</a></li>
															<li><a class="color_dark tr_delay_hover" href="index.html">VIDEOS</a></li>
															<li><a class="color_dark tr_delay_hover" href="index_layout_2.html">NEW PRODUCTS</a></li>
															<li><a class="color_dark tr_delay_hover" href="index_layout_wide.html">PRODUCT TESTING</a></li>
															<li><a class="color_dark tr_delay_hover" href="index.html">CONTINGENCY RACING</a></li>
															<li><a class="color_dark tr_delay_hover" href="index_layout_2.html">COMPANY INFORMATION</a></li>
															<li><a class="color_dark tr_delay_hover" href="index_layout_wide.html">DEALER INFORMATION</a></li>
														</ul>
													</div>
												</li>

											</ul>

										</nav>
										
										<!--search form-->
										<div class="searchform_wrap type_2 bg_tr tf_xs_none tr_all_hover w_inherit">
											<div class="container vc_child h_inherit relative w_inherit">
												<form role="search" class="d_inline_middle full_width">
													<input type="text" name="search" placeholder="Type text and hit enter" class="f_size_large p_hr_0">
												</form>
												<button class="close_search_form tr_all_hover d_xs_none color_dark">
													<i class="fa fa-times"></i>
												</button>
											</div>
										</div>
									</div>
									<ul class="f_right horizontal_list d_sm_inline_b f_sm_none clearfix t_align_l site_settings">
										<!--shopping cart-->
										<li class="m_left_5 relative container3d" id="shopping_button">
											<a role="button" href="<?php echo base_url();?>index.php/<?php echo $this->lang->line('webshop_folder');?>/pages/cart" class="button_type_3 color_light bg_scheme_color d_block r_corners tr_delay_hover box_s_none">
												<span class="d_inline_middle shop_icon">
													<i class="fa fa-shopping-cart"></i>
													<span class="count tr_delay_hover type_2 circle t_align_c"><?php echo $count ?></span>
												</span>
												<b>
													<?php
													$this->data['handlekurv'] = number_format($this->data['handlekurv'] ,2,'.',',');
													if(isset($this->data['handlekurv'])){
														echo lang('webshop_currency_symbol').$this->data['handlekurv'];	
													}else{
													echo lang('webshop_shoppingcart_empty');
													}
													?>
												</b>
											</a>
											<?php 
											if(isset($_SESSION['totalprice'])){
											$data['totalprice'] = $_SESSION['totalprice'];
											$TOTALPRICE = $_SESSION['totalprice'];
											$TOTALPRICE = number_format($TOTALPRICE,2,'.',',');
											$total_data = array('name' => 'total', 'id'=>'total', 'value' => $TOTALPRICE);
											}
											
											if (isset($_SESSION['cart'])) { ?>

											

											<div class="shopping_cart top_arrow tr_all_hover r_corners">
												<div class="f_size_medium sc_header">Recently added item(s)</div>
												<ul class="products_list">
													<?php $count = 1; foreach ($_SESSION['cart'] as $PID => $row) if ($count++ < 3){
														//increement the total count of products in the cart

														//$count++;
														$image_url = $this->MProducts->getImage($PID);

													echo '<li>
														<div class="clearfix">
															<!--product image-->
															<img class="f_left m_right_10" style="max-height:60px; max-width:60px" src="'.$image_url.'" alt="">
															<!--product description-->
															<div class="f_left product_description">
																<a href="'.$this->lang->line('webshop_folder').'/product/'.$PID.'" class="color_dark m_bottom_5 d_block">'.$row['name'].'</a>
																<span class="f_size_medium">Product Code PS34</span>
															</div>
															<!--product price-->
															<div class="f_left f_size_medium">
																<div class="clearfix">
																	'.$row['count'].' x <b class="color_dark">'.$row['price'].'</b>
																</div>
																<button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>
															</div>
														</div>
													</li>';
													 } ?>
													
												</ul>
												<!--total price-->
												<ul class="total_price bg_light_color_1 t_align_r color_dark">
													<li class="m_bottom_10">Discount: <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">$00.00</span></li>
													<li>Total: <b class="f_size_large bold scheme_color sc_price t_align_l d_inline_b m_left_15">N<?php if (isset($_SESSION['totalprice'])) {
														echo $TOTALPRICE;
													}  ?></b></li>
												</ul>
												<div class="sc_footer t_align_c">
													<a href="<?php echo base_url() ?>cart" role="button" class="button_type_4 d_inline_middle bg_light_color_2 r_corners color_dark t_align_c tr_all_hover m_mxs_bottom_5">View Cart</a>
													<a href="<?php echo base_url() ?>checkout" role="button" class="button_type_4 bg_scheme_color d_inline_middle r_corners tr_all_hover color_light">Checkout</a>
												</div>
											</div>

											<?php 
												
											} 
											 ?>
											
										</li>
									</ul>
								</div>
							</div>
						</div>
						<hr class="divider_type_6">
					</div>
				</section>
			</header>

