<h2><?php echo $title;?></h2>
<div id="create_edit">
<?php

echo form_open('pages/admin/create');
echo "\n<p><label for='pname'>Name</label><br/>\n";
$data = array('name'=>'name','id'=>'pname','size'=>25);
echo form_input($data) ."</p>\n";

echo "<p><label for='short'>Keywords</label><br/>\n";
$data = array('name'=>'keywords','id'=>'short','size'=>40);
echo form_input($data) ."</p>\n";

echo "<p><label for='desc'>Description</label><br/>\n";
$data = array('name'=>'description','id'=>'desc','size'=>40);
echo form_input($data) ."</p>\n";

echo "<p><label for='fpath'>Path/FURL Use one word or with under line _ .</label><br/>\n";
$data = array('name'=>'path','id'=>'fpath','size'=>50);
echo form_input($data) ."</p>\n";

echo "<p><label for='long'>Content</label><br/>\n";
$data = array('name'=>'content','id'=>'long','rows'=>5, 'cols'=>'40');
echo form_textarea($data) ."</p>\n";
?>
<a href="javascript:toggleEditor('long');">Add/Remove editor</a><br /><br />
<?php 
echo "<p><label for='status'>Status</label><br/>\n";
$options = array('active' => 'active', 'inactive' => 'inactive');
echo form_dropdown('status',$options) ."</p>\n";


echo form_submit('submit','create page');
echo form_close();


?>
</div>