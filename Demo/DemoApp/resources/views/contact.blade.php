<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">Bootstrap Form</h2>
    <form action="{{url('/')}}/contact" method="post">
        @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" value="{{old('name')}}">
        <span class="text-danger">
            @error('name')
                {{$message}}
            @enderror
        </span>
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" value="{{old('email')}}">
        <span class="text-danger">
            @error('email')
                {{$message}}
            @enderror
        </span>
      </div>
      <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
        <span class="text-danger">
            @error('password')
                {{$message}}
            @enderror
        </span>

      </div>
      <div class="form-group">
        <label for="ConfirmPassword">Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
        <span class="text-danger">
            @error('password_confirmation')
                {{$message}}
            @enderror
        </span>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter description" value="{{old('description')}}"></textarea>
        <span class="text-danger">
            @error('description')
                {{$message}}
            @enderror
        </span>
      </div>
      <!-- <div class="text-center"> -->
        <button type="submit" class="btn btn-primary">Submit</button>
      <!-- </div> -->
    </form>

  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
