<!DOCTYPE html>
<html>

<head>
  <title>usmanrehmani445566@gmail.com</title>
</head>

<body>
  <p>Thank You</p>

  <p>This is {{$user['name']}}</p>
  <p>This is {{$user['email']}}</p>
  <p>This is {{$user['password']}}</p>
  <p>This is {{$user['code']}}</p>
  <p>This is {{$user['status']}}</p>

  <button type="button"> <a href="{{url('verify', $user->code)}}">Verify</a></button>


</body>

</html>