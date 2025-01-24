<?php

namespace App\Http\Controllers\Ppdb;

use App\Http\Controllers\Controller;
use App\Models\Form_submission;
use App\Models\Personal_information;
use App\Models\Parent_information;
use App\Models\Previous_education;
use App\Models\Major_selection;
use App\Models\Supporting_document;
use App\Models\Additional_information;
use App\Models\FormSubmit;
use App\Models\InfoPpdb;
use App\Models\Statements_and_agreement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PpdbController extends Controller
{
    public function index()
    {
        return view('ppdb.index');
    }


    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'required|string|max:1',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:50',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:20',
            'father_name' => 'required|string|max:255',
            'father_job' => 'required|string|max:100',
            'mother_name' => 'required|string|max:255',
            'mother_job' => 'required|string|max:100',
            'parent_phone' => 'required|string|max:20',
            'parent_address' => 'required|string',
            'previous_school' => 'required|string|max:255',
            'school_address' => 'required|string',
            'graduation_year' => 'required|integer',
            'avg_report_grade' => 'nullable|numeric',
            'final_exam_grade' => 'nullable|numeric',
            'first_major' => 'required|string|max:10',
            'second_major' => 'required|string|max:10',
            'reason_major' => 'nullable|string',
            'achievements' => 'nullable|string',
            'statement' => 'required|accepted',
            'agreement' => 'required|accepted',

            'birth_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'family_card' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'diploma_or_skl' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'health_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);


        // Format awal NISN (tahun atau kode spesifik)
        $baseNISN = '20251995';

        // Ambil nilai NISN terakhir yang memiliki prefix "20251995"
        $lastNISN = FormSubmit::where('nisn', 'like', "$baseNISN%")
            ->orderBy('nisn', 'desc')
            ->first();

        // Jika ada NISN sebelumnya, ambil nomor anggota terakhir, lalu tambahkan 1
        if ($lastNISN) {
            $lastNumber = (int)substr($lastNISN->nisn, strlen($baseNISN)); // Ambil angka terakhir setelah "20251995"
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1; // Jika belum ada, mulai dari 1
        }

        // Buat NISN baru
        $generatedNISN = $baseNISN . str_pad($nextNumber, 2, '0', STR_PAD_LEFT); // Tambahkan nomor anggota dengan padding 2 digit

        // Tambahkan NISN ke data yang divalidasi
        $validatedData['nisn'] = $generatedNISN;

        // Tambahkan user_id untuk pelacakan pendaftaran
        $validatedData['user_id'] = auth()->id();

        // Penyimpanan file ke dalam folder public
        if ($request->hasFile('birth_certificate')) {
            $validatedData['birth_certificate'] = $request->file('birth_certificate')->store('documents', 'public');
        }
        if ($request->hasFile('family_card')) {
            $validatedData['family_card'] = $request->file('family_card')->store('documents', 'public');
        }
        if ($request->hasFile('diploma_or_skl')) {
            $validatedData['diploma_or_skl'] = $request->file('diploma_or_skl')->store('documents', 'public');
        }
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
        }
        if ($request->hasFile('health_certificate')) {
            $validatedData['health_certificate'] = $request->file('health_certificate')->store('documents', 'public');
        }

        // Simpan data ke tabel `form_submits`
        FormSubmit::create($validatedData);

        return redirect()->route('filament.admin.pages.dashboard')->with('success', 'Formulir berhasil dikirim!');
    }



    public function syarat()
    {
        $infoPpdb = InfoPpdb::first();
        return view('ppdb.syarat', compact('infoPpdb'));
    }
}
