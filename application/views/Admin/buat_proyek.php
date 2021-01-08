<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Buat Proyek</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?= $this->session->flashdata('message'); ?>
                            <form role="form" action="<?= base_url('perusahaan/tambahproyek') ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Perusahaan</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Judul</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="judul" placeholder="Masukkan Nama Judul" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kota</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="kota" placeholder="Masukkan Nama Kota" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Provinsi</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="provinsi" placeholder="Masukkan Nama Provinsi" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alamat</label>
                                        <textarea type="text" class="form-control" id="exampleInputPassword1" name="alamat" placeholder="Masukkan Nama Provinsi" value=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bidang pekerjaan</label>
                                        <select class="form-control select2" name="bidang_pekerjaan" style="width: 100%;">
                                            <option selected="selected">Sales Marketing</option>
                                            <option>SPG / SPB</option>
                                            <option>IT</option>
                                            <option>Tour $ Travel</option>
                                            <option>Administrasi $ Customer Relationship</option>
                                            <option>Penulis / Media & Jurnalisme / Percetakan dan Penerbitan</option>
                                            <option>Pekerjaan Umum</option>
                                            <option>Kesehatan Medis</option>
                                            <option>Konsultan</option>
                                            <option>Design</option>
                                            <option>Asisten Dokter</option>
                                            <option>Operasi Restoran</option>
                                            <option>Operasi Hotel</option>
                                            <option>Pelatih Olahraga</option>
                                            <option>Pelatih Pendidik</option>
                                            <option>Editor</option>
                                            <option>Jurnalisme</option>
                                            <option>Operasi Gudang</option>
                                            <option>Web Developer</option>
                                            <option>Programmer IT</option>
                                            <option>System Analyst</option>
                                            <option>Network Enginer</option>
                                            <option>Juru Masak</option>
                                            <option>Fotographer $ Videographer</option>
                                            <option>Apoteker / Farmasi</option>
                                            <option>Mekanik Otomotif</option>
                                            <option>Petugas Kebersihan</option>
                                            <option>Arsitek</option>
                                            <option>Properti / Real Estate</option>
                                            <option>Asisten Medis</option>
                                            <option>Digital Maerketing</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Deskripsi Pekerjaan</label>
                                        <textarea class="form-control" rows="4" id="deskrpisikerja" name="deskripsi" placeholder="Masukkan Deskripsi Pekerjaan" value=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Persyaratan</label>
                                        <textarea type="text" class="form-control" id="exampleInputPassword1" name="persyaratan" placeholder="Masukkan persyaratan" value=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Gaji</label>
                                        <input type="number" class="form-control" id="exampleInputPassword1" name="gaji" placeholder="Masukkan Gaji" value="">

                                        <!-- <select class="form-control select2" name="gaji" style="width: 100%;"> -->
                                        <!-- <option selected="selected">Rp. < 1.000.000 </option> <option>Rp. 1.000.000 - 3.000.000</option>
                                                <option> > 3.000.000</option> -->
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>