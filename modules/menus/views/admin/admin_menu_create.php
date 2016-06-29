<h2><?php echo $title;?></h2>

<?php
echo form_open('menus/admin/create');
echo "\n<p><label for='menuname'>Name</label><br/>\n";
$data = array('name'=>'name','id'=>'menuname','size'=>25);
echo form_input($data) ."</p>\n";

echo "<p><label for='short'>Short Description</label><br/>\n";
$data = array('name'=>'shortdesc','id'=>'short','size'=>40);
echo form_input($data) ."</p>\n";

echo "<p><label for='page_uri'>Page you want to show. (URI)</label><br/>\n";
echo form_dropdown('page_uri',$pages) ."</p>\n";

echo "<p><label for='status'>Status</label><br/>\n";
$options = array('active' => 'active', 'inactive' => 'inactive');
echo form_dropdown('status',$options) ."</p>\n";

echo "<p><label for='parent'>Parent Menu</label><br/>\n";
echo form_dropdown('parentid',$menus) ."</p>\n";

echo "<p><label for='order'>Order</label><br/>\n";
$data = array('name'=>'order','id'=>'order','size'=>10);
echo form_input($data) ."</p>\n";

echo form_submit('submit','create menu');
echo form_close();

echo "<pre>";
print_r ($pages);
echo "</pre>";
?>