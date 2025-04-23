<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\User;   


class EventCreate extends Component
{
    public $title, $date, $time, $type, $event_guidelines, $event_for, $invited_users = [];



    public function submit()
    {
        try {

        $this->validate([
            'title' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'type' => 'required',
            'event_guidelines' => 'nullable|string',
            'event_for' => 'required|exists:users,id',
            'invited_users' => 'nullable|array',
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->validator->errors()->toArray());
    }

        $event = Event::create([
            'creator_id' => auth()->id(),
            'event_for_id' => $this->event_for,
            'title' => $this->title,
            'event_date' => $this->date,
            'event_time' => $this->time,
            'event_type' => $this->type,
            'event_guidelines' => $this->event_guidelines,
        ]);

        if (!empty($this->invited_users)) {
            $event->invitedUsers()->sync($this->invited_users);
        }
    

        session()->flash('message', 'Event created successfully.');
        return redirect()->route('events.list');
    }

    public function render()
    {
        return view('livewire.event-create', [
            'users' => User::where('id', '!=', auth()->id())->get(),
        ])->layout('layouts.app');
        // return view('livewire.event-create')->layout('layouts.app');
    }
}
