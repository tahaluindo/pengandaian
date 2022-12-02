<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->data['module'] = 'Dashboard';

		$this->data['instansi'] = $this->Instansi_model->get_by_id($this->session->instansi_id);

		is_login();
	}

	public function index()
	{
		$this->data['page_title'] = $this->data['module'];

		$this->data['get_total_deposan']     			= $this->Deposito_model->total_rows();
		$this->data['get_total_deposito']     			= $this->Deposito_model->total_deposito();

		// if (is_grandadmin()) {
		// 	$this->data['get_total_user']     			= $this->Auth_model->total_rows();
		// 	$this->data['get_total_arsip']     			= $this->Arsip_model->total_rows();
		// 	$this->data['get_total_baris']     			= $this->Baris_model->total_rows();
		// 	$this->data['get_total_box']     				= $this->Box_model->total_rows();
		// 	$this->data['get_total_map']     				= $this->Map_model->total_rows();
		// 	$this->data['get_total_menu']     			= $this->Menu_model->total_rows();
		// 	$this->data['get_total_peminjaman']     = $this->Peminjaman_model->total_rows();
		// 	$this->data['get_total_pengembalian']   = $this->Pengembalian_model->total_rows();
		// 	$this->data['get_total_rak']     				= $this->Rak_model->total_rows();
		// 	$this->data['get_total_submenu']     		= $this->Submenu_model->total_rows();
		// 	$this->data['get_total_usertype']     	= $this->Usertype_model->total_rows();
		// } elseif (is_masteradmin()) {
		// 	$this->data['get_total_user']     			= $this->Auth_model->total_rows_by_instansi();
		// 	$this->data['get_total_arsip']     			= $this->Arsip_model->total_rows_by_instansi();
		// 	$this->data['get_total_baris']     			= $this->Baris_model->total_rows_by_instansi();
		// 	$this->data['get_total_box']     				= $this->Box_model->total_rows_by_instansi();
		// 	$this->data['get_total_map']     				= $this->Map_model->total_rows_by_instansi();
		// 	$this->data['get_total_peminjaman']     = $this->Peminjaman_model->total_rows_by_instansi();
		// 	$this->data['get_total_pengembalian']   = $this->Pengembalian_model->total_rows_by_instansi();
		// 	$this->data['get_total_rak']     				= $this->Rak_model->total_rows_by_instansi();
		// } elseif (is_superadmin()) {
		// 	$this->data['get_total_user']     			= $this->Auth_model->total_rows_by_cabang();
		// 	$this->data['get_total_arsip']     			= $this->Arsip_model->total_rows_by_cabang();
		// 	$this->data['get_total_baris']     			= $this->Baris_model->total_rows_by_cabang();
		// 	$this->data['get_total_box']     				= $this->Box_model->total_rows_by_cabang();
		// 	$this->data['get_total_map']     				= $this->Map_model->total_rows_by_cabang();
		// 	$this->data['get_total_peminjaman']     = $this->Peminjaman_model->total_rows_by_cabang();
		// 	$this->data['get_total_pengembalian']   = $this->Pengembalian_model->total_rows_by_cabang();
		// 	$this->data['get_total_rak']     				= $this->Rak_model->total_rows_by_cabang();
		// } else {
		// 	$this->data['get_total_arsip']     			= $this->Arsip_model->total_rows_by_divisi();
		// 	$this->data['get_total_peminjaman']     = $this->Peminjaman_model->total_rows_by_divisi();
		// 	$this->data['get_total_pengembalian']   = $this->Pengembalian_model->total_rows_by_divisi();
		// }

		$this->load->view('back/dashboard/body', $this->data);
	}
}
