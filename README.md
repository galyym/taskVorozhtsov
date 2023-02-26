## Start 
```1. we have to create a database in mysql named "task_vorozhtsov", and we need to write this database name to the .env file.```

```2. php artisan migrate```

```3. php artisan db:seed```

## Task

``` 1. Скрипт авторизации в console-части, то есть он должен быть доступен через консоль на сервере (командой php artisan command и т.д.). Принимает в параметрах логин и пароль - возвращает токен, действующий 5 минут, который нужно использовать для второго и третьего скриптов. Пользователей сгенерировать через сидер, форму регистрации и т.д. делать не нужно.```

Realization
1. For auth I'll use Laravel/Sanctum
2. To get a token you must type in terminal: php artisan auth:token test@test.test test

```2. Скрипт с поддержкой как GET, так и POST, который принимает данные в формате JSON в параметре data и сохраняет их в БД возвращая идентификатор, а также время и память затраченные на обработку запроса и сохранение объекта в БД. Скрипт должен работать исключительно с аутентификацией по токену, полученному в console-части. Аутентификация должна проходить по заголовку в запросе. Для удобства тестирования необходимо сделать форму (подробнее в комментариях).```

Realization
1. First we start the development server using the command: php artisan serve
2. We click on url http://127.0.0.1:8000 and Task2, fill out the form and click SUBMIT

```3. Скрипт с поддержкой как GET, так и POST, который принимает отдельными параметрами идентификатор записи с БД и код, который нужно выполнить по отношению к JSON-объекту, который после выполнения нужно обновить. Код подразумевает уже выполненный json_decode в переменную $data по отношению к объекту с БД и содержит инструкции по обновлению частей JSON-объекта, например:```

```$data->list->sublist[0] = 0;```

```$data->list->sublist[1] = 2;```

```Скрипт, также как и второй, должен работать исключительно с аутентификацией по токену, полученному в console-части. Аутентификация должна проходить по заголовку в запросе. Обновить объект может исключительно тот же пользователь, что его создал. Для удобства тестирования необходимо сделать форму (подробнее в комментариях).```
Realization
1. We click on url http://127.0.0.1:8000 and Task3, fill out the form and click UPDATE. You can see the ID in the json_tasks table. I made it so that when adding records to the tasks table, the same records are duplicated in the json_tasks table.


```4. CRUD. Отображает все сохраненные ранее объекты с возможностью удаления объектов (DELETE). Просмотр (READ) должен предусматривать формирование из объекта JSON маркированный HTML-список с поддержкой разворачивания/сворачивания отдельных элементов. Элементы списка должны включать в себя название, тип объекта и значение в случае конца иерархии объектов. Возможность создания и обновления объектов (CREATE, UPDATE) должна быть доступна исключительно во 2 и 3 скрипте с авторизацией по токену.```
Realization
1. We click on url http://127.0.0.1:8000 and Task4. Here you will be shown all the tasks. It can also be updated and deleted. Only those users who created this record can delete and update it.


## Отчет
Задача  | Оценка   | Затрачено      | Комментарий                                                                                                                                                            |
------- |----------|----------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
Установка фреймворка | 20 минут | 20 минут       | Никаких проблем не было                                                                                                                                                | 
Task1 | 10 минут | 10 минут       | Использовал Laravel/Sanctum, сделал так как сказано в Task1, токен получите через console. Весь проект будете авторизоваться с токеном который получили через console. | 
Task2 | 30 минут | 30 минут       |                                                                                                                                                                        | 
Task3 | 40 минут | 1 час 20 минут | Были вопросы при отправке FormData c get запросом. Также были проблемы когда работал с фронтом                                                                         | 
Task4 | 1 час    | 2 часа         | Фронт хотел сделать более красивым...)))) или можно сказать хотел сделать нормальном и из за этого потерял много времени.                                              | 

## Комментарий

Я получил задание в прошлое воскресенье, и у меня не было времени заниматься в будние дни. Я приступил к выполнению задания в субботу и закончил его в воскресенье, так как оставались еще другие проекты и тусовки))).
