<html>
  <head>
    <title>FANVIL | {{$listing->lesson_name}}</title>
  </head>
  <body>
    @php
        $tmp_url = explode('/',$listing->website);
        $url = "https://drive.google.com/file/d/" . $tmp_url[5] . "/preview";
    @endphp
    
    <iframe src="{{$url}}" width="100%" height="100%" allow="autoplay"></iframe>
  </body>
</html>