<!DOCTYPE html>
<html>
<head>
  <title>Tabela Estilo Excel</title>
  <script src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" rel="stylesheet">
</head>
<body>

  <h1>Minha Tabela Editável</h1>
  <div id="tabela-container"></div>

  <script>
    // Seus dados, em formato de array de objetos
    const dados = [
      {id: 1, nome: 'João', idade: 25},
      {id: 2, nome: 'Maria', idade: 30},
      {id: 3, nome: 'Pedro', idade: 28}
    ];

    const container = document.getElementById('tabela-container');
    const hot = new Handsontable(container, {
      data: dados,
      // Define as colunas e suas propriedades
      columns: [
        {data: 'id', title: 'ID', readOnly: true}, // ID não é editável
        {data: 'nome', title: 'Nome'},
        {data: 'idade', title: 'Idade', type: 'numeric'} // Define o tipo de dado
      ],
      colHeaders: true, // Mostra os cabeçalhos das colunas
      rowHeaders: true, // Mostra os cabeçalhos das linhas (números)
      allowInsertRow: true, // Permite adicionar novas linhas
      allowInsertColumn: true, // Permite adicionar novas colunas
      licenseKey: 'non-commercial-and-evaluation' // Chave para uso não comercial
    });
  </script>

</body>
</html>