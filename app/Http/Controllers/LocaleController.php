<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App; 
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;


class LocaleController extends Controller

{
    public function setLocale($lang){
        // Set bahasa default yang digunakan
        session()->put('locale', $lang); // Menyimpan bahasa yang dipilih dalam session

        // Cek jika bahasa yang dipilih adalah Inggris atau lainnya
        if ($lang == 'en') {
            // Bisa diterjemahkan menggunakan Google Translate atau API lainnya
            app()->setLocale('en'); // Ubah locale Laravel ke bahasa Inggris
        } elseif ($lang == 'id') {
            app()->setLocale('id'); // Ubah locale Laravel ke bahasa Indonesia
        }

        // Arahkan pengguna kembali ke halaman sebelumnya
        return redirect()->back();
    
    }
}

