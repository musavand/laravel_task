<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Form Validation Example - ItSolutionStuff.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    
       
       
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
    
        <!-- Way 1: Display All Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
       
        <form method="POST" action="{{ url('TableA/create') }}">
      
            {{ csrf_field() }}
      
            <div class="mb-3">
                <label class="form-label" for="inputName">Name:</label>
                <input 
                    type="text" 
                    name="name" 
                    id="inputName"
                    class="form-control @error('name') is-invalid @enderror" 
                    placeholder="Name">
  
                <!-- Way 2: Display Error Message -->
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="inputName">User Star:</label>
                <input 
                    type="number" 
                    name="user_star" 
                    id="inputName"
                    class="form-control @error('name') is-invalid @enderror" 
                    placeholder="User Star">
  
                <!-- Way 2: Display Error Message -->
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
       
     
            <div class="mb-3">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>