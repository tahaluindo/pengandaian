<?php if (is_grandadmin()) { ?>
<div class="form-group">
    <label>Instansi</label>
    <?php echo form_dropdown('', $get_all_combobox_instansi, $deposito->instansi_id, $instansi_id) ?>
</div>
<?php } ?>
<div class="form-group">
    <label>Cabang</label>
    <?php echo form_dropdown('', $get_all_combobox_cabang, $deposito->cabang_id, $cabang_id) ?>
</div>