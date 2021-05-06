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
                            <a class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</a>
                            <a href="{{url('purchase_order')}}" class="btn btn-sm btn-flat btn-primary btn-backward"><i class="fa fa-backward"></i> Kembali</a>
                            @if($data->status==2)
                            <a target="_blank" href="{{url('purchase_order/pdf/'.$data->id)}}" class="btn btn-sm btn-flat btn-success btn-print"><i class="fa fa-print"></i> Cetak ke PDF</a>
                            @else
                            @endif
                        </p>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Document Number</th>
                                        <td>:</td>
                                        <td>{{$data->document_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Supplier</th>
                                        <td>:</td>
                                        <td>{{$data->suppliers->nama}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>:</td>
                                        @if($data->status==1)
                                            <td>
                                            <label class="label label-warning">{{$data->statuses->nama}}</label>
                                            </td>
                                        @else
                                            <td>
                                            <label class="label label-success">{{$data->statuses->nama}}</label>
                                            </td>
                                         @endif
                                    </tr>
                                    <tr>
                                        <th>Dibuat</th>
                                        <td>:</td>
                                        <td>{{date('d M Y',strtotime($data->created_at))}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="{{url('/purchase_order/'.$data->id)}}">
                            @csrf
                            {{method_field("PUT")}}
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Grand Total</th>
                                    <!--<th>Hapus</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $total_qty=0;
                                    $total_buy=0;
                                    $total=0;
                                ?>
                                @foreach($data->lines as $ln)
                                <?php
                                    $total_qty+=$ln->qty;
                                    $total_buy+=$ln->buy;
                                    $total+=$ln->grand_total;
                                ?>
                                <tr>
                                    <td>{{$ln->produks->nama}}</td>
                                    @if($data->status==1)
                                    <td>
                                        <input type="number" class="form-control" name="qty[]" value="{{$ln->qty}}">
                                        <input type="hidden" name="id_line[]" value="{{$ln->id}}">
                                        <input type="hidden" name="produk[]" value="{{$ln->produk}}">
                                    </td>
                                    @else
                                        <td>{{$ln->qty}}</td>
                                    @endif

                                    @if($data->status==1)
                                    <td>
                                    <input type="number" class="form-control" name="buy[]" value="{{$ln->buy}}">
                                    </td>
                                    @else
                                        <td>Rp. {{number_format($ln->buy)}}</td>
                                    @endif
                                    <td>Rp. {{ number_format($ln->grand_total,0) }}</td>
                                    <td>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><b><i>Jumlah Seluruhnya</i></b></th>
                                    <th><b><i>{{$total_qty,0}} Barang</i></b></th>
                                    <th><b><i>Rp. {{number_format($total_buy,0)}}</i></b></th>
                                    <th><b><i>Rp. {{ number_format($data->grand_total(),0) }}</i></b></th>
                                </tr>                  
                            </tfoot>
                            </table>
                            @if($data->status==1)
                            <div>
                                <button type="submit" class="btn btn-block btn-primary">Update Data</button>
                            </div>
                            @else

                            @endif
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