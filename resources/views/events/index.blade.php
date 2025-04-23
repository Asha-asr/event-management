@extends('layouts.app') {{-- or layouts.main depending on your layout --}}
@section('content')
    <div class="container mx-auto py-4">
        @livewire('event-manager')
    </div>
@endsection
