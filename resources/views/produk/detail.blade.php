@extends('items.master')
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="col-md-12">
                 <h4>{{ $title }}</h4>
                <div class="box box-warning">
                    <div class="box-header">
                    <p>
                        <a href="{{url('produk/detail/'.$data->id)}}" class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</a>
                        <a href="{{url('produk/')}}" class="btn btn-sm btn-flat btn-primary btn-backward"><i class="fa fa-backward"></i> Kembali</a>
                    </p>
                 </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                 <tr>
                                    <th>Barcode</th>
                                    <td>:</td>
                                    <td>{!! \DNS1D::getBarcodeHTML($data->kode, "I25+")!!}</td>

                                    <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th>Supplier</th>
                                    <td>:</td>
                                    <td>{{$data->supplier_r->nama}}</td>

                                    <th>Nama Produk</th>
                                    <td>:</td>
                                    <td>{{$data->nama}}</td>
                                </tr>

                                <tr>
                                    <th>Stock Saat Ini</th>
                                    <td>:</td>
                                    @if ($data->stock < $data->minimal_stock)
                                    <td><font color="red"><b>{{number_format($data->stock)}}<b></font></td>
                                    @else
                                    <td>{{number_format($data->stock)}}</td>
                                    @endif

                                    <th>Stock Minimal</th>
                                    <td>:</td>
                                    <td>{{number_format($data->minimal_stock)}}</td>
                                </tr>

                                <tr>
                                    <th>Kode Produk</th>
                                    <td>:</td>
                                    <td>{{$data->kode}}</td>

                                    <th>Harga</th>
                                    <td>:</td>
                                    <td>Rp. {{number_format($data->harga)}}</td>
                                </tr>

                                <tr>
                                    <th>Dibuat Tanggal</th>
                                    <td>:</td>
                                    <td>{{date('d M Y H:i:s',strtotime($data->created_at))}}</td>

                                    <th>Perubahan terakhir</th>
                                    <td>:</td>
                                    <td>{{date('d M Y H:i:s',strtotime($data->updated_at))}}</td>
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