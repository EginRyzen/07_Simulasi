<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $galery = Galery::where('id_user', $user->id)->latest()->get();

        return view('Page.timeline', compact('galery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validate = Validator::make($request->all(), [
            'foto' => 'required|image|mimes:jpg,svg,png,gif'
        ]);
        if ($validate->fails()) {
            return back()->with('alert', 'Foto Tidak Memenuhi Syarat!!');
        }
        $nfile = $user->id . date('YmdHis') . '.' . $request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('img'), $nfile);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'id_user' => $user->id,
            'foto' => $nfile,
        ];

        Galery::create($data);

        return back()->with('success', 'Upload Berhasil!!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Galery::where('id', $id)->delete();

        return back()->with('alert', 'Hapus Berhasil!!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galery $galery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (isset($request->foto)) {
            $user = Auth::user();
            $validate = Validator::make($request->all(), [
                'foto' => 'required|image|mimes:jpg,svg,png,gif'
            ]);
            if ($validate->fails()) {
                return back()->with('alert', 'Foto Tidak Memenuhi Syarat!!');
            }
            $nfile = $user->id . date('YmdHis') . '.' . $request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('img'), $nfile);

            $data = [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'foto' => $nfile,
            ];
            Galery::where('id', $id)->update($data);

            return back()->with('success', 'Update Berhasil!!');
        } else {
            $data = [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ];
            Galery::where('id', $id)->update($data);

            return back()->with('success', 'Update Berhasil!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galery $galery)
    {
        //
    }
}
