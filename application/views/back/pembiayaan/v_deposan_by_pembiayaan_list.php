<div class="card mb-4 mt-3">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">DAFTAR SUMBER DANA</h6>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th>Nama Deposan</th>
                    <th>Persentase</th>
                    <th>Jumlah Serapan</th>
                    <th>Total Basil</th>
                    <th>Basil Deposan</th>
                    <th>Basil Lembaga</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($deposan as $data) { ?>
                    <tr>
                        <td><?php echo $data->name ?></td>
                        <td><?php echo $data->persentase ?>%</td>
                        <td>Rp. <?php echo number_format($data->nominal, 0, ',', '.') ?></td>
                        <td>Rp. <?php echo number_format($data->total_basil, 0, ',', '.') ?></td>
                        <td>Rp. <?php echo number_format($data->basil_for_deposan, 0, ',', '.') ?></td>
                        <td>Rp. <?php echo number_format($data->basil_for_lembaga, 0, ',', '.') ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>