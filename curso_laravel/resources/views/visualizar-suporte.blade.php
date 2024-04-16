<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizar suporte</title>
</head>
<body>
    <h1>Solicitação de suporte</h1>
    <ul>
        <li>Id: {{ $suporte->id }}</li>
        <li>Mensagem: <p>{{ $suporte->mensagem }}</p></li>
    </ul>
</body>
</html>
