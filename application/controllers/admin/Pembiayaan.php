<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembiayaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->data['module'] = 'Pembiayaan';

        $this->data['instansi'] = $this->Instansi_model->get_by_id($this->session->instansi_id);

        $this->data['btn_submit'] = 'Save';
        $this->data['btn_reset']  = 'Reset';
        $this->data['btn_add']    = 'Tambah Data';
        $this->data['add_action'] = base_url('admin/pembiayaan/create');

        is_login();

        if ($this->uri->segment(2) != NULL) {
            menuaccess_check();
        } elseif ($this->uri->segment(3) != NULL) {
            submenuaccess_check();
        }
    }

    function create()
    {
        is_create();

        $this->data['page_title'] = 'Tambah Data ' . $this->data['module'];
        $this->data['action']     = 'admin/pembiayaan/create_action';

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
        $this->data['jml_pinjaman'] = [
            'name'          => 'jml_pinjaman',
            'id'            => 'jml_pinjaman',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'value'         => $this->form_validation->set_value('jml_pinjaman'),
        ];
        $this->data['jangka_waktu_pinjam'] = [
            'name'          => 'jangka_waktu_pinjam',
            'id'            => 'jangka_waktu_pinjam',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'value'         => $this->form_validation->set_value('jangka_waktu_pinjam'),
        ];
        $this->data['jenis_barang_gadai'] = [
            'name'          => 'jenis_barang_gadai',
            'id'            => 'jenis_barang_gadai',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'value'         => $this->form_validation->set_value('jenis_barang_gadai'),
        ];
        $this->data['berat_barang_gadai'] = [
            'name'          => 'berat_barang_gadai',
            'id'            => 'berat_barang_gadai',
            'class'         => 'form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'value'         => $this->form_validation->set_value('berat_barang_gadai'),
        ];
        $this->data['waktu_gadai'] = [
            'name'          => 'waktu_gadai',
            'id'            => 'waktu_gadai',
            'class'         => 'input-sm form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'value'         => $this->form_validation->set_value('waktu_gadai'),
        ];
        $this->data['jatuh_tempo_gadai'] = [
            'name'          => 'jatuh_tempo_gadai',
            'id'            => 'jatuh_tempo_gadai',
            'class'         => 'input-sm form-control',
            'autocomplete'  => 'off',
            'required'      => '',
            'value'         => $this->form_validation->set_value('jatuh_tempo_gadai'),
        ];
        $this->data['sistem_pembayaran_sewa'] = [
            'name'          => 'sistem_pembayaran_sewa',
            'id'            => 'sistem_pembayaran_sewa',
            'class'         => 'form-control',
            'required'      => '',
            'value'         => $this->form_validation->set_value('sistem_pembayaran_sewa'),
        ];
        $this->data['sistem_pembayaran_sewa_value'] = [
            ''              => '- Pilih Sistem Pembayaran -',
            '1'             => 'Bulanan',
            '2'             => 'Jatuh Tempo',
        ];
        $this->data['sumber_dana'] = [
            'name'          => 'sumber_dana',
            'id'            => 'sumber_dana',
            'class'         => 'form-control',
            'required'      => '',
            'value'         => $this->form_validation->set_value('sumber_dana'),
        ];
        $this->data['sumber_dana_value'] = [
            ''              => '- Pilih Sumber Dana -',
            '1'             => 'Tabungan',
            '2'             => 'Deposito',
        ];

        $this->load->view('back/pembiayaan/pembiayaan_add', $this->data);
    }

    function create_action()
    {
        $this->form_validation->set_rules('name', 'Nama', 'trim|required');
        $this->form_validation->set_rules('nik', 'NIK', 'is_numeric|required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('phone', 'No. HP/Telephone', 'is_numeric|required');
        $this->form_validation->set_rules('jml_pinjaman', 'Jumlah Pinjaman', 'required');
        $this->form_validation->set_rules('jangka_waktu_pinjam', 'Jangka Waktu Pinjaman', 'is_numeric|required');
        $this->form_validation->set_rules('jenis_barang_gadai', 'Jenis Barang Yang Digadai', 'required');
        $this->form_validation->set_rules('berat_barang_gadai', 'Berat/Nilai Barang Yang Digadai', 'is_numeric|required');
        $this->form_validation->set_rules('waktu_gadai', 'Waktu Gadai', 'required');
        $this->form_validation->set_rules('jatuh_tempo_gadai', 'Jatuh Tempo Gadai', 'required');
        $this->form_validation->set_rules('sistem_pembayaran_sewa', 'Sistem Pembayaran Sewa', 'required');
        $this->form_validation->set_rules('sumber_dana', 'Sumber Dana', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('is_numeric', '{field} harus angka');
        $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
        } else {
            //Menentukan jangka waktu gadai
            $waktu_gadai = date("Y-m-d", strtotime($this->input->post('waktu_gadai')));
            $jatuh_tempo_gadai = date("Y-m-d", strtotime($this->input->post('jatuh_tempo_gadai')));
            $tgl1 = new DateTime($waktu_gadai);
            $tgl2 = new DateTime($jatuh_tempo_gadai);
            $selisih = $tgl2->diff($tgl1);
            $jangka_waktu_gadai = $selisih->m;

            //Menentukan sewa tempat perbulan
            $sewa_tempat_perbulan = 10000 * $this->input->post('berat_barang_gadai');

            //Menentukan total biaya sewa
            $total_biaya_sewa = $sewa_tempat_perbulan * $jangka_waktu_gadai;

            //Ubah tipe data jml pinjaman
            $string = $this->input->post('jml_pinjaman');
            $jml_pinjaman = preg_replace("/[^0-9]/", "", $string);

            //Format no telephone
            $phone = '62' . $this->input->post('phone');

            $data = array(
                'name'                      => $this->input->post('name'),
                'nik'                       => $this->input->post('nik'),
                'address'                   => $this->input->post('address'),
                'email'                     => $this->input->post('email'),
                'phone'                     => $phone,
                'instansi_id'               => $this->session->instansi_id,
                'jml_pinjaman'              => (int) $jml_pinjaman,
                'jangka_waktu_pinjam'       => $this->input->post('jangka_waktu_pinjam'),
                'jenis_barang_gadai'        => $this->input->post('jenis_barang_gadai'),
                'berat_barang_gadai'        => $this->input->post('berat_barang_gadai'),
                'waktu_gadai'               => $this->input->post('waktu_gadai'),
                'jatuh_tempo_gadai'         => $this->input->post('jatuh_tempo_gadai'),
                'jangka_waktu_gadai'        => $jangka_waktu_gadai,
                'sewa_tempat_perbulan'      => $sewa_tempat_perbulan,
                'total_biaya_sewa'          => $total_biaya_sewa,
                'sistem_pembayaran_sewa'    => $this->input->post('sistem_pembayaran_sewa'),
                'sumber_dana'               => $this->input->post('sumber_dana'),
                'created_by'                => $this->session->username,
            );

            $this->Pembiayaan_model->insert($data);

            write_log();

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-check"></i><b> Data Berhasil Ditambahkan!</b></h6></div>');
            redirect('admin/pembiayaan');
        }
    }
}
