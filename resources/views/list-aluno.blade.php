<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Consulta de Aluno</title>
</head>
<body>

    <div class="card-border">
        <div class="card-body">
            <h5 class="card-title">Consulta de Alunos</h5>
              <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>Email</th>
                            <th>Celular</th>
                            <th>Curso</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alunos as $aluno)
                        <tr>
                            <td>{{ $aluno->name }}</td>
                            <td>{{ $aluno->last_name }}</td>
                            <td>{{ $aluno->email }}</td>
                            <td>{{ $aluno->cel_number }}</td>
                            <td>{{ $aluno->curso }}</td>
                            <td>
                                <a href="{{ route('aluno.edit', ['aluno'=> $aluno->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{ route('aluno.destroy', ['aluno'=> $aluno->id]) }}" class="form-horizontal" method="post" style="display: inline-block" onsubmit="return confirm('Tem certeza que deseja remover {{$aluno->name}} ?')">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" value="Excluir" class="btn btn-sm btn-danger">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


        </div>
        <!-- footer -->
        <div>
            <div class="card-footer">
                <a href="{{ route('aluno.create') }}" class="btn btn-sm btn-primary" role="button">Novo Aluno</a>
            </div>
        </div>
    </div>

</body>
</html>
