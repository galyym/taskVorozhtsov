<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="navbar-brand" href="{{ url('/task/1') }}">Task 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" href="{{ url('/task/2') }}">Task 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" href="{{ url('/task/3') }}">Task 3</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="mt-3">
                @yield('content')
            </div>
        </div>

        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
