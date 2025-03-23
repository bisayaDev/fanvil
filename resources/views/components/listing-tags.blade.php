@props(['tagsCsv'])

@php
//$subjects = explode(',', $tagsCsv);
@endphp

{{-- <ul class="flex">
  @foreach($subjects as $subj)
  <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
    <a href="/?subject={{$subj}}">{{$subj}}</a>
  </li>
  @endforeach
</ul> --}}

<li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
  <a href="/?subject={{$listing->subject}}">{{$listing->subject}}</a>
</li>