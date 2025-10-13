<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Produk::paginate(6);
        $param = [
            "modulename" => "ProductController",
            "title" => "List Product",
            "data" => $products,
        ];
        return view('products.list', $param);
    }

    public function create()
    {
        $param = [
            'modulname' => 'ProductController',
            'title' => 'Add Product',
        ];
        return view('products.create', $param);
    }

    public function save(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'kapasitas' => 'required|integer',
            'fasilitas' => 'nullable|string',
            'foto' => 'required|max:10000',
        ], [
            'nama.required' => 'Nama Perlu diisi',
            'deskripsi.required' => 'deskripsi perlu diisi',
            'harga.required' => 'harga perlu diisi',
            'kapasitas.required' => 'kapasitas perlu diisi',
            'foto.required' => 'foto diperlukan',
        ]);

        $foto = $request->file('foto');
        $namaFile = $foto->getClientOriginalName();
        $foto->storeAs("images/$request->nama", $namaFile, 'public');

        $data = [
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'kapasitas' => $request->input('kapasitas'),
            'fasilitas' => $request->input('fasilitas'),
            'foto' => $namaFile,
        ];

        Produk::create($data);

        return redirect(url('product'))->with('success', 'Berhasil memasukkan data baru');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);

        $param = [
            'modulename' => 'ProductController',
            'title' => "show - $produk->id",
            'data' => $produk,
        ];

        return view('products.show', $param);
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $param = [
            'modulename' => 'ProductController',
            'title' => "Edit Product - $id",
            'data' => $produk,
        ];
        return view('products.edit', $param);
    }

    public function update(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'kapasitas' => 'required|integer',
            'fasilitas' => 'nullable|string',
            //'foto' => 'required|max:10000',
        ], [
            'nama.required' => 'Nama Perlu diisi',
            'deskripsi.required' => 'deskripsi perlu diisi',
            'harga.required' => 'harga perlu diisi',
            'kapasitas.required' => 'kapasitas perlu diisi',
        ]);


        $data = [
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'kapasitas' => $request->input('kapasitas'),
            'fasilitas' => $request->input('fasilitas'),
        ];

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFile = $foto->getClientOriginalName();

            //Storage::disk('public')->deleteDirectory("images/$request->nama");

            $foto->storeAs("images/$request->nama", $namaFile, 'public');
            $data['foto'] = $namaFile;
        }
        Produk::where('id', $request->input('id'))->update($data);

        return redirect(url('product'))->with('success', 'data berhasil di update');
    }

    public function delete(Request $request)
    {
        $data = Produk::find($request->id);
        Produk::where('id', $data->id)->delete();
        Storage::disk('public')->deleteDirectory("images/$data->nama");
        return redirect(url('product'))->with('success', 'data berhasil di hapus');
    }
}
