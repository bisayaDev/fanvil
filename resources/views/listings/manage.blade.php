<x-layout>
  <x-card class="p-10">
    <header>
      <h1 class="text-3xl text-center font-bold my-6 uppercase">
        Manage Users
      </h1>
    </header>
    
    <table class="w-full table-auto rounded-sm">
      <tbody>
        <tr>
          <th class="py-3 border border-b border-gray-300 text-lg pl-3" style="text-align: left;max-width: 100%; min-width: 10px">Name</th>
          <th class="py-3 border border-b border-gray-300 text-lg" style="text-align: center;max-width: 100%; min-width: 10px">Email</th>
          <th class="py-3 border border-b border-gray-300 text-lg" style="text-align: center;max-width: 10px; min-width: 5px">Status</th>
          <th class="py-3 border border-b border-gray-300 text-lg" style="text-align: center;max-width: 5px; min-width: 10px">Actions</th>
        </tr>
        @unless($listings->isEmpty())
          @foreach($listings as $listing)
          <tr class="border-gray-300">
            <td class="py-3 border border-b border-gray-300 text-lg pl-2" style="max-width: 10px;">
               {{$listing->lesson_name}}
            </td>
            <td class="border border-b border-gray-300 text-lg" style="text-align: center;max-width: 100%; min-width: 10px">
              user@gmail.com
            </td>
            <td class="border border-b border-gray-300 text-lg" style="text-align: center;max-width: 20px; min-width: 5px">
              Premium
            </td>
            <td class="border border-b border-gray-300 text-lg"  style="max-width: 5px; text-align: center; min-width: 20px">
          
                <form method="POST" action="/listings/{{$listing->id}}">
                  @csrf
                  @method('DELETE')
                  <button class="text-red-500"  style="float:right;"><i class="fa-solid fa-trash pr-5"></i> 
                  </button>
                </form>

                <a href="/listings/{{$listing->id}}/edit" class="text-blue-400 rounded-xl">
                  <i class="fa-solid fa-pen-to-square"></i>
                </a>
              
            </td>
          </tr>
          @endforeach
        @else
        <tr class="border-gray-300">
          <td class="px-2 py-3 border-t border-b border-gray-300 text-lg">
            <p class="text-center">No Listings Found</p>
          </td>
        </tr>
        @endunless

      </tbody>
    </table>
  </x-card>
</x-layout>