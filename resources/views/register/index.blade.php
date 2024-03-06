<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title></title>
  </head>
  <body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <div class="col-md-5">
          
          <main class="form-registration">
  
              <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
              <form action="/register" method="post">
                @csrf
            
                <div class="form-floating">
                  <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                  <label for="floatingInput">Name</label>
                  @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                  <label for="floatingInput">Email address</label>
                  @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                  @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
  
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
              
              </form>
              <small class="text-center d-block mt-3">Already Register <a href="/">Login</a></small>
            </main>
  
      </div>
  </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>