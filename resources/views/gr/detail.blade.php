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
               <div class="row">
                    <div class="col-md-6">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th> Nomor Dokumen</th>
                                    <td> : </td>
                                    <td> {{$dt->document_number}}</th>              
                                </tr>
                                <tr>
                                    <th> Nomor Dokumen Purchase Order</th>
                                    <td> : </td>
                                    <td> {{$dt->purchase_orders->document_number}}</th>  
                                </tr>
                                <tr>
                                    <th> Status :</th>
                                    <td> : </td>
                                    @if($dt->status==1)
                                    <td>
                                        <label class="label label-warning">{{$dt->statuss->nama}}</label>
                                    </td>
                                    @else
                                    <td>
                                        <label class="label label-success">{{$dt->statuss->nama}}</label>
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th> Tanggal Dibuat</th>
                                    <td> : </td>
                                    <td> {{date('d M Y',strtotime($dt->created_at))}}</th>  
                                </tr>
                            </tbody>
                        </table>
                    </div>
               </div>

                <div class="row">
                    <div class="col md-12">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Grand Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dt->purchase_orders->lines as $ln)
                                <tr>
                                    <td>{{$ln->produks->nama}}</td>
                                    <td>{{$ln->qty}}</td>
                                    <td>Rp. {{ number_format($ln->produks->harga) }}</td>
                                    <td>Rp. {{ number_format($ln->grand_total) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>
                                        <b><i>Total</i></b>
                                    </th>
                                    <th><i>Rp. {{ number_format($ln->sum_buy(),0) }}</i></th>
                                    <th><i>Rp. {{ number_format($ln->sum_grand_total(),0) }}</i></th>
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