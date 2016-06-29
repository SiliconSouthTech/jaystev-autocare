<?php echo '<section class="row clearfix m_bottom_45 m_sm_bottom_35">
	<div class="center col-lg-4 col-md-4 col-sm-4 r_corners shadow">
				<h3 class="m_bottom_20 color_dark">Register</h3> ';
				if ($this->session->flashdata('msg')|| $this->session->flashdata('error')){ 
			echo "<div class='status_box'>";
			echo $this->session->flashdata('msg');
			echo $this->session->flashdata('error');
			echo "</div>"; }
			echo '

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
	</div>
</section> ' ?>