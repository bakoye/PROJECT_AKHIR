<div class="content-wrapper">
    <section class="content">
        <h4><strong>Detail Data Lowongan</strong></h4>
        <table class="table col-sm-10">
            <tr>
                <th>Nama Perusahaan :</th>
                <td><?= $detail->nama_perusahaan ?></td>

            </tr>
            <tr>
                <th>Alamat :</th>

                <td><?= $detail->alamat ?></td>

            </tr>
            <tr>
                <th>Kota :</th>
                <td><?= $detail->kota ?></td>
            </tr>
            <tr>
                <th>provinsi :</th>
                <td><?= $detail->provinsi ?></td>
            </tr>
            <tr>
                <th>Deskripsi :</th>
                <td><?= $detail->deskripsi ?></td>
            </tr>
            <tr>
                <th>Persyratan</th>
                <td><?= $detail->persyaratan ?></td>
            </tr>
            <tr>
                <th>Gaji</th>
                <td><?= $detail->gaji ?></td>
            </tr>

        </table>

    </section>
</div>