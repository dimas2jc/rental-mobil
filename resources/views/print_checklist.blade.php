<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checklist {{ $id }}</title>
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
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            }
        hr{
            margin-top:0px;
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
                <table style="border:0px;">
                    <tr>
                        <td width="140px" style="border:0px;">
                            <img src="assets/media/image/logo_invoice.jpg" style="width: 150px; height: 70px;">
                        </td>
                        <td style="border:0px;">
                            <h4 style="font-size: 15px;">Asmoro</h4>
                            <p style="font-size: 15px;">Jl. Mawar 20, Surabaya</p>
                            <p style="font-size: 15px;">Phone : 876655</p>
                            <p style="font-size: 15px;">Email :  asmoro@gmail.com</p>
                        </td>
                        <td width="100px" style="border:0px;">
                            <h4 style="font-size: 30px; padding-right:20px;">NO :</h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center; border:0px;">
                            <h1><b>RENTAL MOBIL</b></h1>
                            <h2>RENT CAR - CITYTOUR - PRIVATE TRIP - RENT BUS</h2>
                        </td>
                    </tr>
                </table>
                <hr />
                <hr size="4">
            </div>

            <h5>LEMBAR CHECKLIST</h5>
            <table >
                <tr>
                    <td colspan=2 style="font-size: 15px; text-align: center;"><b>Data Customer</b></td>
                    <td colspan=2 style="font-size: 15px; text-align: center;"><b>Data Unit</b></td>
                </tr>
                <tr >
                    <td rowspan="2" style="font-size: 12px; width:100px;">Nama</td>
                    <td rowspan="2" style="font-size: 12px; width:280px;"></td> 
                    <td style="font-size: 12px; width:100px;">Driver</td>
                    <td style="font-size: 12px;"></td>                
                </tr>
                <tr>
                    <td style="font-size: 12px;">Merek</td>
                    <td style="font-size: 12px;"></td>                
                </tr>
                <tr>
                    <td style="font-size: 12px;" rowspan="3" >Alamat</td>
                    <td style="font-size: 12px;" rowspan="3"></td> 
                    <td style="font-size: 12px;">No. Pol</td>
                    <td style="font-size: 12px;"></td>                
                </tr>
                <tr>
                    <td style="font-size: 12px;">Type</td>
                    <td style="font-size: 12px;"></td>                
                </tr>
                <tr>
                    <td style="font-size: 12px;">Warna</td>
                    <td style="font-size: 12px;"></td>                
                </tr>
                <tr>
                    <td style="font-size: 12px;" rowspan="2">Telp/HP</td>
                    <td style="font-size: 12px;" rowspan="2"></td> 
                    <td style="font-size: 12px;">Lama Sewa</td>
                    <td style="font-size: 12px;"></td>                
                </tr>
                <tr>
                    <td style="font-size: 12px;">Harga</td>
                    <td style="font-size: 12px;"></td>                
                </tr>
                <tr>
                    <td style="font-size: 12px;" rowspan="2">No KTP</td>
                    <td style="font-size: 12px;" rowspan="2"></td> 
                    <td style="font-size: 12px;">Tanggal Keluar</td>
                    <td style="font-size: 12px;"></td>                
                </tr>
                <tr>
                    <td style="font-size: 12px;">Tanggal Masuk</td>
                    <td style="font-size: 12px;"></td>                
                </tr>
                <tr>
                    <td style="font-size: 12px;" rowspan="2">Jaminan</td>
                    <td style="font-size: 12px;" rowspan="2"></td> 
                    <td style="font-size: 12px;">Overtime</td>
                    <td style="font-size: 12px;"></td>                
                </tr>
                <tr>
                    <td style="font-size: 12px;">Denda</td>
                    <td style="font-size: 12px;"></td>                
                </tr>
                <tr>
                    <td style="font-size: 15px;" colspan="2"><b>Sewa Unit :
                    <table style="border:0px;  width:100%;">
                        <td style="font-size: 15px; border:0px; width:50px;">  </td>
                        <td style="font-size: 15px;  width:10px;"> 1 </td>
                        <td style="font-size: 15px; border:0px; width:10px;"> Day </td>
                        <td style="font-size: 15px; width:10px;"> 10 </td>
                        <td style="font-size: 15px; border:0px; width:10px;"> Jam</td>
                    </table>
                    </b></td>
                    <td style="font-size: 15px;" colspan="2"><b>Total : </b></td>
                </tr>
            </table>

            <h3>KEWAJIBAN PENYEWA</h3>
            
            <table style="border:0px;">
                <tr>
                    <td width="10px" style="font-size: 12px; border:0px;">1</td>
                    <td style="font-size: 12px; border:0px;">Tidak menjadikan mobil sebagai jaminan / anggunan dari pihak lain / bank yang bertentangan dengan hukum </td>
                </tr>
                <tr>
                    <td width="10px" style="font-size: 12px; border:0px;">2</td>
                    <td style="font-size: 12px; border:0px;">Selama pemakaian penyewa berkewajiban merawat dengan baik dan menggunakan kendaraan dengan baik dan benar</td>
                </tr>
                <tr>
                    <td width="10px" style="font-size: 12px; border:0px;">3</td>
                    <td style="font-size: 12px; border:0px;">Pihak rental tidak bertanggung jawab terhadap segala tinfakan / perbuatan dari seluruh akibat yang ditimbulkan oleh pihak penyewa sehubung dengan pemakaian kendaraan</td>
                </tr>
                <tr>
                    <td width="10px" style="font-size: 12px; border:0px;">4</td>
                    <td style="font-size: 12px; border:0px;">Pihak penyewa menanggung biaya resiko sendiri atas kerusakan dan apabila terjadi kecelakaan ditambahakan sewa harian / bulanan selama mobil dalam perbaikan</td>
                </tr>
                <tr>
                    <td width="10px" style="font-size: 12px; border:0px;">5</td>
                    <td style="font-size: 12px; border:0px;">Pihak penyewa bertanggung jawab atas sanksi/ denda terhadap pelanggaran lalu lintas</td>
                </tr>
                <tr>
                    <td width="10px" style="font-size: 12px; border:0px;">6</td>
                    <td style="font-size: 12px; border:0px;">Tidak mengubah bentuk asli/ menambah / memindahkan perlengkapan kendaraan tanpa izin</td>
                </tr>
                <tr>
                    <td width="10px" style="font-size: 12px; border:0px;">7</td>
                    <td style="font-size: 12px; border:0px;">Pihak penyewa berkewajiban mengganti atas kehilangan kelengkapan kendaraan yang hilang atau rusak</td>
                </tr>
                <tr>
                    <td width="10px" style="font-size: 12px; border:0px;">8</td>
                    <td style="font-size: 12px; border:0px;">Pihak rental berhak menyetujui / menolak pembatalan order tanpa memberikan alasan apapun</td>
                </tr>
                <tr>
                    <td width="10px" style="font-size: 12px; border:0px;">9</td>
                    <td style="font-size: 12px; border:0px;">Mengganti BAN pecah dan AKI yang rusak sewaktu pemakaian / sewa berjalan</td>
                </tr>
                <tr>
                    <td width="10px" style="font-size: 12px; border:0px;">10</td>
                    <td style="font-size: 12px; border:0px;">Biaya klaim mobil hilang, total ditanggung penyewa</td>
                </tr>
            </table>
            
            <h5>ASURANSI : YA /TIDAK</h5>
            <table>
                <tr >
                    <td height="60px">BBM : </td>
                    <td>RENTAL : </td>
                    <td>PENYEWA : </td>
                </tr>
            </table>
            
        </body>
        


</html>