 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-fighter-jet"></i>
         </div>
         <div class="sidebar-brand-text mx-3"> INFREELANCER <sup>Admin</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
         Admin
     </div>
     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="index.html">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span><b> Dashboard</b></span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         User
     </div>


     <!-- Nav Item - Pages Collapse Menu -->
     <!-- <li class="nav-item">
         <a class="nav-link" href="charts.html">
             <i class="fas fa-fw fa-user"></i>
             <span><b> Freelancer</b></span></a>

     </li> -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefree" aria-expanded="true" aria-controls="collapsefree">
             <i class="fas fa-fw fa-user"></i>
             <span>Freelancer</span>
         </a>
         <div id="collapsefree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url('Admin/Lihatlistfreelancer') ?>">Lihat list Freelancer</a>

             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-user"></i>
             <span>Perusahaan</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?= base_url('Admin/Lihatlistperusahaan') ?>">Lihat list Perusahaan</a>
                 <a class="collapse-item" href="<?= base_url('Admin/buatproyek') ?>">Buat Lowongan</a>
                 <a class="collapse-item" href="<?= base_url('Admin/carilowongan') ?>">Cari Lowongan</a>

             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('Auth/logout') ?>">
             <i class="fas fa-fw fa-sign-out-alt"></i>
             <span><b> Keluar</b></span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->