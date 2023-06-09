<?php 
class hasilpadi_user extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_padi');
		$this->load->helper('url');
        $this->load->library('form_validation');

	}
	function index(){
		$data['padi'] = $this->m_padi->tampil_data()->result();
		$this->load->view('user/view-padi',$data);
	}
	function tambah(){
		$this->load->view('padi-input');
	}
	function tambah_aksi(){
        $id = $this->input->post('id');
        $foto = $this->input->post('foto');
		$tanggal = $this->input->post('tanggal');
		$deskripsi = $this->input->post('deskripsi');
		$alamat = $this->input->post('alamat');
		$harga = $this->input->post('harga');
		$data = array(
			'foto' => $foto,
			'tanggal' => $tanggal,
			'deskripsi' => $deskripsi,
			'alamat' => $alamat,
			'harga' => $harga,
		);
		$where = array(
			'id' => $id
		);
		$this->m_padi->input_data($data,'padi');
		redirect('hasilpadi');
	}
    function hapus($id){
		$where = array('id' => $id);
		$this->m_padi->hapus_data($where,'padi');
		redirect('hasilpadi');
	}
    function edit($id){
        $where = array('id' => $id);
        $data['padi'] = $this->m_padi->edit_data($where,'padi')->result();
        $this->load->view('padi-edit',$data);
    }
    function update(){
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $deskripsi = $this->input->post('deskripsi');
        $alamat = $this->input->post('alamat');
		$harga = $this->input->post('harga');
        $data = array(
			'tanggal' => $tanggal,
            'deskripsi' => $deskripsi,
            'alamat' => $alamat,
			'harga' => $harga,
        );
        $where = array(
            'id' => $id
        );
        $this->m_padi->update_data($where,$data,'padi');
        redirect('hasilpadi');
    }
    function batal(){
        redirect('hasilpadi');
	}
}