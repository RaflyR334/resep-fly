<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('search');
    }

    public function index()
    {
        $resep = Resep::take(4)->get();
        return view('index', compact('resep'));
    }

    public function search(Request $request)
    {
        // Validasi input pencarian
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        // Mencari resep berdasarkan nama resep atau bahan yang sesuai dengan query
        $resep = Resep::where('nama_resep', 'like', '%' . $request->input('query') . '%')
            ->orWhereHas('bahan', function ($query) use ($request) {
                $query->where('nama_bahan', 'like', '%' . $request->input('query') . '%');
            })
            ->inRandomOrder() 
            ->limit(10)
            ->get();

        $randomResep = $resep->random();

        return view('search', compact('randomResep'));
    }
}
