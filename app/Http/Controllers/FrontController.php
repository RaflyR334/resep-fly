<?php
namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function search(Request $request){

    $request->validate([
        'query' => 'required|string|max:255',
    ]);

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



