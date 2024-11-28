<?php

namespace App\Http\Controllers;

use App\Models\Jumbotron;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JumbotronController extends Controller
{
    public function index()
    {
        $dataJumbotron = Jumbotron::get();
        return view("Jumbotron.index", compact('dataJumbotron'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vtitle'        => 'required',
            'vdeskripsi'    => 'required',
            'vslogan'       => 'required',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $jumbotron = Jumbotron::findOrFail($id);

        $data = [
            'title'       => $request->vtitle,
            'deskripsi'   => $request->vdeskripsi,
            'slogan'      => $request->vslogan  
        ];

        $jumbotron->update($data);
        
        return redirect()->route('jumbotron')->with('success', 'Data Berhasil dirubah');
    }
}
