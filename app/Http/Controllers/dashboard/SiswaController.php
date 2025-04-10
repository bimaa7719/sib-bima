<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Siswa $siswa)
    {
        $q = $request->input('q');

        $active = 'Siswa';

        $siswa = $siswa->when($q, function($query) use ($q) {
                    return $query->where('name', 'like', '%' .$q. '%')
                                 ->orwhere('email', 'like', '%' .$q. '%');
        })

        ->paginate(10);
        return view('dashboard/siswa/list', [ 
            'siswas' => $siswa,
            'request'=> $request,
            'active' => $active

        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \illuminate\Http\Response
     */
    public function create()

    {
        $active = 'siswa';
        return view('dashboard/siswa/form',[
            'active' => $active,
            'url' => 'dashboard.siswa.store',
            'button' => 'Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'no_daftar'                  =>'required|unique:App\Models\Siswa,no_daftar',
           'nisn'                       =>'required|unique:App\Models\Siswa,nisn',
           'nik'                        =>'required|unique:App\Models\siswa,nik',
           'nama'                       =>'required|unique:App\Models\Siswa,nama',
           'asal'                       =>'required',
           'agama'                      =>'required',
           'no_kk'                      =>'required|unique:App\Models\Siswa,no_kk',
           'ttl'                        =>'required',
           'alamat'                     =>'required',
           'pas_foto'                   =>'required|image',

            ]);

            if ($validator->fails()) {
                return redirect ()
                    ->route('dashboard.siswa.create')
                    ->withErrors ($validator)
                    ->withInput();
          } else {
            $siswa = new Siswa(); // Tambahkan ini untuk membuat objek siswa
            $image = $request->file('pas_foto');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/siswa', $image, $filename);
            

            $siswa-> no_daftar = $request->input('no_daftar');
            $siswa-> nisn = $request->input('nisn');
            $siswa-> nik = $request->input('nik');
            $siswa-> nama = $request->input('nama');
            $siswa-> asal = $request->input('asal');
            $siswa-> agama = $request->input('agama');
            $siswa-> no_kk = $request->input('no_kk');
            $siswa-> ttl = $request->input('ttl');
            $siswa-> alamat = $request->input('alamat');
            $siswa->pas_foto = $filename;
            $siswa->save();

            return redirect()->route('dashboard.siswa')->with('message',__('message.store', ['nama'=>$request->input('nama')]));
            
          }

        }

    
    

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        $active = 'siswa';
        return view('dashboard/Siswa/show', [
            'active' => $active,
            'siswa'  =>$siswa,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $active = 'siswa';
        return view('dashboard/Siswa/form', [
            'active' => $active,
            'siswa'  => $siswa,
            'button' => 'Update',
            'url'    => 'dashboard.siswa.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
        $validator = Validator::make($request->all(), [
            'no_daftar'                  =>'required|unique:App\Models\Siswa,no_daftar,'.$siswa->id,
            'nisn'                       =>'required|unique:App\Models\Siswa,nisn,'.$siswa->id,
            'nik'                        =>'required|unique:App\Models\siswa,nik,'.$siswa->id,
            'nama'                       =>'required|unique:App\Models\Siswa,nama,'.$siswa->id,
            'asal'                       =>'required|',
            'agama'                      =>'required|',
            'no_kk'                      =>'required|unique:App\Models\Siswa,no_kk,'.$siswa->id,
            'ttl'                        =>'required|',
            'alamat'                     =>'required|',
            'pas_foto'                   =>'image',
 
             ]);
 
             if ($validator->fails()) {
                 return redirect ()
                     ->route('dashboard.siswa.create')
                     ->withErrors ($validator)
                     ->withInput();
           } else {
                if($request->hasFile('pas_foto')){
                    $image = $request->file('pas_foto');
                    $filename = time() .'.' . $image->getClientOriginalExtension();
                        Storage::disk('local')->putFileAs('public/siswa', $image, $filename);
                    $siswa->pas_foto = $filename; 
                }

             $siswa-> no_daftar = $request->input('no_daftar');
             $siswa-> nisn = $request->input('nisn');
             $siswa-> nik = $request->input('nik');
             $siswa-> nama = $request->input('nama');
             $siswa-> asal = $request->input('asal');
             $siswa-> agama = $request->input('agama');
             $siswa-> no_kk = $request->input('no_kk');
             $siswa-> ttl = $request->input('ttl');
             $siswa-> alamat = $request->input('alamat');
             $siswa->save();
 
             return redirect()->route('dashboard.siswa')->with('message',__('message.update', ['nama'=>$request->input('nama')]));;
             
           }
 
         }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        
        $siswa->delete();
        return redirect()
                ->ruote('dashboard.siswa')
                ->with('message', __('messages.delete', ['nama'=>$siswa-> $nama]));
    }

}


