@extends('core.main')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3>Editar dados do animal</h3>
      </div>

        <div class="row">

            <div class="card col-12">
                <div class="card-body">
                        <form action="{{ route('exames.update', $animais->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="Nome do Animal" class="form-label">Nome do animal</label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $animais->nome }}" placeholder="Nome do animal">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email do proprietário</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $animais->email }}" required placeholder="email do proprietário do animal">
                                </div>

                                <a href="{{ route('exames.index') }}" class="btn btn-danger">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>
            </div>
        </div>

    </main>
  </div>
</div>


@endsection