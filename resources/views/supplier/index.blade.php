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
                        <a href="{{url('supplier')}}" class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</a>
                        <a href="{{url('supplier/tambah')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Supplier</a>
                    </p>
                 </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table myTable">
                            <thead>
                                <th><center>No.</center></th>
                                <th><center>Nama Supplier</center></th>
                                <th><center>Alamat</center></th>
                                <th><center>Nomor Telepon</center></th>
                                <th><center>Tanggal dibuat</center></th>
                                <th><center>Tanggal diubah</center></th>
                                <th><center>Action</center></th>
                            </thead>
                            <tbody>
                                @foreach($data as $e=>$supplier)
                                <tr>
                                    <td><center>{{$e+1}}</center></td>
                                    <td><center>{{$supplier->nama}}</center></td>
                                    <td><center>{{$supplier->alamat}}</center></td>
                                    <td><center>{{$supplier->telepon}}</center></td>
                                    <td><center>{{date('d M Y H:i:s',strtotime($supplier->created_at))}}</center></td>
                                    <td><center>{{date('d M Y H:i:s',strtotime($supplier->updated_at))}}</center></td>
                                    <td>
                                    <center>
                                        <a href="{{url('supplier/'.$supplier->id) }}" class="btn btn-warning" id="edit">Edit</a> 

                                        {!! Form::open(['url' => 'supplier/'. $supplier->id,  'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('HAPUS', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
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