<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $holding->nome }}</title>

    <link href="{{ asset('css/style.css.map') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.bundle.base.css') }}" rel="stylesheet">

    <link href="{{ asset('css/typicons.css') }}" rel="stylesheet">

    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    <script src='https://use.fontawesome.com/releases/v6.3.0/js/all.js' crossorigin='anonymous'></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- inject:css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- endinject -->
    <link href="{{ asset('assets/images/favicon.ico') }}" rel="stylesheet">

</head>
<style>
    table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #ddd;
      margin: 0 auto;
    }
  
    th, td {
      padding: 8px 12px;
      border-bottom: 1px solid #ddd;
      border-top: 1px solid #ddd;
      border-right: 1px solid #ddd;
    }
  
  
    th {
      background-color:  rgb(188 194 195 / 15%);
      color: #000; ;
    }
  
   
    @media (prefers-color-scheme: dark) {
      th[colspan="5"] {
        background-color: rgba(255, 195, 0, 0.2);
        backdrop-filter: brightness(150%);
        color: #000;
      }
    }
  
    @media (max-width: 768px) {
      table {
        font-size: 12px;
      }
  
      th, td {
        padding: 5px;
      }
    }
  </style>

<body>

    <table>
        
        <tr>
            <th rowspan="2" colspan="2" style="background-color:  rgb(188 194 195 / 15%);> <img src="{{ asset('imagens/logo-mini.svg') }}" alt="Logo da Empresa"></th>
            <th colspan="3">Holding - <strong> {{ $holding->nome }}</strong></th>
            <tr>
                <th>2024</th>
                <th>2024</th>
                <th>Codigo da empresa </th>
            </tr>

        <tr>
            <th colspan="5" style="background-color:  #00464D; color:#ffffff;"> Detalhes</th>
        </tr>

        <tr>
          <td colspan="5"><strong>Nome Fantasia:</strong><br /> {{ $holding->nome_fantasia }}</td>
        </tr>

        <tr>
            <td><strong>Inscrição Municipal:</strong><br /> {{ $holding->inscricao_municipal }}</td>
            <td><strong>CNPJ:</strong><br /> {{ $holding->cnpj }}</td>
            <td><strong>Data Abertura:</strong><br /> {{ $holding->data_abertura }} </td>
            <td colspan="2"><strong>Natureza Jurídica:</strong><br /> {{ $holding->natureza_juridica }}</td>
        </tr>

        <tr>
            <td colspan="5"><strong>Site:</strong><br /> {{ $holding->email }}</td>
        </tr>
 
        <tr>
          <th colspan="5" style="background-color: #00464D; color:#ffffff;">Informações Financeiras e Fiscais</th>
        </tr>
       
        <tr>
            <td><strong>Regime Tributário:</strong><br /> {{ $holding->regime_tributario }} </td>
            <td><strong>Faturamento Anual:</strong><br /> {{ $holding->faturamento_anual }}</td>
            <td><strong>Código de Tributação:</strong><br /> {{ $holding->codigo_tributacao }} </td>
            <td><strong>CNAE:</strong><br /> {{ $holding->cnae }}</td>
            <td><strong>Alíquotas Fiscais:</strong><br /> {{ $holding->aliquota_fiscais }} </td>
        </tr>

        <tr>
            <td><strong>Capital Social:</strong><br /> {{ $holding->capital_social }} </td>
            <td colspan="2"><strong>Responsável Contábil:</strong><br /> {{ $holding->responsavel_contabil }}</td>
            <td colspan="2"><strong>Cargo/Função:</strong><br /> {{ $holding->cargo }}</td>
        </tr>

        <tr>
            <th colspan="5" style="background-color: #00464D; color:#ffffff;">Contato</th>
        </tr>

        <tr>
            <td><strong>Telefone:</strong><br /> {{ $holding->telefone }}</td>
            <td colspan="2"> <strong>E-mail:</strong><br /> {{ $holding->email }}</td>
            <td colspan="2"> <strong>Site:</strong><br /> {{ $holding->site }} </td>
        </tr>

        <tr>
            <td colspan="3"><strong>Logradouro:</strong><br /> {{ $holding->logradouro }}</td>
            <td> <strong>Número:</strong><br /> {{ $holding->numero }}</td>
            <td> <strong>Complemento:</strong><br /> {{ $holding->complemento }}</td>
        </tr>

        <tr>
            <td colspan="2"><strong>Bairro:</strong><br /> {{ $holding->bairro }}</td>
            <td><strong>Cidade:</strong><br /> {{ $holding->cidade }}</td>
            <td><strong>Estado:</strong><br /> {{ $holding->estado }} </td>
            <td><strong>CEP:</strong><br /> {{ $holding->cep }}</td>
        </tr>
  
        <tr>
            <th colspan="5" style="background-color: #00464D; color:#ffffff;">Dados do Sócio ou Proprietário</th>
        </tr>

        <tr>
            <td colspan="2"><strong>Sócio/Proprietário:</strong><br /> {{ $holding->socio }}</td>
            <td colspan="3"><strong>CPF:</strong><br /> {{ $holding->cpf }}</td>
        </tr>

        <tr>
            <td colspan="2"> <strong>Participação Societária:</strong><br /> {{ $holding->participacao_societaria }} </td>    
            <td colspan="3"> <strong>Cargo/Função:</strong><br /> {{ $holding->cargo }} </td>    
        </tr>

         
    </table>


</body>

</html>
