@props(['bell', 'full' => false])
<div class="card">
    <h1 class="font-bold text-xl">{{ $bell->title }}</h1>
    {{-- Cover Photo  --}}
    @if ($bell->image)
        <img src="{{ asset('storage/' . $bell->image) }}" alt="" class="w-full h-64 object-cover mt-4">
    @else
        <img src="{{asset('storage/bells_image/default-image.webp')}}" alt="" class="w-full h-64 object-cover mt-4">
    @endif

    {{-- Author and Date --}}
    <div class="flex items center gap-4">
        <img src="https://picsum.photos/200" alt="" class="h-8 w-8 rounded-full">
        <span class="text-sm text-gray-500">Posted {{ $bell->created_at->diffForHumans() }} By</span>
        <a href="{{ route('bells.user', $bell->user) }}" class="text-blue-500">{{ $bell->user->username }}</a>
    </div>
    {{-- Body --}}
    <hr class="my-4">
    @if ($full)
        <p>{{ $bell->body }}</p>        
    @else
    <span class="text-gray-700">{{ Str::words($bell->body, 15) }}</span>
    {{-- Bell Actions --}}
    <a href="{{ route('bells.show', $bell) }}" class="text-blue-500 ml-2">Listen &rarr;</a>  
    @endif


    {{-- Bell Actions --}}
    <div class="flex items-center justify-end gap-4 mt-6">
        {{ $slot }}
    </div>
</div>