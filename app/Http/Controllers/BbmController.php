<?php

namespace App\Http\Controllers;

use App\Models\Bbm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

date_default_timezone_set("Asia/Jakarta");
class BbmController extends Controller
{
    public function index()
    {
        $data = Bbm::where('id_user', Auth::user()->id)->get();
        // return $data;
        if ($data == null) {
            return response()->json([
                'success' => false,
                'message' => 'Data Kosong',
                'data' => null
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Tampil Data',
                'data' => $data
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required',
            'id_kendaraan' => 'required',
            'id_user' => 'required',
            'tanggal' => 'required',
            'km_awal' => 'required',
            'km_akhir' => 'required',
            'total_km' => 'required',
            'bbm_liter' => 'required',
            'bbm_per_liter' => 'required',
            'harga_bbm' => 'required',
            'konsumsi_bbm' => 'required'
        ]);
        $idk = Auth::user()->id_karyawan;
        $id = Auth::user()->id;
        // return $id;

        $addBBM = Bbm::create([
            'id_karyawan' => $idk,
            'id_kendaraan' => $request->id_kendaraan,
            'id_user' => $id,
            'tanggal' => date('Y-m-d'),
            'km_awal' => $request->km_awal,
            'km_akhir' => $request->km_akhir,
            'total_km' => $request->total_km,
            'bbm_liter' => $request->bbm_liter,
            'bbm_per_liter' => $request->bbm_per_liter,
            'harga_bbm' => $request->harga_bbm,
            'konsumsi_bbm' => $request->konsumsi_bbm
        ]);

        if ($addBBM) {
            return response()->json([
                'success' => true,
                'message' => 'berhasil di tambahkan'
            ]);
        } else {
            return response()->json([
                'message' => 'Gagal Menambahkan Data'
            ]);
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_kendaraan' => 'required',
            'tanggal' => 'required',
            'km_awal' => 'required',
            'km_akhir' => 'required',
            'total_km' => 'required',
            'bbm_liter' => 'required',
            'bbm_per_liter' => 'required',
            'harga_bbm' => 'required',
            'konsumsi_bbm' => 'required'
        ]);

        // $idk = Auth::user()->id_karyawan;
        // $id = Auth::user()->id;

        $update = Bbm::where('id', $id)->update([
            'id_kendaraan' => $request->id_kendaraan,
            'tanggal' => date('Y-m-d'),
            'km_awal' => $request->km_awal,
            'km_akhir' => $request->km_akhir,
            'total_km' => $request->total_km,
            'bbm_liter' => $request->bbm_liter,
            'bbm_per_liter' => $request->bbm_per_liter,
            'harga_bbm' => $request->harga_bbm,
            'konsumsi_bbm' => $request->konsumsi_bbm
        ]);

        if ($update) {
            return response()->json([
                'success' => true,
                'message' => 'berhasil diubah'
            ]);
        } else {
            return response()->json([
                'message' => 'gagal diubah'
            ]);
        }
    }
}
