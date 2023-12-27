<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
            background-color: #f4f4f4;
        }

        .card {
            margin-bottom: 20px;
        }

        th {
            text-align: center;
        }

        .table-actions {
            width: 120px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="mb-4">Dashboard</h1>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Lista de Mensagens</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Nome do Aluno</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th class="table-actions">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mensagens as $mensagem)
                                <tr>
                                    <td>{{ $mensagem->nome_aluno }}</td>
                                    <td>{{ $mensagem->data }}</td>
                                    <td>{{ $mensagem->status }}</td>
                                    <td>
                                        <a href="{{ route('mensagem.edit', $mensagem->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                        <form action="{{ route('mensagem.destroy', $mensagem->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
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

</body>
</html>
