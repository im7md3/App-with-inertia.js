<?php

namespace App\Http\Controllers;

use App\Lead;
use App\Reminder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReminderController extends Controller
{
    public function add(Lead $lead){
        return Inertia::render('Leads/Reminders/add',compact('lead'));
    }
    public function store(Request $request){
        $reminder=Reminder::create([
            'lead_id'=>$request->lead,
            'user_id'=>auth()->id(),
            'reminder'=>$request->reminder,
            'reminder_date'=>$request->date,
            'status'=>'active',
        ]);

        return redirect()->route('lead.view',$request->lead);
    }

    public function view(Lead $lead,Reminder $remind){
        return Inertia::render('Leads/Reminders/view',compact(['lead','remind']));
    }

    public function update(Request $request,Reminder $remind){
        $remind->update([
            'reminder'=>$request->reminder,
            'reminder_date'=>$request->date,
            'status'=>'pinding',
        ]);

        return redirect()->route('lead.view',$remind->user_id);
    }
}
