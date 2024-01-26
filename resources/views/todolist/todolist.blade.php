<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">

    @if (isset($error))
    <div class="row">
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    </div>
    @endif
    <div class="row">
        <form method="post" action="/logout">
            @csrf
            <button class="w-15 btn btn-lg btn-danger" type="submit">Sign Out</button>
        </form>
    </div>
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Todolist</h1>
            <p class="col-lg-10 fs-4">by <a target="_blank" href="#">Programmer Pemula</a></p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/todolist">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="todo" placeholder="todo">
                    <label for="todo">Todo</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Add Todo</button>
            </form>
        </div>
    </div>
    <div class="row align-items-right g-lg-5 py-5">
        <div class="mx-auto">
            <form id="deleteForm" method="post" style="display: none">
            </form>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Todo</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($todolist as $todo)
                    <tr>
                        <th scope="row">{{ $todo['id'] }}</th>
                        <td>{{ $todo ['todo'] }}</td>
                        <td>
                            <form action="/todolist/{{ $todo['id'] }}/delete" method="post">
                                @csrf
                            <button class="w-100 btn btn-lg btn-danger" type="submit">Remove</button>
                        </form>
                        </td>
                    </tr> 
                    @endforeach              
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>