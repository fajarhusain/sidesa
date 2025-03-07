<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
   public function index()
   {
    $residents = Resident::all();
       return view('pages.resident.index',[
        'residents' => $residents,
    ]);
   }

   public function create()
   {
       return view('pages.resident.create');
   }
   

   public function edit($id)
   {
    $resident = Resident::findOrdFail($id);
       return view('pages.resident.create',[
        'resident' => $resident,
       ]);
   }
   public function destroy($id)
   {
    $resident = Resident::findOrdFail($id);
    $resident->delete();

       return redirect('/resident')->with('success','Data berhasil dihapus');
   }
}
