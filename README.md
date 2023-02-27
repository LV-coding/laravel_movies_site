## About
Movies site with 1 main (Movie) and 2 minor models (ForeignKey Type and ManyToMany Tags models). 
Implemented the function of likes through ManyToMany model Likes.

For models User implemented roles Admin/User. Admin can use CRUD for all models. Ordinary User can only browse list of movies and single movie.

Implemented  functionality for sorting, filtering and searching.

For further development and testing implemented factories.

## Custom commands

```bash
# command for creating UserAdmin
php artisan createAdmin
```
