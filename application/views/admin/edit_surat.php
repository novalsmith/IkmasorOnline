<h3 style="border-bottom:dashed 1px #AAB2BD">Edit Surat
<small>
<a href="<?=base_url().'arsip_surat'  ?>" title="" class="btn btn-primary btn-small btn pull-right">
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

            echo   form_open('arsip_surat/proses_edit_surat', $data);
            ?>

   


    <!-- pesan start -->
    <?php if (! empty($pesan)) : ?>
        <p class="text-danger">
            <?php echo $pesan; ?>
        </p>
    <?php endif ?>
    <!-- pesan end -->




         <?php 
         $judul_surat    = array(
              'name'          => 'judul_surat' ,
              'class'         =>  'form-control span4 tip',
              'type'          =>  'text',
              'data-toggle'   =>  'tooltip',
              'data-placement'  =>  'right',
              'title'         =>  'Silahkan Masukan Judul Surat',
             'placeholder'    => 'Judul Surat',
             'value'          =>  $edit->judul_surat,
              'required'      =>  'Masukan'
             );
         	
          echo form_label('Masukan Judul Surat');
          echo form_input($judul_surat);

               echo form_error('judul_surat', '<p class="text-error">', '</p>');

          ?>

        <?php 
         $url_file_surat    = array(
              'name'          => 'url_file_surat' ,
              'class'         =>  'form-control span4 tip',
              'type'          =>  'text',
              'data-toggle'   =>  'tooltip',
              'data-placement'  =>  'right',
              'title'         =>  'File Url ini di ambil pada penyimpanan Online Misalkan Dropbox / Google Drive',
             'placeholder'    => 'Url File Surat',
              'value'          =>  $edit->url_file_surat,

              'required'      =>  'Masukan'
             );
          
          echo form_label('Masukan Url File Surat');
          echo form_input($url_file_surat);
          echo form_hidden('id_arsip',$edit->id_arsip);

               echo form_error('url_file_surat', '<p class="text-error">', '</p>');

          ?>

         
 <?=form_label('<p class="text-error">Status Surat</p>'); ?>
<select name="status_surat" class="form-control span4  tip"
required
data-toggle="tooltip" 
data-placement="right" 
title="Pilih Salah satu Untuk Menentukan Status Surat, * Surat yang di masukan adalah surat MASUK atau surat KELUAR">

  <option value="">--Pilih Status Surat--</option>
 <?php 

if ($edit->status_surat == 'surat_masuk') {
?>
 <option value="surat_masuk" selected="selected">Surat Masuk</option>
  <option value="surat_keluar">Surat Keluar</option>
<?php
}else
{
?>
  <option value="surat_keluar" selected="selected">Surat Keluar</option>

 <option value="surat_masuk">Surat Masuk</option>
<?php
}
  ?>




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
        
 <?=form_label('Keterangan Surat'); ?>
     <?=form_textarea('keterangan',$edit->keterangan); ?>

     </div>
     

         <?=form_close(); ?>
        
     
  