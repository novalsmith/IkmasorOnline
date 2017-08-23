<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kartu_anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('m_kartu');
        $this->load->model('m_category');

    }

    public function index()

    {
        $id = $this->uri->segment(3);
         $posisi = array(
            "Dashboard"     => base_url()."home",
     
            "Data Penting"  => base_url()."kartu_anggota",
            "Kartu Anggota"  => base_url()."kartu_anggota",
             "Kartu Anggota"  => ""

        );

        $data   ['posisi']  =   $posisi;
        $data   ['content'] =   'admin/v_kartu_anggota';
        $data   ['title']   =   'Kartu Anggota Ikmasor';
        $data   ['brand'] =     'IKMASOR SBY';
        $data   ['tampil'] =    $this->m_kartu->tampil();
           $data["nohari"]         =date('w');
  $data ['tglhariini']    =   date('d-m-Y');
                                list($data["tgl"],
                                    $data["bln"],
                                    $data["thn"])=explode("-",$data["tglhariini"]);


        $this->load->view('template_web',$data);
    }

    public function detail_penduduk($id)

    {
        $id = $this->uri->segment(3);
         $posisi = array(
            "Dashboard"     => base_url()."home",
     
            "Penduduk"  => base_url()."penduduk",
            "Master Data Penduduk"  => base_url()."penduduk",
             "Detail Data Penduduk"  => base_url()."penduduk/detail_penduduk",
             "Detail Data Penduduk" => ""

        );

        $data   ['posisi']  =   $posisi;
        $data   ['content'] =   'admin/penduduk_detai';
        $data   ['title']   =   'Welcome To Blessed-ny';
        $data   ['brand'] =     'IKMASOR SBY';
        $data   ['detail'] =    $this->m_penduduk->detail2($id)->row();
        $data   ['tampil'] =    $this->m_penduduk->tampil();



        $this->load->view('template_web',$data);
    }

    public function tambah_kartu()

    {
         $posisi = array(
            "Dashboard"     => base_url()."home",
     
            "Data Penting"  => base_url()."kartu_anggota",
            "Kartu Anggota"  => base_url()."kartu_anggota",
             "Tambah Kartu Anggota"  => base_url()."artu_anggota/tambah_kartu",
             "Tambah Kartu Anggota" => ""


        );

        $data   ['posisi']  =   $posisi;
        $data   ['content'] =   'admin/tambah_kartu';
        $data   ['title']   =   'Welcome To Blessed-ny';
        $data   ['brand'] =     'IKMASOR SBY';
        $data   ['tampil_category'] =    $this->m_category->tampil();
        $data["nohari"]         =date('w');
        $data ['tglhariini']    =   date('d-m-Y');
                                list($data["tgl"],
                                    $data["bln"],
                                    $data["thn"])=explode("-",$data["tglhariini"]);



        $this->load->view('template_web',$data);
    }


   

public function proses_tambah()
  {
            
  

          if(($_FILES['imagefile']['type']=="image/jpeg") || ($_FILES['imagefile']['type']=="image/png") ||($_FILES['imagefile']['type']=="image/gif"))

        {
          $ori_src="asset/upload/kartu_anggota/gambarbesar/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
          if(move_uploaded_file ($_FILES['imagefile']['tmp_name'],$ori_src))
          {
           
       
        
          

         // file yang di post dari form

          $masa_berlaku =  $this->input->post('masa_berlaku');
          $data = array(
                  'id_kartu'    =>    '',
                  'masa_berlaku'     =>    $masa_berlaku,
              
                  'walpaper'  =>     strtolower($_FILES['imagefile']['name']),
                  'status'   =>    $this->input->post('status')
                   
                );  

            // file yang di post dari form


        $periksa = $this->m_kartu->cek_masaberlaku($masa_berlaku);

        if ($periksa->num_rows()>0) {
          
            $this->session->set_flashdata('message', 
                 "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong> Oopss,.".$masa_berlaku."</strong>&nbsp; Sudah Ada, silahkan coba dengan Tahun Angkatan yang lain..
    </div>"

                        );
             redirect('Kartu_anggota/tambah_kartu');

        } else {
         

          
          $this->m_kartu->get_insert($data);
          $this->session->set_flashdata('message', 

            "<div class='alert alert-success alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong> <i class='icon icon-ok'></i>  ".$this->input->post('masa_berlaku')."</strong> Berhasil di Simpan.
    </div>"

            );
          redirect('Kartu_anggota'); 

}
        }else

        {
      $this->session->set_flashdata('message', 
                 "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong>Oopss..!!</strong>&nbsp; File yang di terima Hanya Gambar dengan type JPG/JPEG/PNG/GIF. Coba Lagi.
    </div>"

                        );
        }
  
}
    
}


  public function edit_kartu()

    {
      $id = $this->uri->segment(3);
         $posisi = array(
            "Dashboard"     => base_url()."home",
     
           "Data Penting"  => base_url()."kartu_anggota",
            "Kartu Anggota"  => base_url()."kartu_anggota",
             "Edit Kartu Anggota"  => base_url()."kartu_anggota/edit_kartu",
             "Edit Kartu Anggota" => ""

        );

        $data   ['posisi']       =   $posisi;
        $data   ['content']      =   'admin/edit_kartu';
        $data   ['title']        =   'Selamat Datang di web admin Desa Sajen';

        $data   ['brand'] =     'IKMASOR SBY';

        $data   ['edit']         = $this->db->get_where('kartu_anggota', array('id_kartu' => $id))->row();
        $data   ['tampil']        = $this->m_kartu->tampil();
        $data["nohari"]         =date('w');
        $data ['tglhariini']    =   date('d-m-Y');
                                list($data["tgl"],
                                    $data["bln"],
                                    $data["thn"])=explode("-",$data["tglhariini"]);


        $this->load->view('template_web',$data);
    }


