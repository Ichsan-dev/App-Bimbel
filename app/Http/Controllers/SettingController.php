<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $datasetting = setting::get();
        return view('poinAkses/admin/KelolaWebsite/Setting/index', compact('datasetting'));
    }

    public function update(Request $request, $id)
    {
           $validator = Validator::make($request->all(), [

            'vdata'     => 'required'
        
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = [
            'value'  => $request->vdata,
        ];

        setting::findOrFail($id)->update($data);
        return redirect()->route('SettingWebsite')->with('success', 'Data berhasil diperbarui');
    }
}
