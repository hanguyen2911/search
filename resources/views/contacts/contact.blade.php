<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
    .container {
        margin: 100px;
    }
    .panel{
        padding: 10px 10px;
    }
    </style>
</head>
<body>
<div>

</div>
   
    @csrf
    <div class ="container col-md-3 ">
    <div class="panel panel-primary">
    <h3>
@if(session('success'))
{{session('success')}}
@endif
</h3>
    <div class="form-group">
    <label for="">Họ và tên</label>
    <input type="text" class="form-control"placeholder="nhập họ tên" name="txtName" value="{{isset($request->txtName)?$request->txtName:''}}"></input>
    </div>
    <div class="form-group">
    <lable for="">Tiêu đề</lable>
    <input type="text" class="form-control"placeholder="nhập tiêu đề" name="txtTitle"value="{{isset($request->txtTitle)?$request->txtTitle:''}}"></input>
    </div>
    <div class="form-group">
    <label for="">Nội dung</label>
    <textarea type="text" class="form-control" placeholder="nhập nội dung"name="teaBody"value="{{isset($request->teaBody)?$request->teaBody:''}}"></textarea>
    </div>
    <br>
    <form action="" method="POST" role ="form">
    <button type="submit" class="btn btn-primary">Gửi</button>
    </form>
    <form action="/action_page.php">
    <div class="form-check">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Option 1
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label" for="radio2">
        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Option 2
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" disabled>Option 3
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    <br>

    </div>
    </div>
    
</body>
</html>