<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver Mensagem</title>
    <style>
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

        .message-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .message-details p {
            margin: 10px 0;
        }

        a {
            text-decoration: none;
            color: #1E90FF;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn-reply {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 8px 12px;
            border-radius: 5px;
            display: inline-block;
        }

        .btn-reply:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Detalhes da Mensagem</h1>

    <div class="message-details">
        @isset($mensagem)
            <p><strong>ID:</strong> {{ $mensagem->id }}</p>
            <p><strong>Professor ID:</strong> {{ $mensagem->professor_id }}</p>
            <p><strong>Nome do Aluno:</strong> {{ $mensagem->nome_aluno }}</p>
            <p><strong>Data de Envio:</strong> {{ $mensagem->data_envio }}</p>
            <p><strong>Status:</strong> {{ $mensagem->status }}</p>
            <p><strong>Mensagem:</strong> {{ $mensagem->mensagem }}</p>
        @else
            <p><strong>MENSAGEM INVÁLIDA</strong></p>
        @endisset
    </div>

    <div class="form-container">
        <form action="{{ route('responder_mensagem', $mensagem->id) }}" method="POST">
            @csrf
            <textarea id="resposta" name="resposta" class="form-control" required></textarea>
            <button type="submit" class="btn-submit">Enviar Resposta</button>
        </form>
    </div>

    <a href="{{ route('dashboard') }}" style="text-decoration: none; color: #fff; background-color: #1E90FF; padding: 8px 12px; border-radius: 5px; margin-top: 20px; display: block; width: fit-content;">Voltar para Lista de Mensagens</a>

</body>
</html>
