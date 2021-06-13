<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	table, th, td {
		font-size:20px;
		width:2000px;
		margin-top: 20px;
	}

	th {
		background-color: #00BFFF;
		font-size: 25px;
		color: black;
	}
    .btn{
        font-size: 25px;
    }

    /* th {
		background-color: #9F81F7;
		font-size: 25px;
		color: black;
	} */
	/* td {
		background-color:#CECEF6;
		
		color: black;
	} */
.containe{
    margin-left:50px ;
    margin-right:50px ;
}
.search{
 width: 400px;
 height:47px;
}
.search-container{
    text-align: center;
}


</style>
<body>
<div class="containe">
@if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
    
    <center><h2>Danh sách xe</h2></center>
    <div class="tab">
    <button type="button" class="btn btn-warning" onclick="window.location='{{ route('cars.create') }}'">Add a new car</button>
   
    <div class="search-container">
    <form action="" method="GET"role="form">
     @csrf
      <input type="text" placeholder="Search.." class="search" name="search">
      <button type="submit"class="btn btn-primary">search</button>
    </form>
    @if(isset($cars_search))
    <h3><b>Tìm thấy {{count($cars_search)}} xe</b></h3>
  @endif
    </div>

  </div>
	<!-- <button type="button" class="btn btn-warning" href="{{ route('cars.create') }}">Thêm mới</button> -->
 
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Model</th>
                <th>Manufacturers</th>
                <th>Image</th>
                <th>Description</th>
                <th>Produced_on</th>                
                <th>Action</th>
            </tr>
        </thead>
		
        <tbody>
            @php
                $stt=0;
                $dsxe=[];
                if(isset($cars_search))
                $dsxe=$cars_search;
                else $dsxe=$cars;
            @endphp
            @foreach($dsxe as $car)

            <tr>
                <td>{{ ++$stt }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->manufacturer->mf_name }}</td>
                <td><img src="/images/{{ $car->image}}" style="width: 50px; height:50px;" onclick="window.location='/cars/{{ $car->id }}'" />   </td>
                <td>{{ $car->description }}</td>
                <td>{{ $car->produced_on }}</td>
                
                
                <td>
                
                    <form action="{{ route('cars.destroy', $car['id']) }}" method="post">
                    <button type="button" class="btn btn-success"onclick="window.location='/cars/{{ $car->id }}/edit'">Edit</button>
                            @csrf
                            @method('delete') 
							&nbsp;&nbsp;&nbsp;&nbsp;
                            <button name="delete" class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
	</div>
    </div>
</body>
</html>