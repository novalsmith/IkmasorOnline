<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	
	function get_insert($data){
       $this->db->insert('berita', $data);
       return TRUE;
    }
function tampil(){
	
	$this->db->join('kategori', 'kategori.idkategori = berita.idkategori');
	$this->db->order_by('judulberita', 'asc');
   return $this->db->get('berita');
 	
    }
    function tampil_status(){
	
$this->db->select('status')->distinct('status');
$this->db->where('status !=','');
$this->db->from('berita');
   return $this->db->get();
 	
    }

    function detail_tampil($id){
	
	$this->db->where('idberita');
	return $this->db->get('berita');
      
    }

    function getjrecord(){
		$jrec=$this->db->count_all('berita');
		return $jrec;
	}
	function gettemanpage($p=0,$jppage=5){
	$sqlstr="select * from berita natural join kategori order by idberita desc";
		$sqlstr.=" limit $p, $jppage ";

		$hslquery=$this->db->query($sqlstr);
				return $hslquery;
	}
function gettemanpage2(){
	$sqlstr="select * from berita natural join kategori order by idberita desc";
	
		$hslquery=$this->db->query($sqlstr);
				return $hslquery;
	}

public function edit($id)
	{
		$this->db->from('berita');
        $this->db->where('idberita', $id);
 
        $query = $this->db->get();
 
        if ($query->num_rows() == 1) {
            return $query->result();
        }
	}
		public function delete($id)
		{
					$data = array('idberita' => $id);
		return	$this->db->delete('berita',$data);
		}




	public function per_id($id)
		{
		$this->db->where('idberita',$id);
		$this->db->from('berita');
		$this->db->join('kategori','kategori.idkategori = berita.idkategori');
		
		return $this->db->get();

			
		}


 		public	function tutorial_perkategori($id){
	//return $this->db->query("select * from artikel where kategori = '$id'")->num_rows();
	$this->db->where('idkategori', $id);
	return $this->db->get('berita')->num_rows();
		}

		public function tampil_komentar($id){
     return  $this->db->get_where('komentar_berita',array('idberita' => $id));
    }
    	public function tampil_komentar_berita(){

    		$this->db->limit(5);
    		$this->db->order_by('idkomentar_berita', 'desc');
    			$this->db->join('berita','berita.idberita = komentar_berita.idberita');
     return  $this->db->get('komentar_berita');
    }

      public function tampil_komentar_detil_berita($id)

      {
    		$this->db->where('idkomentar_berita', $id);
 
 			$this->db->join('berita','berita.idberita = komentar_berita.idberita');
     		return  $this->db->get('komentar_berita');

    }



				public function tambah_data($data)
	{

	  	$this->db->insert('komentar_berita', $data);
	  	if($this->db->affected_rows() > 0){
			return true;
		} else{
			return false;
		}
	}

	function cari($search)
{
$q = $this->db->query("select * from berita natural join kategori where judulberita  like '%$search%' LIMIT 5");
	return $q;

}

 public function hapus_komentar($id)
    {
    	    	$sqlstr="delete from komentar_berita where idkomentar_berita =".$id;
		$hslquery=$this->db->query($sqlstr);
				return $hslquery;

    	    }
 public function getURLS(){
 
  $this->db->order_by("idberita","DESC");
  return $this->db->get("berita");
  }


    public function cek_berita($berita_baru)
   {
          return $this->db->get_where('berita', array('judulberita' => $berita_baru));
   }

        public function hapus($id)
   {
      
          $data = array('idberita' => $id);
    return  $this->db->delete('berita',$data);
   }

}

/* End of file berita.php */
/* Location: ./application/models/berita.php */