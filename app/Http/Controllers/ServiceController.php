<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $getService = Service::get();
        return view("Service/index", compact('getService'));
    }
    public function update(Request $request, $id)
    {
        $validator = FacadesValidator::make($request->all(), [
            'vtitle'        => 'required',
            'vdeskripsi'     => 'required',
            'vthumbnail'    => 'nullable| image |mimes:jpeg,jpg,png,gif|max:2048',

        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $service = Service::findOrFail($id);

        $data = [
            'title'         => $request->vtitle,
            'deskripsi'     => $request->vdeskripsi,
        ];

        
        // Upload gambar baru jika ada
        if ($request->hasFile('vthumbnail')) {
            $gambar = $request->file('vthumbnail');
            $filename = date('Y-m-d') . $gambar->getClientOriginalName();
            $path = 'service/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($gambar));
            $data['image'] = $filename;
        }

        $service->update($data);
        

        return redirect()->route('ServiceWebsite')->with('success', 'Data Berhasil dirubah');
    }
}
