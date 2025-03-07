<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResidentController extends Controller
{
   public function index()
   {
    $residents = Resident::paginate(10);
       return view('pages.resident.index',[
        'residents' => $residents,
    ]);
   }

   public function create()
   {
       return view('pages.resident.create');
   }
   
   public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => ['required', 'min:16', 'max:16'],
            'name' => ['required', 'max:100'],
            'gender' => ['required', Rule::in(['L', 'P'])],
            'birthplace' => ['required', 'max:50'],
            'birthdate' => ['required', 'date'],
            'address' => ['required'],
            'rt' => ['required', 'max:3'],
            'rw' => ['required', 'max:3'],
            'religion' => ['nullable', 'max:20'],
            'marital_status' => ['required', Rule::in(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'])],
            'work' => ['required', 'max:50'],
            'phone' => ['nullable', 'max:15'],
            'status' => ['required', Rule::in(['Aktif', 'Tidak Aktif'])],
        ]);

        Resident::create($validated);

        return redirect('/resident')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nik' => ['required', 'min:16', 'max:16'],
        'name' => ['required', 'max:100'],
        'gender' => ['required', Rule::in(['L', 'P'])],
        'birthplace' => ['required', 'max:50'],
        'birthdate' => ['required', 'date'],
        'address' => ['required'],
        'rt' => ['required', 'max:3'],
        'rw' => ['required', 'max:3'],
        'religion' => ['nullable', 'max:20'],
        'marital_status' => ['required', Rule::in(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'])],
        'work' => ['required', 'max:50'],
        'phone' => ['nullable', 'max:15'],
        'status' => ['required', Rule::in(['Aktif', 'Tidak Aktif'])],
    ]);

    $resident = Resident::findOrFail($id);
    $resident->update($validated);

    return redirect('/resident')->with('success', 'Data berhasil diubah');
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
