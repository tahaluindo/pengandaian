<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 70%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail <?php echo $page_title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Content -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <tbody>
                            <tr>
                                <td width="240px">Nama Anggota</td>
                                <td width="5px">:</td>
                                <td><b><span class="name"></span></b></td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td><b><span class="nik"></span></b></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><b><span class="address"></span></b></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><b><span class="email"></span></b></td>
                            </tr>
                            <tr>
                                <td>No. HP/Telephone/WA</td>
                                <td>:</td>
                                <td><b>+<span class="phone"></span></b></td>
                            </tr>
                            <tr>
                                <td>Jumlah Pinjaman</td>
                                <td>:</td>
                                <td><b>Rp. <span class="jml_pinjaman"></span></b></td>
                            </tr>
                            <tr>
                                <td>Jangka Waktu Pinjaman</td>
                                <td>:</td>
                                <td><b><span class="jangka_waktu_pinjam"></span> Bulan</b></td>
                            </tr>
                            <tr>
                                <td>Jenis Barang Yang Digadaikan</td>
                                <td>:</td>
                                <td><b><span class="jenis_barang_gadai"></span></b></td>
                            </tr>
                            <tr>
                                <td>Berat Barang Yang Digadaikan</td>
                                <td>:</td>
                                <td><b><span class="berat_barang_gadai"></span> Gram</b></td>
                            </tr>
                            <tr>
                                <td>Waktu Gadai</td>
                                <td>:</td>
                                <td><b><span class="waktu_gadai"></span></b></td>
                            </tr>
                            <tr>
                                <td>Jatuh Tempo Gadai</td>
                                <td>:</td>
                                <td><b><span class="jatuh_tempo_gadai"></span></b></td>
                            </tr>
                            <tr>
                                <td>Jangka Waktu Gadai</td>
                                <td>:</td>
                                <td><b><span class="jangka_waktu_gadai"></span> Bulan</b></td>
                            </tr>
                            <tr>
                                <td>Sewa Tempat Perbulan</td>
                                <td>:</td>
                                <td><b>Rp. <span class="sewa_tempat_perbulan"></span></b></td>
                            </tr>
                            <tr>
                                <td>Total Biaya Sewa</td>
                                <td>:</td>
                                <td><b>Rp. <span class="total_biaya_sewa"></span></b></td>
                            </tr>
                            <tr>
                                <td>Sistem Pembayaran Sewa</td>
                                <td>:</td>
                                <td><b><span class="sistem_pembayaran_sewa"></span></b></td>
                            </tr>
                            <tr>
                                <td>Sumber Dana</td>
                                <td>:</td>
                                <td><b><span class="sumber_dana"></span></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Content -->
            </div>
        </div>
    </div>
</div>