<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form id="form">
            <select class="form-select" aria-label="Default select example" id="request_type">
                <option value="get">GET</option>
                <option value="post">POST</option>
            </select>
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
            <div class="mb-3">
                <label for="token" class="form-label">Token</label>
                <input type="text" class="form-control" name="token" id="token">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div class="mt-3">
            <p id="memory" style="display: none;">Memory</p>
            <p id="time" style="display: none;">Time</p>
        </div>
    </div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script>
        const form = document.getElementById('form');

        form.addEventListener('submit', function (e){
            e.preventDefault();

            const formData = new FormData(form);
            let method = document.getElementById('request_type').value;
            let url = "/api/task/add";
            let headers = {
                "Authorization": "Bearer " + document.getElementById('token').value,
                "Content-Type": "application/json",
                "Accept": "application/json"
            };
            let response;
            let request = axios.create({headers: headers});

            if (method === "post") {
                response = request.post(url, formData)
            }else{
                const params = new URLSearchParams(formData);
                let get_url = url + "?" + params.toString()
                response = request.get(get_url, null)
            }

            response
                .then(res => {
                    console.log(res.data);

                    document.getElementById('memory').style.display = "block";
                    document.getElementById('time').style.display = "block";
                    document.getElementById('memory').innerHTML = "Memory: " + res.data.data.memory;
                    document.getElementById('time').innerHTML = "Time: " + res.data.data.time;

                    alert(res.data.message);
                })
                .catch(err => {
                    document.getElementById('memory').style.display = "none";
                    document.getElementById('time').style.display = "none";
                    alert(err.message);
                });
        });
    </script>
</body>
</html>
