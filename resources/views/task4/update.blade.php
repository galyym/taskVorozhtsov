@extends('app')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <form id="form">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="name" id="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <input type="text" class="form-control" name="comment" id="comment">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        let url = "/api/task/task4/{{$task_id}}";
        let headers = {
            "Authorization": window.localStorage.getItem("token"),
            "Content-Type": "application/json",
            "Accept": "application/json"
        };

        axios.get(url, { headers: headers })
            .then(res => {
                const task = res.data;
                console.log(task);
                document.getElementById('name').value = task.data.name;
                document.getElementById('description').value = task.data.description;
                document.getElementById('comment').value = task.data.comment;
            })
            .catch(error => {
                console.log(error);
            });



        const form = document.getElementById('form');
        form.addEventListener('submit', function (e){
            e.preventDefault();

            const formData = new FormData(form);
            let url = "/api/task/task4/{{$task_id}}";
            let headers = {
                "Authorization": window.localStorage.getItem("token"),
                "Content-Type": "application/json",
                "Accept": "application/json"
            };


            axios.put(url, formData, { headers: headers })
                .then(res => {
                    let status = res.data.message;
                    console.log(status);
                    alert(status);
                    window.location.href = '/task/4';
                })
                .catch(err => {
                    alert(err.message);
                });
        });
    </script>
@endsection
