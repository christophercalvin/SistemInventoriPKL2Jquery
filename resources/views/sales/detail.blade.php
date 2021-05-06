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
                        </p>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>No Struk</th>
                                        <td>:</td>
                                        <td>{{$data->no_struk}}</td>
                                    </tr>
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
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Grand Total</th>
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
                                    $total_buy+=$ln->harga;
                                    $total+=$ln->grand_total;
                                ?>
                                <tr>
                                    <td>{{$ln->produks->nama}}</td>
                                    <td>{{number_format($ln->qty)}}</td>
                                    <td>Rp. {{number_format($ln->harga)}}</td>
                                    <td>Rp. {{number_format($ln->grand_total)}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><b><i>Jumlah Seluruhnya</i></b></th>
                                    <th>{{number_format($total_qty,0)}}</th>
                                    <th>Rp. {{number_format($total_buy,0)}}</th>
                                    <th><b><i>Rp. {{number_format($total,0)}}</i></b></th>
                                </tr>                  
                            </tfoot>
                            </table>
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