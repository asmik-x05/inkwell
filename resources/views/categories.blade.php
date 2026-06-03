<x-layout>
    <div class="h-screen flex justify-center items-center text-gray-100">
        <h1 class="text-xl">Hello from Category Page</h1>
        @foreach ($categories as $item)
            {{ $item->name }}
        @endforeach
    </div>
</x-layout>
