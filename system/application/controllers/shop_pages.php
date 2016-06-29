<?php 
	
	class Shop_pages extends Shop_Controller{



		function air_filter()
		{
			$this->load->view('air_filter');

			function automotive_air_filters()
			{
				$this->load->view('automotive_air_filter');
			}

			
		}
	}