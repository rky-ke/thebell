<x-header />
<x-layout>
    <x-slot name="title">
        The Bell
    </x-slot>
    <h1 class="title">Loggin to ring a bell</h1>
    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-8">
                <label for="email" class="label">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="input @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-8">
                <label for="password" class="label">Password</label>
                <input type="password" name="password" id="password" class="input @error('password') ring-red-500 @enderror">
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-8">
                <label for="remember" class="label">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    Remember me
                </label>

            @error('failed')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            {{-- Submit Button --}}
            <button type="submit" class="btn">Login</button>
        </form>
</x-layout>
<x-footer />
