<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arsip_surat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_arsip');

    }

    public function index()

    {
            $posisi = array(
            "Dashboard"     => base_url()."home",
            "Data Penting" => base_url()."arsip_surat",
            "Arsip Surat " => base_url()."arsip_surat",
            "Arsip Surat "  => ""
        );


        $data   ['posisi']  =   $posisi;
        $data   ['content'] =   'admin/v_arsip_surat';
        $data   ['title']   =   'Welcome To Blessed-ny';
        $data   ['brand']   =     'IKMASOR SBY';
        $data   ['tampil']     = $this->m_arsip->tampil();
        $data["nohari"]         =date('w');
  $data ['tglhariini']    =   date('d-m-Y');
                                list($data["tgl"],
                                    $data["bln"],
                                    $data["thn"])=explode("-",$data["tglhariini"]);



        $this->load->view('template_web',$data);
    }

 public function tambah_surat()

    {


        $posisi = array(
            "Dashboard"     => base_url()."home",
                "Data Penting" => base_url()."arsip_surat",
            "Arsip Surat " => base_url()."arsip_surat",
            "Arsip Surat "  => base_url()."arsip_surat",
            "Tambah Surat"  => ""
        );

        $data   ['posisi']  =   $posisi;
        $data   ['content'] =   'admin/tambah_surat';
        $data   ['title']   =   'Welcome To Blessed-ny';
        $data   ['brand'] =     'Desa Sajen';
       // $data   ['tampil']     = $this->m_category->tampil();
 $data["nohari"]         =date('w');
  $data ['tglhariini']    =   date('d-m-Y');
                                list($data["tgl"],
                                    $data["bln"],
                                    $data["thn"])=explode("-",$data["tglhariini"]);

        $this->load->view('template_web',$data);
    }


    public function proses_tambah_surat()
    {
   

      $this->form_validation->set_rules('judul_surat', 'Judul Surat', 'trim|required|min_length[5]|max_length[100]|xss_clean');
      $this->form_validation->set_rules('url_file_surat', 'Url File', 'trim|required|min_length[5]|xss_clean');
      $this->form_validation->set_rules('status_surat', 'Status Surat', 'trim|required|xss_clean');

      if ($this->form_validation->run()==FALSE) {
        
        $this->tambah_surat();

      } else {
       
     
      


        $judul_surat = $this->input->post('judul_surat');
        $url_file_surat = $this->input->post('url_file_surat');
        $status_surat = $this->input->post('status_surat');
        $keterangan = $this->input->post('keterangan');

   

        $data = array(  'id_arsip'      => '',
                        'judul_surat'    => $judul_surat,
                        'url_file_surat'    => $url_file_surat,
                        'status_surat'    => $status_surat,
                        'keterangan'    => $keterangan);


        $judul = $this->m_arsip->cek_judul_surat($judul_surat);
        $url = $this->m_arsip->cek_url_surat($url_file_surat);
       

        if ($judul->num_rows()>0) {
          
            $this->session->set_flashdata('message', 
                 "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong> Oopss,.".$judul_surat."</strong>&nbsp; Sudah Ada, silahkan coba denganJudul Surat yang lain..
    </div>"

                        );
             redirect('arsip_surat/tambah_surat');

        } else if($url->num_rows()>0) {
         
  $this->session->set_flashdata('message', 
                 "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong> Oopss,.".$url."</strong>&nbsp; Sudah Ada, silahkan coba dengan Url File Surat yang lain..
    </div>"

                        );
             redirect('arsip_surat/tambah_surat');
        }

        else
        {
        







         $cek =  $this->m_arsip->get_insert($data);
        if ($cek) {
               $this->session->set_flashdata('message', 
                 "<div class='alert alert-success alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong><i class='icon icon-ok'></i>  ".$judul_surat."</strong>&nbsp; Berhasil di Simpan..
    </div>"

                        );
             redirect('arsip_surat/index');
        } else {
                         $this->session->set_flashdata('message', 
                 "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong><i class='icon icon-remove'></i>  ".$judul_surat."</strong>&nbsp; Gagal di simpan, Periksa Data Anda Kembali..
    </div>"

                        );
             redirect('arsip_surat/index');
        }
        
       }
    
    }
 }

     public function edit_surat()

    {
      $posisi = array(
            "Dashboard"     => base_url()."home",
                "Data Penting" => base_url()."arsip_surat",
            "Arsip Surat " => base_url()."arsip_surat",
            "Arsip Surat "  => base_url()."arsip_surat",
            "Edit Surat"  => ""
        );

        $data   ['posisi']  =   $posisi;

        $id = $this->uri->segment(3);
        $data   ['content'] =   'admin/edit_surat';
        $data   ['title']   =   'Welcome To Blessed-ny';
        $data   ['brand'] =     'Desa Sajen';
        $data   ['edit']     = $this->db->get_where('arsip_surat', array('id_arsip'=>$id))->row();
 $data["nohari"]         =date('w');
  $data ['tglhariini']    =   date('d-m-Y');
                                list($data["tgl"],
                                    $data["bln"],
                                    $data["thn"])=explode("-",$data["tglhariini"]);

        $this->load->view('template_web',$data);
    }

     public function proses_edit_surat()

    {

      $id = $this->input->post('id_arsip');
        $judul_surat = $this->input->post('judul_surat');
        $url_file_surat = $this->input->post('url_file_surat');
        $status_surat = $this->input->post('status_surat');
        $keterangan = $this->input->post('keterangan');

   

        $data = array(  'id_arsip'      => '',
                        'judul_surat'    => $judul_surat,
                        'url_file_surat'    => $url_file_surat,
                        'status_surat'    => $status_surat,
                        'keterangan'    => $keterangan);


         

            $this->db->where('id_arsip',$id);
            $this->db->update('arsip_surat', $data);


            if ($this->db->affected_rows()) 
            {

                    $this->session->set_flashdata('message', 
                    "<div class='alert alert-success alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong><i class='icon icon-ok'></i>  ".$judul_surat."</strong>&nbsp; Berhasil di Edit..
    </div>"

                        );

                            redirect('arsip_surat/index');
            }
            else
            {

                    $this->session->set_flashdata('message', 
                 "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong><i class='icon icon-remove'></i>  ".$judul_surat."</strong>&nbsp; Gagal di Edit,* Anda Harus Mengubah salah-satu Data, Jika Data tidak di Ubah Silahkan Mengklik Tombol Kembali Pada Kanan Atas, Untuk Kembali Pada Halaman Utama Arsip Surat ..
    </div>"

                        );
                                   
                                    redirect('arsip_surat/edit_surat/'.$_POST['id_arsip']);

            }
        
    }




    public function hapus($id)
    {
        $data = $this->db->get_where('arsip_surat', array('id_arsip' => $id))->row();


      $this->m_arsip->hapus($id);
            if ($this->db->affected_rows())
         {
    



            
               $this->session->set_flashdata('message', 
                 "<div class='alert alert-info alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong><i class='icon icon-ok'></i>".$data->judul_surat." </strong>&nbsp; Berhasil di Hapus..
    </div>"

                        );
              redirect('arsip_surat/index');
         }
         else
         {

           $this->session->set_flashdata('message', 
                 "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      <strong> Maaf Data ".$data->judul_surat."</strong>&nbsp; Gagal di Hapus..
    </div>"

                        );
                         redirect('arsip_surat/index');


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