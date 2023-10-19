# To Do List App
A simple to do list app for me to learn GraphQL

Steps in setting up on your local machine:
1. Open the terminal and run "git clone https://github.com/joseph-bautista/cmtodolist.git"
2. Create a .env file. You may copy the contents of .env.example
3. Run "composer install"
4. Install laravel sail by referring to the laravel documentation in this link https://laravel.com/docs/9.x/sail#main-content
5. Launch your docker and then run "./vendor/bin/sail up" on your terminal. 
6. Run the migration using "./vendor/bin/sail artisan migrate:fresh --seed" so we can have dummy data.
7. You may now open your browser and go to "http://localhost" to run your whole app and check on the grahpQL Api on "http://localhost/graphql-playground" and inside the playground use "http://localhost/graphql" before excuting queries and mutations.

In this project we only have 2 tables which are Users and Activity.

To get the list of users together with their corresponding activities you can run:
{
  users{
    data{
      id
      name
      email
      role
      activities{
        id
        name
        description
        is_completed
      }
    }
  }
}

For specific User 
{
  user(id: 2){
    id
    name
    email
    role
    activities{
      id
      name
      description
      is_completed
    }
  }
}

To Delete User
mutation {
  deleteUser(id: 12) {
    id
    name
    email
    password
    role
  }
}

To Update User
mutation{
  updateUser(
    id: 3
    name: "Hello"
    email: "hello@hello.com"
    role: "member"
  ){
    id
	name
    email
    role
  }
}

To get List of Activities
{
	activities{
    data{
      id
      name
      description
      completed_date
      is_completed
      user{
        id
        name
        email
      }
    }
  }
}

To get specific Activity
{
  activity(id: 2){
    id
    name
    description
    completed_date
    is_completed
    
  }
}

To delete an Activity
mutation {
  deleteActivity(id: 16) {
    id
    name
    description
    completed_date
    is_completed
    user{
      id
      name
      email
    }
  }
}

To update an Activity
mutation{
  updateUser(
    id: 3
    name: "Hello"
    email: "hello@hello.com"
    role: "member"
  ){
    id
	name
    email
    role
  }
}

NOTE: You may remove other data depending on your needs
