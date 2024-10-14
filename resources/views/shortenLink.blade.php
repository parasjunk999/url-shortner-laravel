<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
      body {
        background-color: #f7f7f7;
      }
      .container {
        max-width: 700px;
        margin-top: 50px;
      }
      .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
      }
      .card-header {
        background-color: #5bc0de;
        color: white;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        font-weight: bold;
      }
      .input-group input {
        border-radius: 30px 0 0 30px;
      }
      .btn {
        border-radius: 0 30px 30px 0;
      }
      .table {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
      }
      .alert {
        border-radius: 10px;
      }
    </style>

    <title>Shorten Link</title>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center text-primary mb-5">Laravel URL Shortener</h1> 

      <!-- Display success message -->
      @if(session('success'))
      <div class="alert alert-success text-center">
        {{ session('success') }}
      </div>
      @endif

      <!-- Display error messages -->
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <!-- URL Shortener Form -->
      <div class="card">
        <div class="card-header text-center">
          URL Shortener
        </div>
        <div class="card-body">
          <form method="post" action="{{ route('generate.shorten.link.post') }}">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name="link" class="form-control" placeholder="Enter URL" required>
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Shorten URL</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Shortened Links Table -->
      @if(isset($shortLinks) && $shortLinks->count())
      <div class="mt-4">
        <table class="table table-bordered table-hover">
          <thead class="thead-light">
            <tr>
              <th>ID</th>
              <th>Short Link</th>
              <th>Original Link</th>
            </tr>
          </thead>
          <tbody>
            @foreach($shortLinks as $row)
            <tr>
              <td>{{ $row->id }}</td>
              <td>
                <a href="{{ route('shorten.link', $row->code) }}" target="_blank" class="text-primary font-weight-bold">
                  {{ route('shorten.link', $row->code) }}
                </a>
              </td>
              <td>{{ $row->link }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      <div class="mt-4">
        <p class="text-center text-muted">No shortened links available.</p>
      </div>
      @endif

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lcqq3fTPA4dBuhh6UvP48TBH55u5PsyA3np1Fj/tk" crossorigin="anonymous"></script>
  </body>
</html>
