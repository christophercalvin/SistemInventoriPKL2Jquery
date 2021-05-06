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
               <div class="table-responsive">
                <table class="table myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nomor Dokumen</th>
                            <th>Total Barang</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Tanggal dibuat</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$dt->id}}</td>
                                <td>{{$dt->document_number}}</td>
                                <td>{{$dt->total_item()}}</td>
                                <td>Rp. {{ number_format($dt->grand_total(),0) }}</td>

                                @if($dt->status==1)
                                <td>
                                    <label class="label label-warning">{{$dt->statuss->nama}}</label>
                                </td>
                                @else
                                <td>
                                    <label class="label label-success">{{$dt->statuss->nama}}</label>
                                </td>
                                @endif
                                <td>{{date('d M Y',strtotime($dt->created_at))}}</td>
                                <td>
                                    <a href="{{url('/goods_receipt/'.$dt->id)}}" class="btn btn-xs btn-primary">
                                    <i class="fa fa-eye"></i>
                                    </a>
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