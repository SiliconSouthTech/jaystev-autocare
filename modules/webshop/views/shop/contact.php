
<!--content-->
			<div class="page_content_offset">
				<div class="container">
					<div class="row clearfix">
						<!--left content column-->
						<section class="center_contact col-lg-9 col-md-9 col-sm-9">
							<h2 class="tt_uppercase color_dark m_bottom_25">Contacts</h2>
							<div class="r_corners photoframe map_container shadow m_bottom_45">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253682.6128446481!2d3.3975004999999996!3d6.54807475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1069cc482af60cbd%3A0x34c5c07e9201cbf7!2sChief+Nwuke+St%2C+Port+Harcourt!5e0!3m2!1sen!2sng!4v1467199776767" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
							<div class="row clearfix">
								<div class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30">
									<h2 class="tt_uppercase color_dark m_bottom_25">Contact Info</h2>
									<ul class="c_info_list">
										<li class="m_bottom_10">
											<div class="clearfix m_bottom_15">
												<i class="fa fa-map-marker f_left color_dark"></i>
												<p class="contact_e">6 Chief Nwuke Street,<br> Trans Amadi, PHC.</p>
											</div>
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
												<a class="contact_e default_t_color" href="mailto:#">info@jastev.com</a>
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
								<div class="col-lg-8 col-md-8 col-sm-8 m_xs_bottom_30">
									<h2 class="tt_uppercase color_dark m_bottom_25">Contact Form</h2>
									<?php
										if ($this->session->flashdata('subscribe_msg')){
											echo "<div class='status_box'>";
											echo $this->session->flashdata('subscribe_msg');
											echo "</div>";
										}
										?>
									<p class="m_bottom_10">Send an email. All fields with an <span class="scheme_color">*</span> are required.</p>
									<?php echo form_open( $this->lang->line('webshop_folder')."/message"); ?>
										<ul>
											<li class="clearfix m_bottom_15">
												<div class="f_left half_column">
													<label for="cf_name" class="required d_inline_b m_bottom_5">Your Name</label>
													<input type="text" id="cf_name" name="name" class="full_width r_corners">
												</div>
												<div class="f_left half_column">
													<label for="cf_email" class="required d_inline_b m_bottom_5">Email</label>
													<input type="email" id="cf_email" name="email" class="full_width r_corners">
												</div>
											</li>
											<li class="m_bottom_15">
												<label for="cf_subject" class="d_inline_b m_bottom_5">Subject</label>
												<input type="text" id="cf_subject" name="subject" class="full_width r_corners">
											</li>
											<li class="m_bottom_15">
												<label for="cf_message" class="d_inline_b m_bottom_5 required">Message</label>
												<textarea id="cf_message" name="message" class="full_width r_corners"></textarea>
											</li>
											<li>
												<button class="button_type_4 bg_light_color_2 r_corners mw_0 tr_all_hover color_dark">Send</button>
											</li>
										</ul>
									<?php echo form_fieldset_close(); ?>
									<?php echo form_close(); ?>
								</div>
							</div>
						</section>
						<!--right column-->
					</div>
				</div>
			</div>
