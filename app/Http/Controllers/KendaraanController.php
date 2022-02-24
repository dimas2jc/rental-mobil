<?php

namespace App\Http\Controllers;

use App\Models\DocumentVehicle;
use App\Models\Vehicle;
use App\Models\VehicleBody;
use App\Models\VehiclesVarian;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;

class KendaraanController extends Controller
{
    public function index()
    {
        $data['pemilik'] = Vendor::select("id_vendors", "name_vendrs")->get();
        $data['dokumen'] = DocumentVehicle::select("id_doc_vehicles", "name_doc_vehicles")->get();
        $data['body'] = VehicleBody::select("id_vehicle_bodies", "name_vehicles_bodies")->get();
        $data['varian'] = VehiclesVarian::select("id_varian_vehicles", "nama_varian")->get();

        return view('data_master_kendaraan', compact('data'));
    }

    public function store_kendaraan(Request $request)
    {
        $request->validate([
            'pemilik' => 'required',
            'dokumen' => 'required',
            'body' => 'required',
            'varian' => 'required',
            'nopol' => 'required|string',
            'no_rangka' => 'required|string',
            'no_mesin' => 'required|string',
            'warna' => 'required|string',
            'tahun_pembuatan' => 'required',
            'no_stnk' => 'required|string',
            'nama_stnk' => 'required|string',
            'masa_stnk' => 'required|string',
            'alamat_stnk' => 'required|string',
            'no_bpkb' => 'required|string',
            'tgl_kir' => 'required',
        ]);

        Vehicle::insert([
            'ID_VEHICLES' => Uuid::uuid4(),
            'ID_VENDORS' => $request->pemilik,
            'ID_DOC_VEHICLES' => $request->dokumen,
            'ID_VEHICLE_BODIES' => $request->body,
            'ID_VARIAN_VEHICLES' => $request->varian,
            'NOPOL' => $request->nopol,
            'NO_RANGKA' => $request->no_rangka,
            'NOMESIN' => $request->no_mesin,
            'WARNA' => $request->warna,
            'TAHUN_PEMBUATAN' => $request->tahun_pembuatan,
            'NO_STNK' => $request->no_stnk,
            'NAMA_STNK' => $request->nama_stnk,
            'MASA_SNTK' => $request->masa_stnk,
            'ALAMAT_SNTK' => $request->alamat_stnk,
            'NO_BPKB' => $request->no_BPKB,
            'TGL_KIR' => date("Y-m-d", strtotime($request->tgl_kir))
        ]);

        return back();
    }

    public function update_kendaraan(Request $request, $id)
    {
        $request->validate([
            'pemilik' => 'required',
            'dokumen' => 'required',
            'body' => 'required',
            'varian' => 'required',
            'nopol' => 'required|string',
            'no_rangka' => 'required|string',
            'no_mesin' => 'required|string',
            'warna' => 'required|string',
            'tahun_pembuatan' => 'required',
            'no_stnk' => 'required|string',
            'nama_stnk' => 'required|string',
            'masa_stnk' => 'required|string',
            'alamat_stnk' => 'required|string',
            'no_bpkb' => 'required|string',
            'tgl_kir' => 'required',
        ]);

        Vehicle::where('ID_VEHICLES', $id)->update([
            'ID_VENDORS' => $request->vendor,
            'ID_DOC_VEHICLES' => $request->dokumen,
            'ID_VEHICLE_BODIES' => $request->body,
            'ID_VARIAN_VEHICLES' => $request->varian,
            'NOPOL' => $request->nopol,
            'NO_RANGKA' => $request->no_rangka,
            'NOMESIN' => $request->no_mesin,
            'WARNA' => $request->warna,
            'KAPASITAS_BBM' => $request->kapasitas_bbm,
            'TAHUN_PEMBUATAN' => $request->tahun_pembuatan,
            'NO_STNK' => $request->no_stnk,
            'NAMA_STNK' => $request->nama_stnk,
            'MASA_STNK' => $request->masa_stnk,
            'ALAMAT_STNK' => $request->alamat_stnk,
            'NO_BPKB' => $request->no_bpkb,
            'TGL_KIR' => date("Y-m-d", strtotime($request->tgl_kir))
        ]);

        return back();
    }

