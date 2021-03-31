<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use App\Http\Requests\AnnouncementsRequest;

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
        $announcements = Announcements::all();

        $data = ['announcements' => $announcements];

        return view('admin/announcements/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/announcements/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementsRequest $request)
    {
        $image = $request->file('imageFile')->store('announcementsImages', 'public');

        $announcements = new Announcements;

        $announcements->name = $request->name;
        $announcements->nim = $request->nim;
        $announcements->date = $request->date;
        $announcements->time = $request->time;
        $announcements->image = $image;
        $announcements->contents = $request->contents;
        $announcements->save();

        return redirect('admin/announcements/index')->with('message', 'Data Berhasil Ditambah');
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
        $announcements = Announcements::find($id);

        $d = ['announcements' => $announcements];

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
        $announcements = Announcements::find($id);
        $d = ['announcements' => $announcements];
        return view('admin/announcements/edit')->with($d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementsRequest $request, $id)
    {
        $image = "";

        if (!$request->file('imageFile')) {
            # code...
            $image = $request->imagePath;
        } else {
            $image = $request->file('imageFile')->store('announcementsImages', 'public');
        }

        $announcements = Announcements::find($id);

        $announcements->name = $request->name;
        $announcements->nim = $request->nim;
        $announcements->date = $request->date;
        $announcements->time = $request->time;
        $announcements->contents = $request->contents;
        $announcements->image = $image;
        $announcements->save();

        return redirect('admin/announcements/index')->with('message', 'Data Berhasil Diubah');
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
        $announcements = Announcements::find($id);
        $announcements->delete();

        return redirect('admin/announcements/index')->with('message', 'Data Dihapus');
    }
}
