<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu Utama</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/home')}}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            <li><a href="{{url('/notifikasi')}}"><i class="fa fa-circle-o"></i> Notifikasi</a></li>
          </ul>
        </li>

        <li class="header">Data Toko & Produk</li>
        <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Data Toko</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/supplier')}}"><i class="fa fa-circle-o"></i> Lihat Data Toko</a></li>
            <li><a href="{{url('/supplier/tambah')}}"><i class="fa fa-circle-o"></i> Tambah Data Toko</a></li>
          </ul>
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/produk')}}"><i class="fa fa-circle-o"></i> Lihat Data Produk</a></li>
            <li><a href="{{url('/produk/tambah')}}"><i class="fa fa-circle-o"></i> Tambah Data Produk</a></li>
          </ul>
        </li>

        <li class="header">Data Belanja dan Pengeluaran Produk</li>
        <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Daftar Belanja</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/purchase_order')}}"><i class="fa fa-circle-o"></i> Daftar Belanja</a></li>
            <li><a href="{{url('/purchase_order/tambah')}}"><i class="fa fa-circle-o"></i> Buat Belanja Baru</a></li>
          </ul>
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Verifikasi Belanja</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/goods_receipts')}}"><i class="fa fa-circle-o"></i> Daftar Verifikasi Belanja</a></li>
          </ul>
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Pengambilan Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/sales')}}"><i class="fa fa-circle-o"></i> Daftar Pengambilan Barang</a></li>
            <li><a href="{{url('/pengeluaran')}}"><i class="fa fa-circle-o"></i> Tambah Pengeluaran Barang</a></li>
          </ul>

          <li class="header">Pengaturan Lainnya</li>
        <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Penanggung Jawab</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/update_penanggung_jawab')}}"><i class="fa fa-circle-o"></i> Update Penanggung Jawab</a></li>
          </ul>
        <li class="header">Lainnya</li>
        <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Pengaturan Akun</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>
          </ul>
        </li>





      </ul>
    </section>