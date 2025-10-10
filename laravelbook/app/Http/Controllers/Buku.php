<?php

namespace App\Http\Controllers;

use App\Models\Penerbitmodel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Bukumodel;
use Illuminate\Support\Facades\Storage;

class Buku extends Controller
{
    public function index()
    {
        $daftar_buku = Bukumodel::paginate(10);

        $param = [
            "modul_name" => "Buku",
            "judul" => "Daftar Buku",
            "data" => $daftar_buku,
        ];

        return view("daftarbuku", $param);
    }

    public function tambah()
    {
        $param = [
            "namamodul" => "Buku",
            "judul" => "Tambah Buku",
            "datapenerbit" => Penerbitmodel::all(),
        ];
        return view("tambahbuku", $param);
    }

    public function simpan(Request $req)
    {
        $req->validate([
            "kodebuku" => "required|unique:tbl_buku,kodebuku",
            "judul" => "required|min:5",
            "pengarang" => "required|min:5|max:15",
            "harga" => "required|numeric",
            "idpenerbit" => "required",
            "gambar" => "required|max:10000",
        ], [
            "kodebuku.required" => "kode buku harus di isi",
            "kodebuku.unique" => "kode buku sudah terdaftar",
            "judul.required" => "judul harus di isi",
            "judul.min" => "jumlah karakter judul minimal 5 karakter",
            "pengarang.required" => "isi nama pengarang",
            "harga.required" => "jangan lupa harganya di isi",
            "idpenerbit.required" => "pilih penerbit",
            "gambar.required" => "pilih gambar",
            "gambar.max" => "ukuran file maks. 10 MB",
        ]);

        $gambar = $req->file('gambar');
        $namaFile = $gambar->getClientOriginalName();
        $gambar->storeAs("images/$req->kodebuku", $namaFile, 'public');

        $data = [
            "kodebuku" => $req->input('kodebuku'),
            "judul" => $req->input('judul'),
            "pengarang" => $req->input("pengarang"),
            "harga" => $req->input("harga"),
            "idpenerbit" => intval($req->input("idpenerbit")),
            "gambar" => $namaFile,
        ];


        Bukumodel::create($data);
        return redirect(url('buku'));
    }

    public function edit($id)
    {
        $buku = Bukumodel::find($id);

        $param = [
            'namamodul' => 'Buku',
            'judul' => "Edit Buku",
            'data' => $buku,
            'daftarpenerbit' => Penerbitmodel::all(),
        ];

        return view("editbuku", $param);
    }

    public function simpanedit(Request $req)
    {

        $req->validate([
            //"kodebuku" => "required|unique:tbl_buku,kodebuku",
            "judul" => "required|min:5",
            "pengarang" => "required|min:5|max:15",
            "harga" => "required|numeric",
            "idpenerbit" => "required",
        ], [
            "judul.required" => "judul harus di isi",
            "judul.min" => "jumlah karakter judul minimal 5 karakter",
            "pengarang.required" => "isi nama pengarang",
            "harga.required" => "jangan lupa harganya di isi",
            "idpenerbit.required" => "pilih penerbit"
        ], );

        $data = [
            "kodebuku" => $req->kodebuku,
            "judul" => $req->input("judul"),
            "pengarang" => $req->input("pengarang"),
            "harga" => $req->input("harga"),
            "idpenerbit" => intval($req->input("idpenerbit")),
        ];

        if ($req->hasFile('gambar')) {
            $gambar = $req->file('gambar');
            $namaFile = $gambar->getClientOriginalName();
            $gambar->storeAs("images/$req->kodebuku", $namaFile, 'public');
            $data['gambar'] = $namaFile;
        }

        Bukumodel::where("id", $req->input("id"))->update($data);

        return redirect(url('buku'));
    }

    public function hapus(Request $req)
    {

        $buku = Bukumodel::find($req->input('id'));
        Bukumodel::destroy($req->input('id'));
        Storage::disk('public')->deleteDirectory("images/$buku->kodebuku");
        return redirect(url('buku'));
    }

    public function cetakdaftarbuku()
    {
        $data = Bukumodel::all();
        $param = [
            'namamodul' => 'Buku',
            'judul' => 'Laporan Daftar Buku',
            'data' => $data,
        ];

        $pdf = Pdf::loadView('laporanbuku', $param);
        // return $pdf->download('laporanbuku.pdf');
        return $pdf->stream('laporanbuku.pdf');
    }
}

