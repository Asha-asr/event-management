    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create New Event</h2>
    </x-slot>

    <div class="py-6 px-4">
        <!-- Livewire Form -->
        <form wire:submit.prevent="submit">
        @if ($errors->any())
    <div class="text-red-500">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Event Title</label>
                    <input type="text" id="title" wire:model="title" class="mt-1 block w-full" required>
                </div>

                <div>
                    <label for="event_date" class="block text-sm font-medium text-gray-700">Event Date</label>
                    <input type="date" id="event_date" wire:model="date" class="mt-1 block w-full" required>
                </div>

                <div>
                    <label for="event_time" class="block text-sm font-medium text-gray-700">Event Time</label>
                    <input type="time" id="event_time" wire:model="time" class="mt-1 block w-full" required>
                </div>

                <div>
                    <label for="event_type" class="block text-sm font-medium text-gray-700">Event Type</label>
                    <select id="event_type" wire:model="type" class="mt-1 block w-full" required>
                        <option value="Meeting">Meeting</option>
                        <option value="Celebration">Celebration</option>
                        <option value="Seminar">Seminar</option>
                    </select>
                </div>

                <div>
                    <label for="event_for" class="block text-sm font-medium text-gray-700">Event For</label>
                    <select id="event_for" wire:model="event_for" class="mt-1 block w-full" required>
                        <option value="">-- Select User --</option> {{-- Add this line --}}
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>

                    @error('event_for') <span class="text-red-500">{{ $message }}</span> @enderror

                </div>

                <div>
                    <label for="invited_users" class="block text-sm font-medium text-gray-700">Invite Users</label>
                    <select multiple id="invited_users" wire:model="invited_users" class="mt-1 block w-full">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div>
                    <label for="event_guidelines" class="block text-sm font-medium text-gray-700">Event Guidelines</label>
                    <textarea id="event_guidelines" wire:model="event_guidelines" rows="4" class="mt-1 block w-full"></textarea>
                </div>

                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create Event</button>
                </div>
            </div>
        </form>
    </div>
