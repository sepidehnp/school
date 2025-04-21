<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.announcement.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message'=>'required',
            'type'=>'required'
        ]);
        $announcement = new Announcement();
        $announcement->message = $request->message;
        $announcement->type = $request->type;
        $announcement->save();
        return redirect()->route('announcement.create')->with('success','Announcement broadcast successfully');
    }


    public function read()
    {
        $data['announcements'] = Announcement::latest()->get();
        return view('admin.announcement.list',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
