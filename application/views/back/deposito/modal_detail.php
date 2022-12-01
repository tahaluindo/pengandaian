<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 700px;" role="document">
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
                                <td width="190px">Nama Deposan</td>
                                <td width="5px">:</td>
                                <td><span class="name"></span></td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td><span class="nik"></span></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><span class="address"></span></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><span class="email"></span></td>
                            </tr>
                            <tr>
                                <td>No. HP/Telephone/WA</td>
                                <td>:</td>
                                <td><span class="phone"></span></td>
                            </tr>
                            <tr>
                                <td>Jumlah Deposito</td>
                                <td>:</td>
                                <td>Rp. <span class="total_deposito"></span>,00</td>
                            </tr>
                            <tr>
                                <td>Jangka Waktu</td>
                                <td>:</td>
                                <td><span class="jangka_waktu"></span> Tahun</td>
                            </tr>
                            <tr>
                                <td>Waktu Deposito</td>
                                <td>:</td>
                                <td><span class="waktu_deposito"></span></td>
                            </tr>
                            <tr>
                                <td>Jatuh Tempo</td>
                                <td>:</td>
                                <td><span class="jatuh_tempo"></span></td>
                            </tr>
                            <tr>
                                <td>Bagi Hasil</td>
                                <td>:</td>
                                <td>Rp. <span class="bagi_hasil"></span>,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Content -->
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>