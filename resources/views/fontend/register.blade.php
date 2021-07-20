<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="{{ asset('css/bootstrap.js') }}" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <!-- Popper JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

   <!-- Latest compiled JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
   <h2><?php if(isset($messages)) echo 'value = "' . $messages . '"'?></h2>
<form action = "/register" method = "post">
   <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      <div class="form-group">
         <label for="name">Ho va ten</label>
         <div class="col-sm-9">
            <input type="text" name="name" class="form-control">
         </div>
      </div>

      <div class="form-group">
         <label for="email" class="col-sm-3 control-label"> dia chi email</label>
         <div class="col-sm-9">
            <input type="text" name="email" class="form-control">
         </div>
      </div>

      <div class="form-group">
         <label for="password" class="col-sm-3 control-label"> mat khau</label>
       
         <div class="col-sm-9">
            <input type="text" name="password" class="form-control">
         </div>
      </div>

      <div class="form-group">
         <div class="col-sm-offset-3 col-sm-9">
            <input type = "submit" value = "Gửi" />
         </div>
      </div>          
</form>
</body>
</html>