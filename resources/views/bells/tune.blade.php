<x-header />
<x-layout>
    <x-slot name="title">
        The Bell
    </x-slot>
    <a href="{{ route('dashboard') }}" class="block mb-2 text-xs text-blue-500">&larr; Back to Dashboard</a>
    {{-- Tune the Bell --}}
    <div class="mx-auto max-w-screen-s card">
        <h1 class="font-bold text-xl">Tune the Bell</h1>
        {{-- Session Messages --}}
        @if (session('success'))
            <div class="mb-2">
                <x-flashMsg msg="{{ session('success') }}" bg="bg-yellow-500"/>
            </div>
        @endif
    <form action="{{ route('bells.update', $bell) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="label">Title</label>
            <input type="text" name="title" id="title" value="{{ $bell->title }}" class="input @error('title') ring-red-500 @enderror">
            @error('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="body" class="label">Body</label>
            <textarea name="body" id="body" class="input @error('body') ring-red-500 @enderror">{{ $bell->body }}</textarea>
            @error('body')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- Cover Photo --}}
        <div class="mb-4">
            <label for="image" class="label">Cover Photo</label>
            <img src="{{ asset('storage/' . $bell->image) }}" alt="" class="w-full h-64 object-cover mt-4">
            <br>
            <input type="file" name="image" id="image" class="input @error('image') ring-red-500 @enderror">
            @error('image')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        {{-- Submit Button --}}
        <button type="submit" class="btn">Tune</button>
    </form>
    </div>
</x-layout>