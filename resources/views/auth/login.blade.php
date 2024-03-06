<x-layout>
  <div class="h-screen flex flex-row flex-wrap content-center justify-center items-center">
    <div class="max-w-md mx-auto bg-white rounded-md shadow-2xl">
      <div class="p-4 mx-4 my-2">
        <div class="flex flex-row flex-wrap content-center justify-center items-center">
          <h1 class="m-4 font-bold text-2xl">Login</h1>
        </div>
        <form method="POST">
          @csrf <!-- Add CSRF token for security -->
          <label class="text-red" for="email">Email:</label>
          <input type="email" class="border border-gray-300 m-2 p-2 rounded-md" name="email" id="email" required>
          @error('email')<span class="text-red-600">{{$message}}</span>@enderror
          <br>
          <label for="password">Password:</label>
          <input class="border border-gray-300 p-2 m-2 my-4 rounded-md" type="password" name="password" id="password" required>
          @error('password')<span class="text-red-600">{{$message}}</span>@enderror
          <br>
          <div class="flex justify-center">
          <button class=" w-4/5 bg-purple-500 text-white my-5 py-2 px-4  rounded-full" type="submit">Login</button>

          </div>
        </form>

      </div>
    </div>
  </div>
</x-layout>