    public function store_body_kendaraan(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:60',
        ]);

        if($request->is_active == 'on'){
            $is_active = 1;
        }
        else{
            $is_active = 0;
        }
        VehicleBody::insert([
            'ID_VEHICLE_BODIES' => Uuid::uuid4(),
            'NAME_VEHICLES_BODIES' => $request->name,
            'IS_ACTIVE' => $is_active
        ]);

        return back();
    }

    public function update_body_kendaraan(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:60',
        ]);
        
        if($request->is_active == 'on'){
            $is_active = 1;
        }
        else{
            $is_active = 0;
        }
        VehicleBody::where('ID_VEHICLE_BODIES', $id)->update([
            'NAME_VEHICLES_BODIES' => $request->name,
            'IS_ACTIVE' => $is_active
        ]);

        return back();
    }

    public function store_varian_kendaraan(Request $request)
    {
        $request->validate([
            'name_varian' => 'required|string|max:100',
            'type_varian' => 'required|string|max:100',
            'pabrikan' => 'required|string|max:100',
            'kapasitas_cc' => 'required|max:10',
            'kapasitas_bbm_varian' => 'required|max:10',
            'ukuran_ban' => 'required|max:10',
            'vehicle_sit' => 'required|max:10',
        ]);

        VehiclesVarian::insert([
            'ID_VARIAN_VEHICLES' => Uuid::uuid4(),
            'NAMA_VARIAN' => $request->name_varian,
            'VEHICLES_TYPE' => $request->type_varian,
            'VEHICLES_PABRIKAN' => $request->pabrikan,
            'SILINDER' => $request->silinder,
            'KAPASITAS_CC' => $request->kapasitas_cc,
            'TIPE_BBM' => $request->TIPE_BBM,
            'KAPASITAS_BBM' => $request->kapasitas_bbm_varian,
            'RASIO_BBM' => $request->rasio_bbm,
            'JENIS_TRANSMISI' => $request->jenis_transmisi,
            'KONFIGURASI_AXLE' => $request->konfigurasi_axle,
            'JUMLAH_SUMBU' => $request->jumlah_sumbu,
            'UKURAN_BAN' => $request->ukuran_ban,
            'VEHICLES_SIT' => $request->vehicle_sit,
            'NOTE' => $request->note
        ]);

        return back();
    }

    public function update_varian_kendaraan(Request $request, $id)
    {
        $request->validate([
            'name_varian' => 'required|string|max:100',
            'type_varian' => 'required|string|max:100',
            'pabrikan' => 'required|string|max:100',
            'kapasitas_cc' => 'required|max:10',
            'kapasitas_bbm_varian' => 'required|max:10',
            'ukuran_ban' => 'required|max:10',
            'vehicle_sit' => 'required|max:10',
        ]);
        
        VehiclesVarian::where('ID_VARIAN_VEHICLES', $id)->update([
            'NAMA_VARIAN' => $request->name_varian,
            'VEHICLES_TYPE' => $request->type_varian,
            'VEHICLES_PABRIKAN' => $request->pabrikan,
            'SILINDER' => $request->silinder,
            'KAPASITAS_CC' => $request->kapasitas_cc,
            'TIPE_BBM' => $request->TIPE_BBM,
            'KAPASITAS_BBM' => $request->kapasitas_bbm_varian,
            'RASIO_BBM' => $request->rasio_bbm,
            'JENIS_TRANSMISI' => $request->jenis_transmisi,
            'KONFIGURASI_AXLE' => $request->konfigurasi_axle,
            'JUMLAH_SUMBU' => $request->jumlah_sumbu,
            'UKURAN_BAN' => $request->ukuran_ban,
            'VEHICLES_SIT' => $request->vehicle_sit,
            'NOTE' => $request->note
        ]);

        return back();
    }

    public function store_dokumen_kendaraan(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'name_dokumen' => 'required',
            'expired_date' => 'required',
        ]);

        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('document/vehicle/', $nama_file);

        DocumentVehicle::insert([
            'ID_DOC_VEHICLES' => Uuid::uuid4(),
            'TYPE_DOC_VEHICLES' => $request->type_dokumen,
            'NAME_DOC_VEHICLES' => $request->name_dokumen,
            'UPLOAD_DOC_VEHICLES' => $nama_file,
            'EXPIRED_DOC_VEHICLES' => date("Y-m-d", strtotime($request->expired_date)),
            'DESCRIPTION' => $request->description
        ]);

        return back();
    }

    public function update_dokumen_kendaraan(Request $request, $id)
    {
        $request->validate([
            'name_dokumen' => 'required',
            'type_dokumen' => 'required',
            'expired_date' => 'required',
        ]);

        if($request->file('file'))
        {
            $old_file = DocumentVehicle::where('ID_DOC_VEHICLES', $id)->first();
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('document/vehicle/', $nama_file);

            Storage::disk('public')->delete("/document/vehicle/".$old_file->UPLOAD_DOC_VEHICLES);

            $params = [
                'TYPE_DOC_VEHICLES' => $request->type_dokumen,
                'NAME_DOC_VEHICLES' => $request->name_dokumen,
                'UPLOAD_DOC_VEHICLES' => $nama_file,
                'EXPIRED_DOC_VEHICLES' => date("Y-m-d", strtotime($request->expired_date)),
                'DESCRIPTION' => $request->description
            ];
        }
        else{
            $params = [
                'TYPE_DOC_VEHICLES' => $request->type_dokumen,
                'NAME_DOC_VEHICLES' => $request->name_dokumen,
                'EXPIRED_DOC_VEHICLES' => date("Y-m-d", strtotime($request->expired_date)),
                'DESCRIPTION' => $request->description
            ];
        }

        DocumentVehicle::where('ID_DOC_VEHICLES', $id)->update($params);

        return back();
    }

    public function get_kendaraan($id)
    {
        $data = Vehicle::findOrFail($id);

        return response()->json($data, 200);
    }

    public function get_body_kendaraan($id)
    {
        $data = VehicleBody::findOrFail($id);

        return response()->json($data, 200);
    }

    public function get_varian_kendaraan($id)
    {
        $data = VehiclesVarian::findOrFail($id);

        return response()->json($data, 200);
    }

    public function get_dokumen_kendaraan($id)
    {
        $data = DocumentVehicle::findOrFail($id);

        return response()->json($data, 200);
    }
}
