# Solutions for NemTilmeld.dk application
I probably went overboard on the scope of this exercise, so I have included two solutions.
This is all about getting to know me, and I pride myself of delivering good solid code.

The first solution is straightforward. It is the simplest way of modifying the provided pseudo code
to achieve the desired result. 

The second solution is a fully working example using the Laravel
framework, to make it easy to run. This solution also fixes the n+1 issues alongside the potential
risk of sql injections.

### First Solution
This is located in the `first_solution` folder, the file is named `solution-modify-code-assignment.php`

### Second Solution
This one requires a tiny bit more effort and has a couple of requirements to run, if this proves
to excessive or cumbersome, I have provided a list of relevant files to look at further below.

##### Prerequisites
- Have `Git` installed to clone the repository
- Working `PHP 8.1` installation 
- Have `composer` installed (https://getcomposer.org)
- Have `sqlite3` installed, along with its `PHP` extension 

##### Running the code
```
# Clone the repository
git clone [repository url]

# Install dependancies
cd [project name]
composer install

# Spin up a local webserver
php artisan serve

# Go to the link provided in a webbrowser
```

##### Files of importance
```
# The database models which include the relationship code between them
app/Models/Category.php
app/Models/Event.php

# The html template being used to render correctly in the browser
resources/views/solution.blade.php

# The route implementation needed to load the data and render it using the template
routes/web.php
```
