<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_phonebook extends CI_Model
{

	function get()
    {
		$query = $this->db->get('phonebook');		
		$result= $query->result();

        return $result;
	}

    function get_by_id($id)
    {
		$query = $this->db->get_where('phonebook',['id' => $id]);
		$result= $query->row();

        return $result;
	}

	function simpan($data)
    {
        $this->db->trans_start();
        $this->db->set($data);
        $this->db->insert('phonebook');
        $this->db->trans_complete();
        $result = $this->db->trans_status();
        
        return $result;
    }

    function update($data, $id)
    {
        $this->db->trans_start();
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('phonebook');
        $this->db->trans_complete();
        $result = $this->db->trans_status();

        return $result;
    }

    function hapus($id)
    {
        $this->db->trans_start();
        $this->db->delete('phonebook', array('id' => $id));
        $this->db->trans_complete();
        $result = $this->db->trans_status();

        return $result;
    }

}

/* End of file : Model_phonebook.php */
/* File location : ./models/Model_phonebook.php */