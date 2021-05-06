@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
            <form role="form" method="post" action="{{url('/update_penanggung_jawab')}}">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" name='nama' class="form-control" id="exampleInputEmail1" placeholder="Masukkan Penanggung Jawab Disini" required value="{{$data->nama}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomor Telepon</label>
                  <input type="text" name='no_telp' class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Telepon Penanggung Jawab Disini" required value="{{$data->no_telp}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <textarea class="form-control" rows="10" name=alamat placeholder="Masukkan Alamat Penanggung Jawab Disini" required >{{$data->alamat}}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name='email' class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email Penanggung Jawab Disini" required value="{{$data->email}}">
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Data</button>
              </div>
            </form>
            <h5><i>Perubahan Terakhir : {{date('d M Y H:i:s',strtotime($data->created_at))}}</i></h5>
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