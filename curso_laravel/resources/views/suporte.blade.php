<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suportes</title>
</head>
<body>
    <!-- if-else definido no blade --->
    @if (count($suportes) > 0)
        <table>
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Mensagem</td>
                    <td>Status</td>
                    <td>Editar</td>
                    <td>Visualizar</td>
                </tr>
            </thead>
            <thead>
                <!-- foreach definido no blade -->
                @foreach ($suportes as $suporte)
                    <tr>
                        <td>{{ $suporte['id'] }}</td>
                        <td>{{ $suporte['mensagem'] }}</td>
                        <td>{{ $suporte['status'] }}</td>
                        <td><a href="/suporte/editar/{{ $suporte['id'] }}">Editar</a></td>
                        <td><a href="/suporte/visualizar/{{ $suporte['id'] }}">Visualizar</a></td>
                        <td><a href="/suporte/deletar/{{ $suporte['id'] }}">Deletar</a></td>
                    </tr>
                @endforeach
            </thead>
        </table>
    @else
        <h1>Nenhuma solicitação de suporte!</h1>
    @endif
</body>
</html>
