<h3 style="border-bottom:dashed 1px #AAB2BD">Arsip Surat Ikmasor
<small>
<a href="<?=base_url().'arsip_surat/tambah_surat'  ?>"  class="btn btn-primary btn-small pull-right tip"
data-placement="top" title="Klik Untuk Menambah Surat Baru" data-toggle="tooltip">
<i class="icon icon-plus icon-white"></i>Surat Baru</a>
</small>
</h3>


<?=$this->session->flashdata('message');  ?>
	
<table class="table table-hover table-responsive table-striped" id="tabel">
	<thead>
		<tr>
			<th>No</th>
			<th>Judul Surat</th>
			<th>Url Surat</th>

			<th>Keterangan</th>
			<th>Status Surat</th>
			
					
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
<?php 
$no =1;
foreach ($tampil->result() as $key): ?>
		<tr>
					<td><?=$no++ ?></td>

					<td><?=$key->judul_surat ?></td>

					<td>
						<a href="<?=$key->url_file_surat ?>" 
data-toggle="tooltip" 
data-placement="top" class="tip btn btn-info btn-small" 
title="Pilih Salah satu Untuk Menentukan Status Surat, 
* Surat yang di masukan adalah surat MASUK atau surat KELUAR">
<i class="icon icon-download-alt icon-white"></i> Download</a>
					</td>
					<td><?= substr($key->keterangan,0,50).'...' ?></td>
					
					<td>
						
						<?php 
				
				if ($key->status_surat == 'surat_masuk') {
					?>

					<p class="label label-success">Surat Masuk</p>

					<?php

					}else{
						 ?>

				<p class="label label-warning">Surat Keluar	</p>


					<?php }  ?>


					</td>
					


					<td>
					 <div class="btn-group">
						<button class="btn"><i class="icon icon-list"></i> Pilih</button>
						<button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
						<ul class="dropdown-menu">

						  <li><a href="<?=base_url().'arsip_surat/edit_surat/'.$key->id_arsip?>"><i class="icon icon-edit"></i> Edit</a></li>
						  <li><a href="<?=base_url().'arsip_surat/hapus/'.$key->id_arsip?>"
						  onClick="return confirm('Anda Yakin Untuk Menghapus '+'\n'+
				'<?=  $key->judul_surat  ?> Dari Data Arsip Surat..?')">
				<i class="icon icon-trash"></i> Hapus</a></li>
			
						</ul>
					  </div><!-- /btn-group -->
					</td>

		</tr>

<?php endforeach ?>
	
	</tbody>
	
</table>

</div>





