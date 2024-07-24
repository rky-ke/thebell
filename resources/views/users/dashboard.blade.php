<x-header />
<x-layout>
    <x-slot name="title">
        The Bell
    </x-slot>
    <h1 class="title">Hello {{ auth()->user()->username }}, You have {{ $bells->total() }} bells </h1>
    {{-- Ring a Bell --}}
    <div class="mx-auto max-w-screen-sm card">
        <h1 class="font-bold text-xl">Ring a Bell</h1>
        {{-- Session Messages --}}
        @if (session('success'))
            <div class="mb-2">
                <x-flashMsg msg="{{ session('success') }}" bg="bg-yellow-500"/>
            </div>
        @endif
    
        <form action="{{ route('bells.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-8">
                <label for="title" class="label">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="input @error('title') ring-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-8">
                <label for="body" class="label">Body</label>
                <textarea name="body" id="body" class="input @error('body') ring-red-500 @enderror">{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

                {{-- Add Cover Photo --}}
            <div class="mb-8">
                <label for="image" class="label">Add Cover Photo</label>
                <input type="file" name="image" id="image" class="input @error('image') ring-red-500 @enderror">
                @error('image')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Submit Button --}}
            <button type="submit" class="btn">Ring</button>
        </form>

        {{-- User Posts --}}
        <h1 class="font-bold text-xl mt-8">Your Latest Bells</h1>
        <div class="grid grid-cols-2 gap-6">
            @forelse ($bells as $bell)
                <x-bellCard :bell="$bell" >
                    {{-- Uppdate Bell --}}
                    <a href="{{ route('bells.edit', $bell) }}" class="bg-green-500 text-white px-2 py-2 text-xs rounded-md">Tune</a>
                    {{-- Delete Bell --}}
                    <form action="{{ route('bells.destroy', $bell) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-2 text-xs rounded-md ">Silence</button>
                    </form>
                </x-bellCard>
            @empty
                <p>No Bells Yet</p>
            @endforelse
            
        </div>
        <div>
            {{ $bells->links() }}
        </div>
    </div>
</x-layout>
<x-footer />