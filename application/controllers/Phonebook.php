<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonebook extends Z_Controller 
{

	private $rules = array(		
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required',
			'errors'=> ['required'=>'%s harus diisi']
		),
		array(
			'field' => 'phone',
			'label' => 'Phone',
			'rules' => 'trim|required',
			'errors'=> ['required'=>'%s harus diisi']
		),
		
	);

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('model_phonebook');
	}

	public function index()
	{
		$data = $this->model_phonebook->get();
		$this->load_view('phonebook/index', ['phonebook'=>$data]);
	}
	
	public function simpan()
	{
		$status = false;
		$pesan 	= 'Gagal simpan data';
		$config = $this->rules;

		$this->form_validation->set_rules($config);	

		if ($this->form_validation->run() == FALSE) {
			$status = false;
			$pesan  = validation_errors();
		} else {
			$post   = $this->input->post();
			
			if(isset($post['id']) && $post['id']!=null){				
				$data = array(
					'name' 	=> $post['name'],
					'phone'	=> $post['phone'],		
				);
				$hasil = $this->model_phonebook->update($data, $post['id']);				
			} else {
				$data = array(
					'name'    => $post['name'],
					'phone'	=> $post['phone'],
				);
				$hasil = $this->model_phonebook->simpan($data);
			} 
						
			if ($hasil) {
				$status = true;
                $pesan  = 'Berhasil simpan data';
			} 
		}
		$this->json_response(['status'=>$status, 'pesan'=>$pesan]);
	}

	public function listview()
	{
		$data = $this->model_phonebook->get();
		$this->load->view('phonebook/view', ['phonebook'=>$data]);
	}

	public function get_by_id()
	{
		$id 	= $this->input->get('id');
		$data	= $this->model_phonebook->get_by_id($id);
		$this->json_response($data);
	}

	public function hapus()
	{
		$status = false;
        $pesan  = 'Gagal hapus data';
        $id     = $this->input->post('id');
        $hasil  = $this->model_phonebook->hapus($id);
        if($hasil) {            
            $status = true;
            $pesan  = 'Berhasil hapus data';
        } 
        $this->json_response(['status'=>$status, 'pesan'=>$pesan]);
	}
	
}



/* End of file : Phonebook.php */
/* File location : ./controllers/Phonebook.php */