<x-layout>
    
    <div class="h-screen flex justify-center items-center text-gray-100">
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-4 text-center">Login</h1>           
            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="bg-gray-600 text-gray-300 placeholder:text-gray-500 border border-gray-500 outline-none rounded">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-600 text-gray-300 placeholder:text-gray-500 border border-gray-500 outline-none rounded">
                </div>
                <button type="submit"
                    class="bg-violet-600 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded w-full">Login</button>
            </form>
            <p class="mt-4 text-center text-sm text-gray-500">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-violet-500 hover:text-violet-700">Register here</a>
        </div>
    </div>
    </div>
    
</x-layout>
