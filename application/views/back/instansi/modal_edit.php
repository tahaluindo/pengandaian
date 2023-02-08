<div class="modal fade" id="modalEditInstansi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 70%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $page_title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart($action) ?>
            <div class="modal-body">
                <!-- Content -->
                <div class="form-group">
                    <label>Nama Instansi</label>
                    <?php echo form_input($instansi_name) ?>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <?php echo form_input($instansi_address) ?>
                </div>
                <div class="form-group">
                    <label>No HP / Telephone</label>
                    <?php echo form_input($instansi_phone) ?>
                </div>
                <div class="form-group">
                    <label>Aktif Sampai</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <?php echo form_input($active_date) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="dateRangePicker">Logo Instansi</label>
                            <div id="currentImage"></div>
                            <img id="preview" width="100%" />
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="photo" onchange="photoPreview(this,'preview')" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Ubah Foto</label>
                            </div>
                            <small class="form-text text-muted">Maximum file size 2Mb</small>
                        </div>
                    </div>
                </div>
                <!-- Content -->
            </div>
            <?php echo form_input($id_instansi) ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal" onclick="location.reload()">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>