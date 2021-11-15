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
		$this->load->helper('file');
		$time = time();
		$file   = read_file($_FILES['foto']['tmp_name']);
		$name   = $time.basename($_FILES['foto']['name']);

		if (!write_file('./image/menu/'.$name, $file)) {
			echo $this->upload->display_errors();
		} else {
			$this->db->query("insert into menu values('" . $_POST['id_menu'] . "','" . $_POST['jenis'] . "','" . $_POST['nama'] . "','" . $_POST['harga'] . "','" . $name . "','" . $_POST['stok'] . "')");
			redirect("/pages");
		}
	}
}
