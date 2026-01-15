<header class="bg-white shadow">
    <nav class="container mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('vehicles.index') }}" class="text-xl font-bold text-gray-800">
            Logo
        </a>

        <div class="flex items-center space-x-6">
            <a href="{{ route('users.index') }}" class="">
                Users
            </a>
            <a href="{{ route('vehicles.index') }}" class="">
                Vehicles
            </a>
        </div>
    </nav>
</header>
