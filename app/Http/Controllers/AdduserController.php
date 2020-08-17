<?php

namespace App\Http\Controllers;

use App\Adduser;
use Illuminate\Http\Request;

class AdduserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addusers = Adduser::latest()->paginate(5);
        return view('addusers.index', compact('addusers'))
            ->with('i', (request()->input('page',1)-1)*5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addusers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
  
        Adduser::create($request->all());
   
        return redirect()->route('addusers.index')
                        ->with('success','user created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adduser  $adduser
     * @return \Illuminate\Http\Response
     */
    public function show(Adduser $adduser)
    {
        return view('addusers.show',compact('adduser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adduser  $adduser
     * @return \Illuminate\Http\Response
     */
    public function edit(Adduser $adduser)
    {
        return view('addusers.edit',compact('adduser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adduser  $adduser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adduser $adduser)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
  
        $adduser->update($request->all());
  
        return redirect()->route('addusers.index')
                        ->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adduser  $adduser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adduser $adduser)
    {
        //
        $adduser->delete();
  
        return redirect()->route('addusers.index')
                        ->with('success','User deleted successfully');
    }
}
