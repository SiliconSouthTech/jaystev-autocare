<?php print displayStatus();?>
<h2><?php echo $title;?></h2>
<p><?php echo anchor("customers/admin/create", "Create new customer");?>
<?php

if (count($customers)){
	echo "<table id='tablesorter' class='tablesorter' border='1' cellspacing='0' cellpadding='3' width='100%'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>Customer ID</th>\n<th>First name</th><th>Last name</th><th>Phone Number</th><th>Email</th><th>Address</th><th>City</th><th>Actions</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($customers as $key => $list){
		echo "<tr valign='top'>\n";
		echo "<td align='center'>".$list['customer_id']."</td>\n";
		echo "<td align='center'>".$list['customer_first_name']."</td>\n";
		echo "<td align='center'>".$list['customer_last_name']."</td>\n";
		echo "<td align='center'>".$list['phone_number']."</td>\n";
		echo "<td align='center'>".$list['email']."</td>\n";
		echo "<td align='center'>".$list['address']."</td>\n";
		echo "<td align='center'>".$list['city']."</td>\n";
		echo "<td align='center'>";
		echo anchor('customers/admin/edit/'.$list['customer_id'],'edit');
		echo " | ";
		echo anchor('customers/admin/delete/'.$list['customer_id'],'delete');
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</tbody>\n</table>";
}
?>