<?php

if ($this->session->flashdata('subscribe_msg')){
	echo "<div class='status_box'>";
	echo $this->session->flashdata('subscribe_msg');
	echo "</div>";
}
?>

<?php echo validation_errors(); ?>
<div id="emailsubs">
<?php echo form_open("subscribers/admin/create_sub"); ?>

<h5>*Name</h5>
<input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" size="40" />

<h5>*Email</h5>
<input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>" size="40" />


<div><input type="submit" value="Subscribe" /></div>


<?php echo form_close(); ?>

</div>


