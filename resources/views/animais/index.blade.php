@extends('core.main')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3>Resultados de Exames</h3>
      </div>

      <h4>Pesquisar</h4>

        <div class="card mb-3" style="width: 22rem;">
            <div class="card-body">
                <form action="{{url('exames')}}" method="GET">
                    @csrf
                    <input class="form-control form-control-dark" name="busca" id="busca" type="text" placeholder="Senha do animal ou nome do tutor" aria-label="Número do Exame">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="container mb-2">
                <div class="row float-right">
                    <!-- BOTÃO DE ACIONAMENTO DO MODAL -->
                    <button type="button" class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Novo Animal
                    </button>
                </div>
            </div>

            <div class="card col-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                <th>Nome do Animal</th>
                                <th>Senha de consulta</th>
                                <th>Nome do Tutor</th>
                                <th>Data do cadastro</th>
                                <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($animais as $animal)
                                <tr>
                                        @if($animal->nome == null)
                                            <td>Sem nome declarado</td>
                                        @else
                                            <td>{{$animal->nome}}</td>
                                        @endif
                                    <td>{{$animal->registro}}</td>
                                    <td>{{$animal->email}}</td>
                                    <td>{{date("d/m/Y - H:i", strtotime($animal->created_at))}}</td>
                                    <td>
                                        <form action="{{ route('exames.destroy', $animal->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('exames.edit', $animal->id) }}"><button type="button" class="btn btn-outline-primary">Editar</button></a>
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                            <a href="{{ route('anexos.edit', $animal->id) }}" class="btn btn-outline-success">Exames</a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL DE CADASTRO DO ANIMAL -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Animal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('exames.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="Nome do Animal" class="form-label">Nome do animal</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do animal">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Nome do Tutor</label>
                                    <input type="text" class="form-control" id="email" name="email" required placeholder="Nome do Tutor">
                                </div>
                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>

        <div class="row mt-3 justify-content-center">
            {{$animais->links()}}
        </div>

    </main>
  </div>
</div>


@endsection