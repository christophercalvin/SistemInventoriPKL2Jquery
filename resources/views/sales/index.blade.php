@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <button class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa fa-filter"></i> Filter Tanggal</button>
                    <a href="{{url('/sales')}}" class="btn btn-sm btn-flat btn-danger btn-remove"><i class="fa fa-remove"></i> Reset</a>
                </p>
            </div>
            <div class="box-body">
            <div class="box-body">
              <div class="table table-stripped">
                <table class="table myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Struk</th>
                            <th>Grand Total</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{{$dt->no_struk}}</td>
                                    <td>Rp. {{ number_format($dt->grand_total,0) }}</td>
                                    <td>{{date('d M Y H:i:s',strtotime($dt->created_at))}}</td>
                                    <td>
                                         <a href="{{url('sales/'.$dt->id)}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                </th>
                                <th>
                                    <b><i>Total</b></i>
                                </th>
                                <th>
                                    <b><i>Rp. {{ number_format($dt->total_grand_total($awal, $akhir),0) }}</b></i>
                                </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                  </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal filter -->

<div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
  <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
    <div class="modal-content bg-gradient-danger">
 
      <div class="modal-header">
        <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
 
      <div class="modal-body">
 
        <form role="form" method="get" action="{{url('sales/filter')}}">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Dari</label>
              <input type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Dari" autocomplete="off" name="awal" value="{{$awal}}" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Sampai</label>
              <input type="text" name="akhir" class="form-control datepicker" id="exampleInputPassword1" placeholder="Sampai" autocomplete="off" value="{{$akhir}}" required>
            </div>
          </div>
          <!-- /.box-body -->
 
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
 
      </div>
 
    </div>
  </div>
</div>



@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){

        $('.btn-filter').click(function(e){
            e.preventDefault();
            $('#modal-filter').modal();

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