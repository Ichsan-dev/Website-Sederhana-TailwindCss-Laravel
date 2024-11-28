<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PortofolioController extends Controller
{
    public function index()
    {
        $getPortofolio = Portofolio::get();
        return view('Portofolio/index', compact('getPortofolio'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'        => 'required',
            'deskripsi'     => 'required',
            'titleImage'    => 'required',
            'vthumbnail'    => 'nullable| image |mimes:jpeg,jpg,png,gif|max:2048',

        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $service = Portofolio::findOrFail($id);

        $data = [
            'title'         => $request->title,
            'deskripsi'     => $request->deskripsi,
            'titleImage'    => $request->titleImage
        ];

        
        // Upload gambar baru jika ada
        if ($request->hasFile('vthumbnail')) {
            $gambar = $request->file('vthumbnail');
            $filename = date('Y-m-d') . $gambar->getClientOriginalName();
            $path = 'portofolio/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($gambar));
            $data['image'] = $filename;
        }

        $service->update($data);

        return redirect()->route('PortofolioWebsite')->with('success', 'Data Berhasil dirubah');
    }
}
