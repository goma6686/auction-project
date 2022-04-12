<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Auction</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href = "{{asset('css/app.css')}}" rel = "stylesheet">

</head>
<body>
    <header class="p-1 bg-dark text-white">
        @include('layout.header')
    </header>
    <div id="app">
        <main class="py-4">
            <div class="py-12">
                <h1 class="latest text-center mb-2">Edit Post</h1>
                {{ Html::ul($errors->all()) }}
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-5">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="card-body">
                            <form enctype="multipart/form-data" method="POST" action="/profile">
                             @csrf
                              
                                <div class="form-group pt-4">
                                    <label for="datemin">Enter auction end date: (after {{ \Carbon\Carbon::now()->toDateString() }})</label><br>
                                    <input class="form-control" type="date" name="end_date" min="\Carbon\Carbon::now()->toDateString()">
                                </div>
                                <div class="form-group pt-4" id="Time">
                                    <label>End Time:</label>
                                    <input class="timepicker" type="datetime-local" name="Time" />
                                </div>
                                
                              <button type="submit" class="btn btn-primary">Submit</button>
                              
                            </form>
                          </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
            flatpickr("input[type=datetime-local]", {});
            </script>
        </main>
    </div>
    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</body>
</html>
