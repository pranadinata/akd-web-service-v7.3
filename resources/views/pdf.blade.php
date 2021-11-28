<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Akd Claiment</title>
  </head>
  <body>
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <img src="{{ public_path('images/jasa_raharja.jpeg') }}" alt="" style="float:left" width="150" height="100">
                </td>
                <td></td>
                <td></td>
                <td>
                    <img src="{{ public_path('images/ahlak.jpeg') }}" alt="" style="float:right" width="150" height="100">
                </td>
            </tr>
        </tbody>
    </table>
    <br><br><br><br><br>
    <p style="text-align: center; font-size: 15px">
        <b>
            PROGRAM ASURANSI KECELAKAAN DIRI
        </b>
    </p>
    <p style="text-align: justify; font-size: 15px">
        PT JASARAHARJA PUTERA merupakan perusahaan Asuransi Kerugian multinasional dan
        anak usaha dari PT Jasa Raharja, yang tergabung dalam Holding BUMN Asuransi dan
        Penjaminan dibawah Kementerian BUMN serta member IFG (Indonesia Financial Group).
        Pelayanan kantor PT Jasaraharja Putera tersebar di seluruh Indonesia, terdiri atas; 27
        Kantor Cabang, 24 Kantor Pemasaran dan 62 Kantor Unit Layanan yang selalu memberikan
        pelayanan terpadu kepada seluruh lapisan masyarakat.
    </p>
    <p style="text-align: justify; font-size: 15px">
        Mengingat semakin mahalnya biaya pengobatan dan tingkat risiko kecelakaan semakin
        tinggi, masyarakat dituntut untuk menyiapkan sejumlah dana dalam menghadapi suatu
        peristiwa kecelakaan yang mungkin terjadi, baik kecelakaan ditempat kerja, dirumah maupun
        pada saat melakukan aktifitas sehari-hari. Hal ini, perlu dicarikan solusi yang tepat dengan
        upaya pemecahan secara sistematis, terencana dan teratur sehingga diharapkan dapat
        terciptanya rasa aman dan nyaman bagi diri pribadi dan keluarga untuk melakukan berbagai
        aktifitas.
    </p>
    <p style="text-align: justify; font-size: 15px" >
        Kecelakaan ialah suatu kejadian yang tidak terduga, datangnya dari luar, dengan kekerasan,
        baik secara phisik maupun kimia, tidak disengaja, penyebabnya harus terlihat, menimpa diri
        Tertanggung/peserta yang seketika itu mengakibatkan luka-luka, cacat, meninggal dunia,
        yang sifat dan tempatnya dapat ditentukan oleh Dokter.
    </p>
    <p style="text-align: justify; font-size: 15px">
        PT JASARAHARJA PUTERA melalui program Asuransi Kecelakaan Diri (JP-ASPRI),
        dengan berbagai pilihan produk, premi yang cukup terjangkau dan pertanggungan risiko
        kecelakaan selama 24 jam dimanapun Tertanggung berada, program asuransi ini dapat
        memberikan solusi untuk jaminan atas kerugian financial jika mengalami risiko kecelakaan
        yang mungkin terjadi.
    </p>
    <table class="table table-bordered" style="border: 1ch">
        <thead>
            <tr>
                {{-- <th></th> --}}
                <th colspan="3">
                    Dana Santunan
                </th>
                {{-- <th></th> --}}
                <th>Premi Pertahun</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="font-size: 15px">Meninggal Dunia</td>
                <td style="font-size: 15px">Cacat Tetap Maks</td>
                <td style="font-size: 15px">Biaya Perawatan</td>
                <td ></td>
            </tr>
            <tr>
                <td style="font-size: 15px">Rp. 50.000.000</td>
                <td style="font-size: 15px">Rp. 50.000.000</td>
                <td style="font-size: 15px">Rp. 5.000.000</td>
                <td style="font-size: 15px">Rp. 125.000</td>
            </tr>
        </tbody>
    </table>
    <br><br><br><br><br><br><br>
    <p style="text-align: center; font-size: 15px">
        <b>
            SURAT PERMINTAAN PENUTUPAN ASURANSI
        </b>
    </p>
    <table class="table table-bordered" style="border: 1ch">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Seseuai KTP</th>
                <th>Jenis</th>
                <th>Tempat & Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data_pdf as $item)
                <tr>
                    <td style="font-size: 15px">{{ $no++ }}</td>
                    <td style="font-size: 15px">{{ $item[0] }}</td>
                    <td style="font-size: 15px"><b>{{ $item[1] }}</b></td>
                    <td >{{ $item[2] }}</td>
                </tr>
            @endforeach
            
            
        </tbody>
    </table>
    <p style="text-align: justify; font-size: 15px">
        Alamat & No. HP :  
    </p>
    <p style="text-align: justify; font-size: 15px">
        Saya paham dan mengerti akan manfaat dari produk asuransi ini, keterangan diatas dibuat
        dengan sebenar-benarnya dan tidak ada unsur paksaan dari siapapun.
    </p>
    <table>
        <tr>
            <th>
                <p style="text-align: justify; font-size: 15px">
                    Bandung, 
                </p>
            </th>
        </tr>
    </table>
    <br><br>
    <table>
        <tr style="margin-top: 100px">
            <th>
                <p style="text-align: justify; font-size: 15px">
                    Nama Lengkap 
                </p>
            </th>
        </tr>
    </table>
    

  </body>
</html>