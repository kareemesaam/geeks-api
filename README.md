# Geeks Jo

## Installation

First clone this repository, install the dependencies, and setup your .env file.

```
git clone https://github.com/kareemesaam/geeks-api.git
composer install
cp .env.example .env
```

Then create the necessary database.

```
php artisan db
create database geeks_jo
```

And run the initial migrations and seeders.

```
php artisan migrate --seed

OR

php artisan migrate
php artisan db:seed
```

Then Run Passport Command

```
php artisan passport:install
```

Login credentials

```
email : admin@geeks.io
password: Pa$$w0rd
```

API That gets countries's cities by country id 

```
showCountry EndPoint 
GET : 
http://127.0.0.1:8000/api/countries/id
```


Use Register and Login EndPoints to generate token to use all endpoints in Postman

```
Register EndPoint 
POST : 
http://127.0.0.1:8000/api/register/

Login EndPoint 
POST : 
http://127.0.0.1:8000/api/login/
```
