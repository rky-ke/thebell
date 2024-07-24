<x-header />
<x-layout>
    <x-slot name="title">
        The Bell
    </x-slot>
    <h1 class="title">Latest Bells</h1>
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
