<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('dist/css/custom.css')}}">
    <title>Dog Mania - Consulta de exames</title>
</head>
<body>

<div class="container align-items-start">
    <div class="row">
        <div class="col-6 offset-md-4 offset-sm-3 mt-5">
            <div id="cartao" class="card" style="width: 20rem;">
                <div class="card-header">
                Digite a senha do animal abaixo
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <form action="{{url('lista')}}" method="POST">
                        @csrf
                        <div class="form-group">
                        <input type="text" name="buscaexame" id="buscaexame" class="form-control" required  placeholder="Senha do animal">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Consultar</button>
                    </form>
                </li>
                </ul>
            </div>
        </div>
    </div>
</div>

    <script src="https://kit.fontawesome.com/17a1fdf4f0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{URL::to('dist/js/jquery.js')}}"></script>
</body>
</html>