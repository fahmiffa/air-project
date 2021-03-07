 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="#" class="brand-link">
     <img src="<?php echo base_url() ?>/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">AdminLTE 3</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="<?php echo base_url() ?>/assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block"><?php echo session()->get('FULLNAME') ?></a>
       </div>
     </div>

     <!-- SidebarSearch Form -->
     <div class="form-inline">
       <div class="input-group" data-widget="sidebar-search">
         <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
         <div class="input-group-append">
           <button class="btn btn-sidebar">
             <i class="fas fa-search fa-fw"></i>
           </button>
         </div>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
         <li class="nav-item menu-open">
           <a href="/page/dashboard" class="nav-link active">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         <li class="nav-header">TRANSAKSI</li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-edit"></i>
             <p>
               Transaksi
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="/page/sales" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Penjualan</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="/admin/jenis_pembayaran" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Jenis Pembayaran</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="/admin/detail_jenis_pembayaran/" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Detail Jenis Pembayaran</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="/admin/laporan_spp" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Laporan</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-header">Transaksi</li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-copy"></i>
             <p>
               Master Data
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="/page/customer" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Pelanggan</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="/page/operator" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Operator</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="/page/harga" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Master Harga</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="/page/jenis" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Master Jenis</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-user"></i>
             <p>
               Master Pengguna
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="/page/user" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Pengguna</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="/page/level" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Level</p>
               </a>
             </li>
           </ul>
         </li>


       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>