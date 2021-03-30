<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Announcements;
use Input;
use Redirect;
use Session;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $announcements=Announcements::all();

        $data=['announcements'=>$announcements];

        return view('admin/announcements/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/announcements/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules =[
            'name'=>'required',
            'nim'=>'required',
            'date'=>'required',
            'time'=>'required',
            'imageFile'=>'required|mimes:jpg,png,jpeg,JPG',
            'contents'=>'required'
        ];

        $pesan=[
            'name.required'=>'Nama Tidak Boleh Kosong',
            'nim.required'=>'NIM Tidak Boleh Kosong',
            'date.required'=>'Tanggal Tidak Boleh Kosong',
            'time.required'=>'Waktu Tidak Boleh Kosong',
            'imageFile.required'=>"Gambar Tidak Boleh Kosong",
            'contents.required'=>'Berita Tidak Boleh Kosong'
        ];

        $validator=Validator::make(Input::all(),$rules,$pesan);

        //jika data ada yang kosong
        if ($validator->fails()) {

            //refresh halaman
            return Redirect::to('admin/announcements/create')
            ->withErrors($validator);

        }else{

            $image=$request->file('imageFile')->store('announcementsImages','public');

            $announcements=new Announcements;

            $announcements->name=$request->name;
            $announcements->nim=$request->nim;
            $announcements->date=$request->date;
            $announcements->time=$request->time;
            $announcements->image=$image;
            $announcements->contents=$request->contents;
            $announcements->save();

            Session::flash('message','Data Berhasil Ditambah');

            return Redirect::to('admin/announcements/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $announcements=Announcements::find($id);

        $d=['announcements'=>$announcements];

        return view('admin/announcements/show')->with($d);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $announcements=Announcements::find($id);
        $d=['announcements'=>$announcements];
        return view('admin/announcements/edit')->with($d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules=[

            'name'=>'required',
            'nim'=>'required',
            'date'=>'required',
            'time'=>'required',
            'imageFile'=>'required|mimes:jpg,png,jpeg,JPG',
            'contents'=>'required'
        ];

        $pesan=[
            'name.required'=>'Nama Tidak Boleh Kosong',
            'nim.required'=>'NIM Tidak Boleh Kosong',
            'date.required'=>'Tanggal Tidak Boleh Kosong',
            'time.required'=>'Waktu Tidak Boleh Kosong',
            'imageFile.required'=>"Gambar Tidak Boleh Kosong",
            'contents.required'=>'Berita Tidak Boleh Kosong'
        ];


        $validator=Validator::make(Input::all(),$rules,$pesan);

        if ($validator->fails()) {
            return Redirect::to('admin/announcements/'.$id.'/edit')
            ->withErrors($validator);

        }else{

            $image="";

            if (!$request->file('imageFile')) {
                # code...
                $image=Input::get('imagePath');
            }else{
                $image=$request->file('imageFile')->store('announcementsImages','public');
            }

            $announcements=Announcements::find($id);

            $announcements->name=$request->name;
            $announcements->nim=$request->nim;
            $announcements->date=$request->date;
            $announcements->time=$request->time;
            $announcements->contents=$request->contents;
            $announcements->image=$image;
            $announcements->save();

            Session::flash('message','Data Berhasil Diubah');

            return Redirect::to('admin/announcements/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $announcements=Announcements::find($id);
        $announcements->delete();

        Session::flash('message','Data Dihapus');
        return Redirect::to('admin/announcements/index');
    }
}
