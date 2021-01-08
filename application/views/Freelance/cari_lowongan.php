<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | DataTables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()    ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()    ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()    ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <section class="content">
        <h2>Cari Lowongan</h2>
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">

                    <?php foreach ($buat_lowongan as $bl) : ?>
                        <div class="col-12 col-sm-12 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">

                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-6">

                                            <h2 class="lead"><b><?= $bl->nama_perusahaan; ?></b></h2>
                                            <h2 class="lead"><b><?= $bl->judul; ?></b></h2>
                                            <p class="text-muted text-sm"><b>Keahlian: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?= $bl->alamat . ' ,' . $bl->kota . ', ' . $bl->provinsi; ?></li>

                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-book"></i></span> Deskripsi :<?= $bl->deskripsi; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="<?= base_url('asset/') ?>dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">
                                            <a href="<?= base_url('User/detail/' . $bl->perusahaan_id) ?>" class="btn btn-sm btn-primary">
                                                <i class="fas fa-search-plus"></i> Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-footer">
                                    <div class="text-right">
                                        <!-- 
                                        <a href="<?= base_url('DashadmCtrl/profile/' . $bl->id_fre) ?>" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> View Profile
                                        </a>
                                        <a href="#" class="btn btn-sm bg-teal">
                                            <i class="fas fa-comments"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm bg-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('Admin/hapus_freelance/' . $free->id_fre) ?>" class="btn btn-sm bg-danger">
                                            <i class="fas fa-trash"></i>
                                        </a> -->
                                        <!-- <button class="btn btn-sm bg-danger"><i class="fas fa-trash"></i></button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Pengguna Freelance</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('Admin/tambah_aksi'); ?>" method="post">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat </label>
                                        <input type="text" name="alamat" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Kota </label>
                                        <input type="text" name="kota" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>provinsi </label>
                                        <input type="text" name="provinsi" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>No.Telepon </label>
                                        <input type="text" name="no_telp" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <input type="text" name="agama" class="form-control">
                                    </div>
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url()    ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url()    ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url()    ?>assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()    ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()    ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()    ?>assets/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
</body>

</html>