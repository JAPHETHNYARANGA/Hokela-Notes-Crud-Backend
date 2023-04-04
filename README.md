# Hokela

This ia a todo backend application that has a register and login option, creating a todo, getting Todos, updating a specific and deleting a specific todo.

# Running The Apllication

After cloning the application , run the command `composer intall` to install the required dependencies for the laravel project

Then create a .env file and run `php artisan key:generate` to generate application key.

for the passport tokens.
run the command `php artisan passport:client`
then add it to the .env file as shownn below

`PASSPORT_PERSONAL_ACCESS_CLIENT_ID=1`<br>
`PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET="DDVPb9VUAD2LU5Bqd0T8y2uJW4fZblqeJtRslKVC"`

## Technologies

* Laravel
* Mysql
* Passport


## How The APi works
 ### Authentication
 * Once the user has registered their account and logged in, an Authentoication token is created which the user will require to access other api functionality in the application.
 The authentication token is passed as a bearer token incase an Api testing gateway like postman is being used.





# Api End Points

* When running the application on local host, the base url for the application is `http://127.0.0.1:8000/`

## Authentication Endpoints
### Login
* Login endpoint - `/api/login` 
* The required parameters for login are `email` and `password`.
* The expected login sucess response is {<br>
   ` "success": true,`
   `message:"User logged in successfully"`<br>
    <br>
   ` "user": {`<br>
        `"id": 1,`<br>
        `"userId": "28ae9b10-0c6d-4ea1-b031-0f66ac43c1bb"`<br>
       ` "name": "japheth",`<br>
        `"email": "nyaranga4@gmail.com",`<br>
        `"email_verified_at": null,`<br>
        `"created_at": "2023-02-16T14:32:01.000000Z",`<br>
        `"updated_at": "2023-02-16T14:32:01.000000Z"`<br>
   ` },`<br>
    `"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZGJhYmU1OTdjOWJhOWZlZjUwZTgzMmFhMzBkMmI5ZDcxMmY1MGJkYjk0M2U4NjkyODNkZjA5MjczYjJmYjQ3MzM5OGI2MWExMWNmZDY4YzEiLCJpYXQiOjE2NzY1Njc2NjAuNTI0MjY3LCJuYmYiOjE2NzY1Njc2NjAuNTI0MjcyLCJleHAiOjE3MDgxMDM2NjAuNTA4NzkxLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.jfxtwyJNyz0IFM93N-za8Mb1Y2FWL1DH__vNJzLLm1umjVQEkuSkjFNh6SeT_YzAwWCJIlqLxFDO4ID1Fa2-eXT5rRV-AESkv2U4ytfOCkmZxQ8mdjy7OoGjfGaRhq80H07LJnbbN0SLuHbaYvjT_1BeFyGK_6Kt-gN2KQe-1DhLS2tXPgR-2XpvF_pgQ1YRqhzu91IcIiILR8RUkbKO2Mc4P9yqYxu8Imh0JQuLI5EUpdwspR57UVtjz9SWS1v2akcsHlQjuNmcZn1raEaU-6Luuvh35sYEkEIj8s4mkjX1G1L5y_TJL6Dtf9NvTa3dlsEmQLZncB-pR9mpMO9nmeYuO50HRgJ7KAs0I1KlZId4OFNSmIKIPYNt02ssPPDBv8ZHv5IR8g74S7XGfRV8IqnzAVaL8IIqOQQxCCjOa38dq-vXy4DzvQCPKIddi8Qz5vbVYu5r0pElB746BDEVaiBieNYi5m8GYHzSriHZwYz1JKurvBLYwAdz6aF8Y5Z9j7nOfrFSPQRsVG6wYlQijV_NLH9zQ2xCqq3bLtHx0YrHIDnBHyBmrXs9FRCcuZNdspP2rd6N3EQyx8e__1dy-xwbkdGGvaE0iZt_oastNnfWSCDOy_4krXOHIMK9vdjoD8E-RTZCAxSFaMVFQFDmGAAtihuT86vJkgKWtUeFt30"`
} 

### Register
* Register endpoint - `/api/register` 
* Register user parameters are `name` , `email` and   `password`.
* Register response is `{`<br>
    `"success": true,`<br>
    `"message": "user registered successfully",`<br>
    `"user": {`<br>
        `"name": "japheth nyaranga",`<br>
        `"email": "nyaranga@gmail.com",`<br>
        `"updated_at": "2023-02-17T05:55:32.000000Z",`<br>
        `"created_at": "2023-02-17T05:55:32.000000Z",`<br>
        `"userId": "28ae9b10-0c6d-4ea1-b031-0f66ac43c1bb"`<br>
        `"id": 2`<br>
    `}`<br>
`}`<br>


## Todo End Point
### Add Todo
* To Create a new todo, the end point is `/api/todos`

* The url header must contain the token that was created when the user logged in in the header parameter.
    `POST /api/todos`<br>
     `Host: http://127.0.0.1:8000/`<br>
      `Authorization: Bearer <your_token_here>`<br>
* The expected successful response is<br>
`{`<br>
    `"success": true,`<br>
    `"message": "todo added successfully"`<br>
`}`<br>



### get todo
* To get all todos, the end point is `/api/todos`

* The url header must contain the token that was created when the user logged in in the header parameter.
    `GET /api/todos`<br>
     `Host: http://127.0.0.1:8000/`<br>
      `Authorization: Bearer <your_token_here>`<br>