public function proses_edit()
  {

    $id_kartu = $this->input->post('id_kartu');
    $masa_berlaku = $this->input->post('masa_berlaku');


    if(empty($_FILES['imagefile']['name']))
        {
          

          $data = array(
              
                  'masa_berlaku'     =>    $masa_berlaku,
              
                  'status'   =>    $this->input->post('status')
                   
                );  


        // file yang di post dari form
        $this->db->where('id_kartu',$id_kartu);
      $this->db->update('kartu_anggota', $data);
      if ($this->db->affected_rows()) 
      {
        
      $this->session->set_flashdata('message', 

              "<div class='alert alert-success alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong><i class='icon icon-ok'></i> ".$this->input->post('masa_berlaku')."</strong> Berhasil dan Gambar tidak di Ubah.
    </div>"

        );
      redirect('kartu_anggota'); 
      }
      redirect('kartu_anggota'); 


  }
        else
        {
           
          
          if(($_FILES['imagefile']['type']=="image/jpeg") || ($_FILES['imagefile']['type']=="image/png") ||($_FILES['imagefile']['type']=="image/gif"))


        {
          $ori_src="asset/upload/kartu_anggota/gambarbesar/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
          if(move_uploaded_file ($_FILES['imagefile']['tmp_name'],$ori_src))
          {
           
          

          // file yang di post dari form
                $masa_berlaku = $this->input->post('masa_berlaku');
                $walpaper_db = $this->input->post('walpaper_db');

           $data = array(
               
                  'masa_berlaku'     =>    $masa_berlaku,
              
                  'walpaper'  =>     strtolower($_FILES['imagefile']['name']),
                  'status'   =>    $this->input->post('status')
                   
                );  
          // file yang di post dari form
        $this->db->where('id_kartu',$id_kartu);
      $this->db->update('kartu_anggota', $data);
      if ($this->db->affected_rows()) 
      {
  
                  unlink('asset/upload/kartu_anggota/gambarbesar/'.$walpaper_db);
            unlink('asset/upload/kartu_anggota/gambarbesar/'.$walpaper_db);
      $this->session->set_flashdata('message',

              "<div class='alert alert-success alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong><i class='icon icon-ok'></i>  ".$this->input->post('masa_berlaku')."</strong> Berhasil di Simpan.
    </div>"
       );
      redirect('kartu_anggota'); 
      }

        }else

        {
      $this->session->set_flashdata('message', 
                "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong>File Yang di terima Hanyalah Gambar</strong> 
    </div>"
        );
        }
      }
    }
    }
  
                 
        


public function hapus( $id)
{
 

          $data = $this->db->get_where('kartu_anggota', array('id_kartu' => $id))->row();


      $this->m_kartu->hapus($id);
            if ($this->db->affected_rows())
         {
    



                 unlink('asset/upload/kartu_anggota/gambarbesar/'.$data->walpaper);

               $this->session->set_flashdata('message', 
                 "<div class='alert alert-info alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong><i class='icon icon-ok'></i> Data</strong>&nbsp; Berhasil di Hapus..
    </div>"

                        );
              redirect('kartu_anggota/index');
         }
         else
         {

           $this->session->set_flashdata('message', 
                 "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong>Maaf Data</strong>&nbsp; Gagal di Hapus..
    </div>"

                        );
                         redirect('kartu_anggota/index');


         }
    }
  



        public function is_logged_in()
        {
        $is_logged_in = $this->session->userdata('username');
        if(!isset($is_logged_in) || $is_logged_in != true){
            

            $this->session->set_flashdata('pesan_login', 

                        "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong>Oopss..</strong>&nbsp; Anda harus Login Terlebih dahulu..
    </div>"

                        );


            redirect('login/index');        
        }       
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */