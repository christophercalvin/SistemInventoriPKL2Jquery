@extends('items.master')
@section('content')

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php
                 $stock=\DB::select('SELECT * from produks');
            ?>
              <h3>{{count($stock)}}</h3>

              <p>Produk</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{url('produk')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
                 $stock1=\DB::select('SELECT * from sales');
            ?>
              <h3>{{count($stock1)}}<sup style="font-size: 20px">X</sup></h3>

              <p>Transaksi Pengambilan Barang</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('sales')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <?php
                 $stock2=\DB::select('SELECT * from suppliers');
            ?>
              <h3>{{count($stock2)}}</h3>

              <p>Data Supplier Toko</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('supplier')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php
                 $stock3=\DB::select('SELECT * from goods_receipt where status=1');
            ?>
              <h3>{{count($stock3)}}</h3>

              <p>Daftar Belanja Belum di Setujui</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('goods_receipts')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="col-md-12">
                 <h4>Dashboard Produk</h4>
                <div class="box box-warning">
                    <div class="box-header">
                    <p>
                        <a href="{{url('produks')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-forward"></i> Selengkapnya...</a>
                    </p>
                 </div>
                <div class="box-body">
                    <div class="table table-stripped">
                        <table class="table">
                            <thead>
                                <th><center>Nama Produk</center></th>
                                <th><center>Supplier</center></th>
                                <th><center>Kode</center></th>
                                <th><center>Stock Saat Ini</center></th>
                                <th><center>Stock Minimal</center></th>
                                <th><center>Harga Produk</center></th>
                                <th><center>Tanggal Dibuat</center></th>
                                <th><center>Perubahan Terakhir</center></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><center>{{$produk->nama}}</center></td>
                                    <td><center>{{$produk->supplier_r->nama}}</center></td>
                                    <td><center>{{$produk->kode}}</center></td>

                                    @if ($produk->stock < $produk->minimal_stock)
                                    <td><font color="red"><center><b>{{number_format($produk->stock)}}<b></center></font></td>
                                    @else
                                    <td><center>{{number_format($produk->stock)}}</center></td>
                                    @endif

                                    <td><center>{{number_format($produk->minimal_stock)}}</center></td>
                                    <td><center>Rp {{number_format($produk->harga)}}</center></td>
                                    <td><center>{{date('d M Y H:i:s',strtotime($produk->created_at))}}</center></td>
                                    <td><center>{{date('d M Y H:i:s',strtotime($produk->updated_at))}}</center></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
         </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="col-md-12">
                 <h4>Dashboard Supplier</h4>
                <div class="box box-warning">
                    <div class="box-header">
                    <p>
                        <a href="{{url('suppliers')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-forward"></i>Selengkapnya...</a>
                    </p>
                 </div>
                <div class="box-body">
                    <div class="table table-stripped">
                        <table class="table">
                            <thead>
                                <th><center>Nama Supplier</center></th>
                                <th><center>Alamat</center></th>
                                <th><center>Nomor Telepon</center></th>
                                <th><center>Tanggal dibuat</center></th>
                                <th><center>Tanggal diubah</center></th>
                            </thead>
                            <tbody>
                            <tr>
                                    <td><center>{{$supplier->nama}}</center></td>
                                    <td><center>{{$supplier->alamat}}</center></td>
                                    <td><center>{{$supplier->telepon}}</center></td>
                                    <td><center>{{date('d M Y H:i:s',strtotime($supplier->created_at))}}</center></td>
                                    <td><center>{{date('d M Y H:i:s',strtotime($supplier->updated_at))}}</center></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
         </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="col-md-12">
                 <h4>Dashboard Daftar Belanja</h4>
                <div class="box box-warning">
                    <div class="box-header">
                    <p>
                        <a href="{{url('purchase_order')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-forward"></i>Selengkapnya...</a>
                    </p>
                 </div>
                <div class="box-body">
                    <div class="table table-stripped">
                        <table class="table">
                            <thead>
                                    <th> Document Number </th>
                                    <th> Supplier </th>
                                    <th> Jenis Barang </th>
                                    <th> Grand Total </th>
                                    <th> Status </th>
                                    <th> Tanggal Dibuat </th>
                            </thead>
                            <tbody>
                            <tr>
                                    <td>{{$dt->document_number}}</td>
                                    <td>{{$dt->suppliers->nama}}</td>
                                    <td>{{$dt->lines_count}}</td>
                                    <td>Rp. {{ number_format($dt->grand_total(),0) }}</td>

                                    @if($dt->status==1)
                                        <td>
                                        <label class="label label-warning">{{$dt->statuses->nama}}</label>
                                        </td>
                                    @else
                                        <td>
                                        <label class="label label-success">{{$dt->statuses->nama}}</label>
                                        </td>
                                    @endif
                                
                                    <td>{{date('d M Y',strtotime($dt->created_at))}}</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
         </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="col-md-12">
                 <h4>Dashboard Verifikasi Belanja</h4>
                <div class="box box-warning">
                    <div class="box-header">
                    <p>
                        <a href="{{url('goods_receipts')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-forward"></i>Selengkapnya...</a>
                    </p>
                 </div>
                <div class="box-body">
                    <div class="table table-stripped">
                        <table class="table">
                            <thead>
                                <th>Nomor Dokumen</th>
                                <th>Total Barang</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Tanggal dibuat</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$data1->document_number}}</td>
                                <td>{{$data1->total_item()}}</td>
                                <td>Rp. {{ number_format($data1->grand_total(),0) }}</td>

                                @if($data1->status==1)
                                <td>
                                    <label class="label label-warning">{{$data1->statuss->nama}}</label>
                                </td>
                                @else
                                <td>
                                    <label class="label label-success">{{$data1->statuss->nama}}</label>
                                </td>
                                @endif
                                <td>{{date('d M Y',strtotime($data1->created_at))}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
         </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="col-md-12">
                 <h4>Dashboard Pengeluaran Barang</h4>
                <div class="box box-warning">
                    <div class="box-header">
                    <p>
                        <a href="{{url('pengeluaran')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-forward"></i>Selengkapnya...</a>
                    </p>
                 </div>
                <div class="box-body">
                    <div class="table table-stripped">
                        <table class="table">
                            <thead>
                                <th>Nomor Struk</th>
                                <th>Grand Total</th>
                                <th>Tanggal</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$data2->no_struk}}</td>
                                <td>Rp. {{ number_format($data2->grand_total,0) }}</td>
                                <td>{{date('d M Y H:i:s',strtotime($data2->created_at))}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
         </div>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection