<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/d3535522b2.js" crossorigin="anonymous"></script>
    <title>login</title>
</head>
<body>
<div class="main">
    <p class="sign" style="text-align:center;">Sign in</p>
    <form class="form1">
      <input class="un " type="text" style="text-align:center;" placeholder="Username">
      <input id="pwd" class="pass" type="password" style="text-align:center;" placeholder="Password">
      <!--      Show/hide password  -->
     <span>
        <i class="fas fa-eye" aria-hidden="true"  type="button" id="eye"></i>
     </span>
      <a class="submit" style="text-align:center;">Sign in</a>
      <p class="forgot" style="text-align:center;"><a href="#">Forgot Password?</p>            
    </div>
    <script>

function show() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'text');
}

function hide() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'password');
}

var pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);
    </script>
</body>
</html>