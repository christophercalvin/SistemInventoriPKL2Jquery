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
                    </p>
                 </div>
                 <?php
                    $stock=\DB::select('SELECT * from produks where stock < minimal_stock');
                ?>
                <div class="box-body">
                    <div class="table table-stripped">
                        <table class="table">
                            <thead>
                                <th><center>No</center></th>
                                <th><center>Notifikasi</center></th>
                                <th><center>Stock Saat Ini</center></th>
                                <th><center>Stock Minimal</center></th>
                                <th><center>Action</center></th>
                            </thead>
                            <tbody>
                                @foreach($stock as $e=>$produk)
                                <tr>
                                    <td><center>{{$e+1}}</center></td>
                                    <td><center>{{$produk->nama}} kurang dari stock minimal klik action untuk info lebih lanjut</center></td>

                                    @if ($produk->stock < $produk->minimal_stock)
                                    <td><font color="red"><center><b>{{number_format($produk->stock)}}<b></center></font></td>
                                    @else
                                    <td><center>{{number_format($produk->stock)}}</center></td>
                                    @endif

                                    <td><center>{{number_format($produk->minimal_stock)}}</center></td>
                                    <td>
                                    <center>
                                        <a href="{{url('produk/detail/'.$produk->id) }}" class="btn btn-primary btn-xs btn-eye" id="detail"><i class="fa fa-eye"></i></a> 
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