* The expected successful response is<br>
`{`<br>
    `"success": true,`<br>
     `"message": "Todo fetched successfully",`<br>
     `"user": {`<br>
        `"name": "japheth nyaranga",`<br>
        `"email": "nyaranga@gmail.com",`<br>
        `"updated_at": "2023-02-17T05:55:32.000000Z",`<br>
        `"created_at": "2023-02-17T05:55:32.000000Z",`<br>
        `"userId": "28ae9b10-0c6d-4ea1-b031-0f66ac43c1bb"`<br>
        `"id": 2`<br>
    `}`<br>,
    `"todos": [`<br>
      `  {`<br>
         `   "id": 1,`<br>
           ` "userId": "rdsgcwv56",`<br>
           ` "todo": "this is my body",`<br>
             `   "status": 1,`<br>
           ` "created_at": "2023-02-16T14:33:33.000000Z",`<br>
            `"updated_at": "2023-02-16T14:33:33.000000Z"`<br>
       ` },`<br>
        `  {`<br>
         `   "id": 1,`<br>
           ` "userId": "rdsgcwv56",`<br>
           ` "todo": "this is my body",`<br>
             `   "status": 1,`<br>
           ` "created_at": "2023-02-16T14:33:33.000000Z",`<br>
            `"updated_at": "2023-02-16T14:33:33.000000Z"`<br>
       ` },`<br>
       `  {`<br>
         `   "id": 1,`<br>
           ` "userId": "rdsgcwv56",`<br>
           ` "todo": "this is my body",`<br>
             `   "status": 1,`<br>
           ` "created_at": "2023-02-16T14:33:33.000000Z",`<br>
            `"updated_at": "2023-02-16T14:33:33.000000Z"`<br>
       ` },`<br>
       `  {`<br>
         `   "id": 1,`<br>
           ` "userId": "rdsgcwv56",`<br>
           ` "todo": "this is my body",`<br>
             `   "status": 1,`<br>
           ` "created_at": "2023-02-16T14:33:33.000000Z",`<br>
            `"updated_at": "2023-02-16T14:33:33.000000Z"`<br>
       ` },`<br>
   ` ]`<br>
`}`<br>



### get specific todo id
* To get a specific todo, the end point is `/api/todo/{id}`
* The id is the specific id of the todo that is obtained when all the todos are fetched.
* The url header must contain the token that was created when the user logged in in the header parameter.
    `GET /api/todo/{id}`<br>
     `Host: http://127.0.0.1:8000/`<br>
      `Authorization: Bearer <your_token_here>`<br>
* The expected successful response is<br>
`{`<br>
    `"success": true,`<br>
     `"message": "todo fetched successfully",`<br>
    `"user": {`<br>
        `"name": "japheth nyaranga",`<br>
        `"email": "nyaranga@gmail.com",`<br>
        `"updated_at": "2023-02-17T05:55:32.000000Z",`<br>
        `"created_at": "2023-02-17T05:55:32.000000Z",`<br>
        `"userId": "28ae9b10-0c6d-4ea1-b031-0f66ac43c1bb"`<br>
        `"id": 2`<br>
    `}`<br>,
    `"todos": [`<br>
      `  {`<br>
         `   "id": 1,`<br>
           ` "userId": "rdsgcwv56",`<br>
           ` "todo": "this is my body",`<br>
             `   "status": 1,`<br>
           ` "created_at": "2023-02-16T14:33:33.000000Z",`<br>
            `"updated_at": "2023-02-16T14:33:33.000000Z"`<br>
       ` },`<br>
       `]`
`}`<br>

### delete specific todo id
* To delete a specific todo, the end point is `/api/deleteTodo/{id}`
* The id is the specific id of the todos that is obtained when all the todos are fetched.
* The url header must contain the token that was created when the user logged in in the header parameter.
    `GET /api/deleteTodo/{id}`<br>
     `Host: http://127.0.0.1:8000/`<br>
      `Authorization: Bearer <your_token_here>`<br>
* The expected successful response is<br>
`{`<br>
    `"success": true,`<br>
    `"message": "tododeleted successfully"`<br>
`}`<br>


### update specific todo id
* To update a specific todo, the end point is `/api/updateTodo/{id}`
* The id is the specific id of the todo that is obtained when all the todos are fetched.
* The url header must contain the token that was created when the user logged in in the header parameter.
    `PUT /api/updateTodo/{id}`<br>
     `Host: http://127.0.0.1:8000/`<br>
      `Authorization: Bearer <your_token_here>`<br>

* When testing the update url on postman the parameters to be updated should be attached to the url as shown :<br>      
`PUT :: http://127.0.0.1:8000/api/updateTodo/1?title=update title updated&body=update body`
* The expected successful response is<br>
`{`<br>
    `"success": true,`<br>
    `"message": "todo updated successfully"`<br>
`}`<br>


### update specific todo status
* To update a specific todo, the end point is `/api/updateStatus/{id}`
* The id is the specific id of the todo that is obtained when all the todos are fetched.
* The url header must contain the token that was created when the user logged in in the header parameter.
    `PUT /api/updateStatus/{id}`<br>
     `Host: http://127.0.0.1:8000/`<br>
      `Authorization: Bearer <your_token_here>`<br>


* The expected successful response is<br>
`{`<br>
    `"success": true,`<br>
    `"message": "Status updated successfully"`<br>
`}`<br>





