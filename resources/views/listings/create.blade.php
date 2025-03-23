<x-layout>
  @if(auth()->user()->permission == 'admin')
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-3">Add New Lesson</h2>
      </header>

      <form method="POST" action="/listings" enctype="multipart/form-data">
        @csrf

        <div style="display:inline-block;max-width:100%;text-align-last:center;">
          <label for="subject" class="inline-block text-lg mb-2"><b>Subject Name</b></label>
          <select name="subject" class="appearance-none w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm focus:outline-none focus:outline-red-400" style="width:100%">
            <option value="">Select Subject</i></option>
            @php
                $index = count($subjects);
                $i = 1;
            @endphp
              @foreach($subjects as $subject)
                <option value="{{$i}}" @if(old('subject') == $i) selected @endif>{{ $subject }}</option>
                @php
                    $i=$i + 1;
                @endphp
              @endforeach
          </select>
          @error('subject')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-3 mt-3">
          <label for="lesson_name" class="inline-block text-lg mb-2"><b>Lesson Name</b></label>
          <input type="text" class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm focus:outline-none focus:outline-red-400" name="lesson_name"
            value="{{old('lesson_name')}}" autocomplete="off"/>

          @error('lesson_name')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="website" class="inline-block text-lg mb-2">
            <b>Lesson Url/Link</b>
          </label>
          <input type="text" class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm focus:outline-none focus:outline-red-400" name="website"
            value="{{old('website')}}" autocomplete="off"/>

          @error('website')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="flex items-center"> 
          <input type="checkbox" class="h-5 w-5 mr-3" name="video" value="1" class="form-check-input h-4 w-4" style="vertical-align: middle;"/>
          <label for="video"><b>Video Lesson: </b></label>
        </div>

        <div class="mb-6 mt-5">
          <label for="description" class="inline-block text-lg mb-2">
            <b>Lesson Description</b>
          </label>
          <textarea class="appearance-none w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm focus:outline-none focus:outline-red-400" name="description" rows="5"
            placeholder="Add lesson description here. (Optional)">{{old('description')}}</textarea>

          @error('description')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Add Lesson
          </button>

          <a href="/" class="text-black ml-4"> Back </a>
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
