<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 70%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $page_title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open($action) ?>
            <div class="modal-body">
                <!-- Content -->
                <div class="form-group">
                    <label>Nama Anggota</label>
                    <?php echo form_input($name) ?>
                    <small class="form-text text-muted">Isikan nama lengkap Anggota.</small>
                </div>
                <div class="form-group">
                    <label>NIK</label>
                    <?php echo form_input($nik) ?>
                    <small class="form-text text-muted">Isikan nomor induk kependudukan sesuai KTP.</small>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <?php echo form_input($address) ?>
                    <small class="form-text text-muted">Isikan alamat lengkap sesuai KTP.</small>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <?php echo form_input($email) ?>
                </div>
                <div class="form-group">
                    <label>No HP/Telephone/WhatsApp</label>
                    <?php echo form_input($phone) ?>
                </div>
                <div class="form-group">
                    <label>Jumlah Pinjaman</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">RP</span>
                        </div>
                        <?php echo form_input($jml_pinjaman) ?>
                        <div class="input-group-append">
                            <span class="input-group-text">,00</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="touchSpin">Jangka Waktu Pinjaman</label>
                    <?php echo form_input($jangka_waktu_pinjam) ?>
                </div>
                <div class="form-group">
                    <label>Jenis Barang Yang Digadaikan</label>
                    <?php echo form_input($jenis_barang_gadai) ?>
                </div>
                <div class="form-group">
                    <label>Berat/Nilai Barang Yang Digadaikan</label>
                    <div class="input-group mb-3">
                        <?php echo form_input($berat_barang_gadai) ?>
                        <div class="input-group-append">
                            <span class="input-group-text">Gram</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dateRangePicker">Jangka Waktu Gadai</label>
                    <div class="input-daterange input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <?php echo form_input($waktu_gadai) ?>
                        <div class="input-group-prepend">
                            <span class="input-group-text">-</span>
                        </div>
                        <?php echo form_input($jatuh_tempo_gadai) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Sistem Pembayaran Sewa</label>
                    <?php echo form_dropdown('', $sistem_pembayaran_sewa_value, '', $sistem_pembayaran_sewa) ?>
                </div>
                <!-- Content -->
            </div>
            <?php echo form_input($id_pembiayaan) ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>