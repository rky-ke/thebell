<x-header />
<x-layout>
    <x-slot name="title">
        The Bell
    </x-slot>
    <h1 class="title">Register New Account</h1>
    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-8">
                <label for="name" class="label">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" class="input @error('username') ring-red-500 @enderror">
                @error('username')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
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
                <label for="password_confirmation" class="label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input @error('password') ring-red-500 @enderror">
                @error('password_confirmation')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn">Register</button>
        </form>
</x-layout>
<x-footer />
