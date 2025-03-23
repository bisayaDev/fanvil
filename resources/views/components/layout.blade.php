<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
        theme: {
          extend: {
            colors: {
              laravel: '#7d0902',
              yellow: '#f5c105',
              grey: '#c8ccc8',
            },
          },
        },
      }
  </script>
  <title>Fanvil | Criminology Review and Training Center</title>
</head>

<body class="mb-48">
  <nav class="flex justify-between items-center mb-4">
    <a href="/"><img class="w-24 p-2" src="{{asset('images/logo.png')}}" alt="" class="logo"/></a>
    <ul class="flex space-x-2 mr-6 text-lg">
      @auth
      <?php 
        $permission = auth()->user()->permission;
        $status = auth()->user()->status;
      ?>
      
      <li>
        <span class="uppercase" style="vertical-align: top">
          {{auth()->user()->name}}
          @if ($status == 'Premium')
            <i class="fa-solid fa-star text-yellow"></i>
          @endif
        </span>
      </li>

      
      
      @if ($permission == 'admin')
      <li>
        <a href="/listings/create" class="hover:text-gray-400"><i class="fa-solid fa-file-text mx-2"></i></a>
      </li>
      <li>
        <a href="/users" class="hover:text-gray-400"><i class="fa-solid fa-user mx-2"></i></a>
      </li>
      @endif
      <li>
        <form class="inline" method="POST" action="/logout">
          @csrf
          <button type="submit" class="h-8 w-20 text-white rounded-lg bg-gray-500 hover:bg-gray-400">
             Logout
          </button>
        </form>
      </li>
      @else
      <li>
        <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
      </li>
      <li>
        <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
      </li>
      @endauth
    </ul>
  </nav>

  <main>
    {{$slot}}
  </main>
  <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-15 mt-24 opacity-70 md:justify-center text-sm">
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved.</p><a class="ml-1 text-blue-800 hover:text-blue-500" target="_blank" href="https://www.facebook.com/Fanvil-Criminology-Review-Center-1591785147769039">FACEBOOK</a>
  </footer>

  <x-flash-message />
</body>
<script>
  function myFunction() {
      if(!confirm("Are you sure you want to delete this user?"))
      event.preventDefault();
  }
 </script>
</html>