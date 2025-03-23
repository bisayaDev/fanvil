{{-- @props(['listing']) --}}
@php
    $subjects = [ 'REVIEW MATERIALS 2022',
    'CRIMINAL JURISPRUDENCE. PROCEDURE AND EVIDENCE',
    'LAW ENFORCEMENT ADMINISTRATION',
    'CRIMINALISTICS',
    'CRIME DETECTION AND INVESTIGATION',
    'SOCIOLOGY OF CRIMES AND ETHICS',
    'CORRECTIONAL ADMINISTRATION', 'REVIEW MATERIALS 2024 (NEW CURRICULUM)'];
@endphp
<x-card>
  <div class="flex">
    {{-- <img class="hidden w-48 mr-6 md:block"
      src="/images/no-image.png" alt="" /> --}}
    <div>
      <h3 class="text-2xl ">
        <a href="/listings/{{$listing->id}}" class="hover:underline">
          
          @if ($listing->video == 1)
            <i class="fa fa-play text-black mr-2"></i>
          @else
            <i class="fa-solid text-black fa-file-text mr-2"></i>
          @endif
          {{$listing->lesson_name}}</a>
      </h3>
      {{-- <div class="text-xl font-bold mb-4">{{$listing->subject}}</div> --}}
      {{-- <x-listing-tags :tagsCsv="$listing->subject" /> --}}
        <ul class="flex">
          <li class="flex items-center justify-center bg-grey text-black rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?subject={{$listing->subject}}">{{$subjects[$listing->subject-1]}}</a>
          </li>
        </ul>

      <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i> Fanvil Criminology Review & Training Center
      </div>
    </div>
  </div>
</x-card>