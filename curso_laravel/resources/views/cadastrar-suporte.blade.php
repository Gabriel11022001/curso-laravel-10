<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar suporte</title>
</head>
<body>
    @if (isset($mensagem))

        @if ($mensagem === 'Solicitação de suporte cadastrada com sucesso!')
            <h1>{{ $mensagem }}</h1>
        @endif

    @endif
    <form action="/suporte/cadastrar" method="POST">
        @csrf
        <label for="mensagem">Mensagem*</label>
        <br>
        <input type="text" placeholder="Digite a mensagem..." name="mensagem" id="mensagem" />
        <br>
        <label for="informacoes">Informações*</label>
        <br>
        <textarea name="informacoes" id="informacoes" cols="30" rows="10"></textarea>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
