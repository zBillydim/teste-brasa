<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Mensagens</title>
    <style>
        /* Seus estilos CSS aqui */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #1E90FF;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Listagem de Mensagens</h1>

    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Professor ID</th>
                <th>Nome do Aluno</th>
                <th>Data de Envio</th>
                <th>Status</th>
                <th>Mensagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mensagens as $mensagem)
                <tr>
                    <td>{{ $mensagem->id }}</td>
                    <td>{{ $mensagem->professor_id }}</td>
                    <td>{{ $mensagem->nome_aluno }}</td>
                    <td>{{ $mensagem->created_at }}</td>
                    <td>{{ $mensagem->status }}</td>
                    <td>{{ $mensagem->mensagem }}</td>
                    <td>
                        <a href="{{ route('ver_mensagem', $mensagem->id) }}">Ver</a>
                        <a href="{{ route('editar_mensagem', $mensagem->id) }}">Editar</a>
                        <form action="{{ route('excluir_mensagem', $mensagem->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <a type="submit" style="border: none; background: none; color: #1E90FF; cursor: pointer;">Excluir</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>