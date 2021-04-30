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
                        <a href = "{{url('produk')}}" class="btn btn-danger">Batal</a>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}<li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form role="form" method="post" action="{{url('/purchase_order/tambah')}}">
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <label for="exampleInputDocuemnt">Document Number</label>
                            <input type="text" name="document_number" class="form-control" id="exampleInputDocument" placeholder="Dokumen Number" value="{{$docno}}">
                        </div>

                        @if(isset($id_supplier))
                        <div class="form-group">
                            <label for="exampleInputPassword1">Supplier</label>
                            <select class="form-control select2" name="supplier">
                                <option selected="" disabled="">Pilih Supplier</option>
                                @foreach($supplier as $sp)
                                <option value="{{$sp->id}}" {{($id_supplier==$sp->id)? 'selected':''}}>{{$sp->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="exampleInputPassword1">Supplier</label>
                            <select class="form-control select2" name="supplier">
                                <option selected="" disabled="">Pilih Supplier</option>
                                @foreach($supplier as $sp)
                                <option value="{{$sp->id}}">{{$sp->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                    </div>


                @if(isset($produk))
                <div class="row">
                    <div class="col-md-12">
                        <table class="table myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produk as $e)
                                <tr>
                                    <td>{{$e->id}}</td>
                                    <td>{{$e->nama}}</td>
                                    <td>Rp {{number_format($e->harga,0)}}</td>
                                    <td>
                                        <input type="hidden" name="produk[]" value="{{$e->id}}">
                                        <input type="number" value="0" class="form-control" name="qty[]">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-block">Tambah Data</button>
                        </div>
                    </form>
                    </div>
                </div>
                @endif
                    </div>

                </div>
            </div>
         </div>
        </div>
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){

        $("select[name='supplier']").change(function(e){
            var id_supplier=$(this).val();
            var url="{{url('purchase_order/produk')}}"+'/'+id_supplier;

            window.location.href=url;
        })
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection