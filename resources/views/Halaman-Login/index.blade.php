<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Login</title>
    <link rel="stylesheet" href="{{asset('Halaman-Login/style.css')}}" />
  </head>
  <body>
    <div class="container">
      <div class="left-content">
        <h1 class="undangan-logo text-slate-900">TailSimple</h1>
        <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
      </div>
      <div class="right-content">
        <div class="login-box">
          <form action="{{route('login-proses')}}" method="POST">
            @csrf
            <input type="text" placeholder="Email address " class="input-field" name="email" />
            <input type="password" placeholder="Password" class="input-field" name="password"/>
            <button type="submit" class="login-button">Log in</button>
            <a href="#" class="forgot-password">Forgotten password?</a>
          </form>
        </div>
        <p class="create-page">*Harap login menggunakan email dan password yang benar.</p>
      </div>
    </div>
  </body>
</html>
