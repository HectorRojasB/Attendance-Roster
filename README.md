# Attendance Roster 📚

## Requirements 🚀

1. Install [Node 19](https://nodejs.org/en/)
2. Install [Composer](https://getcomposer.org/download/)
3. Install [Postman](https://www.postman.com/downloads/)
4. Install [PHP ^8.0.2](https://www.php.net/downloads)

### macOS

1. Install PHP
   `brew install php`
2. Make sure the ~/.composer/vendor/bin directory is in your system's "PATH".
3. Install Laravel Valet as a global Composer package
   `composer global require laravel/valet`
4. Execute Valet's install command
   `valet install`
5. Register a directory on your machine that contains your application
    ```
    cd ~/Sites // Place where the-news folder is located
    valet park
    ```
    Now, the site that was linked may be accessed at `your-project-folder.test` this wil be the main url

### Windows

Use [XAMPP](https://www.apachefriends.org/es/download.html)/[WAMPP](https://www.apachefriends.org/es/download.html) or any other local Apache/NGnix/PHP/MySQL package that helps you run a PHP app easily.

If you want to install [Apache](https://httpd.apache.org/docs/current/platform/windows.html)/[NGinx](https://nginx.org/en/download.html), [PHP](https://windows.php.net/download#php-8.1) and [MySQL](https://dev.mysql.com/downloads/installer/) by their own you can also do it.(You must configure your PHP environment by yourself)

## Installation 🔧

1. Navigate on the terminal/cmd to project folder
2. `npm install`
3. `composer install`
4. Update the `.env` file to include a new database

```
DB_CONNECTION=mysql
DB_HOST=your-host
DB_PORT=your-port
DB_DATABASE=your-database
DB_USERNAME=your-user
DB_PASSWORD=your-password
```

5. Run migrations `php artisan migrate `
6. Run database seeders (to add dummy data) `php artisan db:seed `

## Usage 🎮

### API

Use this postman collection and replace the variable `site_url` for your local url for this project

### Students

---

### Create

Endpoint:

```
{{site_url}}/api/students
```

Method:

```
POST
```

Request body:

```javascript
{
   "student_id" : 1212222221212,
   "first_name" : "Hector",
   "last_name" : "Rojas",
   "email" : "email@gmail.com"
}
```

Response example:

```javascript
{
   "message": "STUDENT_ADDED",
   "data": {
      "student_id": 1212222221212,
      "first_name": "Hector",
      "last_name": "Rojas",
      "email": "email@gmail.com",
      "updated_at": "2023-01-25T15:48:42.000000Z",
      "created_at": "2023-01-25T15:48:42.000000Z",
      "id": 33
   }
}
```

### Read

Endpoint:

```
{{site_url}}/api/students
```

Method:

```
GET
```

Request body:

```
empty
```

Response example:

```javascript
{
   "data": [
      {
      "id": 19,
      "student_id": 1651092040799,
      "first_name": "Chadwick",
      "last_name": "Allen",
      "email": "enim@semper.co.uk",
      "created_at": "2023-01-25T02:22:00.000000Z",
      "updated_at": "2023-01-25T02:22:00.000000Z"
      },
      {
      "id": 4,
      "student_id": 1651061329999,
      "first_name": "Evelyn",
      "last_name": "Atkinson",
      "email": "tempus.eu@dolorelitpellentesque.com",
      "created_at": "2023-01-25T02:22:00.000000Z",
      "updated_at": "2023-01-25T02:22:00.000000Z"
      }
   ]
}
```

### Update

Endpoint:

```
{{site_url}}/api/students/{id}?\_method=PUT
```

Method:

```
PUT
```

Request body:

```javascript
{
   "student_id" : 12,
   "first_name" : "Hector",
   "last_name" : "Rojas",
   "email" : "updated@gmail.com"
}
```

Response example:

```javascript
{
   "message": "STUDENT_UPDATED",
   "data": {
      "id": 33,
      "student_id": 133,
      "first_name": "Hector",
      "last_name": "Rojas",
      "email": "updated@gmail.com",
      "created_at": "2023-01-25T15:48:42.000000Z",
      "updated_at": "2023-01-25T15:57:37.000000Z"
   }
}
```

### Delete

WARNING: Careful with foreign keys

Endpoint:

```
{{site_url}}/api/students/{id}
```

Method:

```
DELETE
```

Request body:

```
empty
```

Response example:

```javascript
   {
      "message": "STUDENT_DELETED",
      "data": null
   }
```

### Get students courses

Endpoint:

```
{{site_url}}/api/students/{id}/courses
```

Method:

```
GET
```

Request body:

```
empty
```

Response example:

```javascript
{
   "data": [
      {
         "id": 1,
         "name": "Example Course",
         "created_at": "2023-01-25T02:22:00.000000Z",
         "updated_at": "2023-01-25T02:22:00.000000Z",
         "pivot": {
            "student_id": 1,
            "course_id": 1
         }
      }
   ]
}
```

## Courses

---

### Create

Endpoint:

```
{{site_url}}/api/courses
```

Method:

```
POST
```

Request body:

```javascript
{
   "name": "Test Course"
}
```

Response example:

```javascript
{
   "message": "COURSE_CREATED",
   "data": {
      "name": "Test Course",
      "updated_at": "2023-01-25T16:02:48.000000Z",
      "created_at": "2023-01-25T16:02:48.000000Z",
      "id": 3
   }
}
```

### Read

Endpoint:

```
{{site_url}}/api/courses
```

Method:

```
GET
```

Request body:

```
empty
```

Response example:

```javascript
{
   "data": [
      {
         "id": 1,
         "name": "Example Course",
         "created_at": "2023-01-25T02:22:00.000000Z",
         "updated_at": "2023-01-25T02:22:00.000000Z"
      },
      {
         "id": 2,
         "name": "updated",
         "created_at": "2023-01-25T02:26:22.000000Z",
         "updated_at": "2023-01-25T16:03:58.000000Z"
      },
      {
         "id": 3,
         "name": "Test Course",
         "created_at": "2023-01-25T16:02:48.000000Z",
         "updated_at": "2023-01-25T16:02:48.000000Z"
      }
   ]
}
```

### Update

Endpoint:

```
{{site_url}}/api/courses
```

Method:

```
PUT
```

Request body:

```javascript
{
   "name": "updated"
}
```

Response example:

```javascript
{
   "message": "COURSE_UPDATED",
   "data": {
      "id": 2,
      "name": "updated",
      "created_at": "2023-01-25T02:26:22.000000Z",
      "updated_at": "2023-01-25T16:03:58.000000Z"
   }
}
```

### Delete

WARNING: Careful with foreign keys

Endpoint:

```
{{site_url}}/api/courses/{id}
```

Method:

```
DELETE
```

Request body:

```
empty
```

Response example:

```javascript
{
   "message": "COURSE_DELETED",
   "data": null
}
```

Get all students enrolled in course

Endpoint:

```
{{site_url}}/api/courses/{id}/students
```

Method:

```
GET
```

Request body:

```
empty
```

Response example:

```javascript
{
   "data": {
   "18": {
      "id": 19,
      "student_id": 1651092040799,
      "first_name": "Chadwick",
      "last_name": "Allen",
      "email": "enim@semper.co.uk",
      "created_at": "2023-01-25T02:22:00.000000Z",
      "updated_at": "2023-01-25T02:22:00.000000Z",
      "pivot": {
         "course_id": 1,
         "student_id": 19
      }
   },
   "3": {
      "id": 4,
      "student_id": 1651061329999,
      "first_name": "Evelyn",
      "last_name": "Atkinson",
      "email": "tempus.eu@dolorelitpellentesque.com",
      "created_at": "2023-01-25T02:22:00.000000Z",
      "updated_at": "2023-01-25T02:22:00.000000Z",
      "pivot": {
         "course_id": 1,
         "student_id": 4
      }
      },
   }
   }
```

Get attendances for a course

Endpoint:

```
{{site_url}}/api/courses/{id}/attendances
```

Method:

```
GET
```

Request body:

```
empty
```

Response example:

```javascript
{
   "data": [
   {
      "id": 1,
      "attendance_date": "2023-01-24",
      "present": 1,
      "student_id": 29,
      "course_id": 1,
      "created_at": "2023-01-24T20:22:37.000000Z",
      "updated_at": "2023-01-24T20:22:37.000000Z",
      "student": {
         "id": 29,
         "student_id": 1691060523599,
         "first_name": "Willa",
         "last_name": "Wagner",
         "email": "at@interdumNuncsollicitudin.edu",
         "created_at": "2023-01-25T02:22:00.000000Z",
         "updated_at": "2023-01-25T02:22:00.000000Z"
      }
   },
   {
      "id": 2,
      "attendance_date": "2023-01-24",
      "present": 0,
      "student_id": 30,
      "course_id": 1,
      "created_at": "2023-01-24T20:22:37.000000Z",
      "updated_at": "2023-01-24T20:22:37.000000Z",
      "student": {
         "id": 30,
         "student_id": 1643020941699,
         "first_name": "Joy",
         "last_name": "Carey",
         "email": "scelerisque.lorem@dolordolortempus.ca",
         "created_at": "2023-01-25T02:22:00.000000Z",
         "updated_at": "2023-01-25T02:22:00.000000Z"
      }
   },
   ]
}
```

## Enrolls

---

### Create

Endpoint:

```

{{site_url}}/api/enrolls

```

Method:

```

POST

```

Request body:

```javascript
{
   "student_id":{id},
   "course_id": {id}
}
```

Response example (when student is already enrolled):

```javascript
{
   "message": "STUDENT_ALREADY_ENROLLED",
   "data": null
}
```

Response example (when student is not enrolled):

```javascript
{
   "message": "STUDENT_ENROLLED",
   "data": null
}
```

## Attendances

---

### Create

For this endpoint the sended students are all the enrolled students

Endpoint:

```

{{site_url}}/api/attendances

```

Method:

```
POST
```

Request body:

```javascript
{
    "students": [
        {
            "id": {id},
            "name":"Williams Hayley",
            "present": true
        },
        {
            "id": {id},
            "name":"York Taylor",
            "present": false
        }
    ],
    "course_id": {id},
    "attendance_date" :"2023-1-24"
}
```

Response example (if attendances were already created):

```javascript
{
    "message": "ATTENDENCE_ALREADY_REGISTERED",
    "errors": {
        "attendance_date": [
            "ATTENDENCE_ALREADY_REGISTERED"
        ]
    }
}
```

Response example (if attendances are new):

```javascript
{
    "message": "ATTENDANCE_CREATED",
    "data": null
}
```
