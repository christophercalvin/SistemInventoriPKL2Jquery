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
                        <a href="{{url('supplier/tambah')}}" class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</a>
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
                <form role="form" method="post" action="{{url('supplier/'.$data->id)}}">
                @csrf
                {{method_field("PUT")}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputNama">Nama Supplier/Toko</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputNama" placeholder="ex: Toko Sejahtera" value="{{$data->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAlamat">Alamat Supplier/Toko</label>
                            <textarea class="form-control" name="alamat" rows='5' >{{$data->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTelepon">Telepon</label>
                            <input type="number" name="telepon" class="form-control" id="exampleInputTelepon" placeholder="ex: 081873783278" value="{{$data->telepon}}">
                        </div>
                    </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
              <a href = "{{url('supplier')}}" class="btn btn-danger">Batal</a>
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