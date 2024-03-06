@props([
'user' => null
])
<x-layout>
  <div class="h-screen flex flex-row flex-wrap content-center justify-center items-center">
    <div class="max-w-md mx-auto bg-white rounded-md shadow-2xl">
      <div class="p-4 mx-4 my-2">
        <div class="flex flex-row flex-wrap content-center justify-center items-center">
          <h1 class="m-4  font-bold text-2xl">@if($user) Edit User @else Add a New User @endif</h1>
        </div>
        <form method="POST" action="/admin/users/{{$user?->id ?? ''}}" enctype='multipart/form-data'>
          @if($user) @method('put') @endif
          @csrf
          <label for="first-name">First name:</label>
          <input type="text" value="{{ old('first_name', $user?->first_name ?? null) }}" class="border border-gray-300 m-2 p-2 rounded-md" name="first_name" id="first_name" required>
          @error('first_name')<span class="text-red-600">{{$message}}</span>@enderror <br>
          <label for="last-name">Last name:</label>
          <input type="text" value="{{ old('last_name', $user?->last_name ?? null) }}" class="border border-gray-300 m-2 p-2 rounded-md" name="last_name" id="last_name" required>
          @error('last_name')<span class="text-red-600">{{$message}}</span>@enderror
          <br>
          <label for="role">Role</label>
          <select name="role" value="{{ old('role', $user?->role ?? null) }}" id="role" class="border border-gray-300 m-2 p-2 rounded-md" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
          @error('role')<span class="text-red-600">{{$message}}</span>@enderror
          <br>
          <label class="text-red" for="email">Email:</label>
          <input type="email" value="{{ old('email', $user?->email ?? null) }}" class="border border-gray-300 m-2 p-2 rounded-md" name="email" id="email" required>
          @error('email')<span class="text-red-600">{{$message}}</span>@enderror
          <br>
          @if(!$user)
          <label for="password">Password:</label>
          <input value="{{ old('password', $user?->password ?? null) }}" class="border border-gray-300 p-2 m-2 rounded-md" type="password" name="password" id="password" required>
          @error('password')<span class="text-red-600">{{$message}}</span>@enderror
          <br>
          <label for="password_confirmation">Confirm Password</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-300 p-2 m-2 rounded-md" type="password" required>
          @error('password_confirmation')<span class="text-red-600">{{$message}}</span>@enderror
          <br/>
          @endif
          <div class="flex justify-center">
            <button class=" my-4 w-4/5 bg-purple-500 text-white my-5 py-2 px-4  rounded-full" type="submit">Save

            </button>

          </div>
        </form>

      </div>
    </div>
  </div>
</x-layout>