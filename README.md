<br/>
<p align="center">
  <a href="https://github.com/ZodicSlanser/Learning-Management-System">
    <img src="https://thumbs.dreamstime.com/b/lms-letter-logo-design-black-background-lms-creative-initials-letter-logo-concept-lms-letter-design-lms-letter-logo-design-243270956.jpg" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">Learning Management System</h3>

  <p align="center">
    A Mini-Project for CS352
    <br/>
    <br/>
  </p>


![Forks](https://img.shields.io/github/forks/ZodicSlanser/Learning-Management-System?style=social) ![Issues](https://img.shields.io/github/issues/ZodicSlanser/Learning-Management-System) ![License](https://img.shields.io/github/license/ZodicSlanser/Learning-Management-System)

## Table Of Contents

* [About the Project](#about-the-project)
* [Built With](#built-with)
* [Getting Started](#getting-started)
    * [Prerequisites](#prerequisites)
    * [Installation](#installation)
* [Usage](#usage)
    * [Locally](#running-locally)
    * [Via Container](#running-via-container)
* [Contributing](#contributing)
* [Authors](#authors)

## About The Project

![Index Page Image](https://i.imgur.com/2mg13IV.png)

A Simple LMS built as a mini-project for SWE-2 (CS352) under the supervision of Eng. Ahmed EL-Batanouni to apply
concepts of Backend development and Containerization

## Built With

**Client:** Blade, Bootstrap

**Server:** Apache, Laravel

**Containerization Service:** Docker

**Miscellaneous:** Github
Actions, [Build and push Docker images](https://github.com/marketplace/actions/build-and-push-docker-images), [Docker Login](https://github.com/marketplace/actions/docker-login)

## Getting Started

To get a local copy up and running follow these simple example steps.

### Prerequisites

* npm

```sh
npm install npm@latest -g
```

* laravel

```sh
composer global require laravel/installer
```

Make sure that either **MySQL** or **MariaDB** are installed either manually or via **phpMyAdmin**

### Installation

Clone the project

```bash
  https://github.com/ZodicSlanser/Learning-Management-System
```

Go to the project directory

```bash
  cd Learning-Management-System
```

Install dependencies

```bash
  composer install
```

```bash
  npm install
```

## Usage

### Running Locally

Make the migrations to update the database

```bash
    php artisan migrate
```

Seed the Database

```bash
    php artisan db:seed
```

Start the server and run watch

```bash
    php artisan serve
```

```bash
    npx run watch
````

or alternatively run the .bat

```bash
    /autorun.bat
```

go to the following route

```
    http://127.0.0.1:8000/
```

### Running via container

pull the image 

```
docker pull zodicslanser/lms
``` 

 run the container

 ```
 docker run --name lms -p 8000:8000 -d zodicslanser/lms
 ```
 
 connect to Container Terminal
 
 ```
 docker exec -it lms /bin/sh
 ```
 
 make the migrations to update the database

```bash
    php artisan migrate
```

 go to the following page
 ```
 <container-ip>:8000
 ```
## Contributing

Any contributions you make are **greatly appreciated**.

* If you have suggestions for adding or removing projects, feel free
  to [open an issue](https://github.com/ZodicSlanser/Learning-Management-System/issues/new) to discuss it, or directly
  create a pull request after you edit the *README.md* file with necessary changes.
* Please make sure you check your spelling and grammar.
* Create individual PR for each suggestion.
* Make sure to add a meaningful description

### Creating A Pull Request

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Authors

* **Saif Ad-Din Samir** - *Computer Science Student* - [ZodicSlanser](https://github.com/ZodicSlanser/) 
* **Said Sharaf** - *Computer Science Student* - [Said Sharaf](https://github.com/Saidsharaf) 
* **Salma Hamdy** - *Computer Science Student* - [Salma Hamdy](https://github.com/salmaserag)
* **Ziad Ezzat** - *Computer Science Student* - [Ziad Ezzat](https://github.com/ziad-ezzat)
* **Ziad Shalaby** - *Computer Science Student* - [Ziad Shalaby](https://github.com/ZeadShalaby)
