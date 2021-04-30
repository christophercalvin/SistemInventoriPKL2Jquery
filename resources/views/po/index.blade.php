@extends('items.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="col-md-12">
                 <h4>{{ $title }}</h4>
                <div class="box box-warning">
                    <div class="box-header">
                        <p>
                            <a href="{{url('purchase_order')}}" class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</a>
                            <a href="{{url('purchase_order/tambah')}}" class="btn btn-sm btn-flat btn-primary btn-plus"><i class="fa fa-plus"></i> Tambah PO</a>
                        </p>
                    </div>
                    <div class="box-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Document Number </th>
                                    <th> Supplier </th>
                                    <th> Jenis Barang </th>
                                    <th> Grand Total </th>
                                    <th> Status </th>
                                    <th> Tanggal Dibuat </th>
                                    <th> Setujui </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dt)
                                <tr>
                                    <td>{{$dt->id}}</td>
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
                                    <td>
                                         <a href="{{url('purchase_order/approved/'.$dt->id)}}">
                                            <i class="fa fa-check-square-o"></i>
                                        </a>
                                    </td>
                                    <td>
                                         <a href="{{url('purchase_order/'.$dt->id)}}">
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