
<div id="pageleftcont">
<div id="create_edit">
<h2><?php echo $title;?></h2>
<?php
echo form_open_multipart('products/admin/create')."\n";

echo "<p><label for='parent'>Category</label><br/>\n";
echo form_dropdown('category_id',$categories) ."</p>\n";


echo "<p><label for='pname'>Name</label><br/>";
$data = array('name'=>'name','id'=>'pname','size'=>25);
echo form_input($data) ."</p>\n";

echo "<p><label for='short'>Short Description</label><br/>";
$data = array('name'=>'shortdesc','id'=>'short','rows'=>5, 'cols'=>'80');
echo form_textarea($data) ."</p>\n";
?>
<a href="javascript:toggleEditor('short');">Add/Remove editor</a><br /><br />
<?php 
echo "<p><label for='long'>Long Description</label><br/>";
$data = array('name'=>'longdesc','id'=>'long','rows'=>10, 'cols'=>'80');
echo form_textarea($data) ."</p>\n";

?>
<a href="javascript:toggleEditor('long');">Add/Remove editor</a><br /><br />
<?php 
echo "<p><label for='uimage'>Select Image</label><br/>";
$data = array('name'=>'image','id'=>'uimage','size'=>80);
echo form_textarea($data) ."</p>\n";

echo "<p><label for='uthumb'>Select Thumbnail</label><br/>";
$data = array('name'=>'thumbnail','id'=>'uthumb','size'=>80);
echo form_textarea($data) ."</p>\n";

echo "<p><label for='status'>Status</label><br/>";
$options = array('active' => 'active', 'inactive' => 'inactive');
echo form_dropdown('status',$options) ."</p>\n";

echo "<p><label for='product_order'>Product Order</label><br/>";
$data = array('name'=>'product_order','id'=>'product_order','size'=>11);
echo form_input($data) ."</p>\n";

echo "<p><label for='class'>Class</label><br/>";
$data = array('name'=>'class','id'=>'class','size'=>50);
echo form_input($data) ."</p>\n";

echo "<p><label for='group'>Grouping</label><br/>";
$data = array('name'=>'grouping','id'=>'group','size'=>50);
echo form_input($data) ."</p>\n";

echo "<p><label for='price'>Price</label><br/>";
$data = array('name'=>'price','id'=>'price','size'=>20);
echo form_input($data) ."</p>\n";

echo "<p><label for='featured'>Featured?</label><br/>\n";
$options = array('none' => 'none', 'front' => 'Main frontpage', 'webshop' => 'Webshop frontpage');
echo form_dropdown('featured',$options) ."</p>\n";

echo "<p><label for='other_feature'>Other Feature?</label><br/>\n";
$options = array('none' => 'none', 'most sold' => 'Most sold', 'new product' => 'New Product');
echo form_dropdown('other_feature',$options) ."</p>\n";

echo form_submit('submit','create product');
echo form_close();


?>
</div>
 </div>
    <div id="pagerightcont">
  <?php $this->load->view($right);?>    
    </div>
    <script>

    tinyMCE.init({
    	tinyMCE.execCommand('mceRemoveControl',false,'long');
    });
    
    
    </script>