<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\User;

class EventManager extends Component
{
    public $title, $date, $time, $event_type, $event_for, $event_guidelines;
    public $users, $invitations = [];

    public function mount()
    {
        $this->users = User::all();
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'event_type' => 'required|string',
            'event_for' => 'required|exists:users,id',
            'event_guidelines' => 'nullable|string',
        ]);

        $event = Event::create([
            'title' => $this->title,
            'date' => $this->date,
            'time' => $this->time,
            'event_type' => $this->event_type,
            'event_for' => $this->event_for,
            'event_guidelines' => $this->event_guidelines,
            'created_by' => auth()->id(),
        ]);

        // Attach invitations
        if (!empty($this->invitations)) {
            $event->invitations()->createMany(
                collect($this->invitations)->map(fn($userId) => ['user_id' => $userId])->toArray()
            );
        }

        session()->flash('success', 'Event Created Successfully');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.event-manager');
    }
}
