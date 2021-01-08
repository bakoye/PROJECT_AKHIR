<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Contacts</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <!-- Site wrapper -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-6">
                    <div class="col-sm-6">
                        <h1>PERUSAHAAN</h1><br>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <h8><i class="fa fa-plus">
                                            Tambah Akun</i></h8>

                                </button></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row d-flex align-items-stretch">

                        <?php foreach ($perusahaan as $peru) : ?>
                            <div class="col-6  d-flex align-items-stretch">
                                <div class="card bg-light">
                                    <div class="card-header text-muted border-bottom-0">

                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profil/') . $user['image']; ?>">
                                                <h2 class="lead"><b><?= $peru->nama_perusahaan; ?></b></h2>
                                                <p class="text-muted text-sm"><b>Keahlian: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?= $peru->alamat; ?></li>
                                                    <li class="small"><span class="fa-li"></span> <?= $peru->kota; ?></li>
                                                    <li class="small"><span class="fa-li"></span> <?= $peru->provinsi; ?></li>

                                                    <li class="small"><span class="fa-li"></span> Bidang Perusahaan :<?= $peru->bidang_perusahaan; ?></li>
                                                    <li class="small"><span class="fa-li"></span> Deskripsi :<?= $peru->deskripsi; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="<?= base_url('asset/') ?>dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">

                                            <a href="<?= base_url('Admin/detailin/' . $peru->id) ?>" class="btn btn-sm btn-primary">
                                                <i class="fas fa-search-plus"></i> Detail
                                            </a>
                                            <a href="#" class="btn btn-sm bg-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('Admin/hapus_perusahaan/' . $peru->id) ?>" class="btn btn-sm bg-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <!-- <button class="btn btn-sm bg-danger"><i class="fas fa-trash"></i></button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                    </button> -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Pengguna Peusahaan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('Admin/tambah_aksii'); ?>" method="post">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="nama_perusahaan" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat </label>
                                            <input type="text" name="alamat" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>kota </label>
                                            <input type="text" name="kota" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>provinsi </label>
                                            <input type="text" name="provinsi" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>bidang_perusahaan </label>
                                            <input type="text" name="bidang_perusahaan" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>deskripsi</label>
                                            <input type="text" name="deskripsi" class="form-control">
                                        </div>

                                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success">Simpan</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <!-- <div class="card-footer">
                        <nav aria-label="Contacts Page Navigation">
                            <ul class="pagination justify-content-center m-0">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#">7</a></li>
                                <li class="page-item"><a class="page-link" href="#">8</a></li>
                            </ul>
                        </nav>
                    </div> -->
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>

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
    <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
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