<h2><?php echo $title;?></h2>
<link href="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group hidden">
                                                    <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group pull-right">
                                                    <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php
if ($this->session->flashdata('message')){
	echo "<div class='status_box'>".$this->session->flashdata('message')."</div>";
}


if (count($orders)){

	echo '<table id="sample_1" class="table table-striped table-bordered table-hover table-checkable order-column">';
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>&nbsp;</th><th class='10%'>Order <br> ID</th>\n<th>Customer Name</th><th>Total</th><th>Telephone</th><th>Order Date</th><th>Payment Date</th><th>City</th><th>Actions</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($orders as $key => $list){
		echo "<tr class='odd gradeX' valign='top'>\n";
		echo "<td align='center'>".form_checkbox('p_id[]',$list['order_id'],FALSE)."</td>";
		echo "<td align='center'>".$list['order_id']."</td>\n";
		echo "<td align='center'>".$list['customer_first_name']." ".$list['customer_last_name']."</td>\n";
		echo "<td align='center'>".$list['total']."</td>\n";
		
		// echo "<td align='center'>".$list['category_id']."</td>\n";
		echo "<td align='center'>".$list['phone_number']."</td>\n";
		echo "<td align='center'>".$list['order_date']."</td>\n";
		echo "<td align='center'>".$list['payment_date']."</td>\n";
		echo "<td align='center'>".$list['city']."</td>\n";
		echo "<td align='center'>";
		echo anchor('orders/admin/paid/'.$list['order_id'],'paid');
		echo " | ";
		echo anchor('orders/admin/delivered/'.$list['order_id'],'delivered');
		echo " | ";
		echo anchor('orders/admin/details/'.$list['order_id'],'details');
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</tbody></table>";
	echo form_close();
}
?>

                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <?php $datatable = 1; ?>