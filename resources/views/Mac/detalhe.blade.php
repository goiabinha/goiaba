<html>
<head>
    <link href="/css/app.css" rel="stylesheet">
    <title> Detalhas de MAC</title>
</head>
<body>
<div class="container">
<h1> Detalhes do MAC Address:</h1>

<ul>
    <li>
        <b>Nome:</b>
    </li>
    <li>
        @foreach ($SLMAC as $m)
            <tr>
                <td>{{$m->mac}}</td>
                <td>{{$m->id_user}}</td>
                <td>{{$m->descricao}}</td>
                <td>{{$m->ticket}}</td>
            </tr>
        @endforeach
    </li>
    <li>
        <b>Ticket:</b> {$m->ticket}
    </li>
    <li>

    </li>
</ul>

</div>
</body>

</html>