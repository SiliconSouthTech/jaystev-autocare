<?php if(isset($_SESSION['totalprice'])){
$totalprice = $_SESSION['totalprice'];
$grandtotal = (int)$totalprice + $shippingprice ;

} ?>
<!--breadcrumbs-->
			<section class="breadcrumbs">
				<div class="container">
					<ul class="horizontal_list clearfix bc_list f_size_medium">
						<li class="m_right_10 current"><a href="<?php echo base_url() ?>" class="default_t_color">Home<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
						<li><a href="#" class="default_t_color">Shopping Cart</a></li>
					</ul>
				</div>
			</section>

<!--content-->
			<div class="page_content_offset">
				<div class="container">
					<div class="row clearfix">
						<?php
							if ($this->session->flashdata('msg')){
								echo "<div class='status_box'>";
								echo $this->session->flashdata('msg');
								echo "</div>";
							} 
							?>
						<!--left content column-->
						<section class="col-lg-12 col-md-12 col-sm-12 m_xs_bottom_30">
							<h2 class="tt_uppercase color_dark m_bottom_20">My Cart</h2>
							
							<?php if (isset($_SESSION['cart'])) { ?>
								
								<div class="row clearfix m_bottom_15">
								<div class="col-lg-7 col-md-7 col-sm-7 f_sx_none m_xs_bottom_10">
									<p class="d_inline_middle f_size_medium"></p>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-5 f_sx_none t_xs_align_l t_align_r">
									<!--pagination-->
									
									<div class="horizontal_list clearfix d_inline_middle f_size_medium m_left_10">
										<a type="button" href="<?php echo base_url().'webshop/checkout' ?>" class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_10">Checkout All</a>										
									</div>
									
								</div>
							</div>
							<hr class="m_bottom_30 divider_type_3">
							<!--wishlist table-->
							<table class="table_type_1 responsive_table full_width t_align_l r_corners wraper shadow bg_light_color_1 m_bottom_30">
								<thead>
									<tr class="f_size_large">
										<!--titles for td-->
										<th>Product Image</th>
										<th>Product Name &amp; Category</th>
										<th>Price</th>
										<th>Quanity</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($_SESSION['cart'] as $PID => $row) {
										$image_url = $this->MProducts->getImage($PID);
										$data = array(	
											'name' => "li_id[$PID]", 
											'value'=>$row['count'], 
											'id' => "li_id_$PID", 
											'class' => 'f_left',
											'type' => 'text'
									);
										echo '<tr>
										<!--product image-->
										<td data-title="Product Image"><img src="'.$image_url.'" alt="" style="max-height:110px; max-width:110px"></td>
										<!--product name and category-->
										<td data-title="Product Name">
											<a href="'.base_url().'webshop/product/'.$PID.'" class="fw_medium d_inline_b f_size_ex_large color_dark m_bottom_5">'.$row['name'].'</a><br>
											<a href="#" class="default_t_color"></a>
										</td>
										<!--product price-->
										<td data-title="Price">
											<span class="scheme_color fw_medium f_size_large">N'.$row['price'].'</span>
										</td>
										<!--quanity-->
										<td data-title="Quantity">
											<div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark">
												<button class="bg_tr d_block f_left" data-direction="down">-</button>
												'.form_input($data).'
												
												<button class="bg_tr d_block f_left" data-direction="up">+</button>
											</div>
										</td>
										<!--add or remove buttons-->
										<td data-title="Action">
											<button class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_10">Add to Cart</button><br>
											<a onclick="jsRemoveProduct('.$PID.')" class="color_dark"><i class="fa fa-times m_right_5"></i> Remove</a>
										</td>
									</tr>';
									} ?>
									

									<!--prices-->
									<tr>
										<td colspan="4">
											<p class="fw_medium f_size_large t_align_r t_xs_align_c">Subtotal:</p>
										</td>
										<td colspan="1">
											<p class="fw_medium f_size_large color_dark"><?php echo $totalprice; ?></p>
										</td>
									</tr>
									<tr>
										<td colspan="4">
											<p class="fw_medium f_size_large t_align_r t_xs_align_c">Shipment Fee:</p>
										</td>
										<td colspan="1">
											<p class="fw_medium f_size_large color_dark">$0.00</p>
										</td>
									</tr>
									<!--total-->
									<tr>
										<td colspan="4" class="v_align_m d_ib_offset_large t_xs_align_l">
											<p class="fw_medium f_size_large t_align_r scheme_color p_xs_hr_0 d_inline_middle half_column d_ib_offset_normal d_xs_block w_xs_full t_xs_align_c">Total:</p>
										</td>
										<td colspan="1" class="v_align_m">
											<p class="fw_medium f_size_large scheme_color m_xs_bottom_10"><?php echo $grandtotal; ?></p>
										</td>
									</tr>
								</tbody>
								</tbody>
							</table>
							<hr class="m_bottom_10 divider_type_3">
							<div class="row clearfix m_bottom_40">
								<div class="col-lg-7 col-md-7 col-sm-7 f_sx_none m_xs_bottom_10">
									<p class="d_inline_middle f_size_medium"></p>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-5 t_align_r f_sx_none t_xs_align_l">
									<!--pagination-->
									
									<div class="horizontal_list clearfix d_inline_middle f_size_medium m_left_10">
										<a type="button" href="<?php echo base_url().'webshop/checkout' ?>" class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_10">Checkout All</a>
									</div>
								</div>
							</div>
							<?php } else { ?>

							<!--alert boxex-->
							
							<div class="alert_box r_corners info m_bottom_10">
								<i class="fa fa-info-circle"></i><p>Opps. Your cart is empty. <a href="<?php echo base_url() ?>">Click here</a> to continue shopping</p>
							</div>
							
							<?php
								
							}
							 ?>
							
						</section>
						
					</div>
				</div>
			</div>

