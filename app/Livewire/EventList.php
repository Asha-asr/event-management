<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventList extends Component
{
    public $events;
    public $selectedEventId = null;
    public $latestEvent = null;


   
    public function mount()
    {
        // $this->events = Event::all();
        $this->events = Event::with('eventFor', 'invitedUsers')->get();

        // $this->latestEvent = $this->events->first(); 

        $this->events = Event::with('eventFor')
                            ->where('creator_id', auth()->id())
                            ->orderBy('created_at', 'desc') 
                            ->get();
    }


    public function render()
    {
        // return view('livewire.event-list');
        return view('livewire.event-list')->layout('layouts.app');

    }
    // public function render()
    // {
    //     return view('livewire.event-list', [
    //         'events' => Event::with('eventFor')->where('creator_id', auth()->id())->get()
    //     ])->layout('layouts.app');
    // }


    public function toggleDetails($eventId)
    {
        $this->selectedEventId = $this->selectedEventId === $eventId ? null : $eventId;
    }


}
