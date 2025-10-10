<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbitmodel;

class Penerbit extends Controller
{
    public function index()
    {
        $daftarpenerbit = Penerbitmodel::paginate(3);

        $param = [
            "namamodul" => "Penerbit",
            "judul" => "Daftar Penerbit",
            "data" => $daftarpenerbit
        ];
        return view('daftarpenerbit', $param);

    }
    public function tambah()
    {
        $param = [
            "namamodul" => "Penerbit",
            "judul" => "Tambah Data Penerbit",
        ];
        return view('formulirtambahdatapenerbit', $param);
    }

    public function simpan(Request $request)
    {
        $data = [
            'namapenerbit' => $request->input('namapenerbit'),
            'alamat' => $request->input('alamat'),
            'kontak' => $request->input('kontak'),
        ];

        Penerbitmodel::create($data);

        return redirect('penerbit')->with('success', '201');
    }

    public function edit($id)
    {
        $data = Penerbitmodel::find($id);

        $param = [
            "namamodul" => "Penerbit",
            "judul" => "Edit Data Penerbit",
            "data" => $data
        ];

        return view("formulireditdatapenerbit", $param);
    }

    public function simpanedit(Request $req)
    {
        $data = [
            "namapenerbit" => $req->input(key: "namapenerbit"),
            "alamat" => $req->input(key: "alamat"),
            "kontak" => $req->input(key: "kontak"),
        ];

        Penerbitmodel::where("id", $req->input('id'))->update($data);
        return redirect(url("penerbit"));
    }
    public function hapus(Request $req)
    {
        Penerbitmodel::destroy($req->id);
        return redirect(url('penerbit'));
    }
}
