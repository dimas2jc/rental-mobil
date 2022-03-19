<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice {{ $id }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        @page {
            margin: 10px !important;
            padding: 5px !important;
        }
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:12;
        }
        .container1{
            padding:10px;
            margin:5px;
            height:auto;
            width: 100%;
        }
        .tabel1{
            padding:10px;
            margin:5px;
            float: left;
            width: 49%;
            padding:10px;
            height: auto;
            border:1px solid #333;
        }
        .tabel2{
            padding:10px;
            margin:5px;
            float: left;
            width: 49%;
            padding:10px;
            height: 182px;
            border:1px solid #333;
        }
        .container2{
            padding:10px;
            margin:5px;
            height:auto;
            border:1px solid #333;
        }
        .container3{
            padding:10px;
            margin:5px;
            height:auto;
            width: 50%;
        }
        .container4{
            padding:10px;
            margin:5px;
            height:120px;
            border:1px solid #333;
            width: 20%;
            text-align:center;
        }
        .container3{
            padding:10px;
            margin:5px;
            height:auto;
            border:1px solid #333;
            width: 30%;
        }
        .header{
            margin:5px;
            margin-top:0px;
            padding:0px;
            height:auto;
        }
        caption{
            font-size:16px;
            margin-bottom:15px;
        }
        table{
            margin:0px;
            width: 100%;
        }
        tr, th{
            padding-right:3px;
            padding:5px;
            width: 50px;
        }
        .border{
            border:1px solid #333;
        }
        th{
            font-size:17px;
            width: 98%;
            margin:10px;
        }
        .gambar{
            width: auto;
            height: auto;
        }
        .bg{
            background-color: #E5E4E2;
        }
        span{
            margin:5px;
            font-size:10px;
        }
        h4,p{
            margin:0px;
            font-size:12px;
        }
        td{
            padding-left:3px;
            padding-right:3px;
            padding:5px;
            font-size:10px;
        }
        p.mix {
			border-style: dotted dashed solid double;
		}
        #total{
            font-size:25px;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .column1{
            float: left;
            width: 41%;
            padding:10px;
            height: 30%;
            margin:5px;
            border:1px solid #333;
        }
        .column2{
            float: left;
            width: 20%;
            height: 30%;
            padding:10px;
            margin:5px;
            border:1px solid #333;
        }
        .column3{
            float: left;
            width: 30%;
            height: 30%;
            padding:10px;
            margin:5px;
            border:1px solid #333;
        }
    </style>
