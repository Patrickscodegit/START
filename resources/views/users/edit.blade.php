<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-2">Edit Account Info</h2>
            <p class="text-1xl font-bold uppercase mb-4">Editing: {{ $user->name }}</p> <!-- Assuming the user model has no company attribute -->
        </header>

        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="container mx-auto mt-5">
                <h1 class="text-1xl font-bold uppercase mb-4 underline">Personal Info:</h1>

                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">Full name</label>
                    <input type="text" id="name" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{ old('name', $user->name) }}"/>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

      

                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">Password</label>
                    <input type="password" id="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="password_confirmation" class="inline-block text-lg mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
                </div>
                
   
    
  
<div class="mb-6 text-right">
    <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black focus:outline-none focus:ring-2 focus:ring-laravel focus:ring-opacity-50">Update User</button>
    <a href="{{ route('users.show', ['id' => auth()->id()]) }}" class="text-black ml-4">Back</a>
</div>
</div>
</form>
</x-card>
</x-layout>