<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">

    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            User Dashboard
        </h2>
    </br>
        <p class="text-1xl font-bold uppercase mb-1">Account info</p>
    </header>


        <div class="container mx-auto mt-5">
            <h1 class="text-1xl font-bold uppercase mb-1 underline">Personal info:</h1>

            <div><strong>Full Name:</strong> {{ $user->name }}</div>
            <div><strong>Email:</strong> {{ $user->email }}</div>
            <div><strong>Second Email:</strong> {{ $user->email }}</div>
            <div><strong>Tel nr:</strong> {{ $user->email }}</div>
            <div><strong>Mobile nr:</strong> {{ $user->email }}</div>
        </br>
            <h1 class="text-1xl font-bold uppercase mb-1 underline">Company details:</h1>
            <div><strong>Company Name:</strong> {{ $user->name }}</div>
            <div><strong>Company Address:</strong> {{ $user->email }}</div>
            <div><strong>Country:</strong> {{ $user->email }}</div>
            <div><strong>Website:</strong> {{ $user->email }}</div>
            <div><strong>TAX ID or VAT nr</strong> {{ $user->email }}</div>
            <div><strong>European Eori nr</strong> {{ $user->email }}</div>

            <!-- Add more fields as necessary -->
        </div>
   
    
        <div class="mt-8">
            <p>
                Update your account:
                <a href="{{ route('users.edit', ['id' => auth()->id()]) }}" class="text-laravel"
                    >edit</a
                >
            </p>
        </div>
    </x-card>
</x-layout>