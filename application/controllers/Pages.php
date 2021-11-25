<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
	public $CI = NULL;
	public function index($page = "home")
	{
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['page'] = $page;
		$data['menu'] = $this->db->query("select * from menu");
		if (isset($_GET['edit'])) {
			$data['data'] = $this->db->query("select * from menu where id_menu = '" . $_GET['id'] . "'");
		}
		
		if(isset($_GET['filter'])) {
			$data['menu'] = $this->db->query("select * from menu where jenis ='".$_GET['filter']."'");
		}
		$this->load->view('app', $data);
	}

	public function store()
	{
		$this->load->helper('file');
		$time = time();
		$file   = read_file($_FILES['foto']['tmp_name']);
		$name   = $time . basename($_FILES['foto']['name']);

		if (!write_file('./image/menu/' . $name, $file)) {
			echo $this->upload->display_errors();
		} else {
			$this->db->query("insert into menu values('" . $_POST['id_menu'] . "','" . $_POST['jenis'] . "','" . $_POST['nama'] . "','" . $_POST['harga'] . "','" . $name . "','" . $_POST['stok'] . "')");
			redirect("/pages");
		}
	}

	public function delete()
	{
		$this->db->query("delete from menu where id_menu = '" . $_GET['id'] . "'");
		redirect('/pages');
	}

	public function update()
	{
		if ($_FILES['foto']['size'] == 0) {
			$this->db->query("update menu set jenis = '" . $_POST['jenis'] . "', nama = '" . $_POST['nama'] . "', harga = '" . $_POST['harga'] . "', stok = '" . $_POST['stok'] . "' where id_menu = '" . $_POST['id_menu'] . "'");
			redirect("/pages");
		} else {
			$this->load->helper('file');
			$time = time();
			$file   = read_file($_FILES['foto']['tmp_name']);
			$name   = $time . basename($_FILES['foto']['name']);

			if (!write_file('./image/menu/' . $name, $file)) {
				echo $this->upload->display_errors();
			} else {
				$this->db->query("update menu set foto = '" . $name . "', jenis = '" . $_POST['jenis'] . "', nama = '" . $_POST['nama'] . "', harga = '" . $_POST['harga'] . "', stok = '" . $_POST['stok'] . "' where id_menu = '" . $_POST['id_menu'] . "'");
				redirect("/pages");
			}
		}
	}
	public function transaksi($page = "transaksi")
	{
		$this->load->library('session');
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}

		if (!$this->session->has_userdata('login')) {
			echo "<script>window.location.href = '.?login'</script>";
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['page'] = $page;
		$data['menu'] = $this->db->query("select * from menu");
		$data['cart'] = $this->db->query("select * from cart join menu on cart.id_menu = menu.id_menu where status = 0 and date = '" . $this->session->userdata('date') . "' ");
		if (isset($_GET['edit'])) {
			$data['data'] = $this->db->query("select * from menu where id_menu = '" . $_GET['id'] . "'");
		}

		if(isset($_GET['filter'])) {
			$data['menu'] = $this->db->query("select * from menu where jenis ='".$_GET['filter']."'");
		}

		$this->load->view('app', $data);
	}
	public function report($page = "report")
	{
		$this->load->library('session');
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}

		if (!$this->session->has_userdata('login')) {
			echo "<script>window.location.href = '.?login'</script>";
		}

		$data['report'] = $this->db->query('select * from cart join menu on cart.id_menu = menu.id_menu where status=1');
		$data['isian'] = [];
		if(isset($_POST['filter'])){
			$data['report'] = $this->db->query('select * from cart join menu on cart.id_menu = menu.id_menu WHERE MONTH(date) = '.$_POST['bulan'].' AND YEAR(date) = '.$_POST['tahun'].' and status=1');
			$data['isian'] = [$_POST['bulan'], $_POST['tahun']];
		}
		$data['nav'] = false;
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['page'] = $page;
		$this->load->view('app', $data);
	}

	public function view_login($page = "view_login")
	{
		if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->view('view_login.php');
	}

	public function login()
	{
		$this->load->library('session');
		$username = $_POST['username'];
		$password = $_POST['password'];
		$mysqli = new mysqli('localhost', 'root', '', 'db_ipsi');
		$cek = $mysqli->query("select * from user where username='" . $username . "' and password='" . $password . "'");
		$row = $cek->fetch_object();
		if ($row) {
			$this->session->set_userdata('login', true);
			$this->session->set_userdata('id_user', $row->id_user);
			$this->session->set_userdata('date', date('Y-m-d H:m:s'));
			redirect("/pages");
		} else
			redirect("/pages/view_login");
	}

	public function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect("/pages?logout");
	}

	public function cart()
	{
		$this->load->library('session');
		$id_menu = $_POST['id_menu'];
		$jumlah = $_POST['jumlah'];
		$user = $this->session->userdata('id_user');
		$date = $this->session->userdata('date');
		$this->db->query('insert into cart(id_menu,jumlah,id_user,status,date) values("' . $id_menu . '","' . $jumlah . '","' . $user . '",0,"' . $date . '")');
		redirect('/pages/transaksi');
	}

	public function delete_cart()
	{
		$this->db->query('delete from cart where id_menu = "' . $_GET['id'] . '"');
		redirect('/pages/transaksi');
	}

	public function do_trans()
	{
		$this->load->library('session');
		if ($_POST['total'] != 0) {
			$this->db->query('insert into pemesanan(id_user,tanggal,total_harga) values ("' . $this->session->userdata('id_user') . '","' . $this->session->userdata('date') . '","' . $_POST['total'] . '")');
		}
		$id_pesan = $this->db->query('select * from pemesanan order by id_pemesanan desc')->result()[0]->id_pemesanan;
		$carts = $this->db->query("select * from cart join menu on cart.id_menu = menu.id_menu where status = 0 and date = '" . $this->session->userdata('date') . "' ");
		foreach ($carts->result() as $cart) {
			$menus = $this->db->query('select * from menu where id_menu = "' . $cart->id_menu . '"');
			foreach ($menus->result() as $menu) {
				if ($menu->stok - $cart->jumlah < 0) {
					echo "<script>window.alert('Stok tidak mencukupi !'); window.location.href = './transaksi'</script>";
				} else {
					$this->db->query('update cart set status = 1, id_pemesanan = "' . $id_pesan . '" where id = "' . $cart->id . '"');
					$this->db->query('update menu set stok = "' . ($menu->stok - $cart->jumlah) . '" where id_menu = "' . $menu->id_menu . '"');
				}
			}
		}
		echo "<script>window.alert('Tambah Data Sukses !'); window.location.href = './transaksi'</script>";
	}

	public function cetak_laporan(){
		$data['report'] = $this->db->query('select * from cart join menu on cart.id_menu = menu.id_menu where status=1');
		if(isset($_POST['filter'])){
			$data['report'] = $this->db->query('select * from cart join menu on cart.id_menu = menu.id_menu WHERE MONTH(date) = '.$_GET['bulan'].' AND YEAR(date) = '.$_GET['tahun'].' and status=1');
		}
		$this->load->view('print.php',$data);
	}
}
