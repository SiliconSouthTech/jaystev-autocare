<?php print displayStatus();?>
<h2><?php echo $title;?></h2>
<div id="create_edit">
<?php

echo form_open('pages/admin/edit');
echo "<p><label for='pname'>Name</label><br/>";
$data = array('name'=>'name','id'=>'pname','size'=>25, 'value' => $pagecontent['name']);
echo form_input($data) ."</p>";

echo "<p><label for='short'>Keywords</label><br/>";
$data = array('name'=>'keywords','id'=>'short','size'=>40, 'value' => $pagecontent['keywords']);
echo form_input($data) ."</p>";

echo "<p><label for='desc'>Description</label><br/>";
$data = array('name'=>'description','id'=>'desc','size'=>40, 'value' => $pagecontent['description']);
echo form_input($data) ."</p>";

echo "<p><label for='fpath'>Path/FURL</label><br/>";
$data = array('name'=>'path','id'=>'fpath','size'=>50, 'value' => $pagecontent['path']);
echo form_input($data) ."</p>";

echo "<p><label for='long'>Content</label><br/>";
$data = array('name'=>'content','id'=>'long','rows'=>5, 'cols'=>'40', 'value' => $pagecontent['content']);
echo form_textarea($data) ."</p>";
?>
<a href="javascript:toggleEditor('long');">Add/Remove editor</a><br /><br />
<?php
echo "<p><label for='status'>Status</label><br/>";
$options = array('active' => 'active', 'inactive' => 'inactive');
echo form_dropdown('status',$options,$pagecontent['status']) ."</p>";

echo form_hidden('id',$pagecontent['id']);
echo form_submit('submit','update page');
echo form_close();


?>
</div>