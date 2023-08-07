<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Projet PROJ-54J40</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f7f7f7;
    }
    .container {
      max-width: 600px;
      margin: 20px auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .header {
      text-align: center;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .project-info {
      margin-bottom: 20px;
    }
    .project-info span {
      font-weight: bold;
    }
    .expense-table {
      width: 100%;
      border-collapse: collapse;
    }
    .expense-table th, .expense-table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }
    .expense-table th {
      background-color: #f2f2f2;
    }
    .total {
      font-weight: bold;
      text-align: right;
    }
  </style>
</head>
<body>
    @livewire('construction.pdf-fichedepenses', ['projet'=>$projet])
  <div class="container">
    <div class="header">CONSTRUCTION DE MA TERRASSE</div>
    <div class="project-info">
      <span>Projet:</span> Encours<br>
      <span>Code du Projet:</span> PROJ-54J40<br>
      <span>Responsable du Projet:</span> SIKULY<br>
      <span>Contact:</span> 0990458598<br>
      <span>Date de début:</span> 2023-07-04<br>
      <span>Date de fin:</span> Projet: Encours<br>
      <span>Budget Total:</span> 375 USD 54000 CDF<br>
    </div>
    <table class="expense-table">
      <tr>
        <th>No</th>
        <th>Description de la dépense</th>
        <th>Montant payé</th>
        <th>Date d'ajout</th>
      </tr>
      <tr>
        <td>1</td>
        <td>achat ciments 100 sacs</td>
        <td>100 USD</td>
        <td>2023-05-24</td>
      </tr>
      <tr>
        <td>2</td>
        <td>achat eaux 20 bidons</td>
        <td>150 USD</td>
        <td>2023-05-24</td>
      </tr>
      <tr>
        <td>3</td>
        <td>achat cloux de 6</td>
        <td>4,000 CDF</td>
        <td>2023-07-24</td>
      </tr>
      <tr>
        <td>11</td>
        <td>transport</td>
        <td>5 USD</td>
        <td>2023-06-04</td>
      </tr>
      <tr>
        <td>12</td>
        <td>chakula macon</td>
        <td>10 USD</td>
        <td>2023-06-04</td>
      </tr>
      <tr>
        <td>13</td>
        <td>cadastre</td>
        <td>100 USD</td>
        <td>2023-05-04</td>
      </tr>
      <tr>
        <td>14</td>
        <td>Autre planche</td>
        <td>10 USD</td>
        <td>2023-06-29</td>
      </tr>
      <tr>
        <td>15</td>
        <td>Transport</td>
        <td>50,000 CDF</td>
        <td>2023-06-06</td>
      </tr>
    </table>
    <div class="total">Total: 375 USD 54000 CDF</div>
  </div>
</body>
</html>
