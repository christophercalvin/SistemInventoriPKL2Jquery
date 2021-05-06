<!-- Logo -->
<?php
  $dt = \App\User::where('id',\Auth::user()->id)->first();
?>
<a class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>{{ \Auth::user()->name }}</b></span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Hello : {{ \Auth::user()->name }}</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Messages: style can be found in dropdown.less-->
      <!-- Tasks: style can be found in dropdown.less -->
      
      <!-- User Account: style can be found in dropdown.less -->
      
      <?php
        $stock=\DB::select('SELECT * from produks where stock < minimal_stock');
      ?>
      <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{count($stock)}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notifikasi Produk</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach($stock as $st)
                  <li>
                    <a href="{{url('produk/detail/'.$st->id) }}">
                      <i class="fa fa-warning text-yellow"></i> {{$st->nama}} kurang dari stock minimal klik untuk detail lebih lanjut
                    </a>
                  </li>
                  @endforeach
                </ul>
              </li>
              <li class="footer"><a href="{{ url('notifikasi') }}">View all</a></li>
            </ul>
          </li>
      
    </ul>
  </div>

</nav>