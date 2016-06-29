<?php echo '<section class="row clearfix m_bottom_45 m_sm_bottom_35">
				<div class="center col-lg-4 col-md-4 col-sm-4 r_corners shadow">
					<h3 class="m_bottom_20 color_dark">Log In</h3>';
				if ($this->session->flashdata('msg')|| $this->session->flashdata('error')){ 
			echo "<div class='status_box'>";
			echo $this->session->flashdata('msg');
			echo $this->session->flashdata('error');
			echo "</div>"; }
			echo '
					'.form_open(lang('webshop_folder')."/login").'
						<ul>
							<li class="m_bottom_15">
								<label for="username" class="m_bottom_5 d_inline_b">Email</label><br>
								<input type="text" required="required" name="email" id="email" class="r_corners full_width">
							</li>
							<li class="m_bottom_25">
								<label for="password" class="m_bottom_5 d_inline_b">Password</label><br>
								<input type="password" required="required" name="password" id="password" class="r_corners full_width">
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
						<a href="'.base_url().'register" role="button" class="tr_all_hover r_corners button_type_4 bg_dark_color bg_cs_hover color_light d_inline_middle m_mxs_left_0">Create an Account</a>
					</footer>
				</div>
			</section>
			'; ?>