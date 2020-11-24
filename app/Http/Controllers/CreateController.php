<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class CreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
        ]);

        $fileName = time().'.'.$request->file->extension();

        $request->file->move(public_path('file'), $fileName);

        /* Store $fileName name in DATABASE from HERE */
        File::create(['name' => $fileName]);

        return back()
            ->with('success','You have successfully file uplaod.')
            ->with('file',$fileName);
    }
}
