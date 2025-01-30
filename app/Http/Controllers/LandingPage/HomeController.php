<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\contact;
use App\Models\Form_contact;
use App\Models\FormSubmit;
use App\Models\Langganan;
use App\Models\News;
use App\Models\teacher;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function beranda()
    {
        $teachers = Teacher::orderBy('created_at', 'asc')->take(3)->get();
        $usersCount = User::where('role', 'student')->count();
        $newsCount = News::count();
        $teachersCount = teacher::count();

        $testimoni = Testimoni::where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('welcome', compact('teachers', 'usersCount', 'newsCount', 'teachersCount', 'testimoni'));
    }
    public function tentang()
    {
        $title = 'Tentang';
        $usersCount = User::where('role', 'student')->count();
        $newsCount = News::count();
        $teachersCount = teacher::count();

        $about = About::first();

        $testimoni = Testimoni::where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        return view('link.about', compact('about', 'usersCount', 'newsCount', 'teachersCount', 'testimoni', 'title'));
    }

    public function guru()
    {
        $teachers = teacher::all();
        return view('link.teacher', compact('teachers'));
    }

    public function acara()
    {
        $news = News::all();
        return view('link.event', compact('news'));
    }
    public function show($id)
    {
        $news = News::findOrFail($id);
        $recentNews = News::where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();
        return view('news.show', compact('news', 'recentNews'));
    }

    public function kontak()
    {
        $contact = contact::first();
        return view('link.contact', compact('contact'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Simpan data ke database dengan relasi ke pengguna
        Form_contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Pesan Anda telah terkirim. Terima kasih!');
    }

    public function dashboard()
    {
        return view('student.dashboard');
    }

    public function sisdash()
    {


        // Ambil data berdasarkan id dari pengguna yang sedang login
        $userId = auth()->user()->id;
        $data = FormSubmit::where('user_id', $userId)->get();

        return view('ppdb.dashboard', compact('data'));
    }

    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email'
        ]);

        Langganan::create([
            'email' => $validated['email']
        ]);

        return back()->with('success', 'Berhasil berlangganan buletin');
    }
}
