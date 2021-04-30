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
                        <a href="{{url('produk/tambah')}}" class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</a>
                    </p>
                 </div>
                <div class="box-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}<li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form role="form" method="post" action="{{url('produk/'.$data->id)}}">
                @csrf
                {{method_field("PUT")}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputSupplier">Pilih Supplier</label>
                            <select class="form-control select2" name="supplier">
                                @foreach($supplier as $s)
                                    <option value="{{$s->id}}" {{($data->supplier==$s->id)? 'selected' : '' }}>{{$s->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNamaProduk">Nama Produk</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputNamaProduk" placeholder="ex: Teh Cap Poci" value="{{$data->nama}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputKodeProduk">Kode Produk</label>
                            <input type="text" name="kode" class="form-control" id="exampleInputKodeProduk" value="{{$data->kode}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputStockProduk">Stock Produk</label>
                            <input type="number" name="stock" class="form-control" id="exampleInputStockProduk" placeholder="Stock Produk Saat Ini ex: 13" value="{{$data->stock}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputStockProdukMinimal">Stock Produk Minimal</label>
                            <input type="number" name="minimal_stock" class="form-control" id="exampleInputStockProdukMinimal" placeholder="Set Stock Minimal Agar System Mengingatkan Anda Jika Stok Kurang dari Minimal ex: 1" value="{{$data->minimal_stock}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputHarga">Harga Produk</label>
                            <input type="number" name="harga" class="form-control" id="exampleInputHarga" placeholder="ex: 15000" value="{{$data->harga}}">
                        </div>
                    </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <a href = "{{url('produk')}}" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
            </form>
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