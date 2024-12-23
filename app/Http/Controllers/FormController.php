<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Desa;
use App\Models\Form;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;  // Pastikan ini ada

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Generate CAPTCHA
        $captcha = $this->generateCaptcha();

        // Simpan CAPTCHA yang benar di session
        Session::put('captcha', $captcha);


        $kabupatens = Kabupaten::select('name')->get();
        $kecamatans = Kecamatan::select('name')->get();
        $desas = Desa::select('name')->get();
        $provins = Provinsi::select('name')->get();
        return view('welcome', compact('kabupatens', 'kecamatans', 'desas', 'provins', 'captcha'));
    }


    public function getKabupaten(Request $request)
    {
        $kabupatens = Kabupaten::select('name')->get();
        return response()->json($kabupatens);
    }

    public function getKecamatan(Request $request)
    {
        $kecamatans = Kecamatan::select('name')->get();
        return response()->json($kecamatans);
    }

    public function getDesa(Request $request)
    {
        $desas = Desa::select('name')->get();
        return response()->json($desas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'captcha' => 'required|same:captcha',
            'nama' => 'required|string',
            'nik' => 'required|string|max:16',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'jk' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'email' => 'required|string|unique:forms',
            'password' => 'required|min:6|confirmed',
        ]);

        Form::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'jk' => $request->jk,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', 'Form Telah di isi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function showForm() {}



    // Fungsi untuk membuat CAPTCHA
    private function generateCaptcha()
    {
        // Generate string acak
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $captcha = '';
        for ($i = 0; $i < 6; $i++) {
            $captcha .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Buat gambar CAPTCHA
        $image = imagecreatetruecolor(120, 40);
        $background = imagecolorallocate($image, 255, 255, 255);
        $textColor = imagecolorallocate($image, 0, 0, 0);

        imagefill($image, 0, 0, $background);
        imagestring($image, 5, 35, 10, $captcha, $textColor);

        // Simpan gambar di file temporary
        $captchaPath = storage_path('app/public/captcha/captcha.jpg');
        imagejpeg($image, $captchaPath);

        // Hancurkan resource gambar setelah digunakan
        imagedestroy($image);

        return $captcha;
    }
    /**
     * Update the specified resource in storage.
     */
}
