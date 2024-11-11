<?php
namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Kategori;
use App\Models\Bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Alert;

class ResepController extends Controller
{
    public function index()
    {
        $resep = Resep::all();
        return view('admin.resep.index', compact('resep'));
    }

    public function create()
    {
        $bahan = Bahan::all();
        $kategori = Kategori::all();
        return view('admin.resep.create', compact('bahan' ,'kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_resep' => 'required',
            'deskripsi' => 'required',
            'langkah' => 'required',
            'bahan_id' => 'required',
            'kategori_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:10048',
        ]);

        $resep = new Resep();
        $resep->nama_resep = $request->nama_resep;
        $resep->deskripsi = $request->deskripsi;
        $resep->langkah = $request->langkah;
        $resep->bahan_id = $request->bahan_id;
        $resep->kategori_id = $request->kategori_id;

        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/reseps', $image->hashName());
        $resep->image = $image->hashName();
        $resep->save();

        Alert::success('Success', 'Data berhasil ditambah')->autoClose(1000);
        return redirect()->route('resep.index');
    }

    public function show($id)
    {
        $resep = Resep::findOrFail($id);
        return view('admin.resep.show', compact('resep'));
    }

    public function edit($id)
    {
        $kategori = Kategori::all();
        $bahan = Bahan::all();
        $resep = Resep::findOrFail($id);
        return view('admin.resep.edit', compact('resep', 'bahan' ,'kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_resep' => 'required',
            'deskripsi' => 'required',
            'langkah' => 'required',
            'bahan_id' => 'required',
            'kategori_id' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:10048',
        ]);

        $resep = Resep::findOrFail($id);
        $resep->nama_resep = $request->nama_resep;
        $resep->deskripsi = $request->deskripsi;
        $resep->langkah = $request->langkah;
        $resep->bahan_id = $request->bahan_id;
        $resep->kategori_id = $request->kategori_id;

        // Upload image if new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/reseps', $image->hashName());
            Storage::delete('public/reseps/' . $resep->image);
            $resep->image = $image->hashName();
        }

        $resep->save();

        Alert::success('Success', 'Data berhasil diubah')->autoClose(1000);
        return redirect()->route('resep.index');
    }

    public function destroy($id)
    {
        $resep = Resep::findOrFail($id);

        // Delete image from storage
        Storage::delete('public/reseps/' . $resep->image);

        // Delete the product
        $resep->delete();

        Alert::success('Success', 'Data berhasil dihapus')->autoClose(1000);
        return redirect()->route('resep.index');
    }
}
