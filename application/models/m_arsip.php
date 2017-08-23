<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_arsip extends CI_Model {

  public function tampil()
   {
      return $this->db->get('arsip_surat');
   }

   public function kartu_aktif()
   {
     $this->db->where('status', 'aktif');
     $this->db->limit(1);
    return $this->db->get('arsip_surat');
   }

   public function get_insert($data)
   {
     return  $this->db->insert('arsip_surat', $data);
     if($this->db->affected_rows() > 0){
      return true;
    } else{
      return false;
    }
   }


      public function update($db,$data,$where)
   {
     return  $this->db->update($db, $data,$where);
     if($this->db->affected_rows() > 0){
      return true;
    } else{
      return false;
    }
   }



     public function hapus($id)
   {
      
          $data = array('id_arsip' => $id);
    return  $this->db->delete('arsip_surat',$data);
   }

// cek data


public function cek_judul_surat($cek_judul_surat)
{
       return $this->db->get_where('arsip_surat', array('judul_surat' => $cek_judul_surat));
  }

  public function cek_url_surat($cek_url_surat)
{
       return $this->db->get_where('arsip_surat', array('url_file_surat' => $cek_url_surat));
  }


  
}
/* End of file login_model.php */
/* Location: ./application/models/login_model.php */