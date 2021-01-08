<div class="content-wrapper">
    <section class="content">
        <h4><strong>Detail Lowongan</strong></h4>
        <table class="table col-sm-10">
            <tr>
                <th>Nama lengkap :</th>
                <td><?= $detail->nama_lengkap ?></td>
                <th>Agama:</th>
                <td><?= $detail->agama ?></td>
            </tr>
            <tr>
                <th>Alamat :</th>

                <td><?= $detail->alamat ?></td>
                <th>Status :</th>
                <td><?= $detail->status ?></td>
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
                <th>TTL :</th>
                <td><?= $detail->kota_kel . $detail->tgl_lahir ?></td>
            </tr>
            <tr>
                <th>No.Telp</th>
                <td><?= $detail->no_telp ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?= $detail->jenis_kelamin ?></td>
            </tr>
        </table>

    </section>
</div>