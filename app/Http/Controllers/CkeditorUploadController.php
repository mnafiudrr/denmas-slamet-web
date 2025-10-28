<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class CkeditorUploadController extends Controller
{
    public function upload(Request $request): JsonResponse
    {
        // Validasi dasar: 5 MB, hanya gambar umum
        $data = $request->validate([
            'upload' => ['required','file','image','max:5120', 'mimes:jpeg,png,jpg,webp,gif']
        ]);

        // Simpan ke disk "public" di folder ckeditor/
        $path = $data['upload']->store('ckeditor', 'public');

        if (! $path) {
            return response()->json([
                'error' => ['message' => 'Failed to store the file.']
            ], 422);
        }

        $url = Storage::disk('public')->url($path);

        // $url = str_replace('http://localhost', 'http://localhost:8000', $url);

        return response()->json([
            'url' => $url
        ], 201);
    }
}
