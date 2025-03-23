<x-layout>
  <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
  </a>
  <div class="mx-4">
    <x-card class="p-10">
      <div class="flex flex-col items-center justify-center text-center">
        <h3 class="text-3xl font-bold mb-4">
          {{$listing->lesson_name}}
        </h3>
        <ul class="flex">
          <li class="flex items-center justify-center bg-grey text-black rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?subject={{$listing->subject}}">{{$subjects[$listing->subject-1]}}</a>
          </li>
        </ul>

        <div class="text-1xl my-2">
          <i class="fa-solid fa-location-dot"></i> Fanvil Criminology Review & Training Center
        </div>
        
        
          <h3 class="text-2xl font-bold mb-2">Description</h3>
          <div class="text-1xl space-y-6">
            "{{$listing->description}}"
          </div>
          <div class="border border-gray-200 w-full mb-6"></div>
          <div>
            @auth
              
              @if(auth()->user()->status == 'Premium')
                
                  
                  @if ($listing->video == 1)
                  <a href="/watch/{{$listing->id}}"
                    class="block bg-laravel text-white py-2 rounded-xl hover:opacity-80 w-60">
                    <i class="fa fa-play text-white mr-2"></i>
                    Watch Lesson
                  </a>
                  @else
                  <a href="/view/{{$listing->id}}"
                    class="block bg-laravel text-white py-2 rounded-xl hover:opacity-80 w-60">
                    <i class="fa-solid fa-file-text mr-2"></i>
                    View Lesson
                  </a>
                  @endif
                  
                
              @else
                  
                    <span class="text-red-600 font-bold">WARNING!!!</span><br>
                  <div class="flex">
                    <span class="text-black bg-red-400 bg-opacity-60 p-3 border-lg rounded-lg">Upgrade to premium to view this lesson. Contact Fanvil Staff for assistance.</span>
                  </div>
                  <div class="mt-2">
                    <span class="text-black font-bold">You contact us via:</span> <br>
                    <span class="text-blue-800 font-bold bg-blue-200 bg-opacity-30 p-1 rounded-lg shadow-sm border hover:text-blue-500 cursor-pointer pl-2 mr-1">
                      <a href="https://www.facebook.com/Fanvil-Criminology-Review-Center-1591785147769039" target="_blank">Facebook</a>
                    </span> 
                    or 
                    <span class="text-blue-800 font-bold bg-blue-200 bg-opacity-30 p-1 px-2 rounded-lg shadow-sm border hover:text-blue-500 cursor-pointer">
                      <a href="https://www.facebook.com/messages/t/100002998426973" target="_blank">Messenger</a>
                    </span>
                  </div>
              @endif

            @else
            <a href="/login"
              class="block bg-black text-white mt-6 py-2 rounded-xl hover:opacity-80 w-60"><i
                class="fa-solid fa-lock"></i>
              Login to view</a>
            @endauth
          </div>
          
      </div>
    </x-card>

    @auth
        <?php 
          $permission = auth()->user()->permission;
        ?>
      @if( $permission  == 'admin')
        <x-card class="mt-4 p-2 flex space-x-6" style="align-items: center; justify-content: center;">
          <a href="/listings/{{$listing->id}}/edit">
            <i class="fa-solid fa-pencil"></i> Edit
          </a>

          <form method="POST" action="/listings/{{$listing->id}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500" onclick="return myFunction();"><i class="fa-solid fa-trash"></i> Delete</button>
          </form>
        </x-card>
      @endif
    @endauth
  </div>
</x-layout>