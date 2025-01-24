<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        return view('testimoni.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'integer|between:1,5',
            'status' => 'nullable|string',
        ], [
            'author_name.required' => 'Nama penulis wajib diisi.',
            'author_name.string' => 'Nama penulis harus berupa teks.',
            'author_name.max' => 'Nama penulis tidak boleh lebih dari 255 karakter.',
            'content.required' => 'Konten wajib diisi.',
            'content.string' => 'Konten harus berupa teks.',
            'rating.integer' => 'Rating harus berupa angka.',
            'rating.between' => 'Rating harus di antara 1 dan 5.',
            'status.nullable' => 'Status dapat dibiarkan kosong.',
            'status.string' => 'Status harus berupa teks.',
        ]);


        $user_id = auth()->id();

        Testimoni::create([
            'user_id' => $user_id,
            'author_name' => $request->author_name,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Testimoni Anda telah dikirim.');
    }
}
