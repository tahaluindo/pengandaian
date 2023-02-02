<?php
$this->db->where('user_id', $id_users);
$user_access_result = $this->db->get('users_data_access')->result();

$user_access_ids = array();

foreach ($user_access_result as $row) {
    $user_access_ids[] = $row->data_access_id;
}

foreach ($get_all_data_access as $dataAccess) {
?>
<div class="custom-control custom-checkbox" style="display:inline-block; margin-right:10px">
    <input type="checkbox" name="data_access_id[]" class="custom-control-input" id="<?php echo $dataAccess->checkbox_id ?>" value="<?php echo $dataAccess->id_data_access ?>" <?php echo ((in_array($dataAccess->id_data_access, $user_access_ids)) ? 'checked' : ''); ?>>
    <label class="custom-control-label" for="<?php echo $dataAccess->checkbox_id ?>"><?php echo $dataAccess->data_access_name ?></label>
</div>
<?php } ?>