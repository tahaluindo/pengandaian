<div class="modal fade" id="modalChangePinjaman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 40%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Jumlah Pinjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open($modal_action) ?>
            <div class="modal-body">
                <!-- Content -->
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <?php echo form_input($jml_pinjaman) ?>
                        <div class="input-group-append">
                            <span class="input-group-text">,00</span>
                        </div>
                    </div>
                </div>
                <!-- Content -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>