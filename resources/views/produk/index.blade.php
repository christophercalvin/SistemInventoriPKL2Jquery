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
                        <a href="{{url('produk')}}" class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</a>
                        <a href="{{url('produk/tambah')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Produk</a>
                    </p>
                 </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th><center>ID Produk</center></th>
                                <th><center>Nama Produk</center></th>
                                <th><center>Supplier</center></th>
                                <th><center>Kode</center></th>
                                <th><center>Stock Saat Ini</center></th>
                                <th><center>Stock Minimal</center></th>
                                <th><center>Harga Produk</center></th>
                                <th><center>Tanggal Dibuat</center></th>
                                <th><center>Perubahan Terakhir</center></th>
                                <th><center>Action</center></th>
                            </thead>
                            <tbody>
                                @foreach($data as $produk)
                                <tr>
                                    <td><center>{{$produk->id}}</center></td>
                                    <td><center>{{$produk->nama}}</center></td>
                                    <td><center>{{$produk->supplier_r->nama}}</center></td>
                                    <td><center>{{$produk->kode}}</center></td>
                                    <td><center>{{$produk->stock}}</center></td>
                                    <td><center>{{$produk->minimal_stock}}</center></td>
                                    <td><center>Rp {{$produk->harga}}</center></td>
                                    <td><center>{{$produk->created_at}}</center></td>
                                    <td><center>{{$produk->updated_at}}</center></td>
                                    <td>
                                    <center>
                                        <a href="{{url('produk/detail/'.$produk->id) }}" class="btn btn-primary" id="edit">Detail</a> 
                                        <a href="{{url('produk/'.$produk->id) }}" class="btn btn-warning" id="edit">Edit</a> 

                                        <button class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                    </center>
                                    </td>
                                </tr>
                                @endforeach
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