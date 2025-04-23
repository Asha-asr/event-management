<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Create Event</h2>

    @if (session()->has('success'))
        <div class="p-2 bg-green-100 text-green-700 mb-4">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">
        <input type="text" wire:model="title" placeholder="Event Title" class="w-full border p-2">
        <input type="date" wire:model="date" class="w-full border p-2">
        <input type="time" wire:model="time" class="w-full border p-2">
        <input type="text" wire:model="event_type" placeholder="Event Type" class="w-full border p-2">

        <select wire:model="event_for" class="w-full border p-2">
            <option value="">Select User</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <textarea wire:model="event_guidelines" placeholder="Event Guidelines" class="w-full border p-2"></textarea>

        <label>Invite Users:</label>
        <div class="grid grid-cols-2 gap-2">
            @foreach($users as $user)
                <label>
                    <input type="checkbox" wire:model="invitations" value="{{ $user->id }}">
                    {{ $user->name }}
                </label>
            @endforeach
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Create Event</button>
    </form>
</div>
