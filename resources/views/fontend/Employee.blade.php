<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <style>
      .navbar{
          display: flex;
      } 
      .add{
          width: 100px;
      }
      .tile{
          display: flex;
          justify-content: space-between;
          margin: 20px 0;
      }
      form#form-add-edit {
            width: 50%;
            border: 1px solid gray;
            padding: 65px;
            border-radius: 10px;
      }
      td.id {
            display: none;
        }
   </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <div class="col-9 row"> 
            <a class="navbar-brand col-1" href="#">Logo</a>
            <ul class="navbar-nav col-4">
                <li class="nav-item col-1">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item col-1">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
        </div>
        <div class="col-3">
            <form class="form-inline" action="/action_page.php">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
       
    </nav>
</header>

<main class="container">
    
    <div class="py-5"></div>   
   <div class="tile">
    <h2>Employee</h2>
    <button class="btn btn-primary add" >add</button>
   </div>
           
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $item)
        <tr>
            <td class="name">{{$item -> name}}</td>
            <td class="email">{{$item -> email}}</td>
            <td class="address">{{$item -> address}}</td>
            <td><i class="fas fa-edit edit"></i></td>
            <td><a href="delete/{{$item -> id}}"><i class="far fa-trash-alt delete"></i></a></td>
            <td class="id"><input type="text" value="{{$item -> id}}"></td>
            
        </tr>
        @endforeach
        </tbody>
    </table>
</main>
<div class="d-flex justify-content-center">
    <form action="/employee" method = "post" id="form-add-edit" >
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
    <input type="text" id="id">
    <div class="form-group row">
        <label for="email" class="col-2">Name : </label>
        <input type="text" class="form-control col-10" placeholder="Enter name" id="name" name="name">
    </div>
    <div class="form-group row">
        <label for="email" class="col-2">Email :</label>
        <input type="email" class="form-control col-10" placeholder="Enter email" id="email" name="email">
    </div>
    <div class="form-group row">
        <label for="pwd" class="col-2">Address :</label>
        <input type="text" class="form-control col-10" placeholder="Enter Address" id="address" name="address">
    </div>
    <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</div>

</body>
<script>
    $('.edit').on('click', function(){
       var name = $(this).closest('tr').find('.name').text();
       var email = $(this).closest('tr').find('.email').text();
       var address = $(this).closest('tr').find('.address').text();
       var id = $(this).closest('tr').find('.id').val();
       $('#name').val(name);
       $('#email').val(email);
       $('#address').val(address);
        $('#id').val(id);
        console.log(id);
    })
</script>
</html>
   
