<div class="content-wrapper">
    <section class="content">
        <h4><strong>Detail Data Perusahaan</strong></h4>
        <table class="table col-sm-4">
            <tr>
                <th>Nama Perusahaan </th>
                <td>:</td>
                <td>
                    <h5> <?= $detail->nama_perusahaan ?></h5>
                </td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= $detail->alamat ?></td>

            </tr>
            <tr>
                <th>Kota</th>
                <td><?= $detail->kota ?></td>
            </tr>
            <tr>
                <th>provinsi</th>
                <td><?= $detail->provinsi ?></td>
            </tr>
            <tr>
                <th>TTL</th>
                <td><?= $detail->bidang_perusahaan ?></td>
            </tr>
            <tr>
                <th>No.Telp</th>
                <td><?= $detail->deskripsi ?></td>
            </tr>

        </table>

    </section>
</div>