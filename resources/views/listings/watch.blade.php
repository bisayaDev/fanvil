<html>
  <head>
    <title>FANVIL | {{$listing->lesson_name}}</title>
  </head>
  <body>
    @php
        $tmp_url = explode('=',$listing->website);
        $url = "https://www.youtube.com/embed/" . $tmp_url[1];
    @endphp

    <iframe width="100%" height="100%" src="{{$url}}" title="{{$listing->lesson_name}}" allowfullscreen></iframe>
  </body>
</html>