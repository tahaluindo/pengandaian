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

		$this->load->view('back/dashboard/body', $this->data);
	}
}
