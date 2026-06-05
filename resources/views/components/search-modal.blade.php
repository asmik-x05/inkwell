<form class="w-full md:w-3/4 lg:w-3/5" method="GET" action="{{ route('search') }}">
    <label for="search" class="block mb-2.5 text-sm font-medium sr-only ">Search</label>
    <div class="flex flex-col sm:flex-row gap-4 w-full">
        <div class="relative bg-gray-500 w-3/4">
            <div class="absolute inset-y-0 inset-s-0 flex items-center ps-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-200"></i>
            </div>
            <input type="search" name="q" id="search" value="{{ request('q') }}"
                class="block w-full p-3 ps-9   text-sm  shadow-xs outline-none" placeholder="Search" required />
            <button type="submit"
                class="absolute inset-e-1.5 bottom-1.5 text-white bg-gray-900  box-border  shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 outline-none">Search</button>
        </div>
        <div class="w-3/4 sm:w-1/4 text-gray-100">
            <select name="sort" id="sort" onchange="this.form.submit()"
                class="block w-full rounded-md bg-gray-900 p-3 text-sm shadow-sm
            outline-none">
                <option value="latest" @selected(request('sort') === 'latest')>Latest</option>
                <option value="oldest" @selected(request('sort') === 'oldest')>Oldest</option>
                <option value="name_asc" @selected(request('sort') === 'name_asc')>Name (A–Z)</option>
                <option value="name_desc" @selected(request('sort') === 'name_desc')>Name (Z–A)</option>
            </select>
        </div>
    </div>
</form>