</head>

        <body>
            <div class="header">
                <table>
                    <tr>
                        <td width="140px">
                            <img src="assets/media/image/logo_invoice.jpg" style="width: 150px; height: 70px;">
                        </td>
                        <td>
                            <h4 style="font-size: 15px;">{{ $data['company']->name_company }}</h4>
                            <p style="font-size: 15px;">{{ $data['company']->address_company }}</p>
                            <p style="font-size: 15px;">Phone : {{ $data['company']->phone_company }}</p>
                            <p style="font-size: 15px;">Email : {{ $data['company']->email_company }}</p>
                        </td>
                        <td width="100px">
                            <h4 style="font-size: 30px; padding-right:20px;">INVOICE</h4>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="row">
                <table class="tabel1">
                    <td>
                        <tr>
                        <td style="font-size: 15px; width:50px;"><b>Booking</b></td>
                        <td style="font-size: 15px; width:10px;">:</td>
                        <td style="font-size: 15px;">{{ $data['data']->id_booking }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 15px; width:50px;"><b>No Invoice</b></td>
                        <td style="font-size: 15px; width:10px;">:</td>
                        <td style="font-size: 15px;">{{ $data['data']->id_payment }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 15px; width:50px;"><b>Customer</b></td>
                        <td style="font-size: 15px; width:10px;">:</td>
                        <td style="font-size: 15px;">{{ $data['data']->name_customer }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 15px; width:50px;"><b>Tanggal</b></td>
                        <td style="font-size: 15px; width:10px;">:</td>
                        <td style="font-size: 15px;">{{ $data['data']->date_finish }}</p></td>
                    </tr><tr>
                        <td style="font-size: 15px; width:50px;"><b></b></td>
                        <td style="font-size: 15px; width:10px;"></td>
                        <td style="font-size: 15px;">(Tanggal Kendaraan Kembali)</p></td>
                    </tr>
                </table>

                <table class="tabel2">
                    <td>
                        <tr>
                        <td style="font-size: 15px; width:50px;"><b>Service</b></td>
                        <td style="font-size: 15px; width:10px;">:</td>
                        <td style="font-size: 15px;">{{ $data['data']->name_service }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 15px; width:50px;"><b>Sales</b></td>
                        <td style="font-size: 15px; width:10px;">:</td>
                        <td style="font-size: 15px;">{{ $data['data']->name_sales }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 15px; width:50px;"><b>Driver</b></td>
                        <td style="font-size: 15px; width:10px;">:</td>
                        <td style="font-size: 15px;">{{ $data['data']->name_employess }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 15px; width:50px;"><b>Description</b></td>
                        <td style="font-size: 15px; width:10px;">:</td>
                        <td style="font-size: 15px;">{{ $data['data']->description }}</p></td>
                    </tr>
                </table>
            </div>

            <div class="container2">
                <table>
                   <thead>
                        <tr>
                            <th style="font-size: 20px">Keterangan</th>
                            <th style="font-size: 20px">Harga</th>
                        </tr>
                   </thead>
                   <tbody>
                       <tr>
                            <td style="font-size: 17px">
                                <table>
                                    <tr>
                                        <td style="font-size: 15px; width:100px;"><b>Type</b></td>
                                        <td style="font-size: 15px; width:10px;">:</td>
                                        <td style="font-size: 15px;">{{ $data['data']->type_unit }}</td>
                                        <td style="font-size: 15px; width:100px;"><b>Tahun</b></td>
                                        <td style="font-size: 15px; width:10px;">:</td>
                                        <td style="font-size: 15px;">{{ $data['data']->tahun_pembuatan }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 15px; width:100px;"><b>No. Polisi</b></td>
                                        <td style="font-size: 15px; width:10px;">:</td>
                                        <td style="font-size: 15px;">{{ $data['data']->nopol }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 15px; width:100px;"><b>Ambil</b></td>
                                        <td style="font-size: 15px; width:10px;">:</td>
                                        <td style="font-size: 15px;">{{ $data['data']->date_start }}</td>
                                        <td style="font-size: 15px; width:100px;"><b>Kembali</b></td>
                                        <td style="font-size: 15px; width:10px;">:</td>
                                        <td style="font-size: 15px; width:100px;">{{ $data['data']->date_finish }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 15px; width:100px;"><b>Charge</b></td>
                                        <td style="font-size: 15px; width:10px;">:</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 15px; width:100px;"></td>
                                        <td style="font-size: 15px; width:10px;"></td>
                                        <td>
                                            <table border="0px">
                                                <tr>
                                                    <td style="font-size: 15px; width:100px;"><b>Keterangan</b></td>
                                                    <td style="font-size: 15px; width:100px;"><b>Biaya</b></td>
                                                </tr>
                                                <?php $total=0; ?>
                                                @foreach($charge as $c)
                                                <tr>
                                                    <td style="font-size: 15px; width:100px;">
                                                        @if($c->name_charge != null)
                                                            {{ $c->name_charge }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td style="font-size: 15px; width:100px;"> 
                                                        @if($c->price_charge != null)
                                                        Rp. {{ number_format(floatval($c->price_charge)) }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                                <?php $total += $c->price_charge ?>
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="font-size: 25px; text-align:right;">Rp. {{ number_format(floatval($data['data']->price_user)) }}</td>
                       </tr>
                       <tr>
                           <td></td>
                            <td style="font-size: 25px; text-align:right;">Rp. {{ number_format(floatval($total)) }}</td>
                        </tr>
                   </tbody>
                </table>
            </div>

            <div class="container2" style="text-align:right;">
                <p id="total"><b>Total</b>: Rp. {{ number_format(floatval($data['data']->price_user + $total)) }}</p>
            </div><br><br>

            <div class="row">
                <div class="column1">
                    Keterangan
                </div>
                <div class="column2">
                    <center>Diterima Oleh</center>
                </div>
                <div class="column3">
                    <center>
                        {{ $data['company']->name_company }}<br>
                        Kantor Pusat
                    </center>
                </div>
            </div>
        </body>


</html>
