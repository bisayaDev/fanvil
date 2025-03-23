<x-layout>
  
    @if(auth()->user()->permission == 'admin')
      <x-card class="p-3 md:p-10">
        <header>
          <h1 class="text-3xl text-center font-bold my-6 uppercase">
            Manage Users
          </h1>
          <p class="text-s text-center font-bold my-2">Total Users: {{count($users)}}</p>
        </header>
        
        <div class="overflow-auto rounded-lg shadow">
          <table class="w-full">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
              <tr>
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-center">Name</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-center">Email</th>
                <th class="p-3 text-sm font-semibold tracking-wide text-center">Created</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-center">Status</th>
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-center">Actions</th>
              </tr> 
            </thead>

            <tbody class="divide-y divide-gray-100">
              
              @unless($users->isEmpty())
                @php
                    $even = 0;
                @endphp
                @foreach($users as $user)
                <tr class="@if($even == 0)bg-white @php $even = 1; @endphp @else bg-gray @php $even = 0; @endphp @endif">
                  <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                    {{$user->name}}@if($user->permission == 'admin') <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">ADMIN</span> @endif
                  </td>
                  <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                    {{$user->email}}
                  </td>
                  <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                    {{$user->created_at}}
                  </td>
                  <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center">
                    @if($user->status == 'Premium')
                      <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-blue-800 bg-blue-200 rounded-lg bg-opacity-50">
                    @else
                      <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 rounded-lg bg-opacity-50">
                    @endif
                        {{$user->status}}
                      </span>
                  </td>
                  <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                      
                      @if($user->permission == 'user')
                
                      <form method="POST" action="/users/{{$user->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500"  style="float:right;" onclick="return myFunction();"><i class="fa-solid fa-trash pr-5"></i> 
                        </button>
                      </form>
                      @endif
                        
                     @if($user->id != 1)
                      <a href="/users/{{$user->id}}/edit" class="text-blue-400 rounded-xl">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      @endif
                    
                  </td>
                </tr>
                @endforeach
              @else
              <tr class="border-gray-300">
                <td class="px-2 py-3 border-t border-b border-gray-300 text-lg">
                  <p class="text-center">No User Found</p>
                </td>
              </tr>
              @endunless

            </tbody>
          </table>
        </div>
        
      </x-card>
    @else
      <x-card class="p-3 md:p-10 text-center">
        <span class="text-3xl text-red-500">UNAUTHORIZED ACCESS!</span><br>
        <span class="text-3xl text-blue-800 hover:text-blue-500 cursor-pointer hower:underline"><a href="/"> <i class="fa-solid fa-home"></i> HOME</a></span>
      </x-card>
    @endif
</x-layout>