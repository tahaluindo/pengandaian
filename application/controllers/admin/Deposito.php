<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposito extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->data['module'] = 'Deposito';

        $this->data['instansi'] = $this->Instansi_model->get_by_id($this->session->instansi_id);

        $this->data['btn_submit'] = 'Save';
        $this->data['btn_reset']  = 'Reset';
        $this->data['btn_add']    = 'Tambah Data';
        $this->data['add_action'] = base_url('admin/deposito/create');

        is_login();

        if (is_admin() and is_pegawai()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda tidak berhak masuk ke halaman sebelumnya</div>');
            redirect('admin/dashboard');
        }

        if ($this->uri->segment(2) != NULL) {
            menuaccess_check();
        } elseif ($this->uri->segment(3) != NULL) {
            submenuaccess_check();
        }
    }

    function index()
    {
        is_read();

        $this->data['page_title'] = 'Data ' . $this->data['module'];

        if (is_grandadmin()) {
            $this->data['get_all'] = $this->Deposito_model->get_all();
        }

        $this->load->view('back/deposito/deposito_list', $this->data);
    }

    function create()
    {
        is_create();

        $this->data['page_title'] = 'Tambah Data ' . $this->data['module'];
        $this->data['action']     = 'admin/deposito/create_action';

        $this->data['name'] = [
            'name'          => 'name',
            'id'            => 'name',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'value'         => $this->form_validation->set_value('name'),
        ];
        $this->data['nik'] = [
            'name'          => 'nik',
            'id'            => 'nik',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'value'         => $this->form_validation->set_value('nik'),
        ];
        $this->data['address'] = [
            'name'          => 'address',
            'id'            => 'address',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'value'         => $this->form_validation->set_value('address'),
        ];
        $this->data['email'] = [
            'name'          => 'email',
            'id'            => 'email',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'value'         => $this->form_validation->set_value('email'),
        ];
        $this->data['phone'] = [
            'name'          => 'phone',
            'id'            => 'phone',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'placeholder'   => '8xxxxxxxxxx',
            'value'         => $this->form_validation->set_value('phone'),
        ];
        $this->data['total_deposito'] = [
            'name'          => 'total_deposito',
            'id'            => 'total_deposito',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'value'         => $this->form_validation->set_value('total_deposito'),
        ];
        $this->data['waktu_deposito'] = [
            'name'          => 'waktu_deposito',
            'id'            => 'waktu_deposito',
            'class'         => 'input-sm form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'value'         => $this->form_validation->set_value('waktu_deposito'),
        ];
        $this->data['jatuh_tempo'] = [
            'name'          => 'jatuh_tempo',
            'id'            => 'jatuh_tempo',
            'class'         => 'input-sm form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'value'         => $this->form_validation->set_value('jatuh_tempo'),
        ];

        $this->load->view('back/deposito/deposito_add', $this->data);
    }

    function create_action()
    {
        $this->form_validation->set_rules('name', 'Nama Deposan', 'trim|required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('phone', 'No. HP/Telephone', 'is_numeric|required');
        $this->form_validation->set_rules('total_deposito', 'Jumlah Deposito', 'required');
        $this->form_validation->set_rules('waktu_deposito', 'Waktu Deposito', 'required');
        $this->form_validation->set_rules('jatuh_tempo', 'Jatuh Tempo', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('is_numeric', '{field} harus angka');
        $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
        } else {
            //Ubah tipe data total deposito
            $string = $this->input->post('total_deposito');
            $total_deposito = preg_replace("/[^0-9]/", "", $string);

            //Format no telephone
            $phone = '62' . $this->input->post('phone');

            //Menentukan jangka waktu
            $waktu_deposito = date("Y", strtotime($this->input->post('waktu_deposito')));
            $jatuh_tempo = date("Y", strtotime($this->input->post('jatuh_tempo')));
            $jangka_waktu_deposito = $jatuh_tempo - $waktu_deposito;

            $data = array(
                'name'              => $this->input->post('name'),
                'nik'               => $this->input->post('nik'),
                'address'           => $this->input->post('address'),
                'email'             => $this->input->post('email'),
                'phone'             => $phone,
                'instansi_id'       => $this->session->instansi_id,
                'total_deposito'    => (int) $total_deposito,
                'jangka_waktu'      => $jangka_waktu_deposito,
                'waktu_deposito'    => $this->input->post('waktu_deposito'),
                'jatuh_tempo'       => $this->input->post('jatuh_tempo'),
                'created_by'        => $this->session->username,
            );

            $this->Deposito_model->insert($data);

            write_log();

            // $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil disimpan</div>');
            // redirect('admin/box');
        }
    }
}
