<x-layout>

  @if(auth()->user()->permission == 'admin')
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Edit User</h2>
        <p class="mb-4">(<b>{{$user->name}}</b>)</p>
      </header>
      
      <form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
          <label for="name" class="inline-block text-lg mb-2">Name </label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{$user->name}}" />

          @error('name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-2">
          <label for="email" class="inline-block text-lg">Email</label>
          <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$user->email}}" />

          @error('email')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
        
        <div class="mt-3">
          <a style="float: left">Role: </a>
          <div class="bg-white border border-gray-200 ml-2" style="display:inline-block;max-width:100%;text-align-last:left;">
            <select name="permission" class="form-control custom-select text-lg " style="width:100%">
                  <option value="user" @if ($user->permission == 'user') selected @endif>User</option>
                  <option value="admin" @if ($user->permission == 'admin') selected @endif>Admin</option>
            </select>
            @error('permission')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
        </div>

        <div class="mt-3">
          <a style="float: left">Status: </a>
          <div class="bg-white border border-gray-200 ml-2 " style="display:inline-block;max-width:100%;text-align-last:left;">
            <select name="status" class="form-control custom-select text-lg " style="width:100%">
                  <option value="Trial" @if ($user->status == 'Trial') selected @endif>Trial</option>
                  <option value="Premium" @if ($user->status == 'Premium') selected @endif>Premium</option>
            </select>
            @error('status')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
        </div>

        <div class="mt-6 ">
          <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black" style="display:block; margin:0 auto; width:100%">
            Update User
          </button>
        </div>
        <div class="mt-2">
          <button class="bg-red-500 text-white rounded py-2 px-4 hover:bg-black" style="display:block; margin:0 auto; width:100%">
            <a href="/users"> Cancel</a>
          </button>
        </div>

        
      </form>
    </x-card>
  @else
      <x-card class="p-3 md:p-10 text-center">
        <span class="text-3xl text-red-500">UNAUTHORIZED ACCESS!</span><br>
        <span class="text-3xl text-blue-800 hover:text-blue-500 cursor-pointer hower:underline"><a href="/"> <i class="fa-solid fa-home"></i> HOME</a></span>
      </x-card>
    @endif
</x-layout>