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
        $data['vehicles'] = Vehicle::select("id_vendors", "id_doc_vehicles", "id_varian_vehicles")->get();

        return view('data_master_kendaraan', compact('data'));
    }

    public function store_kendaraan(Request $request)
    {
        $request->validate([
            'nopol' => 'required|string',
        ]);

        Vehicle::insert([
            'id_vehicles' => Uuid::uuid4(),
            'id_vendors' => $request->pemilik,
            'id_doc_vehicles' => $request->dokumen,
            // 'id_vehicle_bodies' => $request->body,
            'id_varian_vehicles' => $request->varian,
            'nopol' => $request->nopol,
            'no_rangka' => $request->no_rangka,
            'nomesin' => $request->no_mesin,
            'warna' => $request->warna,
            // 'kapasitas_bbm' => $request->kapasitas_bbm,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'no_stnk' => $request->no_stnk,
            'nama_stnk' => $request->nama_stnk,
            'masa_stnk' => $request->masa_stnk,
            'alamat_stnk' => $request->alamat_stnk,
            'no_bpkb' => $request->no_bpkb,
            'tgl_kir' => date("Y-m-d", strtotime($request->tgl_kir))
        ]);

        return back();
    }

    public function update_kendaraan(Request $request, $id)
    {
        Vehicle::where('id_vehicles', $id)->update([
            'id_vendors' => $request->pemilik,
            'id_doc_vehicles' => $request->dokumen,
            // 'id_vehicle_bodies' => $request->body,
            'id_varian_vehicles' => $request->varian,
            'nopol' => $request->nopol,
            'no_rangka' => $request->no_rangka,
            'nomesin' => $request->no_mesin,
            'warna' => $request->warna,
            // 'kapasitas_bbm' => $request->kapasitas_bbm,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'no_stnk' => $request->no_stnk,
            'nama_stnk' => $request->nama_stnk,
            'masa_stnk' => $request->masa_stnk,
            'alamat_stnk' => $request->alamat_stnk,
            'no_bpkb' => $request->no_bpkb,
            'tgl_kir' => date("Y-m-d", strtotime($request->tgl_kir))
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
            'id_vehicle_bodies' => Uuid::uuid4(),
            'name_vehicles_bodies' => $request->name,
            'is_active' => $is_active,
            'id_vehicles' => $request->id_vehicles
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
        VehicleBody::where('id_vehicle_bodies', $id)->update([
            'name_vehicles_bodies' => $request->name,
            'is_active' => $is_active,
            'id_vehicles' => $request->id_vehicles
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
            'id_varian_vehicles' => Uuid::uuid4(),
            'nama_varian' => $request->name_varian,
            'vehicles_type' => $request->type_varian,
            'vehicles_pabrikan' => $request->pabrikan,
            'silinder' => $request->silinder,
            'kapasitas_cc' => $request->kapasitas_cc,
            'tipe_bbm' => $request->tipe_bbm,
            'kapasitas_bbm' => $request->kapasitas_bbm_varian,
            'rasio_bbm' => $request->rasio_bbm,
            'jenis_transmisi' => $request->jenis_transmisi,
            'konfigurasi_axle' => $request->konfigurasi_axle,
            'jumlah_sumbu' => $request->jumlah_sumbu,
            'ukuran_ban' => $request->ukuran_ban,
            'vehicles_sit' => $request->vehicle_sit,
            'note' => $request->note
        ]);

        return back();
    }

    public function update_varian_kendaraan(Request $request, $id)
    {
        VehiclesVarian::where('id_varian_vehicles', $id)->update([
            'nama_varian' => $request->name_varian,
            'vehicles_type' => $request->type_varian,
            'vehicles_pabrikan' => $request->pabrikan,
            'silinder' => $request->silinder,
            'kapasitas_cc' => $request->kapasitas_cc,
            'tipe_bbm' => $request->tipe_bbm,
            'kapasitas_bbm' => $request->kapasitas_bbm_varian,
            'rasio_bbm' => $request->rasio_bbm,
            'jenis_transmisi' => $request->jenis_transmisi,
            'konfigurasi_axle' => $request->konfigurasi_axle,
            'jumlah_sumbu' => $request->jumlah_sumbu,
            'ukuran_ban' => $request->ukuran_ban,
            'vehicles_sit' => $request->vehicle_sit,
            'note' => $request->note
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
            'id_doc_vehicles' => Uuid::uuid4(),
            'type_doc_vehicles' => $request->type_dokumen,
            'name_doc_vehicles' => $request->name_dokumen,
            'upload_doc_vehicles' => $nama_file,
            'expired_doc_vehicles' => date("Y-m-d", strtotime($request->expired_date)),
            'description' => $request->description
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
            $old_file = DocumentVehicle::where('id_doc_vehicles', $id)->first();
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('document/vehicle/', $nama_file);

            Storage::disk('public')->delete("/document/vehicle/".$old_file->upload_doc_vehicles);

            $params = [
                'type_doc_vehicles' => $request->type_dokumen,
                'name_doc_vehicles' => $request->name_dokumen,
                'upload_doc_vehicles' => $nama_file,
                'expired_doc_vehicles' => date("Y-m-d", strtotime($request->expired_date)),
                'description' => $request->description
            ];
        }
        else{
            $params = [
                'type_doc_vehicles' => $request->type_dokumen,
                'name_doc_vehicles' => $request->name_dokumen,
                'expired_doc_vehicles' => date("Y-m-d", strtotime($request->expired_date)),
                'description' => $request->description
            ];
        }

        DocumentVehicle::where('id_doc_vehicles', $id)->update($params);

        return back();
    }

    public function get_kendaraan($id)
    {
        $data = Vehicle::from('vehicles as ve')
        ->leftJoin('vendor as v', 'v.id_vendors', '=', 've.id_vendors')
        ->leftJoin('vehicles_varians as vv', 'vv.id_varian_vehicles', '=', 've.id_varian_vehicles')
        ->leftJoin('vehicle_bodies as vb', 'vb.id_vehicle_bodies', '=', 've.id_vehicle_bodies')
        ->leftJoin('document_vehicles as vd', 'vd.id_doc_vehicles', '=', 've.id_doc_vehicles')
        ->where('id_vehicles', $id)
        ->get();

        return response()->json($data, 200);
    }

    public function get_all_kendaraan()
    {
        $data = Vehicle::all();

        return response()->json($data, 200);
    }

    public function get_body_kendaraan($id)
    {
        $data = VehicleBody::findOrFail($id);

        return response()->json($data, 200);
    }

    public function get_all_body_kendaraan()
    {
        $data = VehicleBody::all();

        return response()->json($data, 200);
    }

    public function get_varian_kendaraan($id)
    {
        $data = VehiclesVarian::findOrFail($id);

        return response()->json($data, 200);
    }

    public function get_all_varian_kendaraan()
    {
        $data = VehiclesVarian::all();

        return response()->json($data, 200);
    }

    public function get_dokumen_kendaraan($id)
    {
        $data = DocumentVehicle::findOrFail($id);

        return response()->json($data, 200);
    }

    public function get_all_dokumen_kendaraan()
    {
        $data = DocumentVehicle::all();

        return response()->json($data, 200);
    }
}
