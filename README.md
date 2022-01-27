## Set up development

### 1. Clone the repository
Clone https://github.com/CyrilGoldenschue/PRW2_Priki on your local machine.

Go to your project folder and run the installation of laravel dependencies.

```bash
cd /path/to/your/local/clone/of/PRW2_Priki

# install composer dependencies
composer i

# install the npm dependencies
npm i
```
All the javascript and scss assets are in the ressource/assets folder.

These assets need to be compiled in the public folder, laravel-mix provide an easy way to do the job.

All the tasks are defined in the webpack.mix.js file. 
\
When you create new scss or js files, you need to declare them in the webpack.mix.js file or they won't be included during compilation.

To compile the assets, use:
```bash
# development tasks: transpile, compile and generate maps in the public folder
npm run dev
```

Instead of running `npm run dev` everytime you make changes to asset files, you can automatically compile modified files with:
```bash
# watches for changes and compiles on the fly
npm run watch
```


### 2. Create .env file
When the dependencies are installed you must duplicate the ``.env.example`` file and rename it to ``.env``.

Then open your ``.env`` file and complete the information four our specific development environment.


### 3. Set up your application key
Finally, for laravel to work properly, you must generate the application key.

```bash
cd /path/to/your/local/clone/of/PRW2_Priki

php artisan key:generate
```

### 4. Create and seed the database

#### 4.1 Minimal database

In your DB manager create a new DB with the following name : ``prikiwiki``

In terminal, use the next command to create database with required data:
```
php artisan migrate:fresh --seed
```
### 5. Ready for development
```
php artisan serve
```
