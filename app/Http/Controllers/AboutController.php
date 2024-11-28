<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function index()
    {
        $getAbout = About::all();
        return view('About/index', compact('getAbout'));
    }
    public function update(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [
            'vtitle'            => 'required',
            'vdeskripsi'        => 'required',
            'Titledeskripsi'    => 'required',
            'vthumbnail'        => 'nullable| image |mimes:jpeg,jpg,png,gif|max:2048',

        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $service = About::findOrFail($id);

        $data = [
            'title'         => $request->vtitle,
            'deskripsi1'    => $request->Titledeskripsi,
            'deskripsi'     => $request->vdeskripsi,
        ];

        
        // Upload gambar baru jika ada
        if ($request->hasFile('vthumbnail')) {
            $gambar = $request->file('vthumbnail');
            $filename = date('Y-m-d') . $gambar->getClientOriginalName();
            $path = 'about/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($gambar));
            $data['image'] = $filename;
        }

        $service->update($data);
        

        return redirect()->route('AboutWebsite')->with('success', 'Data Berhasil dirubah');
    }
}
