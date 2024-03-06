<div id="sidebar" class="hidden sm:flex flex-col h-screen bg-gray-800 p-2 text-white font-thin w-64 justify-between sticky">
    <div>
        <h1 class="text-xl p-2">Book Inventory</h1>
        <hr class="mb-4 mt-2 border-gray-400">
        <ul class="flex flex-col gap-2 text-sm">
            <a href="/" class="p-2 rounded hover:shadow-gray-900 hover:bg-red-500 cursor-pointer">
                <li>Home</li>
            </a>
            <a href="/books" class="p-2 rounded hover:shadow-gray-900 hover:bg-red-500 cursor-pointer">
                <li>Books</li>
            </a>
            <a href="/about" class="p-2 rounded hover:shadow-gray-900 hover:bg-red-500 cursor-pointer">
                <li>About Us</li>
            </a>
            @if(Auth::check())
            <a href="/cart" class="p-2 rounded hover:shadow-gray-900 hover:bg-red-500 cursor-pointer">
                <li>View Cart</li>
            </a>
            <a href="/orders" class="p-2 rounded hover:shadow-gray-900 hover:bg-red-500 cursor-pointer">
                <li>My Orders</li>
            </a>
            @if(Auth::user()->admin())
            <hr class="my-2 border-gray-600">
            <a href="/admin/books" class="p-2 rounded hover:shadow-gray-900 hover:bg-red-500 cursor-pointer">
                <li>Manage Books</li>
            </a>
            <a href="/admin/users" class="p-2 rounded hover:shadow-gray-900 hover:bg-red-500 cursor-pointer">
                <li>Manage Users</li>
            </a>
            <a href="/admin/orders" class="p-2 rounded hover:shadow-gray-900 hover:bg-red-500 cursor-pointer">
                <li>Manage Orders</li>
            </a>
            @endif
            @endif
        </ul>
    </div>
    <div>
        @if(Auth::check())
        <ul class="flex flex-col gap-2 text-sm  text-center">
            <a href="/profile" class="p-2 rounded hover:shadow-gray-900 border border-transparent hover:border-red-500 cursor-pointer">
                <li>Profile</li>
            </a>
            <form action="/logout" method="post" class="justify-self-end">
                @csrf
                <button class="w-full p-2 rounded hover:shadow-gray-900 bg-red-500 hover:bg-red-400 cursor-pointer">
                    <li>Logout</li>
                </button>
            </form>

        </ul>
        @else
        <ul class="flex flex-col gap-2 text-sm text-center">
            <a href="/register" class="p-2 rounded hover:shadow-gray-900 border border-transparent hover:border-red-500 cursor-pointer">
                <li>Register</li>
            </a>
            <a href="/login" class="p-2 rounded hover:shadow-gray-900 bg-red-500 hover:bg-red-400 cursor-pointer">
                <li>Login</li>
            </a>
        </ul>
        @endif
        <hr class="my-4 border-gray-400">
        <h4 class="text-center text-sm">Copyright 0000</h4>
    </div>
</div>