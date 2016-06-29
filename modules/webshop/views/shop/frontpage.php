

<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/cusel.css">	
<!--slider-->
			<div class="camera_wrap m_bottom_0">
				<div data-src="<?php echo base_url(); ?>images/slide_07.jpg" data-custom-thumb="<?php echo base_url(); ?>images/slide_07.jpg">
					<div class="camera_caption_1 fadeFromTop t_align_c d_xs_none">
						<div class="f_size_large color_light tt_uppercase slider_title_3 m_bottom_5">Meet New </div>
						<hr class="slider_divider d_inline_b m_bottom_5">
						<div class="color_light slider_title tt_uppercase t_align_c m_bottom_45 m_sm_bottom_20"><b>Attractive &amp; Elegant<br></b></div>
						<div class="color_light slider_title_2 m_bottom_45">$<b>15.00</b></div>
						<a href="#" role="button" class="tr_all_hover button_type_4 bg_scheme_color color_light r_corners tt_uppercase">Buy Now</a>
					</div>
				</div>
    			<div data-src="images/slide_01.jpg" data-custom-thumb="images/slide_01.jpg">
    				<div class="camera_caption_2 fadeIn t_align_c d_xs_none">
						<div class="f_size_large tt_uppercase slider_title_3 scheme_color">New arrivals</div>
						<hr class="slider_divider type_2 m_bottom_5 d_inline_b">
						<div class="color_light slider_title tt_uppercase t_align_c m_bottom_65 m_sm_bottom_20"><b><span class="scheme_color">Spring/Summer 2014</span><br><span class="color_dark">Ready-To-Wear</span></b></div>
						<a href="#" role="button" class="d_sm_inline_b button_type_4 bg_scheme_color color_light r_corners tt_uppercase tr_all_hover">View Collection</a>
					</div>
    			</div>
    			<div data-src="images/slide_03.jpg" data-custom-thumb="images/slide_03.jpg">
    				<div class="camera_caption_3 fadeFromTop t_align_c d_xs_none">
						<img src="images/slider_layer_img.png" alt="" class="m_bottom_5">
						<div class="color_light slider_title tt_uppercase t_align_c m_bottom_60 m_sm_bottom_20"><b class="color_dark">up to 70% off</b></div>
						<a href="#" role="button" class="d_sm_inline_b button_type_4 bg_scheme_color color_light r_corners tt_uppercase tr_all_hover">Shop Now</a>
					</div>
    			</div>
			</div>

			<!--content-->
			<div class="page_content_offset">

				<div class="container">
					
    
					<div class="middle_row row_white search_row" id="car_search_row">
						<script type="text/javascript" src="http://www.carqueryapi.com/js/carquery.0.3.4.js"></script>
						
						<div class="container" style="max-width: 950px;">
							<?php $formData = array('class' => 'search_form advsearch_hide clearfix', ); echo form_open('webshop/search', $formData); ?>
							
								<div class="row field_select">
				                    <label class="label_title">Select Year:</label>
				                    <select id="car-years" class="select_styled" name="year"><option id="select_year" value="">Select Year</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option></select>
				                </div>
				                
				                
				            	<div class="row field_select">
				                    <label class="label_title">Select Maker:</label>
				                    <select id="car-makes" class="select_styled" style="box-sizing: content-box"  name="car_make">
				                    	<option id="select_make" value="">Select Make</option>
				                                             
				                    </select>
				                </div>
				                
				                <div class="row field_select">
				                    <label class="label_title">Select Model:</label>
				                    <select id="car-models" class="select_styled" name="car_model">
				                         <option id="select_model" value="">Select Model</option>                                        
				                    </select>
				                </div>
				                
				                <div class="row field_select">
				                    <label class="label_title">Select Spec:</label>
				                    <select id="car-model-trims" class="select_styled" name="fuel_capacity">
				                        <option value="">Select Spec</option>
				                    </select>
				                </div>
				                <div class="row rowSubmit">
				                	<label class="label_title" id="adv_search_open">Search By Part Number</label>
				                    <span class="btn btn_search"><input type="submit" value="SEARCH"></span>
				                </div>
				            <?php echo form_close() ?>

				                <?php echo form_open('webshop/search_partnumber') ?>

				                <div class="adv_search_hidden clearfix">
					                <div class="row field_select">
					                    <label class="label_title">Input Part Number:</label>
					                    <input name="part_number" class="" style="max-height:32px;"></input>
					                </div>
					                <div class="row field_select">
					                	<label class="label_title">Search</label>
					                	<span class="btn btn_search"><input type="submit" value="SEARCH"></span>
					                </div>
					                </div>
				                
				                <?php echo form_close() ?>
				                
				                
				            <script type="text/javascript">
							jQuery(document).ready(function($) {					
								// Show/Hide Advanced Search
								$(".adv_search_hidden").hide();
								$("#adv_search_open").click(function(){								
									if ($(this).closest(".search_form").hasClass("advsearch_hide")) {
										$(".adv_search_hidden").stop().slideDown();
										$(this).html("Close Part Number Search");
									} else {
										$(".adv_search_hidden").stop().slideUp();
										$(this).html("Search By Part Number");
									}
									$(this).closest(".search_form").toggleClass("advsearch_hide");					
								});				
							});	

							

							jQuery("#car-years").change(
								function()
								{
									 year = document.getElementById('car-years').value;
									 loading = "Loading...";
									 //alert(year,responseText);

									 //loading
									 loading_span = ''; 

									 loading_span += '<span id="select_make"">' + loading + '</span>';

									 jQuery("#cusel-scroll-car-makes").empty().append(loading_span);
									 jQuery("#cusel-scroll-car-models").empty().append(loading_span);
									 jQuery("#cusel-scroll-car-model-trims").empty().append(loading_span); 

									 

									//add ajax function to fetch the data from the database
									$.ajax(
										    {
										        type: "GET",
										        url: 'http://www.carqueryapi.com/api/0.3/?callback=?&cmd=getMakes&year=' + year,
										        data: "{}",
										        contentType: "application/json; charset=utf-8",
										        dataType: "json",
										        cache: false,
										        success: function (data) {
										            
										        var trHTML = '<span val="" class="cuselActive">Select Make</span>';
										                
										        $.each(data.Makes, function (i, items) {
										            
										            trHTML += '<span val="' + data.Makes[i].make_id + '">' + data.Makes[i].make_id + '</span>';
										        });
										        
										        jQuery("#cusel-scroll-car-makes").empty().append(trHTML); 
											    var params = {
											        refreshEl: "#car-makes",
											        visRows: 7
											    }
											    cuSelRefresh(params);
											    $("#select_make").hide();
										        
										        },
										        
										        error: function (msg) {
										            
										            //alert(msg.responseText);
										        }
										    });
									
								    
								    
								});
							jQuery("#car-makes").change(
								function()
								{
									//add something to get and keep the selected year
									//var year = 2001;
									
								    make = document.getElementById('car-makes').value;
									//add ajax function to fetch the data from the database

									jQuery("#cusel-scroll-car-models").empty().append(loading_span);
									 jQuery("#cusel-scroll-car-model-trims").empty().append(loading_span); 
									$.ajax(
										    {//http://www.carqueryapi.com/api/0.3/?callback=?&cmd=getModels&year=2015&make=toyota
										        type: "GET",
										        url: 'http://www.carqueryapi.com/api/0.3/?callback=?&cmd=getModels&year=' + year +'&make=' + make,
										        data: "{}",
										        contentType: "application/json; charset=utf-8",
										        dataType: "json",
										        cache: true,
										        success: function (data) {
										            
										        var trHTML = '<span val="" class="cuselActive">Select Model</span>';
										                
										        $.each(data.Models, function (i, items) {
										            
										            trHTML += '<span val="4">' + data.Models[i].model_name + '</span>';
										        });
										        
										        jQuery("#cusel-scroll-car-models").empty().append(trHTML); 
											    var params = {
											        refreshEl: "#car-models",
											        visRows: 7
											    }
											    cuSelRefresh(params);
										        
										        },
										        
										        error: function (msg) {
										            
										           // alert(msg.responseText);
										        }
										    });
									
								    
								});

							jQuery("#car-models").change(
								function()
								{
									//add something to get and keep the selected year
									//var year = 2001;
									
								    model = document.getElementById('car-models').value;
									//add ajax function to fetch the data from the database

									 jQuery("#cusel-scroll-car-model-trims").empty().append(loading_span); 
									$.ajax(
										    {//http://www.carqueryapi.com/api/0.3/?callback=?&cmd=getModels&year=2015&make=toyota
										        type: "GET",
										        url: 'http://www.carqueryapi.com/api/0.3/?callback=?&cmd=getTrims&year=' + year +'&make=' + make + '&model=' + model,
										        data: "{}",
										        contentType: "application/json; charset=utf-8",
										        dataType: "json",
										        cache: true,
										        success: function (data) {
										            
										        var trHTML = '<span val="" class="cuselActive">Select Spec</span>';
										                
										        $.each(data.Trims, function (i, items) {
										            
										            trHTML += '<span val="4">' + data.Trims[i].model_trim + '</span>';
										        });
										        
										        jQuery("#cusel-scroll-car-model-trims").empty().append(trHTML); 
											    var params = {
											        refreshEl: "#car-model-trims",
											        visRows: 7
											    }
											    cuSelRefresh(params);
										        
										        },
										        
										        error: function (msg) {
										            
										           // alert(msg.responseText);
										        }
										    });
									
								    
								});
			
							</script>
				            
						</div>
					</div>
	
	

					<!--banners-->
					<section class="row clearfix m_bottom_45 m_sm_bottom_35">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<a href="#" class="d_block banner wrapper r_corners relative m_xs_bottom_30">
								<img src="images/air-intake-system.jpg" alt="">
								<span class="banner_caption d_block vc_child t_align_c w_sm_auto">
									<span class="d_inline_middle">
										<span class="d_block color_dark tt_uppercase m_bottom_5 let_s">GUARANTEED TO INCREASE HORSEPOWER</span>
										<span class="d_block divider_type_2 centered_db m_bottom_5"></span>
										<span class="d_block color_light tt_uppercase m_bottom_25 m_xs_bottom_10 banner_title"><b>Air Intake System</b></span>
										<span class="button_type_6 bg_scheme_color tt_uppercase r_corners color_light d_inline_b tr_all_hover box_s_none f_size_ex_large">Shop Now!</span>
									</span>
								</span>
							</a>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<a href="#" class="d_block banner wrapper r_corners relative m_xs_bottom_30">
								<img src="images/replacement-air-filters.jpg" alt="">
								<span class="banner_caption d_block vc_child t_align_c w_sm_auto">
									<span class="d_inline_middle">
										<span class="d_block color_dark tt_uppercase m_bottom_5 let_s">DESIGNED TO IMPROVE PERFORMANCE</span>
										<span class="d_block divider_type_2 centered_db m_bottom_5"></span>
										<span class="d_block color_dark tt_uppercase m_bottom_25 m_xs_bottom_10 banner_title"><b>Replacement Air Filters</b></span>
										<span class="button_type_6 bg_scheme_color tt_uppercase r_corners color_light d_inline_b tr_all_hover box_s_none f_size_ex_large">Shop Now!</span>
									</span>
								</span>
							</a>
						</div>
					</section>
					<section class="row clearfix m_bottom_45 m_sm_bottom_35">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<a href="#" class="d_block banner wrapper r_corners relative m_xs_bottom_30">
								<img src="images/universal-air-filters.jpg" alt="">
								<span class="banner_caption d_block vc_child t_align_c w_sm_auto">
									<span class="d_inline_middle">
										<span class="d_block color_dark tt_uppercase m_bottom_5 let_s">LOW RESTRICTION CLAMP-ON DESIGN</span>
										<span class="d_block divider_type_2 centered_db m_bottom_5"></span>
										<span class="d_block color_dark tt_uppercase m_bottom_25 m_xs_bottom_10 banner_title"><b>Universal Air Filter</b></span>
										<span class="button_type_6 bg_scheme_color tt_uppercase r_corners color_light d_inline_b tr_all_hover box_s_none f_size_ex_large">Shop Now!</span>
									</span>
								</span>
							</a>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<a href="#" class="d_block banner wrapper r_corners relative m_xs_bottom_30">
								<img src="images/cabin-air-filters.jpg" alt="">
								<span class="banner_caption d_block vc_child t_align_c w_sm_auto">
									<span class="d_inline_middle">
										<span class="d_block color_dark tt_uppercase m_bottom_5 let_s">FRESHEN AND CLEAN CABIN AIR</span>
										<span class="d_block divider_type_2 centered_db m_bottom_5"></span>
										<span class="d_block color_dark tt_uppercase m_bottom_25 m_xs_bottom_10 banner_title"><b>Cabin Air Filters</b></span>
										<span class="button_type_6 bg_scheme_color tt_uppercase r_corners color_light d_inline_b tr_all_hover box_s_none f_size_ex_large">Shop Now!</span>
									</span>
								</span>
							</a>
						</div>
					</section>
					<!--blog-->
					<div class="row clearfix m_bottom_45 m_sm_bottom_35">
						<div class="col-lg-6 col-md-6 col-sm-12 m_sm_bottom_35 blog_ _ftr">
							<div class="clearfix m_bottom_25 m_sm_bottom_20">
								<h2 class="tt_uppercase color_dark f_left">From The Blog</h2>
								<div class="f_right clearfix nav_buttons_wrap">
									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left tr_delay_hover r_corners blog_prev"><i class="fa fa-angle-left"></i></button>
									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners blog_next"><i class="fa fa-angle-right"></i></button>
								</div>
							</div>
							<!--blog carousel-->
							<div class="blog_carousel">
								<div class="clearfix">
									<!--image-->
									<a href="#" class="d_block photoframe relative shadow wrapper r_corners f_left m_right_20 _ftt f_mxs_none m_mxs_bottom_10">
										<img class="tr_all_long_hover" src="images/blog_img_1.jpg" alt="">
									</a>
									<!--post content-->
									<div class="mini_post_content">
										<h4 class="m_bottom_5 _ftr"><a href="#" class="color_dark"><b>Ut tellus dolor, dapibus eget, elementum vel</b></a></h4>
										<p class="f_size_medium m_bottom_10 _ftr">25 January, 2013, 5 comments</p>
										<p class="m_bottom_10 _ftr">Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. </p>
										<a class="tt_uppercase f_size_large _ftr" href="#">Read More</a>
									</div>
								</div>
								<div class="clearfix">
									<!--image-->
									<a href="#" class="d_block photoframe relative shadow wrapper r_corners f_left m_right_20 _ftt f_mxs_none m_mxs_bottom_10">
										<img class="tr_all_long_hover" src="images/blog_img_2.jpg" alt="">
									</a>
									<!--post content-->
									<div class="mini_post_content">
										<h4 class="m_bottom_5 _ftr"><a href="#" class="color_dark"><b>Cursus eleifend, elit aenean set amet lorem</b></a></h4>
										<p class="f_size_medium m_bottom_10 _ftr">30 January, 2013, 6 comments</p>
										<p class="m_bottom_10 _ftr">Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. </p>
										<a class="tt_uppercase f_size_large _ftr" href="#">Read More</a>
									</div>
								</div>
								<div class="clearfix">
									<!--image-->
									<a href="#" class="d_block photoframe relative shadow wrapper r_corners f_left m_right_20 _ftt f_mxs_none m_mxs_bottom_10">
										<img class="tr_all_long_hover" src="images/blog_img_3.jpg" alt="">
									</a>
									<!--post content-->
									<div class="mini_post_content">
										<h4 class="m_bottom_5 _ftr"><a href="#" class="color_dark"><b>In pede mi, aliquet sit ut tellus dolor</b></a></h4>
										<p class="f_size_medium m_bottom_10 _ftr">1 February, 2013, 12 comments</p>
										<p class="m_bottom_10 _ftr">Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. </p>
										<a class="tt_uppercase f_size_large _ftr" href="#">Read More</a>
									</div>
								</div>
							</div>
						</div>
						<!--testimonials-->
						<div class="col-lg-6 col-md-6 col-sm-12 ti_ _ftr">
							<div class="clearfix m_bottom_25 m_sm_bottom_20">
								<h2 class="tt_uppercase color_dark f_left f_mxs_none m_mxs_bottom_15">What Our Customers Say</h2>
								<div class="f_right clearfix nav_buttons_wrap f_mxs_none">
									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left tr_delay_hover r_corners ti_prev"><i class="fa fa-angle-left"></i></button>
									<button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners ti_next"><i class="fa fa-angle-right"></i></button>
								</div>
							</div>
							<!--testimonials carousel-->
							<div class="testiomials_carousel">
								<div>
									<blockquote class="r_corners shadow f_size_large relative m_bottom_15 _ftr">Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis.</blockquote>
									<img class="circle m_left_20 d_inline_middle _ftr" src="images/testimonial_img_1.jpg" alt="">
									<div class="d_inline_middle m_left_15 _ftr">
										<h5 class="color_dark"><b>Marta Healy</b></h5>
										<p>Los Angeles</p>
									</div>
								</div>
								<div>
									<blockquote class="r_corners shadow f_size_large relative m_bottom_15">Integer rutrum ante eu lacus.Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque.</blockquote>
									<img class="circle m_left_20 d_inline_middle" src="images/testimonial_img_2.jpg" alt="">
									<div class="d_inline_middle m_left_15">
										<h5 class="color_dark"><b>Alan Smith</b></h5>
										<p>New York</p>
									</div>
								</div>
								<div>
									<blockquote class="r_corners shadow f_size_large relative m_bottom_15">Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit agna,endrerit sit amet, tincidunt.</blockquote>
									<img class="circle m_left_20 d_inline_middle" src="images/testimonial_img_3.jpg" alt="">
									<div class="d_inline_middle m_left_15">
										<h5 class="color_dark"><b>Anna Johnson</b></h5>
										<p>Detroid</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--banners-->
					<div class="row clearfix">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<a href="#" class="d_block _ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners red t_align_c tt_uppercase vc_child n_sm_vc_child">
								<span class="d_inline_middle">
									<img class="d_inline_middle m_md_bottom_5" src="images/banner_img_3.png" alt="">
									<span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
										<b>100% Satisfaction</b><br><span class="color_dark">Guaranteed</span>
									</span>
								</span>
							</a>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<a href="#" class="d_block _ftb h_md_auto m_xs_bottom_15 banner_type_2 r_corners green t_align_c tt_uppercase vc_child n_sm_vc_child">
								<span class="d_inline_middle">
									<img class="d_inline_middle m_md_bottom_5" src="images/banner_img_4.png" alt="">
									<span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
										<b>Free Shipping</b><br><span class="color_dark">On All Items</span>
									</span>
								</span>
							</a>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<a href="#" class="d_block _ftb h_md_auto banner_type_2 r_corners orange t_align_c tt_uppercase vc_child n_sm_vc_child">
								<span class="d_inline_middle">
									<img class="d_inline_middle m_md_bottom_5" src="images/banner_img_5.png" alt="">
									<span class="d_inline_middle m_left_10 t_align_l d_md_block t_md_align_c">
										<b>Great Daily Deals</b><br><span class="color_dark">Shop Now!</span>
									</span>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php echo '<script src="'.base_url().'js/camera.min.js"></script>
					<script src="'.base_url().'js/general.js"></script>
					<script src="'.base_url().'js/cusel-min.js"></script>'; ?>