<x-layout>
  <div class="container mx-auto p-4">
    <div class="flex flex-row flex-wrap my-5 content-center justify-center items-center">
      <h1 class="text-2xl text-purple-700 font-bold">Users List</h1>
    </div>
    <div class="flex justify-end my-3">
          <a href="/admin/users/create" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Add new User
</a>
        </div>
    <table class="min-w-full">
      <thead>
        <tr>
          <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">First Name</th>
          <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
          <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
          <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
          <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($users as $user)
        <tr>
          <td class="border border-gray-400 px-4 py-2">{{$user->first_name}}</td>
          <td class="border border-gray-400 px-4 py-2">{{$user->last_name}}</td>
          <td class="border border-gray-400 px-4 py-2">{{$user->email}}</td>
          <td class="border border-gray-400 px-4 py-2">{{$user->role}}</td>
          <td class="border border-gray-400 px-4 py-2">
          <a href="/admin/users/{{$user->id}}/edit" class="text-blue-500 hover:underline">Edit</a>
            <form action="/admin/users/{{$user->id}}" method="post">
              @csrf
              @method('delete')
              <button class="text-red-500 hover:underline">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</x-layout>