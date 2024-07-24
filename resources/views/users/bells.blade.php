<x-header />
<x-layout>
    <x-slot name="title">
        The Bell
    </x-slot>
    <h1 class="title">{{ $user->username }}'s Posts {{ $bells->total() }}</h1>
    {{-- User's Bells --}}
    <div class="grid grid-cols-2 gap-6">
        @foreach ($bells as $bell)
        <x-bellCard :bell="$bell" />
        @endforeach
    </div>
    <div>
        {{ $bells->links() }}
    </div>
    
</x-layout>
<x-footer />