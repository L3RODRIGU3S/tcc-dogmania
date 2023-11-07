
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('dist/css/custom.css')}}">
    <title>Dog Mania - Exames</title>
</head>
<body>

<div class="row">
  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{$message}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
</div>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
              <a href="{{URL::to('exames/')}}"><img src="{{URL::to('img/logo.png')}}" width="200" heigth="120" alt="logo"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('exames/')}}">
            <i class="fas fa-file-pdf"></i> Exames
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{URL::to('usuarios/')}}">
            <i class="fas fa-users"></i> Usuários
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fas fa-clock"></i> {{date("H:i")}}
            </a>
          </li>

          <form action="/logout" method="POST">
            @csrf
            <li class="nav-item">
                    <a class="nav-link" href="/logout"
                      onclick="event.preventDefault();
                      this.closest('form').submit();">
                      <i class="fas fa-sign-out-alt"></i> Sair
                    </a>
            </li>
          </form>
        </ul>
      </div>
    </nav>

        @yield('content')
    
    <script src="https://kit.fontawesome.com/17a1fdf4f0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{URL::to('dist/js/jquery.js')}}"></script>
</body>
</html>