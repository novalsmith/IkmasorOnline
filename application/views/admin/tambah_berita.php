<h3 style="border-bottom:dashed 1px #AAB2BD">Tambah Artikel Berita 
<small>
<a href="<?=base_url().'berita'  ?>" title="" class="btn btn-primary btn-small btn pull-right">
<i class="icon  icon-arrow-left icon-white"></i> Kembali</a>
</small>
</h3>

<div class="span4">
  
    <?php 

 echo $this->session->flashdata('message');  

            $data = array(
              'name'    =>  'tambah',
              'class'   =>  'form-signin',
              'method'  =>  'POST',
              'enctype' =>  'multipart/form-data'

              ); 

            echo   form_open('berita/proses_tambah', $data);
            ?>

   


    <!-- pesan start -->
    <?php if (! empty($pesan)) : ?>
        <p class="text-danger">
            <?php echo $pesan; ?>
        </p>
    <?php endif ?>
    <!-- pesan end -->



    <?=form_label('Kategori Artikel Berita'); ?>
<select name="idkategori" class="form-control span3 tip"
required
data-toggle="tooltip" 
data-placement="right" 
title="Pilih Salah satu Kategori Artikel Berita untuk menentukan Kategori Berita">

  <option value="">--Pilih Kategori Berita--</option>
  <?php 

            if (!empty($tampil_category)) {
              ?>



                <?php 

                    foreach ($tampil_category->result() as $key) {
                      ?>


                  <option value="<?=$key->idkategori  ?>"><?=$key->namakategori ?></option>}
              
                      

                      <?php
                    }
                 ?>




<?php
    } 

    else
    {
        echo 'Maaf Data Kategori Kosong';
    }
           echo form_error('idkategori', '<p class="text-danger">', '</p>');

  ?>


</select>




         <?php 
         $judul    = array(
              'name'          => 'judul' ,
              'class'         =>  'form-control span3 tip',
              'type'          =>  'text',
              'data-toggle'   =>  'tooltip',
              'data-placement'  =>  'right',
              'title'         =>  'Silahkan Menentukan Judul Artikel Berita',
             'placeholder'    => 'Masukan Judul Berita',
              'required'      =>  'Masukan'
             );
         	
          echo form_label('Judul Berita');
          echo form_input($judul);
          echo form_hidden('waktu_upload', namahari($nohari).',&nbsp;'.$tgl.'&nbsp;'.namabulan($bln).'&nbsp;'.$thn);


           echo form_error('judulberita', '<p class="text-error">', '</p>');

          ?>

<?php 
         $gambar    = array(
              'name'          => 'imagefile',
              'class'         =>  'form-control span3 tip',
               'type'       =>  'file',
              'data-toggle'   =>  'tooltip',
              'data-placement'  =>  'right',
              'title'         =>  'Silahkan Memilih Sala-satu Gambar Untuk Postingan Artikel Berita',
              'required'      =>  'Masukan'
             );
            echo form_label('Masukan Gambar');
            echo form_input($gambar);
            echo form_hidden('waktu',namahari($nohari).' '.$tgl.' '.namabulan($bln).' '.$thn);
            echo form_hidden('idberita');
            echo form_error('imagefile', '<p class="text-error">', '</p>');
echo br().br();
          ?>
         
 <?=form_label('<strong class="text-error">Status Artikel Berita</strong>'); ?>
<select name="status" class="form-control span3 tip"
required
data-toggle="tooltip" 
data-placement="right" 
title="Pilih Salah satu Untuk Menentukan Status Artikel Berita">

  <option value="">--Pilih Status Artikel--</option>
  <option value="publish">Publish</option>
  <option value="pending">Pending</option>



</select>

              <?php 
         
echo br();

         $submit   = array(
              'name'    => 'login' ,
              'class'   =>  'btn btn-md btn-primary',
              'value'   =>  'Simpan',
              'type'    =>  'submit'         
               );
            echo form_submit($submit);
         

          ?>
        




      </div>
      <div class="span6">
        
 
     




                <!--batas inputan judul-->
           <?php 



      
          echo  form_label('<strong>Isi Artikel Berita</strong>');
          echo form_textarea('isi');

            echo form_error('isiberita', '<p class="text-error">', '</p>');

          ?>
     </div>
     

         <?=form_close(); ?>
        
     
  