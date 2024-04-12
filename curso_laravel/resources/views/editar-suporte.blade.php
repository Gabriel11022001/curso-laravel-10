<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar solicitação de suporte</title>
</head>
<body>
    @if (isset($mensagem))

        @if ($mensagem === 'Solicitação de suporte alterada com sucesso!')
            <h1>{{ $mensagem }}</h1>
        @endif

    @endif
    <form action="/suporte/alterar" method="POST">
        @csrf
        @method('PUT')
        <label for="mensagem">Mensagem*</label>
        <br>
        <input type="text" placeholder="Digite a mensagem..." name="mensagem" id="mensagem" value="{{ $suporte['mensagem'] }}" />
        <br>
        <label for="informacoes">Informações*</label>
        <br>
        <textarea name="informacoes" id="informacoes" cols="30" rows="10">
            {{ $suporte['informacoes'] }}
        </textarea>
        <br>
        <label>Status</label>
        <br>
        <select name="status" id="status">
            @if ($suporte['status'] === 'pendente')
                <option value="pendente" selected>Pendente</option>
            @else
                <option value="pendente">Pendente</option>
            @endif
            @if ($suporte['status'] === 'concluído')
                <option value="concluído" selected>Concluído</option>
            @else
                <option value="concluído">Concluído</option>
            @endif
            @if ($suporte['status'] === 'ativo')
                <option value="ativo" selected>Ativo</option>
            @else
                <option value="ativo">Ativo</option>
            @endif
        </select>
        <br>
        <input type="number" name="id" id="id" value="{{ $suporte['id'] }}" style="display: none;" />
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
