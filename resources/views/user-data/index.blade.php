<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container text-center mt-3">
        <div class="row">

            <form action="{{ route('logout') }}" method="post" style="text-align: end;">
                @csrf
                <a class="btn btn-info" href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
            </form>
            <h1>User Data</h1>

            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="d-flex col-5">
                @csrf
                @error('import')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="file" name="import" class="form-control me-2">
                <button type="submit" class="btn btn-info">Import</button>
            </form>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif


            <div class="col-5" style="text-align: end;">
                <a href="{{ route('export') }}" class="btn btn-info ">Export</a>
            </div>

            <table class="table table-bordered mt-3">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">full name</th>
                    <th scope="col">phone number</th>
                    <th scope="col">email</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>

                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->full_name }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>{{ $item->email }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
