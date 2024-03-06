<x-layout>
  <div class="h-screen flex flex-row flex-wrap content-center justify-center items-center">
    <div class="max-w-md mx-auto bg-white rounded-md shadow-2xl">
      <div class="p-4 mx-4 my-2">

        <div class="flex flex-row flex-wrap content-center justify-center items-center">
          <h1 class="m-4 font-bold text-2xl">Profile Details</h1>
        </div>

        <form method="POST">
          <h1 class="font-bold">Details</h1>
          @csrf <!-- Add CSRF token for security -->
          <label for="first-name">First name:</label>
          <input type="text" class="border border-gray-300 m-2 p-2 rounded-md" value="{{$user->first_name}}" name="first_name" id="first-name" required>
          @error('first_name')<span class="text-red-600">{{$message}}</span>@enderror
          <br>
          <label for="last-name">Last name:</label>
          <input type="text" class="border border-gray-300 m-2 p-2 rounded-md" value="{{$user->last_name}}" name="last_name" id="last-name" required>
          @error('last_name')<span class="text-red-600">{{$message}}</span>@enderror
          <br>
          <label class="text-red" for="email">Email:</label>
          <input type="email" class="border border-gray-300 m-2 p-2 rounded-md" value="{{$user->email}}" name="email" id="email" required>
          @error('email')<span class="text-red-600">{{$message}}</span>@enderror
          <br>
          <label for="password">Current Password:</label>
          <input class="border border-gray-300 p-2 m-2 rounded-md" type="password" name="current_password" id="password">
          @error('current_password')<span class="text-red-600">{{$message}}</span>@enderror
          <br>
          <label for="password">New Password:</label>
          <input class="border border-gray-300 p-2 m-2 rounded-md" type="password" name="password" id="password">
          @error('password')<span class="text-red-600">{{$message}}</span>@enderror
          <br>
          <label for="confirm-password">Confirm Password:</label>
          <input class="border border-gray-300 p-2 m-2 rounded-md" type="password" name="password_confirmation" id="confirm-password">
          @error('password_confirmation')<span class="text-red-600">{{$message}}</span>@enderror
          <br>
          <div class="flex justify-center">
          <button class="w-4/5 bg-purple-500 text-white my-5 py-2 px-4  rounded-full" type="submit">Save</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</x-layout>