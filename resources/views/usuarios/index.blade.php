@extends('core.main')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3>Listagem de Usuários</h3>
      </div>

      <h4>Pesquisar</h4>

        <div class="card mb-3" style="width: 22rem;">
            <div class="card-body">
                <form action="{{url('usuarios')}}" method="GET">
                    @csrf
                    <input class="form-control form-control-dark" name="busca" id="busca" type="text" placeholder="Email do usuário" aria-label="Email do usuário">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="container mb-2">
                <div class="row float-right">
                    <!-- BOTÃO DE ACIONAMENTO DO MODAL -->
                    <button type="button" class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Novo Usuário
                    </button>
                </div>
            </div>

            <div class="card col-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>{{date("d/m/Y - H:i", strtotime($usuario->created_at))}}</td>
                                    <td>
                                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('usuarios.edit', $usuario->id) }}"><button type="button" class="btn btn-outline-primary">Editar</button></a>
                                            <button type="submit" class="btn btn-danger">Excluir</button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('usuarios.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="Nome do Animal" class="form-label">Nome do usuário</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do usuário">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email do usuário</label>
                                    <input type="email" class="form-control" id="email" name="email" required placeholder="email do usuário">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="senha" name="senha" required placeholder="senha do usuário">
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
            {{$usuarios->links()}}
        </div>

    </main>
  </div>
</div>


@endsection