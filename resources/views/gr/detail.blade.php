@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{url('goods_receipts')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>

                    @if($dt->status==1)
                    <button class="btn btn-sm btn-flat btn-success btn-approved"><i class="fa fa-check-circle-o"></i> Setujui Dokumen Ini</button>
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

<!-- Modal Approved -->

<div class="modal fade" id="modal-approved" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
 
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
 
          <div class="modal-body">
 
            <div class="py-3 text-center">
              <i class="ni ni-bell-55 ni-3x"></i>
              <h4 class="heading mt-4">Apakah kamu yakin ingin menyetujui dokumen ini?</h4>
            </div>
 
          </div>
 
          <div class="modal-footer">
            <form action="{{ url('/goods_receipt/'.$dt->id) }}" method="post">
              {{ csrf_field() }}
              <p>
              <button type="submit" class="btn btn-primary btn-flat btn-sm menu-sidebar">Ok, Setujui</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Batal</button>
              </p>
            </form>
          </div>
 
        </div>
      </div>
    </div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){

        $('.btn-approved').click(function(){
            $('#modal-approved').modal();
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