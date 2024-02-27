<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NootifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->level == 'admin') {
            $notif = Galery::join('users', 'users.id', '=', 'galeries.id_user')
                ->where('galeries.status', 'pending')
                ->select('galeries.*', 'users.name')
                ->get();

            return view('Page.Admin.notifikasi', compact('notif'));
        }
    }
    public function declined()
    {
        $user = Auth::user();
        if ($user->level == 'admin') {
            $notif = Galery::join('users', 'users.id', '=', 'galeries.id_user')
                ->where('galeries.status', 'declined')
                ->select('galeries.*', 'users.name')
                ->get();

            return view('Page.Admin.declined', compact('notif'));
        }
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
        if ($user->level == 'admin') {
            $ids = $request->id;

            if ($request->status == 'acc') {
                if ($ids) {
                    foreach ($ids as $id) {
                        Galery::where('id', $id)->update([
                            'status' => 'accept'
                        ]);
                    }
                    return back()->with('success', 'Sukses Unutk Di Accept!!');
                } else {
                    return back()->with('secondary', 'Silahkan Pilih Yang Akan Di Accept!!');
                }
            }
            if ($request->status == 'declined') {
                if ($ids) {
                    foreach ($ids as $id) {
                        Galery::where('id', $id)->update([
                            'status' => 'declined'
                        ]);
                    }
                    return back()->with('alert', 'Sukses Untuk Di Declined!!');
                } else {
                    return back()->with('secondary', 'Silahkan Pilih Yang Akan Di Declined!!');
                }
            } else {
                return back();
            }
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
