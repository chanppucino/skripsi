<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Schedules;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Announcements;



class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schedules=Schedules::all();

        $data=['schedules'=>$schedules];

        return view('admin/schedules/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/schedules/create');

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
            'name'=>'required|min:5|max:40',
            'nim'=>'required|numeric',
            'date'=>'required',
            'time'=>'required',
            'file'=>'required|mimes:png'
        ];

        $pesan=[
            'name.required'=>'Nama Tidak Boleh Kosong',
            'nim.required'=>'NIM Tidak Boleh Kosong',
            'date.required'=>'Tanggal Tidak Boleh Kosong',
            'time.required'=>'Waktu Tidak Boleh Kosong',
            'file.required'=>"Foto Tidak Boleh Kosong",
        ];

        $validator=Validator::make($request->all(),$rules,$pesan);

        //jika data ada yang kosong
        if ($validator->fails()) {

            //refresh halaman
            return Redirect::to('admin/schedules/create')
            ->withErrors($validator);

        }else{

            $file=$request->file('file')->store('schedulesImages','public');

            $schedules=new Announcements;

            $schedules->name=$request->name;
            $schedules->nim=$request->nim;
            $schedules->date=$request->date;
            $schedules->time=$request->time;
            $schedules->file=$file;
            $schedules->save();

            Session::flash('message','Data Berhasil Ditambah');

            return Redirect::to('admin/schedules/index');
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
    }
}
