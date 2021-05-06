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
                            <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                        </p>
                    </div>
                    <div class="box-body">

                        <input type="hidden" name="grand_total" value="0"></input>
                        <div class="col-md-6">
                            <form role="form">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cari dan Tambahkan Produk</label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" >
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <form method="post" action="{{url('/pengeluaran')}}">
                        @csrf
                        <div class="col-md-12">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="produk-ajax">
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                        </div>
                        </form>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <table class="table table-stripped">
                                <tbody>
                                    <tr>
                                        <th>Total Seluruhnya</th>
                                        <td>:</td>
                                        <td class="grand_total">

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> -->
                    </div>
                </div>
            </div>
         </div>
        </div>
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){

        $("input[name='nama']").focus();

        $("input[name='nama']").keypress(function(e){
            if(e.which==13){
                e.preventDefault();
                var nama=$(this).val();
                var url="{{url('/produk/ajax')}}"+'/'+nama;
                var _this=$(this);

                $.ajax({
                    type:'get',
                    dataType:'json',
                    url:url,
                    success:function(data){
                        console.log(data);

                        _this.val('');

                        var nilai='';

                        nilai+='<tr>';

                        nilai+='<td>';
                        nilai+= data.data.kode;
                        nilai+= '<input type="hidden" class="form-control" name="produk[]" value="'+data.data.id+'" ></input>';
                        nilai+='</td>';

                        nilai+='<td>';
                        nilai+= data.data.nama;
                        nilai+='</td>';

                        nilai+='<td>';
                        nilai+= '<input type="number" class="form-control" name="qty[]" value="1" min="1" max="'+data.data.stock+'"></input>';
                        nilai+='</td>';

                        nilai+='<td class="harga">';
                        nilai+= data.data.harga;
                        nilai+= '<input type="hidden" class="form-control" name="harga[]" value="'+data.data.harga+'" ></input>';
                        nilai+='</td>';

                        nilai+='<td>';
                        nilai+= '<button class="btn btn-xs btn-danger hapus"><i class= "fa fa-trash"></i></button>';
                        nilai+='</td>';

                        nilai+='</tr>';

                        var total=parseInt($("input[name='grand_total']").val());
                        total+=data.data.harga;

                        $("input[name='grand_total']").val(total);

                        $('.produk-ajax').append(nilai);
                    }
                })
            }
        })

        $("button[type='submit']").click(function(e){
            var grand_total=parseInt($("input[name='grand_total']").val());
            //alert(grand_total);
        })

        $('body').on('click','.hapus', function(e){
            e.preventDefault();
            $(this).closest('tr').remove();
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