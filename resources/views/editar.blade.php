<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Usuário</title>
</head>
<body>
  
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Usuário 
                            <a href="/usuarios" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">

                                <form method="post" action="{{ isset($usuario->id) ? url('/usuarios/' . $usuario->id) : url('/usuarios') }}">

                                  @csrf
                                  @if(isset($usuario->id))
                                  @method('patch')
                                  <input type="hidden" name="id" value="{{ $usuario->id }}">
                                  @endif

                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="nome" value="{{$usuario->nome}}" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>E-mail</label>
                                        <input type="text" name="email" value="{{$usuario->email}}" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Idade</label>
                                        <input type="text" name="idade" value="{{$usuario->idade}}" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" value="{{$usuario->telefone}}" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="atualizar-usuario" class="btn btn-primary">Atualizar Usuário</button>
                                    </div>

                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>