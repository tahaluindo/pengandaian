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

    function index()
    {
        is_read();

        $this->data['page_title'] = 'Data ' . $this->data['module'];

        $this->data['get_all'] = $this->Pembiayaan_model->get_all();

        $this->data['action']     = 'admin/pembiayaan/update_action';

        $this->data['id_pembiayaan'] = [
            'name'          => 'id_pembiayaan',
            'id'            => 'id_pembiayaan',
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
            '3'             => 'Tabungan dan Deposito',
        ];

        $this->load->view('back/pembiayaan/pembiayaan_list', $this->data);
    }

    function create()
    {
        is_create();

        $this->data['page_title'] = 'Tambah Data ' . $this->data['module'];
        $this->data['action']     = 'admin/pembiayaan/create_forward';

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
            '3'             => 'Tabungan dan Deposito',
        ];

        $this->load->view('back/pembiayaan/pembiayaan_add', $this->data);
    }

    function create_forward()
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
            //SIMPAN DATA ANGGOTA PEMINJAM
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

            $id_anggota = $this->db->insert_id();

            write_log();

            $array_session = array(
                'id_anggota'            => $id_anggota,
                'nama_anggota'          => $this->input->post('name'),
                'jml_pinjaman'          => $jml_pinjaman,
                'total_pinjaman'        => $jml_pinjaman,
                'id_deposito'           => array(),
                'persentase_deposito'   => array(),
                'nama_deposan'          => array(),
                'nominal_deposito'      => array(),
            );

            $this->session->set_userdata($array_session);

            redirect('admin/pembiayaan/sumber_dana_deposito');
        }
    }

    function create_action()
    {
        if (!empty($this->session->id_deposito)) {
            $count_deposito_id = count($this->session->id_deposito);

            for ($i = 0; $i < $count_deposito_id; $i++) {
                $data[$i] = array(
                    'pembiayaan_id'    => $this->input->post('id_pembiayaan'),
                    'deposito_id'      => $this->session->id_deposito[$i],
                    'persentase'       => $this->session->persentase_deposito[$i],
                    'nominal'          => $this->session->nominal_deposito[$i],
                    'created_by'       => $this->session->username,
                );

                $this->db->insert('sumber_dana', $data[$i]);

                write_log();

                //Manipulasi total deposito
                $deposito = $this->Deposito_model->get_by_id($this->session->id_deposito[$i]);
                $saldo_deposito = (int) $deposito->saldo_deposito - (int) $this->session->nominal_deposito[$i];
                $resapan_deposito = $deposito->resapan_deposito + $this->session->nominal_deposito[$i];

                $data_deposito = array(
                    'saldo_deposito'    => $saldo_deposito,
                    'resapan_deposito'  => $resapan_deposito,
                );

                $this->Deposito_model->update($this->session->id_deposito[$i], $data_deposito);
            }
        }

        $this->session->unset_userdata('id_anggota');
        $this->session->unset_userdata('nama_anggota');
        $this->session->unset_userdata('jml_pinjaman');
        $this->session->unset_userdata('total_pinjaman');
        $this->session->unset_userdata('id_deposito');
        $this->session->unset_userdata('persentase_deposito');
        $this->session->unset_userdata('nama_deposan');
        $this->session->unset_userdata('nominal_deposito');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-check"></i><b> Data Berhasil Disimpan!</b></h6></div>');
        redirect('admin/pembiayaan');
    }

    function sumber_dana_deposito()
    {
        if (empty($this->session->nama_anggota)) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-exclamation-triangle"></i><b> Isi data pembiayaan berikut terlebih dahulu!</b></h6></div>');
            redirect('admin/pembiayaan/create');
        } else {
            //PILIH PEMBAGIAN DEPOSITO
            $this->data['action']       = 'admin/pembiayaan/create_action';
            $this->data['modal_action'] = 'admin/pembiayaan/persentase_action';

            $this->data['page_title'] = 'Pilih Sumber Dana Dari Deposan';

            $this->data['status_sumber_dana'] = 2;

            $this->data['get_all'] = $this->Deposito_model->get_all();

            $this->data['nominal_sumber_dana_tabungan'] = [
                'name'          => 'nominal_sumber_dana_tabungan',
                'id'            => 'nominal_sumber_dana_tabungan',
                'class'         => 'form-control',
                'autocomplete'  => 'off',
                'required'      => '',
                'value'         => $this->form_validation->set_value('nominal_sumber_dana_tabungan'),
            ];
            $this->data['persentase_deposito'] = [
                'name'          => 'persentase_deposito',
                'id'            => 'persentase_deposito',
                'class'         => 'form-control',
                'autocomplete'  => 'off',
                'required'      => '',
                'onkeypress'    => 'return event.charCode >= 48 && event.charCode <=57'
            ];
            $this->data['konversi_nominal'] = [
                'name'          => 'konversi_nominal',
                'id'            => 'konversi_nominal',
                'class'         => 'form-control',
                'readonly'      => '',
            ];
            $this->data['id_deposito'] = [
                'name'          => 'id_deposito',
                'id'            => 'id_deposito',
                'type'          => 'hidden',
            ];
            $this->data['id_pembiayaan'] = [
                'name'          => 'id_pembiayaan',
                'id'            => 'id_pembiayaan',
                'type'          => 'hidden',
            ];

            $this->load->view('back/pembiayaan/pembiayaan_add_forward', $this->data);
        }
    }

    function persentase_action()
    {
        //Ubah tipe data konversi nominal
        $string = $this->input->post('konversi_nominal');
        $konversi_nominal = preg_replace("/[^0-9]/", "", $string);

        $result = $this->session->total_pinjaman - (int) $konversi_nominal;

        //Get by id data deposan
        $deposan = $this->Deposito_model->get_by_id($this->input->post('id_deposito'));

        $persentase = (int) $konversi_nominal / $this->session->jml_pinjaman * 100;

        $new_array_deposito = $this->session->id_deposito;
        $new_array_persentase = $this->session->persentase_deposito;
        $new_array_deposan = $this->session->nama_deposan;
        $new_array_nominal = $this->session->nominal_deposito;
        array_push($new_array_deposito, $this->input->post('id_deposito'));
        array_push($new_array_persentase, $persentase);
        array_push($new_array_deposan, $deposan->name);
        array_push($new_array_nominal, (int) $konversi_nominal);
        $this->session->set_userdata('id_deposito', $new_array_deposito);
        $this->session->set_userdata('persentase_deposito', $new_array_persentase);
        $this->session->set_userdata('nama_deposan', $new_array_deposan);
        $this->session->set_userdata('nominal_deposito', $new_array_nominal);

        if ($result > 0) {
            $this->session->set_userdata('total_pinjaman', $result);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-check"></i><b> Dari pembagian deposito tersisa Rp. ' . number_format($result, 0, ',', '.') . ' setelah berkurang sebesar ' . $this->input->post('persentase_deposito') . '% dengan nominal Rp. ' . $this->input->post('konversi_nominal') . '</b></h6></div>');
            redirect('admin/pembiayaan/sumber_dana_deposito');
        } elseif ($result == 0) {
            $this->session->set_userdata('total_pinjaman', $result);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-check"></i><b> Pembagian deposito selesai. Silahkan simpan</b></h6></div>');
            redirect('admin/pembiayaan/sumber_dana_deposito');
        } else {
            redirect('admin/pembiayaan/sumber_dana_deposito');
        }
    }

    function update_action()
    {
        $this->form_validation->set_rules('name', 'Nama Anggota', 'trim|required');
        $this->form_validation->set_rules('nik', 'NIK', 'is_numeric|required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('phone', 'No. HP/Telephone', 'is_numeric|required');
        $this->form_validation->set_rules('jml_pinjaman', 'Jumlah Pinjaman', 'required');
        $this->form_validation->set_rules('jangka_waktu_pinjam', 'Jangka Waktu Pinjaman', 'is_numeric|required');
        $this->form_validation->set_rules('jenis_barang_gadai', 'Jenis Barang Yang Digadaikan', 'required');
        $this->form_validation->set_rules('berat_barang_gadai', 'Berat/Nilai Barang Yang Digadaikan', 'is_numeric|required');
        $this->form_validation->set_rules('waktu_gadai', 'Waktu Gadai', 'required');
        $this->form_validation->set_rules('jatuh_tempo_gadai', 'Jatuh Tempo Gadai', 'required');
        $this->form_validation->set_rules('sistem_pembayaran_sewa', 'Sistem Pembayaran Sewa', 'required');
        $this->form_validation->set_rules('sumber_dana', 'Sumber Dana', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('is_numeric', '{field} harus angka');
        $this->form_validation->set_message('valid_email', '{field} format email tidak benar');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() === FALSE) {
            $this->index();
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

            $data = array(
                'name'                      => $this->input->post('name'),
                'nik'                       => $this->input->post('nik'),
                'address'                   => $this->input->post('address'),
                'email'                     => $this->input->post('email'),
                'phone'                     => $this->input->post('phone'),
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
                'modified_by'               => $this->session->username,
            );

            $this->Pembiayaan_model->update($this->input->post('id_pembiayaan'), $data);

            write_log();

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-check"></i><b> Data Berhasil Disimpan!</b></h6></div>');
            redirect('admin/pembiayaan');
        }
    }

    function delete($id)
    {
        is_delete();

        $delete = $this->Pembiayaan_model->get_by_id($id);

        if ($delete) {
            $data = array(
                'is_delete_pembiayaan' => '1',
                'deleted_by'           => $this->session->username,
                'deleted_at'           => date('Y-m-d H:i:a'),
            );

            $this->Pembiayaan_model->soft_delete($id, $data);

            write_log();

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-check"></i><b> Berhasil Dihapus!</b></h6></div>');
            redirect('admin/pembiayaan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6 style="margin-top: 3px; margin-bottom: 3px;"><i class="fas fa-ban"></i><b> Data Tidak Ditemukan!</b></h6></div>');
            redirect('admin/pembiayaan');
        }
    }

    function konversi_nominal($persentase = '')
    {
        $total_pinjaman = $this->session->total_pinjaman;

        $hasil_konversi = $persentase * $total_pinjaman / 100;

        $output['hasil_konversi']    = $hasil_konversi;

        echo json_encode($output);
    }
}
