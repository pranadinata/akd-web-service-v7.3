<?php

namespace App\Http\Controllers\Api;
//models
use App\Http\Models\User;
use App\Http\Models\DataSPPA;
use App\Http\Models\DataClaiment;

use Illuminate\Support\Facades\Storage;     

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use PDF;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
//package tambahan
use App\Http\Controllers\Api\File;

class DataSPPAController extends Controller
{
    protected $SuccessStatus = 200;
    protected $EmptyStatus = 204;
    public function index(Request $request)
    {
        // dd($request->id_user);
        $dataSPPA = DataSPPA::join('data_claiment','data_claiment.id','=','data_sppa.id_data_klaiment')->where('data_claiment.id_user', $request->id_user)->get();
        
        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => $dataSPPA,
        ];
        // dd($response);
        return response()->json($response, $response['code']); 
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);
        if($request->foto_ktp_peserta){
            $file_foto = $request->foto_ktp_peserta;
            $extension_foto_ktp_peserta = explode(".", $file_foto);
            $imageName_foto_ktp_peserta = $extension_foto_ktp_peserta[0].'_foto_ktp_'.'peserta'.'.'.$extension_foto_ktp_peserta[1];
            //upload file foto ktp
            // $file_foto->move(public_path(). '/uploads/foto_ktp_sppa/', $imageName_foto_ktp_peserta);
        }else{
            $imageName_foto_ktp_peserta = null;
        }

        if($request->foto_tanda_tangan){
            $file_foto_tanda_tangan = $request->foto_tanda_tangan;
            $extension_foto_tanda_tangan = explode(".", $file_foto_tanda_tangan);
            $imageName_foto_tanda_tangan = $extension_foto_tanda_tangan[0].'_foto_tanda_tangan.'.$extension_foto_tanda_tangan[1];
            //upload file foto tanda
            // $file_foto_tanda_tangan->move(public_path(). '/uploads/foto_tanda_tangan/', $imageName_foto_tanda_tangan);
        }else {
            $imageName_foto_tanda_tangan = null;
        }
        
        if($request->peserta_1 != 'Tidak Ada'){
            $peserta_no_1 = $request->peserta_1;
            $jenis_kelamin_no_1 = $request->jenis_kelamin_peserta_1;
            $tgl_lahir_no_1 = $request->tgl_lahir_peserta_1;
        }else{
            $peserta_no_1 = "";
            $jenis_kelamin_no_1 = "";
            $tgl_lahir_no_1 = NULL;
        }

        if($request->peserta_2 != 'Tidak Ada'){
            $peserta_no_2 = $request->peserta_2;
            $jenis_kelamin_no_2 = $request->jenis_kelamin_peserta_2;
            $tgl_lahir_no_2 = $request->tgl_lahir_peserta_2;
        }else{
            $peserta_no_2 = "";
            $jenis_kelamin_no_2 = "";
            $tgl_lahir_no_2 = NULL;
        }
        
        if($peserta_no_1 != '' && $peserta_no_2 != ''){
            $jumlah_premi = 250000;
        }else{
            if($peserta_no_1 != '' || $peserta_no_2 != ''){
                $jumlah_premi = 125000;
            }else{
                $jumlah_premi = 0;
            }
        }

        $name_of_document = uniqid().'_'.$request->id_data_klaiment.'_Akd_Claiment.pdf';

        $dataSppa = new DataSPPA;
        $dataSppa->id_data_klaiment = $request->id_data_klaiment;
        $dataSppa->peserta_1 = $peserta_no_1;
        $dataSppa->jenis_kelamin_peserta_1 = $jenis_kelamin_no_1;
        $dataSppa->tgl_lahir_peserta_1 = $tgl_lahir_no_1;
        $dataSppa->peserta_2 = $peserta_no_2;
        $dataSppa->jenis_kelamin_peserta_2 = $jenis_kelamin_no_2;
        $dataSppa->tgl_lahir_peserta_2 = $tgl_lahir_no_2;
        $dataSppa->foto_ktp_peserta = $imageName_foto_ktp_peserta;
        $dataSppa->foto_tanda_tangan = $imageName_foto_tanda_tangan;
        $dataSppa->jumlah_premi = $jumlah_premi;
        $dataSppa->file_document_sppa = $name_of_document;
        $dataSppa->save();

        // $dataClaiment = new DataClaiment();
        $data = DataClaiment::findOrFail($request->id_data_klaiment);
        $data->status_sppa = 1;
        $data->save();

        $data_buat_pdf = [
            [
                $peserta_no_1,
                $jenis_kelamin_no_1, 
                $tgl_lahir_no_1,
            ],
            [
                $peserta_no_2,
                $jenis_kelamin_no_2, 
                $tgl_lahir_no_2,
            ],
        ];
        $this->print_pdf($data_buat_pdf, $name_of_document);
        
        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
        ];
        
        return response()->json($response, $response['code']); 
    }

    public function storeFile(Request $request){
        // dd($request);
        if($request->foto_ktp_peserta){
            $file_foto = $request->foto_ktp_peserta;
            $name_foto_ktp_peserta = $file_foto->getClientOriginalName();
            $extension_foto_ktp_peserta = $file_foto->extension();
            $split = explode(".", $name_foto_ktp_peserta);
            $imageName_foto_ktp_peserta = $split[0].'_foto_ktp_'.'peserta'.'.'.$extension_foto_ktp_peserta;
            //upload file foto ktp
            $file_foto->move(public_path(). '/uploads/foto_ktp_sppa/', $imageName_foto_ktp_peserta);
        }else{
            $imageName_foto_ktp_peserta = null;
        }
        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => $imageName_foto_ktp_peserta,
        ];
        
        return response()->json($response, $response['code']); 
    }
    public function storeFileTandaTangan(Request $request){
        // dd($request);
        if($request->foto_tanda_tangan){
            $file_foto_tanda_tangan = $request->foto_tanda_tangan;
            $name_foto_tanda_tangan = $file_foto_tanda_tangan->getClientOriginalName();
            $split = explode(".", $name_foto_tanda_tangan);
            $extension_foto_tanda_tangan = $file_foto_tanda_tangan->extension();
            $imageName_foto_tanda_tangan = $split[0].'_foto_tanda_tangan.'.$extension_foto_tanda_tangan;
            //upload file foto tanda
            $file_foto_tanda_tangan->move(public_path(). '/uploads/foto_tanda_tangan/', $imageName_foto_tanda_tangan);
        }else {
            $imageName_foto_tanda_tangan = null;
        }
        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => $imageName_foto_tanda_tangan,
        ];
        
        return response()->json($response, $response['code']); 
    }
    
    //generate pdf 
    public function print_pdf($data,$name_of_document){
        $data_pdf = $data;
        $pdf = PDF::loadView('pdf', ['data_pdf'=>$data_pdf]);

        $content = $pdf->download()->getOriginalContent();
        // dd($content);
        // Storage::put('pdf_/akd-claiment6.pdf', $content);
        Storage::disk('public_uploads')->put('pdf_/'.$name_of_document, $content);
    }

    public function show(Request $request)
    {
        $dataSPPA = DataSPPA::find($request->id_sppa)->first();
        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => $dataSPPA,
        ];
        return response()->json($response, $response['code']);
            
    }

    public function show_penjualan(Request $request){
        $penjualan = DataSPPA::where('data_sppa.created_at', '>=', $request->date_awal)->where('data_sppa.created_at', '<=', $request->date_akhir)->join('data_claiment','data_claiment.id','=','data_sppa.id_data_klaiment')->where('data_claiment.id_user', $request->id_user)->get();
        // dd(count($penjualan));
        if(count($penjualan) >= 1){
            $response = [
                'code' => $this->SuccessStatus,
                'message' => 'Success',
                'data' => $penjualan,
            ];
        }else{
            $response = [
                'code' => $this->EmptyStatus,
                'message' => 'Empty',
                'data' => 'Data Tidak ada',
            ];
        }
        return response()->json($response, $response['code']);
        // dd($penjualan);

    }
    public function show_chart_jenis_kelamin(Request $request){
        
        $id_user = $request->id_user;
        $jenis_kelamin_laki_laki_peserta_1 = DataSPPA::join('data_claiment','data_sppa.id_data_klaiment','=','data_claiment.id')
                                            ->where('jenis_kelamin_peserta_1','Laki - Laki')
                                            ->where('data_claiment.id_user',$id_user)
                                            ->get();

        $jenis_kelamin_laki_laki_peserta_2 = DataSPPA::join('data_claiment','data_sppa.id_data_klaiment','=','data_claiment.id')
                                            ->where('jenis_kelamin_peserta_2','Laki - Laki')
                                            ->where('data_claiment.id_user', $id_user)
                                            ->get();

        $jumlah_laki_laki = count($jenis_kelamin_laki_laki_peserta_1) + count($jenis_kelamin_laki_laki_peserta_2);

        $jenis_kelamin_perempuan_peserta_1 = DataSPPA::join('data_claiment','data_sppa.id_data_klaiment','=','data_claiment.id')
                                            ->where('jenis_kelamin_peserta_1','Perempuan')
                                            ->where('data_claiment.id_user', $id_user)
                                            ->get();

        $jenis_kelamin_perempuan_peserta_2 = DataSPPA::join('data_claiment','data_sppa.id_data_klaiment','=','data_claiment.id')
                                            ->where('jenis_kelamin_peserta_2','Perempuan')
                                            ->where('data_claiment.id_user', $id_user)
                                            ->get();

        $jumlah_perempuan = count($jenis_kelamin_perempuan_peserta_1) + count($jenis_kelamin_perempuan_peserta_2);

        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => [
                'perempuan' => $jumlah_perempuan, 
                'laki_laki' => $jumlah_laki_laki
            ],
        ];
        
        return response()->json($response, $response['code']);

    }

}
