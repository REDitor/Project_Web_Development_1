# Project Web Development 1 - "Curtains"

## The Project
#### URL: [Curtains](https://curtains-inholland.herokuapp.com/)

#### Login Details:
```
Test User (includes 2 watch lists with a few movies/shows in them):
- Username = TestUser
- Password = secret123

You can either use the provided test account or create your own account to start with a clean canvas.

NOTE: Email does not actually have to exist.
```
<br>

#### Concept Changes:

- <strong>Forgot Password:</strong> Upon password reset, the user will not receive a link to reset their account. I had somehow seen this in the rubrics from a previous year's php assignment. The user now enters their email and if it exists within the database, they are instantly redirected to a password reset view for their account.
<br><br>
- <strong>Adding Movies/Shows:</strong> The original idea was to create 3 forms for movies, shows, and watch lists. This idea quickly turned into loading a collection of pre-existing movies/shows, which can easily be added to one of your lists with the press of a button. The main reason for this is that I want to further develop this application to potentially use IMDB's api to load movies and shows automatically.

## Proposal (Recap)
#### The concept:
A secure web application for keeping track of movies/shows you still want to watch or have already watched.
The records of this will be account bound, so to be able to create a list, an account has to first be created.
<br><br>
```
The application will be fairly simple, but here are the general steps:
1. Create an account.
2. Login with the newly created account.
   - forgetting a password will be no problem, with the forget password feature that will ask you to enter your email
   and the server will provide you with a link to reset your password.
3. Create a new list.
4. Give the list a name.
5. Option for adding movie or adding show.
   - Movie:
        - Will ask for title as required field.
        - Optional fields include duration in minutes, director/writer name, and uploading a picture for that movie.
   - Shows:
     - Will ask for title as mandatory field.
     - Optional fields include number of episodes, director/writer name, and uploading a picture.
6. Save the list.
7. Option for editing the list (deleting, editing, and adding movies/shows in the list)
```

I will develop this project with later expansion in mind. It is something I wanted to develop as a hobby already
and in the future add features like adding it to a planning and syncing that planning with online calendars,
so the user can also plan when he will watch them, and many more features like shared lists to plan a movienight for example.