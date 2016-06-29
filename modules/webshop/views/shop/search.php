
  	





<!--content-->
			<div class="page_content_offset">
				<div class="container">
					<div class="middle_row row_white search_row">
						<div class="middle_row row_white search_row">
						<div class="container" style="max-width: 950px;">
							<?php $formData = array('class' => 'search_form advsearch_hide clearfix', ); echo form_open('webshop/search', $formData); ?>
							
								<div class="row field_select">
				                    <label class="label_title">Year:</label>
				                    <select class="select_styled" name="year">
				                        <option value="1">2001</option>
				                        <option value="2">2002</option>
				                        <option value="3">2003</option>
				                        <option value="4">2004</option>
				                        <option value="5">2005</option>
				                        <option value="6">2006</option>                                                
				                        <option value="7">2007</option>
				                        <option value="8">2008</option>
				                        <option value="9">2009</option>
				                        <option value="10">2010</option>
				                        <option value="11">2011</option>
				                        <option value="12">2012</option>
				                    </select>
				                </div>

				                <div class="row field_select">
				                    <label class="label_title">Select Make:</label>
				                    <select class="select_styled" name="car_make">
				                        <option value="1">Alfa Romeo</option>
				                        <option value="2">Audi</option>
				                        <option value="3">BMW</option>
				                        <option value="4">Chevrolet</option>
				                        <option value="5">Ford</option>
				                        <option value="6">Honda</option>                                                
				                        <option value="7">Lexus</option>
				                        <option value="8">Mazda</option>
				                        <option value="9">Mercedes Benz</option>
				                        <option value="10">Mitsubishi</option>
				                        <option value="11">Nissan</option>
				                        <option value="12">Opel</option>
				                        <option value="13">Toyota</option>                       
				                        <option value="14">Volkswagen</option>
				                        <option value="15">Volvo</option>                        
				                    </select>
				                </div>
				                
				                <div class="row field_select">
				                    <label class="label_title">Select Model:</label>
				                    <select class="select_styled" name="car_model">
				                        <option value="1">626</option>
				                        <option value="2">323</option>
				                        <option value="3">3</option>
				                        <option value="4">5</option>
				                        <option value="5">7</option>
				                        <option value="6">СX-7</option>                                                
				                        <option value="7">MVP</option>
				                        <option value="8">RX-8</option>
				                        <option value="9">MX-3</option>
				                        <option value="10">MX-5</option>
				                        <option value="11">MX-6</option>
				                        <option value="12">BT-50</option>
				                        <option value="13">CX-9</option>                                          
				                    </select>
				                </div>
				                
				                
				                <div class="row field_select">
				                    <label class="label_title">Select Feul Capacity:</label>
				                    <select class="select_styled" name="fuel_capacity">
				                        <option value="1">3000 EUR</option>
				                        <option value="2">5000 EUR</option>
				                        <option value="3">7000 EUR</option>
				                        <option value="4" selected>10000 EUR</option>
				                        <option value="5">20000 EUR</option>
				                        <option value="6">Unlimited</option>
				                    </select>
				                </div>

				                <div class="adv_search_hidden clearfix">
					                <div class="row field_select">
					                    <label class="label_title">Input Part Number:</label>
					                    <input class="" style="max-height:32px;"></input>
					                </div>
					                <div class="row field_select">
					                	<label class="label_title">Search</label>
					                	<span class="btn btn_search"><input type="submit" value="SEARCH"></span>
					                </div>
					                </div>
				                
				                
				                
				                <div class="row rowSubmit">
				                	<label class="label_title" id="adv_search_open">Search By Part Number</label>
				                    <span class="btn btn_search"><input type="submit" value="SEARCH"></span>
				                </div>
				            </form>
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
							</script>
				            
						</div>
					</div>
					</div>
					<h2 class="tt_uppercase color_dark m_bottom_30">Search results for <?php echo $year.' '.$car_make.' '.$car_model.' '.$fuel_capacity ?>  </h2>
					<?php if (count($results)) { ?>
						<!--compare products table-->
						<table class="table_type_2 responsive_table type_2 full_width r_corners wraper shadow t_align_l m_bottom_30">
							<tr>
								<!--titles for td-->
								<th class="f_size_large d_xs_none">Product Image <br>Name &amp; Category</th>
								<?php foreach ($results as $key => $list) {
									echo '<td data-title="Product Image,Name &amp; Category">
									<img class="m_bottom_10" src="'.$list['image_url'].'" alt="" style="max-height: 150px"><br>
									<a href="'.$this->lang->line('webshop_folder').'/product/'.$list['id'].'" class="fw_medium d_inline_b f_size_ex_large color_dark m_bottom_5">'.$list['description'].'</a><br>
									<a href="#" class="default_t_color">'.$list['part_description'].'</a>
								</td>';
								} ?>
								
								
							</tr>
							<tr>
								<!--price-->
								<td class="f_size_large d_xs_none">Price</td>
								<?php foreach ($results as $key => $list) {
									echo '<td data-title="Price">
									<span class="fw_medium f_size_large scheme_color">'.$list['price'].'</span>
								</td>';
								} ?>
								
							</tr>
							<tr>
								<!--description-->
								<td class="f_size_large d_xs_none">Manufacturer</td>
								<?php foreach ($results as $key => $list) {
									echo '<td data-title="Manufacturer">
									<p class="color_dark">'.$list['brand'].'</p>
								</td>';
								} ?>
								
							</tr>
							<tr>
								<!--product code-->
								<td class="f_size_large d_xs_none">Part Number</td>
								<?php foreach ($results as $key => $list) {
									echo '<td data-title="Product Code">
									<p>'.$list['part_number'].'</p>
								</td>';
								} ?>
								
							</tr>
							<tr>
								<!--action-->
								<td class="f_size_large d_xs_none">Action</td>
								<?php foreach ($results as $key => $list) {
									echo '<td data-title="Action">
									<a href="'.base_url().'webshop/product/'.$list['id'].'" type="button" class="button_type_4 bg_scheme_color r_corners tr_all_hover color_light mw_0 m_bottom_10">View Product</a>
								</td>';
								} ?>
								
							</tr>
						</table>
					<?php } else {
						echo '<div class="alert_box r_corners error m_bottom_10">
								<i class="fa fa-exclamation-triangle"></i><p>No product found</p>
							</div>';
					}
					 ?>
					
					<hr class="m_bottom_15 divider_type_3">
					<a href="<?php echo base_url() ?>" role="button" class="d_inline_b bg_light_color_2 color_dark tr_all_hover button_type_4 r_corners"><i class="fa fa-reply m_left_5 m_right_10 f_size_large"></i>Back to: Shop home</a>
				</div>
			</div>