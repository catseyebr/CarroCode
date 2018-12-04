<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Teste</title>
<script src="/js/adm/jquery-1.4.2.min.js"></script>
<script src="/js/teste/autocomplete.js"></script>
<script src="/js/teste/busca.js"></script>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}
</style>

</head>
<body>

<h1><?php echo SITE." - ".PROJETO; ?></h1>

<p>P&aacute;gina de teste</p>

<div id="busca">
         <div id="busca-carro" class="busca-item active">
            <form action="" method="get">
                  <label for="cidade_retirada">Cidade de Retirada:</label>
                        <input type="text" id="cidade_retirada" name="cidade_retirada" value="" class="autocomplete-cidade" />
                 </form>
            </div>
        </div>

<p><br />Page rendered in {elapsed_time} seconds</p>
</body>
</html>