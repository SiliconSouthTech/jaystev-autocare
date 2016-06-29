<?php

	$imageinfo = $product['image_url'];
    $image=convert_image_path($imageinfo);
?>

<!--content-->
			<div class="page_content_offset">
				<div class="container">
					<?php
						if ($this->session->flashdata('conf_msg')){ 
						echo "<div class='status_box'>";
						echo $this->session->flashdata('conf_msg');
						echo "</div>";
						}
						?>	
					<div class="clearfix m_bottom_30 t_xs_align_c">
						<div style="margin-bottom:20px" class="photoframe type_2 shadow r_corners f_left f_sm_none d_xs_inline_b product_single_preview relative m_right_30 m_bottom_5 m_sm_bottom_20 m_xs_right_0 w_mxs_full">
							<?php if ($product['quantity_in_stock'] > 0) {
								echo '<span class="hot_stripe"><img src="<?php echo base_url() ?>images/sale_product.png" alt=""></span>';
							}
							else {
								echo 'out of stock';
							} ?>
							
							<div class="relative d_inline_b m_bottom_10 qv_preview d_xs_block">
								<img id="zoom_image" src="<?php echo $image ?>" data-zoom-image="<?php echo $image ?>" class="tr_all_hover" alt="">
								<a href="<?php echo $image ?>" class="d_block button_type_5 r_corners tr_all_hover box_s_none color_light p_hr_0">
									<i class="fa fa-expand"></i>
								</a>
							</div>
						</div>
						<div class="p_top_10 t_xs_align_l">
							<!--description-->
							<h2 class="color_dark fw_medium m_bottom_10"><?php echo $product['description']; ?></h2>
							<h3 class="color_dark fw_small m_bottom_10"><?php echo $product['part_description']  ?></h3>
							<hr class="m_bottom_10 divider_type_3">
							<table class="description_table m_bottom_10">
								<tr>
									<td>Manufacturer:</td>
									<td><a class="color_dark"><?php echo $product['brand']  ?></a></td>
								</tr>
								<tr>
									<td>Product Code:</td>
									<td><?php echo $product['part_number']  ?></td>
								</tr>
							</table>
							<hr class="divider_type_3 m_bottom_10">
							<?php if ($product['price'] > 0) {
								echo '<div class="m_bottom_15">
								<span class="v_align_b f_size_big m_left_5 scheme_color fw_medium">'.$this->lang->line("webshop_currency_symbol"). $product["price"].'</span>
								</div>';
							}
							else {
								echo '<div class="m_bottom_15">
								<span class="v_align_b f_size_big m_left_5 scheme_color fw_medium">Price not available</span>
								</div>';
							}
							 if ($product['quantity_in_stock'] > 0) {
								echo '<table class="hidden description_table type_2 m_bottom_15">
								
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
							<div class="d_ib_offset_0 m_bottom_20">
								<a type="button" href="'. base_url() .'/'. $this->lang->line("webshop_folder").'/cart/'.$product["id"]. '" class="button_type_12 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large">Buy</a>
							</div>';
							} ?>
							
						</div>
						<div class="p_top_10 t_xs_align_r">
							<div class="tabs m_bottom_45">
						<!--tabs navigation-->
						<nav>
							<ul class="tabs_nav horizontal_list clearfix">
								<li class="f_xs_none"><a href="#tab-2" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Specifications</a></li>
								<li class="f_xs_none"><a href="#tab-3" class="bg_light_color_1 color_dark tr_delay_hover r_corners d_block">Reviews</a></li>
							</ul>
						</nav>
						<section class="tabs_content shadow r_corners">
							<div id="tab-2">
								<h5 class="fw_medium m_bottom_15">Item specifics:</h5>
								<div class="row clearfix">
									<div class="col-lg-6 col-md-6 col-sm-6 m_xs_bottom_15">
										<div class="table_wrap">
											<table class="description_table type_3 m_xs_bottom_10">
												<tr>
													<td>Condition:</td>
													<td>New</td>
												</tr>
												<tr>
													<td>Country of Origin:</td>
													<td><?php echo $product['origin_country']  ?></td>
												</tr>
												<tr>
													<td>Length:</td>
													<td><?php echo $product['length'] ?></td>
												</tr>
												<tr>
													<td>Width:</td>
													<td><?php echo $product['width'] ?></td>
												</tr>
											</table>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="table_wrap">
											<table class="description_table type_3 m_xs_bottom_10">
												<tr>
													<td>Brand:</td>
													<td><?php echo $product['brand'] ?></td>
												</tr>
												<tr>
													<td>Part Number:</td>
													<td><?php echo $product['part_number'] ?></td>
												</tr>
												<tr>
													<td>Height:</td>
													<td><?php echo $product['height'] ?></td>
												</tr>
												<tr>
													<td>Weight:</td>
													<td><?php echo $product['weight'] ?></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div id="tab-3">
								<div class="row clearfix">
									<div class="col-lg-8 col-md-8 col-sm-8">
										<h5 class="fw_medium m_bottom_15">Last Reviews</h5>
										<!--review-->
										<article>
											<div class="clearfix m_bottom_10">
												<p class="f_size_medium f_left f_mxs_none m_mxs_bottom_5">By John Smith - Thursday, 26 December 2013</p>
												<!--rating-->
												<ul class="horizontal_list f_right f_mxs_none clearfix rating_list type_2">
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
											<p class="m_bottom_15">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit.</p>
										</article>
										<hr class="m_bottom_15">
										<!--review-->
										<article>
											<div class="clearfix m_bottom_10">
												<p class="f_size_medium f_left f_mxs_none m_mxs_bottom_5">By Admin - Thursday, 26 December 2013</p>
												<!--rating-->
												<ul class="horizontal_list f_right f_mxs_none clearfix rating_list type_2">
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
											<p class="m_bottom_15">Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo.</p>
										</article>
										<hr class="m_bottom_15">
										<!--review-->
										<article>
											<div class="clearfix m_bottom_10">
												<p class="f_size_medium f_left f_mxs_none m_mxs_bottom_5">By Alan Doe - Thursday, 26 December 2013</p>
												<!--rating-->
												<ul class="horizontal_list f_right f_mxs_none clearfix rating_list type_2">
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
											<p class="m_bottom_15">Ut pharetra augue nec augue. Nam elit agna,endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem, interdum vitae,dapibus ac, scelerisque vitae, pede. Donec eget tellus non erat lacinia fermentum. Donec in velit vel ipsum auctor pulvinar. Vestibulum iaculis lacinia est.</p>
										</article>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4">
										<h5 class="fw_medium m_bottom_15">Write a Review</h5>
										<p class="f_size_medium m_bottom_15">Now please write a (short) review....(min. 100, max. 2000 characters)</p>
										<form>
											<textarea class="r_corners full_width m_bottom_10 review_tarea"></textarea>
											<p class="f_size_medium m_bottom_5">First: Rate the product. Please select a rating between 0 (poorest) and 5 stars (best).</p>
											<div class="d_table full_width m_bottom_10 d_md_block">
												<div class="d_table_cell m_md_bottom_5 v_align_m d_md_block">
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
												<div class="f_size_medium m_bottom_10 d_table_cell d_md_block t_md_align_l t_align_r">
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
						</div>

					</div>
					<!--tabs-->
					<hr class="divider_type_3 m_bottom_15">
					<a href="<?php echo base_url() ?>" role="button" class="d_inline_b bg_light_color_2 color_dark tr_all_hover button_type_4 r_corners"><i class="fa fa-reply m_left_5 m_right_10 f_size_large"></i>Back to: Home</a>
				</div>
			</div>





