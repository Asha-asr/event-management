<x-app-layout>
    <div class="max-w-2xl mx-auto py-6">
        <h2 class="text-2xl font-semibold">{{ $event->title }}</h2>
        <p class="mt-2">Date: {{ $event->event_date }} at {{ $event->event_time }}</p>
        <p>Type: {{ $event->event_type }}</p>
        <p class="mt-2">Guidelines: {{ $event->event_guidelines ?? 'N/A' }}</p>

        @if (session()->has('message'))
            <div class="mt-4 text-green-600">{{ session('message') }}</div>
        @endif

        <div class="mt-6 space-x-4">
            <button wire:click="accept" class="bg-green-500 text-white px-4 py-2 rounded">Accept</button>
            <button wire:click="reject" class="bg-red-500 text-white px-4 py-2 rounded">Reject</button>
        </div>
    </div>
</x-app-layout>
