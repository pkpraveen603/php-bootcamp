## Social Media App

Features available:

- Create/update/delete a user
- Create/update/delete a post
- Create/Delete a comment on any post

Hosted on: ``` localhost:8000 ```

Pre-requisites:

- Composer
- Laravel
- PHP

Routes available:

#### user routes
get localhost:8080/user
patch localhost:8080/user/{id}
post localhost:8080/user
delete localhost:8080/user/{id}

#### post routes
get localhost:8080/post/{user_id}
patch localhost:8080/post/{id}
post localhost:8080/post/{user_id}
delete localhost:8080/post/{id}

#### comment routes
get localhost:8080/comment/{post_id}
post localhost:8080/comment/{post_id}
delete localhost:8080/comment/{id}
