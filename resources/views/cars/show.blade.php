<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

<div class="container">
   <h3>Chi tiết xe đó có id={{$car['id'] }}</h3>
   <br></br>
   <div class="row">
   <div class ="colum col-sm-3">
   <img src="\images\{{ $car['image']}}" width="200px"/>
   </div>
   <div class="colum col-sm-3">
     <div>description: {{ $car['description'] }}</div>  
    <div>Model: {{ $car['model'] }}</div>
    <div>Produced on: {{ $car['produced_on'] }}</div>
   </div>
   </div>
   </div>
</body>
</html>