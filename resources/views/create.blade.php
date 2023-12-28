<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nova Mensagem</title>
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

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .btn-submit {
            background-color: #1E90FF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0e71c7;
        }
    </style>
</head>
<body>

    <h1>Nova Mensagem</h1>

    <div class="form-container">
        <form action="/create" method="POST">
            @csrf
            <label for="professor_id">Professor ID:</label>
            @isset($professores)
            <select id="professor_id" name="professor_id" class="form-control" required>
              @foreach($professores as $professor)
                  <option value="{{ $professor->id }}">{{ $professor->id." - ".$professor->nome }}</option>
              @endforeach
            </select>
            @else
            <select id="professor_id" name="professor_id" class="form-control" required>
            </select>
            @endisset
            <label for="nome_aluno">Nome do Aluno:</label>
            <input type="text" id="nome_aluno" name="nome_aluno" class="form-control" required>
            <label for="nascimento">Nascimento:</label>
            <input type="date" id="nascimento" name="nascimento" maxlength="10" class="form-control" required>
            <label for="whatsapp">Whatsapp:</label>
            <input type="text" id="whatsapp" name="whatsapp" class="form-control" required>
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" class="form-control" required>
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" class="form-control" required>
            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" class="form-control" required></textarea>

            <button type="submit" class="btn-submit">Enviar Mensagem</button>
        </form>
        <br>
        <a href="/" class="btn-submit" style="border: none; text-decoration: none;cursor: pointer;">Voltar</a>
    </div>
</body>
</html>
