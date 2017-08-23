

<style type="text/css">
	#tabel{
		text-align:center;

	}

	#tabel tr{
		border:1px solid black;
	}

p{
	font-size:5pt;
}
}
	
</style>

	<h3 id="tabel">Data Alumni IKMASOR </h3>

	

<table id="tabel" align="center" border="0.02">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Alumni</th>
			<th>Tahun Angkatan</th>
			<th>Jurusan</th>
			<th>Status</th>
			<th>Gelar</th>
		
		</tr>
	</thead>
	<tbody>
<?php 
$no =1;
foreach ($all_alumni->result() as $key): ?>
		<tr>
					<td><?=$no++ ?></td>

					<td><?=$key->nama_lengkap ?></td>
					<td><?=$key->angkatan ?></td>
					<td><?=$key->jurusan ?></td>
					<td>
						<?php if ($key->cumlaude == 'cumlaude'){ ?>
						
						<strong>Cumlaude</strong>	
						
						<?php }else{ ?>

					<strong>Tidak</strong>	


						<?php } ?>
					</td>
					<td><?=$key->gelar ?></td>


		</tr>

<?php endforeach ?>
	
	</tbody>
	
</table>
<br>
<p align="center">@<?=date('d M Y').'  <strong>IKMASOR Surabaya</strong>' ?></p>














