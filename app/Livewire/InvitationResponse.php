<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class InvitationResponse extends Component
{
    public $latestEvent;

    public function mount()
    {
        $this->events = Event::orderBy('created_at', 'desc')->get();
        $this->latestEvent = $this->events->first(); // Add this line
    }

    public function accept()
    {
        $this->event->invitedUsers()->updateExistingPivot(Auth::id(), ['status' => 'accepted']);
        session()->flash('message', 'You have accepted the invitation.');
    }

    public function reject()
    {
        $this->event->invitedUsers()->updateExistingPivot(Auth::id(), ['status' => 'rejected']);
        session()->flash('message', 'You have rejected the invitation.');
    }

    
    public function render()
    {
        return view('livewire.invitation-response')->layout('layouts.app');;
    }
}
