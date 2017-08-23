
				        <div class="span12">
					
					    <div class="navbar navbar-fixed-top">
					    <div class="navbar-inner">
						<div class="container">
						  <!-- Menampilkan tombol trigger -->
						  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						
						  </a>
						  <!-- Akhir dari tombol triger -->
						
						   <!-- Komponen navbar -->
						 
						  <a class="brand" href="<?=base_url().'home' ?>"><?=$brand ?></a>
						
						  <div class="nav-collapse collapse navbar-responsive-collapse">
						  <ul class="nav">
						  <li class="active"><a href="<?=base_url().'home' ?>">Home</a></li>

	  						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Artikel Berita <b class="caret"></b></a>
							<ul class="dropdown-menu">
							<li><a href="<?=base_url().'berita'  ?>">Artikel</a></li>
							<li><a href="<?=base_url().'category'  ?>">Kategori</a></li>
 							<li><a href="<?=base_url().'nomor_kk'  ?>">Comment</a></li>								
							
							</ul>
							</li>

							  <li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-file"></i>  Data Penting <b class="caret"></b></a>
							  <ul class="dropdown-menu">
							  <li><?=anchor(base_url().'anggota', 'Anggota Ikmasor'); ?></li>
							  <li><?=anchor(base_url().'alumni', 'Alumni'); ?></li>
							  <li><?=anchor(base_url().'kartu_anggota', 'Kartu Anggota'); ?></li>

 							  <li><a href="<?=base_url().'arsip_surat'  ?>">Arsip Surat</a></li>		
 									
				
							
							</ul>
							</li>

							
							 
							  <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-asterisk"></i> Rekap Data <b class="caret"></b></a>
								<ul class="dropdown-menu">
		
 									<li><a href="<?=base_url().'anggota/add_rekap_data'  ?>">Rekap Data Anggota</a></li>		
 									<li class="dropdown"><a href="<?=base_url().'anggota/add_rekap_perangkatan_alumni'  ?>">Rekap Data Alumni</a></li>	

								</ul>
							  </li>
							</ul>
							
							<ul class="nav pull-right">

							   <li><a href="#">  
<i class="icon icon-time"></i>
							     <?= 'Hari'.
              '&nbsp;'.
              namahari($nohari).
              ',&nbsp;'.
              $tgl.
              '&nbsp;'.
              namabulan($bln).
              '&nbsp;'.
              $thn; 
               ?></a></li>




							  <li class="divider-vertical"></li>
							  <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-user"></i>
								<?=$this->session->userdata('username'); ?>
								 <b class="caret"></b></a>
								<ul class="dropdown-menu">
			<?php

			$edit = $this->db->get('admin');

		
			 foreach ($edit->result() as $key): ?>
								  <li><a href="<?=base_url().'admin/index/'.$key->idadmin ?>" title=""><i class=" icon-user"></i> Edit Akun</a></li>
								 <?php endforeach ?>
								  <li><a href="#">Lihat WEB</a></li>
								  <li class="divider"></li>
								  <li><a href="<?=base_url().'login/logout'?>">
								  <i class="icon icon-off"></i> Logout</a></li>
								</ul>
							  </li>
							</ul>
						  </div><!-- /.nav-collapse -->
						</div>
					  </div><!-- /navbar-inner -->
					</div><!-- /navbar -->
					
						  
				</div>

				  	  