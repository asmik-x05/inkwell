<x-layout>
    <div class="h-screen flex justify-center items-center text-gray-100">
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-4 text-center">Register</h1>
            @if ($errors->any())
                <div class="mb-4 text-red-400 text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                    <input type="text" id="name" name="name" class="bg-gray-600 text-gray-300 placeholder:text-gray-500 border border-gray-500 outline-none rounded">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="bg-gray-600 text-gray-300 placeholder:text-gray-500 border border-gray-500 outline-none rounded">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input type="password" id="password" name="password" class="bg-gray-600 text-gray-300 placeholder:text-gray-500 border border-gray-500 outline-none rounded">
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-600 text-gray-300 placeholder:text-gray-500 border border-gray-500 outline-none rounded">
                </div>
                <button type="submit" class="bg-violet-600 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded  w-full">Register</button>
            </form>
            <p class="mt-4 text-center text-sm text-gray-500">
                Already have an account?
                <a href="{{ route('login') }}" class="text-violet-500 hover:text-violet-700">Login here</a>
        </div>
    </div>
</x-layout>
