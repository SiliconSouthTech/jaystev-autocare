			<div id="leftbox"><!--Start of leftbox 1-->
				<h2>Categories</h2>
				<?php
				echo "\n<ul id='catnav'>";
				foreach ($this->data['navlist'] as $key => $menu){
						echo "\n<li class='menuone'>\n";
						echo anchor ($this->lang->line('webshop_folder')."/cat/".$key, $menu);
						echo "\n</li>\n";
				}
				echo "\n</ul>\n";
				?>		
			</div>
		