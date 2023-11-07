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

<main role="main" class="col-md-6 ml-sm-auto col-lg-6 px-md-4 mt-5">

        <div class="row">

            <div class="card offset-lg-6">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                <th>Exame</th>
                                <th>Data da postagem</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($exames as $exame)
                                <tr>
                                    <td> <a href="{{URL::to('pdf/exames/')}}/{{$exame->url}}.pdf" target="_blank"> Clique aqui para ver o exame </a> </td>
                                    <td>{{date("d/m/Y - H:i", strtotime($exame->created_at))}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <a href="{{url('consulta')}}" class="btn btn-primary mt-3">Voltar</a>

                </div>
            </div>
        </div>

        <div class="row mt-3 justify-content-center">
            {{$exames->links()}}
        </div>

    </main>
  </div>
</div>

    <script src="https://kit.fontawesome.com/17a1fdf4f0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{URL::to('dist/js/jquery.js')}}"></script>
</body>
</html>