<div class="card mb-4 mt-3">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">SUMBER DANA</h6>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th>Jumlah Serapan Dari Tabungan</th>
                    <th>Total Biaya Sewa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tabungan as $data) { ?>
                    <tr>
                        <td>Rp. <?php echo number_format($data->nominal, 0, ',', '.') ?></td>
                        <td>Rp. <?php echo number_format($data->total_basil, 0, ',', '.') ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>