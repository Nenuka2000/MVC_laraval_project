<x-layout>
  <form class="flex justify-center items-center h-screen" method="post">
    @csrf
    <div class="w-full max-w-4xl p-4">
      <div class="flex space-x-4" <div class="w-1/2">
        <div class="bg-white shadow-4xl p-6 rounded-lg">
          <h3 class="text-2xl font-semibold text-center mb-4">Customer Details</h3>
          <div action="" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4">
              <div class="mb-4 mr-1">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="first_name" name="first_name" value="{{old('first_name', '')}}" class="form-input border border-gray-300 rounded-md p-2">
                @error('first_name')<span class="text-red-600">{{$message}}</span>@enderror
              </div>
              <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="{{old('last_name', '')}}" class="form-input border border-gray-300 rounded-md p-2">
                @error('last_name')<span class="text-red-600">{{$message}}</span>@enderror
              </div>

              <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="phone" name="phone" value="{{old('phone', '')}}" class="form-input border border-gray-300 rounded-md p-2">
                @error('phone')<span class="text-red-600">{{$message}}</span>@enderror
              </div>
              <div class="mb-4">
                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                <input type="text" id="company" name="company" value="{{old('company', '')}}" class="form-input border border-gray-300 rounded-md p-2">
                @error('company')<span class="text-red-600">{{$message}}</span>@enderror
              </div>
              <div class="mb-4">
                <label for="address_line_1" class="block text-sm font-medium text-gray-700">Address Line 1</label>
                <input type="text" id="address_line_1" name="address_line_1" value="{{old('address_line_1', '')}}" class="form-input border border-gray-300 rounded-md p-2">
                @error('address_line_1')<span class="text-red-600">{{$message}}</span>@enderror
              </div>
              <div class="mb-4">
                <label for="address_line_2" class="block text-sm font-medium text-gray-700">Address Line 2</label>
                <input type="text" id="address_line_2" name="address_line_2" value="{{old('address_line_2', '')}}" class="form-input border border-gray-300 rounded-md p-2">
                @error('address_line_2')<span class="text-red-600">{{$message}}</span>@enderror
              </div>
              <div class="mb-4">
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input type="text" id="city" name="city" value="{{old('city', '')}}" class="form-input border border-gray-300 rounded-md p-2">
                @error('city')<span class="text-red-600">{{$message}}</span>@enderror
              </div>
              <div class="mb-4">
                <label for="zip" class="block text-sm font-medium text-gray-700">Zip</label>
                <input type="text" id="zip" name="zip" value="{{old('zip', '')}}" class="form-input border border-gray-300 rounded-md p-2">
                @error('zip')<span class="text-red-600">{{$message}}</span>@enderror
              </div>
          </div>
        </div>
      </div>

      <!-- Card Details Card -->
      <div class="w-1/2">
        <div class="bg-white shadow-4xl p-6 rounded-lg">
          <h3 class="text-2xl font-semibold text-center mb-4">Card Details</h3>
          <form action="" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4">
            <div class="mb-4">
              <label for="cardholder_name" class="block text-sm font-medium text-gray-700">Name on Card</label>
              <input type="text" id="cardholder_name" name="cardholder_name" value="{{old('cardholder_name', '')}}" class="form-input border border-gray-300 rounded-md p-2">
                @error('cardholder_name')<span class="text-red-600">{{$message}}</span>@enderror
            </div>
            <div class="mb-4">
              <label for="card_number" class="block text-sm font-medium text-gray-700">Card Number</label>
              <input type="text" id="card_number" name="card_number" value="{{old('card_number', '')}}" class="form-input border border-gray-300 rounded-md p-2">
                @error('card_number')<span class="text-red-600">{{$message}}</span>@enderror
            </div>
            <div class="mb-4">
              <label for="expiration_month" class="block text-sm font-medium text-gray-700">Expiration Month</label>
              <input type="number" min="1" max="12" id="expiration_month" name="expiration_month" value="{{old('expiration_month', '')}}" class="form-input border border-gray-300 rounded-md p-2">
                @error('expiration_month')<span class="text-red-600">{{$message}}</span>@enderror
            </div>
            <div class="mb-4">
              <label for="expiration_year" class="block text-sm font-medium text-gray-700">Expiration Year</label>
              <input type="number" id="expiration_year" name="expiration_year" value="{{old('expiration_year', '')}}" class="form-input border border-gray-300 rounded-md p-2">
                @error('expiration_year')<span class="text-red-600">{{$message}}</span>@enderror
            </div>
            <div class="mb-4">
              <label for="cvv" class="block text-sm font-medium text-gray-700">CVV</label>
              <input type="text" id="cvv" name="cvv" value="{{old('cvv', '')}}" class="form-input border border-gray-300 rounded-md p-2">
                @error('cvv')<span class="text-red-600">{{$message}}</span>@enderror
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <p class="text-lg font-semibold mb-2">Total Amount: ${{number_format(Auth::user()->cart_total(), 2)}}</p>

    <button type="submit" class="bg-indigo-500 text-white py-1 px-2 rounded-full hover:bg-indigo-700 block w-full text-center">
      Pay Now
    </button>
  </div>
  </form>
</x-layout>