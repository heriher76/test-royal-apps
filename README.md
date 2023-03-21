# Technical Test 

This task is used as a skill assessment assignment which RoyalApps uses.

Successfully completed the following tasks:

- Created a new Laravel project.
- Focused on functionality.
- Set up the project to be as simple as possible.
- Documented the setup process to make it easy for others to understand.
- Used PHP 7.4 as the minimum version.
- Created a client to connect to Symfony Skeleton API and retrieved an access token using the provided credentials.
- Stored the access token using session.
- Fetched the list of authors from the API and displayed them in a table layout.
- Enabled the user to delete an author if there are no related books for that author.
- Created a view page of single authors and their books.
- Implemented a Laravel Artisan CLI command to add a new author.
- Enabled the user to delete books one by one on a single author view.
- Created a page where the user can add a new book and select authors from a dropdown menu.
- Showed the first and last name of the user on the base page layout after they log in.
- Added a logout feature.
## Installation

```bash
  composer update
```

```bash
  php artisan serve
```
    
## Documentation
- Take access token in profile page for create new author in CLI
<br>
<img width="546" alt="Screenshot 2023-03-22 at 01 11 01" src="https://user-images.githubusercontent.com/45260734/226703148-4bd781cb-f514-47ea-b9b4-ff6ee08e64a7.png">

- Create new author in CLI
```bash
  php artisan create:author {access_token}
```
<img width="1302" alt="Screenshot 2023-03-22 at 01 14 07" src="https://user-images.githubusercontent.com/45260734/226703728-f520e771-6d96-4633-9278-486dd11ddfe8.png">

- The API url stored in .env as API_URL

## Screenshots

<img width="603" alt="Screenshot 2023-03-22 at 01 12 10" src="https://user-images.githubusercontent.com/45260734/226703123-59f38d0a-3064-4f88-8f38-4db7923f4224.png">

