<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->level == 'admin') {
            $users = User::whereIn('level', ['user'])->get();
            $admins = User::whereIn('level', ['admin'])->get();

            return view('Page.admin.user', compact('users', 'admins'));
        } else {
            return back();
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
        //
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
    public function update(Request $request, string $id)
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

    public function updateStatus(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->level == 'admin') {
            $status = User::where('id', $id)->first();

            if ($status->status == 1) {
                $data = [
                    'status' => '0',
                ];

                User::where('id', $id)->update($data);
                return back()->with('success', 'Status Berhasil Untuk Di Update!!');
            } else {
                $data = [
                    'status' => 1,
                ];

                User::where('id', $id)->update($data);
                return back()->with('success', 'Status Berhasil Untuk Di Update!!');
            }
        }
    }
}
