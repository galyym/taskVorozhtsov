@extends('app')
@section('content')
    <h1>CRUD</h1>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <div class="container">
        <form id="form">
            <div class="mb-3">
                <label for="token" class="form-label">Token</label>
                <input type="text" class="form-control" name="token" id="token">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <table class="table" id="task-list">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Comment</th>
                <th scope="col">Update/Delete</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>

        const form = document.getElementById('form');

        if(window.localStorage.getItem("token") !== null){
            sendRequest();
        }
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            window.localStorage.setItem("token", "Bearer " + document.getElementById('token').value);
            sendRequest();
        });

        function sendRequest(){

            let url = "/api/task/task4";
            let headers = {
                "Authorization": window.localStorage.getItem("token"),
                "Content-Type": "application/json",
                "Accept": "application/json"
            };

                axios.get(url, {headers})
                    .then(res => {
                        const tasks = res.data.data;
                        const tableBody = document.querySelector('#task-list tbody');

                        tasks.forEach(task => {
                            const row = document.createElement('tr');

                            const idCell = document.createElement('td');
                            idCell.textContent = task.id;
                            row.appendChild(idCell);

                            const nameCell = document.createElement('td');
                            nameCell.textContent = task.name;
                            row.appendChild(nameCell);

                            const descriptionCell = document.createElement('td');
                            descriptionCell.textContent = task.description || '-';
                            row.appendChild(descriptionCell);

                            const commentCell = document.createElement('td');
                            commentCell.textContent = task.comment || '-';
                            row.appendChild(commentCell);

                            const actionCell = document.createElement('td');

                            if (task.update) {
                                const updateButton = document.createElement('button');
                                const deleteButton = document.createElement('button');
                                updateButton.textContent = 'Update';
                                updateButton.style = 'background-color: yellow';
                                deleteButton.textContent = 'Delete';
                                deleteButton.style = 'background-color: red';
                                updateButton.addEventListener('click', () => taskUpdate(task.id));
                                deleteButton.addEventListener('click', () => taskDelete(task.id));
                                actionCell.appendChild(updateButton);
                                actionCell.appendChild(deleteButton);
                            }else{
                                actionCell.textContent = '-';
                            }
                            row.appendChild(actionCell);

                            tableBody.appendChild(row);
                        });
                    })
                    .catch(err => {
                        console.log(err);
                    });
        }

        function taskUpdate(taskId){
            window.location.href = `/task4/update/${taskId}`;
        }

        function taskDelete(taskId){
            let url = `/api/task/task4/${taskId}`;
            let headers = {
                "Authorization": window.localStorage.getItem("token"),
                "Content-Type": "application/json",
                "Accept": "application/json"
            };

            axios.delete(url, {headers})
                .then(res => {
                    alert(res.data.message);
                    window.location.reload();
                })
                .catch(err => {
                    console.log(err);
                })
        }
    </script>
@endsection
