<?php

namespace App\Http\Controllers;

use App\DataTables\RemindersDataTable;
use App\Models\Reminder;
use App\Models\User;
use Illuminate\Http\Request;
use Datatables;

class ReminderController extends Controller
{
    /**
     * Listing of Reminders
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Reminder::select('*'))
            ->addColumn('action', 'reminders.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('reminders.index');
    }

    /**
     * Opens up create reminder form
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reminders.create');
    }

    /**
     * Store new reminder.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:251',
            'description'   => 'nullable|string',
            'date_time'     => 'required'
        ]);

        $reminder = Reminder::create($request->only('title', 'description', 'date_time'));

        return redirect()->route('reminders.index')->with('success', 'Reminder has been created successfully.');
    }

    /**
     * Display the specified reminder.
     *
     * @param  \App\reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        return view('reminders.show', compact('reminder'));
    }

    /**
     * Opens up edit form Reminder
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit(Reminder $reminder)
    {
        return view('reminders.edit', compact('reminder'));
    }

    /**
     * Update the reminder
     *
     * @param  \Illuminate\Http\Request  $request
     
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|string|max:251',
            'description'   => 'nullable|string',
            'date_time'     => 'required'
        ]);

        $reminder = Reminder::findOrFail($id);
        $reminder->update($request->only('title', 'description', 'date_time'));

        return redirect()->route('reminders.index')->with('success', 'Reminder Has Been updated successfully');
    }

    /**
    * Deletes reminder
    *
    * @param  \App\Reminder  $reminder
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request)
    {
        $reminder = Reminder::findOrFail($request->id)->delete();

        // return Response()->json($reminder);
        return redirect()->route('reminders.index')->with('success', 'Reminder Has Been updated successfully');
    }
}
