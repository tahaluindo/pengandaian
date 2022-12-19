<div class="table-responsive p-3">
    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
        <thead class="thead-light">
            <tr>
                <th>Nama Deposan</th>
                <th>Deposito</th>
                <th>Resapan</th>
                <th>Saldo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $btn_status = false;
            $count = count($this->session->id_deposito);

            foreach ($get_all as $data) {
                // Action
                if ($count > 0) {
                    for ($i = 0; $i < $count; $i++) {
                        if ($this->session->id_deposito[$i] == $data->id_deposito || $this->session->total_pinjaman == 0) {
                            $btn_status = true;
                            break;
                        } elseif ($this->session->id_deposito[$i] != $data->id_deposito) {
                            $btn_status = false;
                        }
                    }
                }

                if ($btn_status == true) {
                    $persentase = '<button type="button" class="btn btn-sm btn-info" style="cursor: not-allowed;" disabled>Persentase</button>';
                } else {
                    $persentase = '<a href="#" id="persentaseDeposito" class="btn btn-sm btn-info" title="Persentase" data-toggle="modal" data-target="#exampleModal" data-id_deposito="' . $data->id_deposito . '">Persentase</a>';
                }
            ?>
                <tr>
                    <td><?php echo $data->name ?></td>
                    <td><?php echo 'Rp ' . number_format($data->total_deposito, 0, ',', '.') ?></td>
                    <td><?php echo 'Rp ' . number_format($data->resapan_deposito, 0, ',', '.') ?></td>
                    <td><?php echo 'Rp ' . number_format($data->saldo_deposito, 0, ',', '.') ?></td>
                    <td><?php echo $persentase ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>