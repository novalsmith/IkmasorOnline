<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->is_logged_in();
                $this->load->helper("html");
        $this->load->helper("date");
    }

    public function index()

    {
             $posisi = array(
            "Dashboard"     => base_url()."home",
     
            "Dashboard"  => ""
        );

        $data   ['posisi']  =   $posisi;

        $data   ['content'] =   'admin/home';
        $data   ['title']   =   'SelamatDatang di web admin Desa Sajen';
        $data   ['brand'] =     'IKMASOR SBY';
        $data   ['content'] =   'admin/home';
        $data   ['content'] =   'admin/home';
        $data["nohari"]         =date('w');
        $data ['tglhariini']    =   date('d-m-Y');
                                list($data["tgl"],
                                    $data["bln"],
                                    $data["thn"])=explode("-",$data["tglhariini"]);

        $this->load->view('template_web',$data);
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