<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Lead;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LeadController extends Controller
{
    public function index(){
        $leads=Lead::paginate(1);
        return Inertia::render('Leads/index',compact(['leads']));
    }
    public function create(){
        return Inertia::render('Leads/create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required | email | unique:leads,email',
            'dob'=>'required | date',
            'phone'=>'required',
        ]);
        Lead::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'dob'=>$request->dob,
            'phone'=>$request->phone,
            'interested_package'=>$request->package,
            'branch_id'=>1,
            'age'=>1,
            'added_by'=>auth()->id(),
        ]);
        return redirect()->route('dash');
    }

    public function view(Lead $leadprop){
        $leadprop->load('reminders');

        return Inertia::render('Leads/view',compact('leadprop'));
    }

    public function update(Request $request){
    try{

        $lead=Lead::find($request->id);
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required | email ',
            'dob'=>'required | date',
            'phone'=>'required',
        ]);
        $lead->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'dob'=>$request->dob,
            'phone'=>$request->phone,
            'interested_package'=>$request->package,
            'branch_id'=>1,
        ]);
        return redirect()->route('dash');
    }catch(\Exception $e){
        return $e;
    }
        
    }
}
