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

</body>
</html>
