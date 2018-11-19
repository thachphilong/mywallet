<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Thach Phi Long">
    <meta name="google-signin-client_id" content="1064835903121-32gs3o00oq29fe6i3955jl9vb3p5t3rc.apps.googleusercontent.com">
    <link rel="icon" href="bootstrap/site/favicon.ico">

    <title>My Owls Nest's Wallet</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin">
      <img class="mb-4" src="bootstrap/site/docs/4.1/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <br/>
      <button type="button" class="btn btn-lg btn-block btn-info">
        <img src="pic/login/facebook.png" width="10%" class="img-thumdnail" alt="Image">
        Sign in with Facebook
      </button>
      <br/>
      <div class="g-signin2" data-width="300" data-height="50" data-longtitle="true">
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
  <script scr="js/login/google-login/google-login.js"></script>
  <script src="js/login/facebook-login.js"></script>
</html>