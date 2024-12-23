<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotController extends Controller
{
    public function index()
    {
        $lots = Lot::where('is_open', true)->orderBy('title', 'asc')->get();
        return view('lots.index', compact('lots'));
    }

    public function show($id){

        $lot=Lot::findOrFail($id);
        return view('lots.show', compact('lot'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'current_bid' => 'required',
        ]);

        $lot = Lot::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'current_bid' => $data['current_bid'],
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('lot.index');
    }

    public function update($id){
        $data = request()->validate([
            'current_bid' => 'required',
        ]);
        $lot=Lot::findOrFail($id);

        if ($lot->current_bid >= $data['current_bid']) {
            return redirect()->back();
        }

        $lot->update([
            'current_bid' => $data['current_bid'],
        ]);

        return redirect()->back();
    }
    public function closeLot($id){
        $lot=Lot::findOrFail($id);

        if ($lot->user_id != Auth::id()) {

            return redirect()->back();
        }

        $lot->update([
            'is_open' => false,
        ]);


        return redirect()->back();
    }
}
