<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Prifil</h1>
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

                        <form role="form" action="<?= base_url('User/update') ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" placeholder="Masukkan Nama Perusahaan" value="<?= set_value('') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="Email" placeholder="Masukkan Nama Judul" value="">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Image</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="image" placeholder="Masukkan Nama Kota" value="">
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Alamat</label>
                                    <textarea type="text" class="form-control" id="exampleInputPassword1" name="alamat" placeholder="Masukkan Nama Provinsi" value=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Masukkan Nama Provinsi" value="">
                                </div>



                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                            <!-- /.card-body -->
                        </form>