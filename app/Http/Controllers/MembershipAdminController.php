<?php

namespace App\Http\Controllers;

use App\Models\MembershipAdmin;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MembershipAdminController extends Controller
{
    // Menampilkan daftar membership
    public function index()
    {
        $memberships = MembershipAdmin::all();
        $users = User::all();
        $kategori = Kategori::all();
        return view('page_admin.membership.index', compact('memberships', 'users', 'kategori'));
    }


    // Menyimpan membership baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        $endDate = Carbon::createFromFormat('Y-m-d', $request->start_date)
                         ->addMonths($request->duration)
                         ->format('Y-m-d');

        MembershipAdmin::create([
            'user_id' => $request->user_id,
            'kategori_id' => $request->kategori_id,
            'start_date' => $request->start_date,
            'end_date' => $endDate,
            'price' => $request->price
        ]);

        return redirect()->route('membership_dashboard')->with('success', 'Membership berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit membership
    public function edit(MembershipAdmin $membership)
    {
        $users = User::all();
        return view('page_admin.membership.index', compact('membership', 'users'));
    }

    // Memperbarui data membership di database
    public function update(Request $request, MembershipAdmin $membership)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kategori_id' => 'required|exists:kategoris,id',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        $endDate = Carbon::createFromFormat('Y-m-d', $request->start_date)
                         ->addMonths($request->duration)
                         ->format('Y-m-d');

        $membership->update([
            'user_id' => $request->user_id,
            'kategori_id' => $request->kategori_id,
            'start_date' => $request->start_date,
            'end_date' => $endDate,
            'price' => $request->price
        ]);

        return redirect()->route('membership_dashboard')->with('success', 'Membership berhasil diperbarui.');
    }

    // Menghapus membership dari database
    public function destroy(MembershipAdmin $membership)
    {
        $membership->delete();
        return redirect()->route('membership_dashboard')->with('success', 'Membership berhasil dihapus.');
    }

    // Tambahkan fungsi-fungsi untuk kategori
    public function kategoriIndex()
    {
        $kategori = Kategori::all();
        return view('page_admin.membership.index', compact('kategori'));
    }

    public function kategoriStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric'
        ]);

        Kategori::create($request->all());

        return redirect()->route('membership_dashboard')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function kategoriDestroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('membership_dashboard')->with('success', 'Kategori berhasil dihapus.');
    }
}
