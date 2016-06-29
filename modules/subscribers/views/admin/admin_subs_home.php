<h2><?php echo $title;?></h2>
<p><?php echo anchor("subscribers/admin/sendemail", "Create new email");?></p>
<p><?php echo anchor("subscribers/admin/create_home", "Create new subscriber");?></p>
<?php print displayStatus();?>
<?php
if ($this->session->flashdata('message')){
	echo "<div class='status_box'>".$this->session->flashdata('message')."</div>";
}

if (count($subscribers)){
	echo "<table id='tablesorter' class='tablesorter' border='1' cellspacing='0' cellpadding='3' width='800'>\n";
	echo "<thead>\n<tr valign='top'>\n";
	echo "<th>ID</th>\n<th>Name</th><th>Email</th><th>Actions</th>\n";
	echo "</tr>\n</thead>\n<tbody>\n";
	foreach ($subscribers as $key => $list){
		echo "<tr valign='top'>\n";
		echo "<td align='center'>".$list['id']."</td>\n";
		echo "<td>".$list['name']."</td>\n";
		echo "<td>".$list['email']."</td>\n";
		echo "<td align='center'>";
		echo anchor('subscribers/admin/delete/'.$list['id'],'unsubscribe');
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</tbody>\n</table>";
}
?>