<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

#### *Get all tasks*
GET /api/tasks
<hr>

#### *Get task*
GET /api/tasks/{task}
<hr>

#### *Create task*
POST /api/tasks

Example:

{
"title" : "Hard task",
"description" : "Make it harder",
"status" : "open",
"deadline" : "2024-05-09"
}
<hr>

#### *Update task*
PATCH /api/tasks/{task}

Example:

{
"title" : "Easy task",
"description" : "Make it easier",
"status" : "in_progress",
"deadline" : "2024-06-04"
}
<hr>

#### *Delete task*
DELETE /api/tasks/{task}
<hr>

#### *Search task by params*
GET /api/tasks?{query_params}

Example (from browser address string)

example.org/api/tasks?title=omni&description=voluptas&status=open&deadline=2024-05-12

You can search by any param: title, description, status or deadline.

In case of sending data from frontend (example):

{
"title" : "Hard",
"status" : "open",
"deadline" : "05-09"
}
