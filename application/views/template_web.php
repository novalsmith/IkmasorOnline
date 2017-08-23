<?php $this->load->view('header'); ?>
<style type="text/css" media="screen">
	body
	{
		background-color:  #bdc3c7;
	}
	#user
	{
		height: 30px;
	}
	.a
	{
		background-color: white;
		border: 1px dashed #AAB2BD;
	}
</style>
<div class="container well a">
	<div class="row">




<?php $this->load->view('menu_atas_admin'); ?>
<br><br>

<div class="span12">
<?php $this->load->view('bread'); ?>


<?php $this->load->view($content); ?>


</div>



	</div>
</div>

<?php $this->load->view('footer'); ?>