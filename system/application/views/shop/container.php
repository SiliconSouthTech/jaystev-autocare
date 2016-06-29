<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en"><!--<![endif]-->
	<head>
		<title><?php echo $title ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!--meta info-->
		<meta name="author" content="">
		<meta name="keywords" content="">
		<meta name="description" content="">

		
		<link rel="icon" type="image/ico" href="<?php echo base_url(); ?>images/fav.ico">
		<!--stylesheet include-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>css/jquery.fancybox-1.3.4.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/camera.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/owl.carousel.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/owl.transitions.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/jquery.custom-scrollbar.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/style.css">
		<!--font include-->
		<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet">
		<script src="<?php echo base_url() ?>js/jquery-2.1.0.min.js"></script>
		
	</head> 
	<body>
		<!--boxed layout-->
		<div class="boxed_layout relative w_xs_auto">
			<!--[if (lt IE 9) | IE 9]>
				<div style="background:#fff;padding:8px 0 10px;">
				<div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix" style="padding:9px 0 0;float:left;width:83%;"><i class="fa fa-exclamation-triangle scheme_color f_left m_right_10" style="font-size:25px;color:#e74c3c;"></i><b style="color:#e74c3c;">Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:16%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_4 r_corners bg_scheme_color color_light d_inline_b t_align_c" target="_blank" style="margin-bottom:2px;">Update Now!</a></div></div></div></div>
			<![endif]-->
			<!--markup header-->
    
    <?php $this->load->view($this->config->item('backendpro_template_shop') . 'header');?>
  
	
    <?php print (isset($content)) ? $content : NULL; ?>
    <?php
    if( isset($page)){
    if( isset($module)){
            $this->load->module_view($module,$page);
        } else {
            $this->load->view($page);
        }}
    ?>
	  
      <?php $this->load->view($this->config->item('backendpro_template_shop') . 'footer');?>
    
		<!--social widgets-->
		<ul class="social_widgets d_xs_none">
			<!--facebook-->
			<li class="relative">
				<button class="sw_button t_align_c facebook"><i class="fa fa-facebook"></i></button>
				<div class="sw_content">
					<h3 class="color_dark m_bottom_20">Join Us on Facebook</h3>
					<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;width=235&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=438889712801266" style="border:none; overflow:hidden; width:235px; height:258px;"></iframe>
				</div>
			</li>
			<!--twitter feed-->
			<li class="relative">
				<button class="sw_button t_align_c twitter"><i class="fa fa-twitter"></i></button>
				<div class="sw_content">
					<h3 class="color_dark m_bottom_20">Latest Tweets</h3>
					<div class="twitterfeed m_bottom_25"></div>
					<a role="button" class="button_type_4 d_inline_b r_corners tr_all_hover color_light tw_color" href="https://twitter.com/jastevauto">Follow on Twitter</a>
				</div>	
			</li>
			<!--contact form-->
			<li class="relative">
				<button class="sw_button t_align_c contact"><i class="fa fa-envelope-o"></i></button>
				<div class="sw_content">
					<h3 class="color_dark m_bottom_20">Contact Us</h3>
					<p class="f_size_medium m_bottom_15">Send us a message, and we would reply shorhtly</p>
					<form id="contactform" class="mini">
						<input class="f_size_medium m_bottom_10 r_corners full_width" type="text" name="cf_name" placeholder="Your name">
						<input class="f_size_medium m_bottom_10 r_corners full_width" type="email" name="cf_email" placeholder="Email">
						<textarea class="f_size_medium r_corners full_width m_bottom_20" placeholder="Message" name="cf_message"></textarea>
						<button type="submit" class="button_type_4 r_corners mw_0 tr_all_hover color_dark bg_light_color_2">Send</button>
					</form>
				</div>	
			</li>
			<!--contact info-->
			<li class="relative">
				<button class="sw_button t_align_c googlemap"><i class="fa fa-map-marker"></i></button>
				<div class="sw_content">
					<h3 class="color_dark m_bottom_20">Store Location</h3>
					<ul class="c_info_list">
						<li class="m_bottom_10">
							<div class="clearfix m_bottom_15">
								<i class="fa fa-map-marker f_left color_dark"></i>
								<p class="contact_e">8901 Marmora Road,<br> Glasgow, D04 89GR.</p>
							</div>
							<iframe class="r_corners full_width" id="gmap_mini" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=ru&amp;geocode=&amp;q=Manhattan,+New+York,+NY,+United+States&amp;aq=0&amp;oq=monheten&amp;sll=37.0625,-95.677068&amp;sspn=65.430355,129.814453&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=%D0%9C%D0%B0%D0%BD%D1%85%D1%8D%D1%82%D1%82%D0%B5%D0%BD,+%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA,+%D0%9D%D1%8C%D1%8E+%D0%99%D0%BE%D1%80%D0%BA,+%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA&amp;ll=40.790278,-73.959722&amp;spn=0.015612,0.031693&amp;z=13&amp;output=embed"></iframe>
						</li>
						<li class="m_bottom_10">
							<div class="clearfix m_bottom_10">
								<i class="fa fa-phone f_left color_dark"></i>
								<p class="contact_e">800-559-65-80</p>
							</div>
						</li>
						<li class="m_bottom_10">
							<div class="clearfix m_bottom_10">
								<i class="fa fa-envelope f_left color_dark"></i>
								<a class="contact_e default_t_color" href="mailto:#">info@companyname.com</a>
							</div>
						</li>
						<li>
							<div class="clearfix">
								<i class="fa fa-clock-o f_left color_dark"></i>
								<p class="contact_e">Monday - Friday: 08.00-20.00 <br>Saturday: 09.00-15.00<br> Sunday: closed</p>
							</div>
						</li>
					</ul>
				</div>	
			</li>
		</ul>
		<!--custom popup-->
		<div class="popup_wrap d_none" id="quick_view_product">
			<section class="popup r_corners shadow">
				<button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large"><i class="fa fa-times"></i></button>
				<div class="clearfix">
					<div class="custom_scrollbar">
						<!--left popup column-->
						<div class="f_left half_column">
							<div class="relative d_inline_b m_bottom_10 qv_preview">
								<span class="hot_stripe"><img src="images/sale_product.png" alt=""></span>
								<img src="<?php echo base_url(); ?>images/quick_view_img_1.jpg" class="tr_all_hover" alt="">
							</div>
							<!--carousel-->
							<div class="relative qv_carousel_wrap m_bottom_20">
								<button class="button_type_11 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_prev">
									<i class="fa fa-angle-left "></i>
								</button>
								<ul class="qv_carousel d_inline_middle">
									<li data-src="<?php echo base_url(); ?>images/quick_view_img_1.jpg"><img src="images/quick_view_img_4.jpg" alt=""></li>
									<li data-src="<?php echo base_url(); ?>images/quick_view_img_2.jpg"><img src="images/quick_view_img_5.jpg" alt=""></li>
									<li data-src="<?php echo base_url(); ?>images/quick_view_img_3.jpg"><img src="images/quick_view_img_6.jpg" alt=""></li>
									<li data-src="<?php echo base_url(); ?>images/quick_view_img_1.jpg"><img src="images/quick_view_img_4.jpg" alt=""></li>
									<li data-src="<?php echo base_url(); ?>images/quick_view_img_2.jpg"><img src="images/quick_view_img_5.jpg" alt=""></li>
									<li data-src="<?php echo base_url(); ?>images/quick_view_img_3.jpg"><img src="images/quick_view_img_6.jpg" alt=""></li>
								</ul>
								<button class="button_type_11 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_next">
									<i class="fa fa-angle-right "></i>
								</button>
							</div>
							<div class="d_inline_middle">Share this:</div>
							<div class="d_inline_middle m_left_5">
								<!-- AddThis Button BEGIN -->
								<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
								<a class="addthis_button_preferred_1"></a>
								<a class="addthis_button_preferred_2"></a>
								<a class="addthis_button_preferred_3"></a>
								<a class="addthis_button_preferred_4"></a>
								<a class="addthis_button_compact"></a>
								<a class="addthis_counter addthis_bubble_style"></a>
								</div>
								<!-- AddThis Button END -->
							</div>
						</div>
						<!--right popup column-->
						<div class="f_right half_column">
							<!--description-->
							<h2 class="m_bottom_10"><a href="#" class="color_dark fw_medium">Eget elementum vel</a></h2>
							<div class="m_bottom_10">
								<!--rating-->
								<ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">
									<li class="active">
										<i class="<?php echo base_url(); ?>fa fa-star-o empty tr_all_hover"></i>
										<i class="<?php echo base_url(); ?>fa fa-star active tr_all_hover"></i>
									</li>
									<li class="active">
										<i class="<?php echo base_url(); ?>fa fa-star-o empty tr_all_hover"></i>
										<i class="<?php echo base_url(); ?>fa fa-star active tr_all_hover"></i>
									</li>
									<li class="active">
										<i class="<?php echo base_url(); ?>fa fa-star-o empty tr_all_hover"></i>
										<i class="<?php echo base_url(); ?>fa fa-star active tr_all_hover"></i>
									</li>
									<li class="active">
										<i class="<?php echo base_url(); ?>fa fa-star-o empty tr_all_hover"></i>
										<i class="<?php echo base_url(); ?>fa fa-star active tr_all_hover"></i>
									</li>
									<li>
										<i class="<?php echo base_url(); ?>fa fa-star-o empty tr_all_hover"></i>
										<i class="<?php echo base_url(); ?>fa fa-star active tr_all_hover"></i>
									</li>
								</ul>
								<a href="#" class="d_inline_middle default_t_color f_size_small m_left_5">1 Review(s) </a>
							</div>
							<hr class="m_bottom_10 divider_type_3">
							<table class="description_table m_bottom_10">
								<tr>
									<td>Manufacturer:</td>
									<td><a href="#" class="color_dark">Chanel</a></td>
								</tr>
								<tr>
									<td>Availability:</td>
									<td><span class="color_green">in stock</span> 20 item(s)</td>
								</tr>
								<tr>
									<td>Product Code:</td>
									<td>PS06</td>
								</tr>
							</table>
							<h5 class="fw_medium m_bottom_10">Product Dimensions and Weight</h5>
							<table class="description_table m_bottom_5">
								<tr>
									<td>Product Length:</td>
									<td><span class="color_dark">10.0000M</span></td>
								</tr>
								<tr>
									<td>Product Weight:</td>
									<td>10.0000KG</td>
								</tr>
							</table>
							<hr class="divider_type_3 m_bottom_10">
							<p class="m_bottom_10">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. </p>
							<hr class="divider_type_3 m_bottom_15">
							<div class="m_bottom_15">
								<s class="v_align_b f_size_ex_large">$152.00</s><span class="v_align_b f_size_big m_left_5 scheme_color fw_medium">$102.00</span>
							</div>
							<table class="description_table type_2 m_bottom_15">
								<tr>
									<td class="v_align_m">Size:</td>
									<td class="v_align_m">
										<div class="custom_select f_size_medium relative d_inline_middle">
											<div class="select_title r_corners relative color_dark">s</div>
											<ul class="select_list d_none"></ul>
											<select name="product_name">
												<option value="s">s</option>
												<option value="m">m</option>
												<option value="l">l</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td class="v_align_m">Quantity:</td>
									<td class="v_align_m">
										<div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark">
											<button class="bg_tr d_block f_left" data-direction="down">-</button>
											<input type="text" name="" readonly value="1" class="f_left">
											<button class="bg_tr d_block f_left" data-direction="up">+</button>
										</div>
									</td>
								</tr>
							</table>
							<div class="clearfix m_bottom_15">
								<button class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover f_left f_size_large">Add to Cart</button>
								<button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0"><i class="fa fa-heart-o f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Wishlist</span></button>
								<button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0"><i class="fa fa-files-o f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Compare</span></button>
								<button class="button_type_12 bg_light_color_2 tr_delay_hover f_left r_corners color_dark m_left_5 p_hr_0 relative"><i class="fa fa-question-circle f_size_big"></i><span class="tooltip tr_all_hover r_corners color_dark f_size_small">Ask a Question</span></button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php if ($this->data['customer_status']==0) {
			echo '<!--login popup-->
		<div class="popup_wrap d_none" id="login_popup">
			<section class="popup r_corners shadow">
				<button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large"><i class="fa fa-times"></i></button>
				<h3 class="m_bottom_20 color_dark">Log In</h3>
				'.form_open(lang('webshop_folder')."/login").'
					<ul>
						<li class="m_bottom_15">
							<label for="username" class="m_bottom_5 d_inline_b">Email</label><br>
							<input type="text" name="email" id="email" class="r_corners full_width">
						</li>
						<li class="m_bottom_25">
							<label for="password" class="m_bottom_5 d_inline_b">Password</label><br>
							<input type="password" name="password" id="password" class="r_corners full_width">
						</li>
						<li class="m_bottom_15">
							<input type="checkbox" class="d_none" id="checkbox_10"><label for="checkbox_10">Remember me</label>
						</li>
						<li class="clearfix m_bottom_30">
							<button type="submit" class="button_type_4 tr_all_hover r_corners f_left bg_scheme_color color_light f_mxs_none m_mxs_bottom_15">Log In</button>
							<div class="f_right f_size_medium f_mxs_none">
								<a href="#" class="color_dark">Forgot your password?</a><br>
								<a href="#" class="color_dark">Forgot your username?</a>
							</div>
						</li>
					</ul>
				'.form_close().'
				<footer class="bg_light_color_1 t_mxs_align_c">
					<h3 class="color_dark d_inline_middle d_mxs_block m_mxs_bottom_15">New Customer?</h3>
					<a href="#" role="button" data-popup="#register_popup" class="tr_all_hover r_corners button_type_4 bg_dark_color bg_cs_hover color_light d_inline_middle m_mxs_left_0">Create an Account</a>
				</footer>
			</section>
		</div>';

		echo '<!--register popup-->
		<div class="popup_wrap d_none" id="register_popup">
			<section class="popup r_corners shadow">
				<button class="bg_tr color_dark tr_all_hover text_cs_hover close f_size_large"><i class="fa fa-times"></i></button>
				<h3 class="m_bottom_20 color_dark">Register</h3>
				'.form_open(lang('webshop_folder')."/registration").'
					<ul>
						<li class="m_bottom_15">
							<label for="customer_first_name" class="m_bottom_5 d_inline_b">Firstname</label><br>
							<input type="text" name="customer_first_name" id="customer_first_name" class="r_corners full_width">
						</li>
						<li class="m_bottom_15">
							<label for="customer_last_name" class="m_bottom_5 d_inline_b">Lastname</label><br>
							<input type="text" name="customer_last_name" id="customer_last_name" class="r_corners full_width">
						</li>
						<li class="m_bottom_15">
							<label for="username" class="m_bottom_5 d_inline_b">Username</label><br>
							<input type="text" name="username" id="username" class="r_corners full_width">
						</li>
						<li class="m_bottom_15">
							<label for="email" class="m_bottom_5 d_inline_b">Email</label><br>
							<input type="text" name="email" id="email" class="r_corners full_width">
						</li>
						<li class="m_bottom_15">
							<label for="password" class="m_bottom_5 d_inline_b">Password</label><br>
							<input type="password" name="password" id="password" class="r_corners full_width">
						</li>
						<li class="clearfix m_bottom_30">
							<button type="submit" name="submit" class="button_type_4 tr_all_hover r_corners f_left bg_scheme_color color_light f_mxs_none m_mxs_bottom_15">Register</button>
						</li>
					</ul>
				'.form_close().'
			</section>
		</div>';
		} ?>
		
		<button class="t_align_c r_corners type_2 tr_all_hover animate_ftl" id="go_to_top"><i class="fa fa-angle-up"></i></button>
		<!--scripts include-->
		

		
		<script src="<?php echo base_url() ?>js/jquery-ui.min.js"></script>
		<script src="<?php echo base_url() ?>js/jquery-migrate-1.2.1.min.js"></script>
		<script src="<?php echo base_url() ?>js/retina.js"></script>
		<script src="<?php echo base_url() ?>js/elevatezoom.min.js"></script>
		<script src="<?php echo base_url() ?>js/waypoints.min.js"></script>
		<script src="<?php echo base_url() ?>js/jquery.tweet.min.js"></script>
		<script src="<?php echo base_url() ?>js/owl.carousel.min.js"></script>
		<script src="<?php echo base_url() ?>js/jquery.isotope.min.js"></script>

		<script src="<?php echo base_url() ?>js/jquery.custom-scrollbar.js"></script>
		<script src="<?php echo base_url() ?>js/jquery.fancybox-1.3.4.js"></script>
		<script src="<?php echo base_url() ?>js/scripts.js"></script>
		
		
		
		
		<?php if ($data['page'] = $this->config->item('backendpro_template_shop') . 'frontpage') {

			echo '<script src="'.base_url().'js/camera.min.js"></script>
					<script src="'.base_url().'js/general.js"></script>
					<script src="'.base_url().'js/cusel-min.js"></script>';

			
		} ?>
		
		<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5306f8f674bfda4c"></script>
		<script src="<?php echo base_url() ?>js/_custom.js"></script>
		</body>
</html>