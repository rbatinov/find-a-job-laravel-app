<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# "Lion-Jobs - find a job for your needs" - This Project is created with Laravel Framework
![Alt text](/public/images/screenshots/lion-jobs-homepage.png "Lion Jobs")

## About "Lion·Jobs - find a job for your needs"

Lion·Jobs is an web-application where you can find your desired new job. 

**You can:**
- Check all job listings in paginated view.
- See job listing information and share a link to it.
- Contact employer via e-mail or check their website *(if there is one)*.
- Filter job listings by tags.
- Search in job listings names, company names, or even in the job description.
- Filter job listings by company that are associated with. 

**You can also register in the system and publish job listings:**
- Register form with validation
- Login form with validation
- Create form for the job listing *(with validation support)*
- Edit form for the job listing *(with validation support)*
- Delete option for the job listing
- Manage your OWN listings *(note that you CANNOT edit someone's others job listings)*.

**The system is developed to support different languages:**
- English and Bulgarian
- The project has structure with files in different languages *(till now Bulgarian and English are added)*.
- Every other language can be added through Laravel Localization Support - everything is developed as it is by the Laravel documentation - [Laravel Localization](https://laravel.com/docs/10.x/localization)

## How to use

### Step 1: Install Apache Server 

```
sudo apt install apache2
```

- If the server is not started, then run 
```
sudo systemctl start apache2
```

- To enable Apache at boot time you can run this
```
sudo systemctl enable apache2
```

- You can check the Apache status to see if the server is running without errors
```
sudo systemctl status apache2
```

### Step 2: Installing PHP and its additional plugins

```
sudo apt install php libapache2-mod-php php-mbstring php-cli php-bcmath php-json php-xml php-zip php-pdo php-common php-tokenizer php-mysql
```

- Verify the php version after installation
```
php –v
```

### Step3: creating a database

- Laravel is compatible with MariaDB, MySQL, SQLite, Postgres, or SQL Server database systems, so you can install whatever you want. 

For example MariaDB is installed with this command
```
sudo apt install mariadb-server
```

- After the installation run 
```
sudo mysql -u root -p
```

- Then we need to create the database (type whatever name you want)
```
CREATE DATABASE laravel_db;
```

- Then create the user - again the username is whatever you want, as well as the password
```
CREATE USER 'laravel_user'@'localhost' IDENTIFIED BY 'secretpassword';
```

- Then Grant privileges to the user 
```
GRANT ALL ON laravel_db.* TO 'laravel_user'@'localhost';
```

- Then flush the privileges
```
FLUSH PRIVILEGES;
```

- And quit
```
QUIT;
```

Now your user is ready to use.


### Step 4: Install Composer

Composer is a package manager and prerequisite management tool for PHP and manages the libraries and dependencies required by PHP based on the particular framework.

- Composer installer 
```
curl -sS https://getcomposer.org/installer | php
```

- we need to move the composer.phar file
```
sudo mv composer.phar /usr/local/bin/composer
```

- Assign authority to execute
```
sudo chmod +x /usr/local/bin/composer
```

- Verify composer version
```
composer –version
```

### Step 5: Install Laravel on Ubuntu

- Go to this folder or whatever you want
```
cd /var/www
```

- and run the following command (where "laravelapp" is your desired laravel application name)
```
sudo composer create-project laravel/laravel laravelapp
```

- With the help of this command, you create a new directory called laravelapp to install the necessary files and directories of Laravel. The web server user is set to own the Laravel directory:

```
sudo chown -R www-data:www-data /var/www/html/laravelapp
```

```
sudo chmod -R 775 /var/www/html/laravelapp/storage
```

### Step 6: Run the project

- There are different methods to run the project - you can configure Apache to run your project under desired local domain name but since it is more complex we will use the simpler method:

- Go to your folder with the project - in our case this is:
```
cd /var/www/laravelapp
```

- After that you can run this command:
```
sudo php artisan serve
```

- Then it will show you on which port the application is running with the URL. 
For example if it is running on port 8001, then you can open your browser and type this url to access your laravel application: 

```
localhost:8001
```

**!IMPORTANT**
- Run the ```php artisan serve``` command with SUDO because without sudo sometimes the project runs, sometimes does not or gives errors. 

- Now your project is ready with the default file structure. You can add code to it or copy this entire repo. 

**I suggest you to write the code by your own in order to learn what you do**

### Step 7: Database Credentials Setup
This app uses MySQL.

To use MySQL, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env

### Migrations of Models
To create all the necessary tables and columns in the database, first you need to create the migrations you want and then run the following command to migrate all the models to the database:
```
php artisan migrate
```


- to create a new migration run
```
php artisan make:migration your_table_name
```

- then in the create() method you can specify all column names and their structure ([Check Documantation](https://laravel.com/docs/10.x/migrations#creating-tables))


### Seeding The Database
- You can edit the factory files **(/database/factories)** in order to seed the database with some new data - Check ListingFactory.php or CompanyFactory.php in this repo for reference.

- To seed the database run 
```
php artisan db:seed --class=YourFileNameSeeder
```

- To run all seeders you can use this command
```
php artisan db:seed
```

### File Uploading
When uploading listing files, they go to "storage/app/public". Create a symlink with the following command to make them publicly accessible.
```
php artisan storage:link
```

### Localization of the project 

- This project is localized and has a structure to be translated in every language.
- To add a new language, go to the **/resources/lang/** folder and create a new folder with language prefix *(in our repo there are bg and en)*. 
- Then create a file with a name whatever you want and you can use the structure of other files in these folder. Your file needs to be in every language folder if you want to be translated. 
- In basic words every file consists of a key-paired values with a same key value and translated value. 
- you need to open the **/config/app.php** file and add your new locale to the *available_locales* property. 

- If you want to lear more about localization, you can check this perfect tutorial: [Laravel Localization](https://lokalise.com/blog/laravel-localization-step-by-step/). 

### Create css and js files 
- It is good to create your css and js files in **/resources/css** and **/resources/js** folders. 
- then you need to open the **webpack.mix.js** file in your root directory. 
- Add references to your new one filenames. 
- Then open the terminal and run:
```
npm run dev
```
- This will create new public accessible files in your **/public/css** and **/public/js** folders.
- To access these files you can use *(where app.js is your filename)*
```
{{ asset('js/app.js') }}
```
### Running The App
Upload the files to your document root, Valet folder or run 
```
sudo php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## All in all thats ALL 

**Enjoy the application and the Laravel Framework.**

Thanks for reading,  
**[M. Eng. R. Batinov](https://radoslav-batinov.bss.design/index.html)**
