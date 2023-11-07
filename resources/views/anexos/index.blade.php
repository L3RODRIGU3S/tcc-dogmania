@extends('core.main')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3>Lista de Exames</h3>
      </div>
        <div class="row">
            <div class="container mb-2">
                <div class="row float-right">
                    <!-- BOTÃO DE ACIONAMENTO DO MODAL -->
                    <button type="button" class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Anexar Exame
                    </button>
                </div>
            </div>

            <div class="card col-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                <th>Exame</th>
                                <th>Data de anexo</th>
                                <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($exames as $exame)
                                <tr>
                                    <td> <a href="{{URL::to('pdf/exames/')}}/{{$exame->url}}.pdf" target="_blank"> {{$exame->url}} </a> </td>
                                    <td>{{date("d/m/Y - H:i", strtotime($exame->created_at))}}</td>
                                    <td>
                                        <form action="{{ route('anexos.destroy', $exame->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Excluir Exame</button>
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

        <!-- MODAL DE CADASTRO DO ANEXO -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anexar Exame</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/anexos/join/{{ $animal_id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                <input class="form-control" type="file" required id="pdfexame" name="pdfexame">
                                </div>
                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Inserir exame</button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>

        <div class="row mt-3 justify-content-center">
            {{$exames->links()}}
        </div>

    </main>
  </div>
</div>


@endsection