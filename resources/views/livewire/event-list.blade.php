    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Events</h2>
    </x-slot>

    <div class="py-6 px-4">
    <a href="{{ route('events.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded mb-4 inline-block">Create Event</a>
        @if($events->isEmpty())
            <p>No events found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-600">Title</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-600">Event Type</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-600">Event Date</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-600">Event Time</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-600">Event For</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-600">Event Guidelines</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-600">Event Details</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-600">Respond</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $event->title }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $event->event_type }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $event->event_date }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $event->event_time }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    {{ $event->eventFor->name ?? 'N/A' }}
                                </td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $event->event_guidelines }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    <button wire:click="toggleDetails({{ $event->id }})"
                                        class="bg-green-500 hover:bg-green-600 text-white text-sm px-3 py-1 rounded">
                                        {{ $selectedEventId === $event->id ? 'Hide' : 'Show' }} Details
                                    </button>
                                </td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    @php
                                        $currentUser = auth()->user();
                                        $invitedUser = $event->invitedUsers->firstWhere('id', $currentUser->id);
                                    @endphp

                                    @if($invitedUser)
                                        @if($invitedUser->pivot->status === null)
                                            <a href="{{ route('events.invite.respond', $event->id) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                                                Respond
                                            </a>
                                        @else
                                            <span class="text-green-600 font-semibold text-sm">
                                                Responded ({{ ucfirst($invitedUser->pivot->status) }})
                                            </span>
                                        @endif
                                    @else
                                        <span class="text-gray-500 text-sm">Not Invited</span>
                                    @endif
                                </td>



                            </tr>
                            @if($selectedEventId === $event->id)
                            <tr class="bg-gray-100">
                                <td colspan="7" class="p-4 text-sm text-gray-700">
                                    <strong>Event For:</strong> {{ $event->eventFor->name ?? 'N/A' }}<br>
                                    <strong>Guidelines:</strong> {{ $event->event_guidelines }}<br>
                                    <strong>Invited Users:</strong>
                                    {{ $event->invitedUsers->pluck('name')->join(', ') ?? 'None' }}
                                </td>
                            </tr>
                            @endif

                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
