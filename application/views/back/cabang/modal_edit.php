<div class="modal fade" id="modalEditCabang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50%;" role="document">
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
                <?php if (is_grandadmin()) { ?>
                <div class="form-group">
                    <label>Instansi</label>
                    <?php echo form_dropdown('', $get_all_combobox_instansi, '', $instansi_id) ?>
                </div>
                <?php } ?>
                <div class="form-group">
                    <label>Nama Cabang</label>
                    <?php echo form_input($cabang_name) ?>
                </div>
                <!-- Content -->
            </div>
            <?php echo form_input($id_cabang) ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>