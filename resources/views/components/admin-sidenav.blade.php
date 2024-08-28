<div class="fixed left-0 top-0 w-64 h-full bg-[#f8f4f3] p-4 z-50 sidebar-menu transition-transform">
    <a href="{{route('admin.dashboard')}}" class="flex items-center pb-4 border-b border-b-gray-800">

        <h2 class="font-bold text-2xl">YOUR  <span class="bg-orange-500 text-white px-2 rounded-md">LOGO</span></h2>
    </a>
    <ul class="mt-4">
        <span class="text-gray-400 font-bold">DashBoard</span>
        <li class="mb-1 group">
            <a href="{{route('admin.dashboard')}}"
                class="flex font-semibold items-center py-2 px-4 text-black hover:bg-[#f8ece8] rounded-md">
                <img src="{{ asset('images/dashboard.png') }}" class="w-6 h-6 text-blue-500 mr-3" alt="inbox Icon">
                <span class="text-sm">Dashboard</span>
            </a>
        </li>

        <span class="text-gray-400 font-bold">Pages</span>
        <li class="mb-1 group">
            <a href="{{route('admin.category')}}"
                class="flex font-semibold items-center py-2 px-4 text-black hover:bg-[#f8ece8] rounded-md">
                <img src="{{ asset('images/list.png') }}" class="w-6 h-6 text-blue-500 mr-3" alt="hospital Icon">
                <span class="text-sm">Category Manage</span>
            </a>
        </li>
        <span class="text-gray-400 font-bold">Setting</span>
        <li class="mb-1 group">
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="flex font-semibold items-center py-2 px-4 text-black hover:bg-[#f8ece8] rounded-md w-full">
                    <img src="{{ asset('images/logout.png') }}" class="w-6 h-6 text-blue-500 mr-3" alt="logout Icon">
                    <span class="text-sm">Log out</span>
                </button>
            </form>
        </li>        
    </ul>
</div>