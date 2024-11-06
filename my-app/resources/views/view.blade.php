<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <form action="/view" method="GET">
        <div class="mb-3 mt-3">
          <label for="id" class="form-label" style="margin-left:30px">ID</label>
          <input type="id" class="form-control" id="id" placeholder="Enter user Id" name="id" style="width: 200px; margin-left:20px">
        </div>
        <button type="submit" class="btn btn-primary" style="margin-left: 20px">Serach</button>
      </form>

</body>
</html>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Find User by ID</h1>

    <!-- Display error message -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- User Search Form -->
    <form method="POST" action="{{ route('user.find') }}">
        @csrf
        <div class="form-group">
            <label for="id">User ID</label>
            <input type="number" id="id" name="id" class="form-control @error('id') is-invalid @enderror" required>
            @error('id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Find User</button>
    </form>
 
    <!-- Display user details if user exists -->
    @if(isset($user))
        <h2 class="mt-5">User Details</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>
    @endif
</div>
@endsection

