<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Carbon\Carbon;
use App\Models\MembershipAdmin;

class MembershipController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('page_web.membership.membership', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        $endDate = Carbon::createFromFormat('Y-m-d', $request->start_date)
                         ->addMonths($request->duration)
                         ->format('Y-m-d');

        MembershipAdmin::create([
            'user_id' => auth()->id(),
            'kategori_id' => $request->kategori_id,
            'start_date' => $request->start_date,
            'end_date' => $endDate,
            'price' => $request->price
        ]);

        return redirect()->route('membership')->with('success', 'Berhasil bergabung dengan membership!');
    }
}
