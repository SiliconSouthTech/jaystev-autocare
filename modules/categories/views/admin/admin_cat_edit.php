
<div id="pageleftcont">
<h2><?php echo $title;?></h2>
<div id="create_edit">
<?php
echo form_open('categories/admin/edit');



echo form_hidden('name', $category['name']);
/*
echo "<p><label for='update'>Update</label><br/>";
echo form_checkbox('update', 'update', TRUE);
*/
echo "<p><label for='catname'>Name</label><br/>";
echo "<h2>".$category['name']."</h2>";

echo "<p><label for='short'>Short Description</label><br/>";
$data = array('name'=>'shortdesc','id'=>'short','size'=>40, 'value' => $category['shortdesc']);
echo form_textarea($data) ."</p>";
?>
<a href="javascript:toggleEditor('short');">Add/Remove editor</a><br /><br />
<?php 
echo "<p><label for='long'>Long Description</label><br/>";
$data = array('name'=>'longdesc','id'=>'long','rows'=>5, 'cols'=>'40', 'value' => $category['longdesc']);
echo form_textarea($data) ."</p>";
?>
<a href="javascript:toggleEditor('long');">Add/Remove editor</a><br /><br />
<?php 
echo "<p><label for='status'>Status</label><br/>";
$options = array('active' => 'active', 'inactive' => 'inactive');
echo form_dropdown('status',$options, $category['status']) ."</p>";

echo "<p><label for='parent'>Category Parent</label><br/>";
echo form_dropdown('parentid',$categories,$category['parentid']) ."</p>";

echo form_hidden('id',$category['id']);
echo form_submit('submit','update category');
echo form_close();


?>
</div>
 </div>
    <div id="pagerightcont">
  <?php  $this->load->view($right);?>    
    </div>