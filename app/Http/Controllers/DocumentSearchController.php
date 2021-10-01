<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentSearchController extends Controller
{
    //Halaman Index
    public function index(Request $request){
        if($request->get('keyword')){
            $results['documents'] = Document::search($request->get('keyword'))->paginate(5);
        }
        else{
            $results['documents'] = Document::paginate(5);
        }
        return view('index', $results);
    }

    //Halaman Form Upload
    public function upload(){
        return view('upload');
    }

    //Upload Action
    public function uploadAction(Request $request){
        $data = $request->except('_token', 'dokumen');
        if($request->hasFile('dokumen')){
            $nama_file = $request->file('dokumen')->getClientOriginalName();
            $dokumen = $request->file('dokumen');
            $tujuan_upload_file = 'dokumen';
            $data['dokumen'] = $nama_file;

            //Read isi file
            $class_reader = config('filereader.'.$request->file('dokumen')->getMimeType());
            $reader = new $class_reader;

            $data['body'] = $reader->getContents($request->file('dokumen'));

            if($dokumen->move($tujuan_upload_file, $nama_file)){
                Document::create($data);
            }

            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

}
