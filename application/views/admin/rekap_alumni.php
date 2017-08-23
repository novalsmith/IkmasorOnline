<h3 style="border-bottom:dashed 1px #AAB2BD">Rekap Data Alumni IKMASOR
<small>
<a href="<?=base_url().'category'  ?>" title="" class="btn btn-primary btn-small pull-right">
<i class="icon  icon-arrow-left icon-white"></i> Kembali</a>
</small>
</h3>

<div class="span4 well">
	<a href="<?=base_url().'anggota/rekap_all_alumni'?>" class="btn btn-large btn-primary"> Cetak Semua Alumni     </a>
</div>

<div class="span4 well">
	
	<?=$this->session->flashdata('message');  ?>



<?php echo form_open(base_url().'anggota/rekap_perangkatan_alumni','method="post"'); ?>




<?php

$awal = array(
			'name' 		=> 'awal',
			'class'		=> 'span4',
		
			'placeholder' => ' Masukan Tahun Angkatan',
			'required'  => 'masukan');

echo form_label('Tahun Angkatan');
echo form_input($awal);
echo form_label('Contoh : 2005');

 echo form_error('awal', '<p class="text-error">', '</p>');
 ?>


<?php

$akhir = array(
			'name' 		=> 'akhir',
			'class'		=> 'span4',
		
			'placeholder' => ' Masukan Tahun Akhir',
			'required'  => 'masukan');

echo form_label('Kategori Artikel Berita');
echo form_input($akhir);

 echo form_error('akhir', '<p class="text-error">', '</p>');
 ?>




<?php

echo form_submit('simpan','Cetak','class="btn btn-primary"');
 ?>
<?php echo form_close()?>


</div>












