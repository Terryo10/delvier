<?php

namespace App\Http\Controllers;

use App\globalCommision;
use Illuminate\Http\Request;

class GlobalCommisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commision = globalCommision::all();
        return view('admin.commision.index')
            ->with('commision', $commision);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.commision.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commision = new globalCommision();
        $commision->percentage = $request->input('percentage');
        $commision->save();
        return redirect('/commision')->with('success', 'Global Commision Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\globalCommision  $globalCommision
     * @return \Illuminate\Http\Response
     */
    public function show(globalCommision $globalCommision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\globalCommision  $globalCommision
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = globalCommision::findorfail($id);
        return view('admin.commision.edit')->with('results', $results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\globalCommision  $globalCommision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'percentage' => 'required|numeric',
        ]);

        $user = globalCommision::findOrFail($id);
        $user->update([
            'percentage' => $request->input('percentage'),
        ]);
        return redirect()->back()->with('success', 'Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\globalCommision  $globalCommision
     * @return \Illuminate\Http\Response
     */
    public function destroy(globalCommision $globalCommision)
    {
        //
    }
}
