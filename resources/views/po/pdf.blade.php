<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 
    <link rel="stylesheet" href="{{('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
 
   
   
</head>
<body>
    <div class="row">
        <div class="col-xs-12">
            <h3>
                <center>
                <b>Daftar Belanja di {{$dt->suppliers->nama}}</b>
                </center>
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="table table-stripped">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{$pj->nama}}</td>

                        <th>Nama Toko</th>
                        <td>:</td>
                        <td>{{$dt->suppliers->nama}}</td>     

                    </tr>
                    <tr>

                        <th>Alamat Pengiriman</th>
                        <td>:</td>
                        <td>{{$pj->alamat}}</td>

                        <th>Alamat Toko</th>
                        <td>:</td>
                        <td>{{$dt->suppliers->alamat}}</td>
                    </tr>
                    <tr>

                        <th>No. Telepon</th>
                        <td>:</td>
                        <td>{{$pj->no_telp}}</td>

                        <th>Telepon</th>
                        <td>:</td>
                        <td>{{$dt->suppliers->telepon}}</td>
                    </tr>
                    <tr>

                        <th>Nomor Dokumen Belanja</th>
                        <td>:</td>
                        <td>{{$dt->document_number}}</td>

                        <th>Status Dokumen</th>
                        <td>:</td>
                        <td>{{$dt->statuses->nama}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Estimasi Harga</th>
                        <th>Estimasi Grand Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $tot_qty=0;
                        $tot_buy=0;
                        $tot_grand_total=0;
                    ?>
                    @foreach($dt->lines as $e=>$ln)
                    <tr>
                        <td>{{$e+1}}</td>
                        <td>{{$ln->produks->nama}}</td>
                        <td>{{$ln->qty}}</td>
                        <td>Rp. {{ number_format($ln->buy,0) }}</td>
                        <td>Rp. {{ number_format($ln->grand_total,0) }}</td>
                    </tr>
                    <?php
                        $tot_qty+=$ln->qty;
                        $tot_buy+=$ln->buy;
                        $tot_grand_total+=$ln->grand_total;
                    ?>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>
                            <b>
                                <i>Total</i>
                            </b>
                        </th>
                        <th>
                            <b>
                                <i>{{$tot_qty}}</i>
                            </b>
                        </th>
                        <th>
                            <b>
                                <i>Rp. {{ number_format($tot_grand_total,0) }}</i>
                            </b>
                        </th>
                        <th>
                            <b>
                                <i>Rp. {{ number_format($tot_grand_total,0) }}</i>
                            </b>
                        </th>
                </tfoot>
            </table>
            <i>Perhatian : harga produk dan grand total adalah harga pada pembelian sebelumnya, jika terjadi perubahan silahkan ubah pada dokumen GR</i>
        </div>
    </div>
    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-xs-4">
            <center>
                <p>Menyetujui</p>
                <br>
                <br>
                <br>
                ________________
                <br>
                <b>{{$pj->nama}}</b.
            </center>
        </div>
    </div>
    
   
</body>
</html>