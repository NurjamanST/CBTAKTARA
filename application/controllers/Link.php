<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('auth');
		}else if ( !$this->ion_auth->is_admin() && !$this->ion_auth->in_group('dosen') ){
			show_error('Hanya Administrator dan dosen yang diberi hak untuk mengakses halaman ini, <a href="'.base_url('dashboard').'">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
		}
        $this->load->library('form_validation');
		$this->load->helper('my');// Load Library Ignited-Datatables
		$this->load->model('Master_model', 'master');
		$this->load->model('Soal_model', 'soal');
		$this->form_validation->set_error_delimiters('','');
	}

// 	public function output_json($data, $encode = true)
// 	{
//         if($encode) $data = json_encode($data);
//         $this->output->set_content_type('application/json')->set_output($data);
//     }

    public function index()
	{
        $user = $this->ion_auth->user()->row();
		$data = [
			'user' => $user,
			'judul'	=> 'Link',
			'subjudul'=> 'Link Zoom & Penugasan'
        ];
        
        if($this->ion_auth->is_admin()){
            //Jika admin maka tampilkan semua matkul
            $data['matkul'] = $this->db->get('tb_link')->result();
        }else{
            //Jika bukan maka matkul dipilih otomatis sesuai matkul dosen
            $data['matkul'] = $this->db->get('tb_link')->result();
        }

		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('link/data');
		$this->load->view('_templates/dashboard/_footer.php');
    }
    
    public function edit($id)
	{
		$user = $this->ion_auth->user()->row();
		$data = [
			'user'      => $user,
			'judul'	    => 'Link',
            'subjudul'  => 'Edit Link Zoom & Penugasan',
            'link'      => $this->db->get_where('tb_link', ['id' => $id])->row(),
        ];

		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('link/edit');
		$this->load->view('_templates/dashboard/_footer.php');
	}
	
	public function save()
	{
		$method 	= $this->input->post('method', true);
		$id = $this->input->post('id', true);
		$zoom = $this->input->post('zoom', true);
		$penugasan = $this->input->post('penugasan', true);
		if($method === 'edit') {
		    $data = [
		        'zoom' => $zoom,
		        'penugasan' => $penugasan,
		    ];
		    $this->db->where('id', $id);
		    $this->db->update('tb_link', $data);
		    
		    redirect('link');
		}
	}
}


















