			<div class="signtop paddingright">
				<b><?php
					echo $this->data['loginstatus'];
				?></b><br />	
			</div>
			<div id="newsletter" class="signtop paddingright">
				<b><?php
					echo lang('subscribe_newsletter')."<br />\n";
					echo anchor(base_url()."index.php/".lang('webshop_folder')."/subscribe/", lang('subscribe_subscribe'));
					echo "<br />\n";
					echo anchor(base_url()."index.php/".lang('webshop_folder')."/unsubscribe/", lang('subscribe_unsubscribe'));
				
				?></b><br />	
			</div>
			
			<div class="leftbox"><!-- Start of Top sellers -->        
				<h2>Most sold</h2>
					<div class="box ac">
						<?php foreach ($this->data['mostsold'] as $mostsold):?>
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td>
											<div class="topseller">
												<div class="topsellercname">
												<a href="<?php echo base_url();?>index.php/<?php echo $this->lang->line('webshop_folder');?>/product/<?php echo $mostsold['id']; ?>"><?php echo $mostsold['name']; ?></a>
											</div>
											<div class="topsellerimg">
												<a href="<?php echo base_url();?>index.php/<?php echo $this->lang->line('webshop_folder');?>/product/<?php echo $mostsold['id']; ?>">
													<img src="<?php echo $mostsold['thumbnail']; ?>" border="0" alt=" " title=" " />
												</a>
											</div>
											<div id="topsellerdesc">  
												<?php echo $mostsold['shortdesc']; ?>
												
											</div>
											<div class="topsellerprice">
												<b>Pris</b>: <span class='price'><?php echo $mostsold['price']; ?></span>
											</div>
											</div>
										</td>
									</tr>
								</table>
						<?php endforeach; ?>
					</div>
			</div><!-- END of Top sellers -->
			
				<div class="rightbox"><!-- START FEATURED PRODUCTS BOX -->
				<h2>New Product</h2>
				<div class="box">
					<?php foreach ($this->data['newproduct'] as $newproduct):?>
								<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td>
											<div class="topseller">
												<div class="topsellercname">
												<a href="<?php echo base_url();?>index.php/<?php echo $this->lang->line('webshop_folder');?>/product/<?php echo $newproduct['id']; ?>"><?php echo $newproduct['name']; ?></a>
											</div>
											<div class="topsellerimg">
												<a href="<?php echo base_url();?>index.php/<?php echo $this->lang->line('webshop_folder');?>/product/<?php echo $newproduct['id']; ?>">
													<img src="<?php echo $newproduct['thumbnail']; ?>" border="0" alt=" " title=" " />
												</a>
											</div>
											<div id="topsellerdesc">  
												<?php echo $newproduct['shortdesc']; ?>
												
											</div>
											<div class="topsellerprice">
												<b>Pris</b>: <span class='price'><?php echo $newproduct['price']; ?></span>
											</div>
											</div>
										</td>
									</tr>
								</table>
					<?php endforeach; ?>
				</div>
			</div><!-- END FEATURED PRODUCTS BOX --> 
			
			