# Papirus Simple Blogging System

Papirus is developed as a wordpress alternative for my blog website with Symfony web framework. I aimed for simplicity and ease. Papirus uses sqlite database with zero database configuration.

### Prerequisites

* PHP >= 7.4
* PDO Driver (Sqlite)
* Composer

### Deployment

* Clone or download repository,
* Run ```composer install``` to install all dependencies,
* Upload all content except 'public' folder to an inaccessible directory on the web,
* Upload 'public' folder to world accassable directory,
* Move .env.example to .env file and set APP_SECRET key,
* Edit index.php in public folder and set Papirus bootstrap.php file path e.g. ```require dirname(__DIR__).'/**Papirus/**config/bootstrap.php';```,
* Browse http(s)://yourdomainname.com/[your_upload_path] and admin path is http(s)://yourdomainname.com/[your_upload_path]/admin. Default username 'admin' and default password 'papirus'.

## Built With

* [Symfony](https://symfony.com/) - The web framework
* [EasyAdmin](https://github.com/EasyCorp/EasyAdminBundle) - Admin panel generator
* [Cactus Theme](https://github.com/probberechts/hexo-theme-cactus) - A responsive, clean and simple theme for a personal website

## Authors

* **Mesut Erdemir** - *Developer* - [MesutErdemir](https://github.com/MesutErdemir)

See also the list of [contributors](https://github.com/MesutErdemir/Papirus/graphs/contributors) who participated in this project.

## License

This project is licensed under the MIT License.
