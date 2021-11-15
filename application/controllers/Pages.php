<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

	public function index($page = "home")
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['page'] = $page;
		$data['menu'] = $this->db->query("select * from menu");
		$this->load->view('app', $data);

		// $this->load->view('component/header', $data);
		// $this->load->view('pages/' . $page, $data);
		// $this->load->view('component/footer', $data);
	}

	public function store()
	{
		$time = time();
		$config['upload_path']          = "/image/menu/";
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']        	= $_POST['id_menu'].$time;
		$config['max_size']             = 2048000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$hasil = $this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			echo $this->upload->display_errors();
		} else {
			$this->db->query("insert into menu values('".$_POST['id_menu']."','".$_POST['jenis']."','".$_POST['nama']."','".$_POST['harga']."','".$config['file_name'] ."','".$_POST['stock']."')");
		}
	}
}
