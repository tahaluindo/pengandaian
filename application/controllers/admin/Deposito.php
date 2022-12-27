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

        $this->data['get_all'] = $this->Deposito_model->get_all();

        $this->data['action']     = 'admin/deposito/update_action';

        $this->data['id_deposito'] = [
            'name'          => 'id_deposito',
            'id'            => 'id_deposito',
            'type'          => 'hidden',
        ];
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
            'onkeypress'    => 'return event.charCode >= 48 && event.charCode <=57'
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
            'onkeypress'    => 'return event.charCode >= 48 && event.charCode <=57'
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
            'onkeypress'    => 'return event.charCode >= 48 && event.charCode <=57'
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
            'onkeypress'    => 'return event.charCode >= 48 && event.charCode <=57'
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
        $this->form_validation->set_rules('nik', 'NIK', 'is_numeric|required');
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
                'saldo_deposito'    => (int) $total_deposito,
                'jangka_waktu'      => $jangka_waktu_deposito,
                'waktu_deposito'    => $this->input->post('waktu_deposito'),
                'jatuh_tempo'       => $this->input->post('jatuh_tempo'),
                'created_by'        => $this->session->username,
            );

            $this->Deposito_model->insert($data);

            write_log();

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-check"></i><b> Data Berhasil Disimpan!</b></h6></div>');
            redirect('admin/deposito');
        }
    }

    function update_action()
    {
        $this->form_validation->set_rules('name', 'Nama Deposan', 'trim|required');
        $this->form_validation->set_rules('nik', 'NIK', 'is_numeric|required');
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
            $this->index();
        } else {
            //Ubah tipe data total deposito
            $string = $this->input->post('total_deposito');
            $total_deposito = preg_replace("/[^0-9]/", "", $string);

            //Menentukan jangka waktu
            $waktu_deposito = date("Y", strtotime($this->input->post('waktu_deposito')));
            $jatuh_tempo = date("Y", strtotime($this->input->post('jatuh_tempo')));
            $jangka_waktu_deposito = $jatuh_tempo - $waktu_deposito;

            $data = array(
                'name'              => $this->input->post('name'),
                'nik'               => $this->input->post('nik'),
                'address'           => $this->input->post('address'),
                'email'             => $this->input->post('email'),
                'phone'             => $this->input->post('phone'),
                'total_deposito'    => (int) $total_deposito,
                'resapan_deposito'  => 0,
                'saldo_deposito'    => (int) $total_deposito,
                'jangka_waktu'      => $jangka_waktu_deposito,
                'waktu_deposito'    => $this->input->post('waktu_deposito'),
                'jatuh_tempo'       => $this->input->post('jatuh_tempo'),
                'instansi_id'       => $this->session->instansi_id,
                'modified_by'       => $this->session->username,
            );

            $this->Deposito_model->update($this->input->post('id_deposito'), $data);

            write_log();

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-check"></i><b> Data Berhasil Disimpan!</b></h6></div>');
            redirect('admin/deposito');
        }
    }

    function delete($id)
    {
        is_delete();

        $delete = $this->Deposito_model->get_by_id($id);

        if ($delete) {
            $data = array(
                'is_delete_deposito'   => '1',
                'deleted_by'           => $this->session->username,
                'deleted_at'           => date('Y-m-d H:i:a'),
            );

            $this->Deposito_model->soft_delete($id, $data);

            write_log();

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-check"></i><b> Berhasil Dihapus!</b></h6></div>');
            redirect('admin/deposito');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-ban"></i><b> Data Tidak Ditemukan!</b></h6></div>');
            redirect('admin/deposito');
        }
    }

    function deleted_list()
    {
        is_restore();

        $this->data['page_title'] = 'Recycle Bin ' . $this->data['module'];

        $this->data['get_all_deleted'] = $this->Deposito_model->get_all_deleted();

        $this->load->view('back/deposito/deposito_deleted_list', $this->data);
    }

    function restore($id)
    {
        is_restore();

        $row = $this->Deposito_model->get_by_id($id);

        if ($row) {
            $data = array(
                'is_delete_deposito'   => '0',
                'deleted_by'           => NULL,
                'deleted_at'           => NULL,
            );

            $this->Deposito_model->update($id, $data);

            write_log();

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-check"></i><b> Berhasil Dikembalikan!</b></h6></div>');
            redirect('admin/deposito/deleted_list');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-ban"></i><b> Data Tidak Ditemukan!</b></h6></div>');
            redirect('admin/deposito');
        }
    }

    function delete_permanent($id)
    {
        is_delete();

        $delete = $this->Deposito_model->get_by_id($id);

        if ($delete) {
            $this->Deposito_model->delete($id);

            write_log();

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-check"></i><b> Berhasil Dihapus Secara Permanen!</b></h6></div>');
            redirect('admin/deposito/deleted_list');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-ban"></i><b> Data Tidak Ditemukan!</b></h6></div>');
            redirect('admin/deposito');
        }
    }

    function count_basil_berjalan_by_deposan($id_deposito)
    {
        $basil_berjalan = $this->Sumberdana_model->count_basil_berjalan_by_deposan($id_deposito);
        $this->data['basil_berjalan'] = $basil_berjalan[0]->basil_for_deposan;

        $this->data['data_deposito'] = $this->Deposito_model->get_by_id($id_deposito);

        $this->load->view('back/deposito/v_basil_berjalan', $this->data);
    }
}
