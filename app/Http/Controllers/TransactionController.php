<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('user', 'book')->paginate(10);
        
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kode = 'TRX-' . strtoupper(uniqid());
        $user = User::get();
        $book = Buku::get();

        return view('transactions.create', compact('kode','user','book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'user_id' => 'required|string',
            'book_id' => 'required',
        ]);

        Transaction::create([
            'kode' => $request->kode,
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrow_date' => Carbon::now()->format('Y-m-d'),
        ]);

        $book = Buku::findOrFail($request->book_id);
        $book->update([
            'status' => 'dipinjam',
        ]);

        return redirect()->route('transactions.index')->with('success', 'Data berhasil disimpan.');
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
}
