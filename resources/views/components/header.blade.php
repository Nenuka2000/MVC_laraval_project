<div class="font-thin p-4 bg-white shadow-lg">

	<div class="max-w-screen-lg mx-auto flex justify-between items-center h-[40px]">

		{{-- LEFT --}}
		<div class="flex justify-start gap-4">
			<a href="/" class="text-2xl">{{env('APP_NAME')}}</a>
		</div>

		{{-- RIGHT --}}
		<div class="flex justify-end gap-4">
			@if(Auth::check())
			<div class="text-center">
				<i class="fas fa-shopping-cart text-2xl"></i>
				<p class="mt-2">View Cart</p>
			</div>
			<a href="/profile" class="px-4 py-2 hover:bg-red-500 hover:text-white rounded-lg">Profile</a>
			<form action="/logout" method="post" class="justify-self-end">
				@csrf
				<button class="px-4 py-2 bg-red-500 hover:bg-red-500 rounded-lg text-white">Logout</button>
			</form>
			@else
			<a href="/login" class="px-4 py-2 hover:bg-red-500 hover:text-white rounded-lg">Login</a>
			@endif
		</div>
	</div>

</div>