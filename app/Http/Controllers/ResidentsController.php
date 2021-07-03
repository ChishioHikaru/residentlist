<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Resident;

class ResidentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $residents = $user->residents()->orderBy('created_at')->paginate(10);
            
            $data = [
                'residents' => $residents,
                ];
        }
        return view('welcome', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resident = new Resident;
        
        return view('residents.create', [
            'resident' => $resident,
        ]);
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
            'tenant_number' => 'required|max:8',
            'resident_name' => 'required|max:20',
            'tel' => 'required|max:14',
        ]);
        
        
        $request->user()->residents()->create([
            'tenant_number' => $request->tenant_number,
            'resident_name' => $request->resident_name,
            'tel' => $request->tel,
            'content' => $request->content,
        ]);

        return redirect('/residents');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resident = Resident::findOrFail($id);
        
        if (\Auth::id() === $resident->user_id) {
            return view('residents.show', [
            'resident' => $resident,
        ]);
        }
        
        return redirect('/');
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resident = Resident::findOrFail($id);

        if (\Auth::id() === $resident->user_id) {
        return view('residents.edit', [
            'resident' => $resident,
        ]);
        }
        
        return redirect('/');
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
   
        $request->validate([
            'tenant_number' => 'required|max:8',
            'resident_name' => 'required|max:20',
            'tel' => 'required|max:14',
        ]);
        
        $resident = Resident::findOrFail($id);
        $resident->tenant_number = $request->tenant_number;
        $resident->resident_name = $request->resident_name;
        $resident->tel = $request->tel;
        $resident->content = $request->content;
        $resident->save();

        return redirect('/');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resident = \App\Resident::findOrFail($id);

        if (\Auth::id() === $resident->user_id) {
            $resident->delete();
        }

        return redirect('/');
        
    }
    
    
    public function delinquents()
    {
        $data = [];
        
            $user = \Auth::user();
            $delinquents = $user->residents()->where('is_delinquented', true)->orderBy('created_at')->paginate(10);
            
            $data = [
                'residents' => $delinquents,
                ];
        
        return view('residents.delinquents', $data);
    }
    
    
    
    public function delinquent($id)
    {
        $resident = Resident::findOrFail($id);
        $resident->is_delinquented = true;
        $resident->save();
        
        return redirect('/');
    }
    
    
    public function undelinquent($id)
    {
        $resident = Resident::findOrFail($id);
        $resident->is_delinquented = false;
        $resident->save();
        
        return redirect('/delinquents');
    }
}