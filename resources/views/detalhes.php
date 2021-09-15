<html>

<head>
    <link href="/css/app.css" rel="stylesheet">
    <title>Controle de estoque</title>
</head>

<body>
    <div class="container">

        <h1>Detalhes do produto: <?php echo $p->nome ?> </h1>
        <ul>
            <li>
                <b>Valor:</b> R$ <?php echo $p->valor ?>
            </li>
            <li>
                <b>Descrição:</b> <?php echo $p->descricao ?>
            </li>
            <li>
                <b>Quantidade em estoque:</b> <?php echo $p->quantidade ?>
            </li>
        </ul>
    </div>
</body>

</html>