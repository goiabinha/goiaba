<html>
<head>
    <link href="/css/app.css" rel="stylesheet">
    <title> Detalhas de MAC</title>
</head>
<body>
<div class="container">
<h1> Detalhes do MAC Address: <?= $m-> mac ?> </h1>

<ul>
    <li>
        <b>Nome:</b> <?= $m->nome ?>
    </li>
    <li>
        <b>Descricao:</b> <?= $m->descricao ?>
    </li>
    <li>
        <b>Ticket:</b> <?=$m ->ticket ?>
    </li>
    <li>
        <b>Status:</b> <span class="label {{ $M->ativo ? ' label-success' : 'label-danger' }}"> @if ($M->ativo=='1') Ativo @else Inativo @endif</span>
    </li>
</ul>

</div>
</body>

</html>