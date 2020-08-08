# About

SPA for managing users, using Vue.js, axios, Laravel as API.

Features:
- Add User
- Delete User
- Edit User
- Search User (with filters or not)


## Docker Installing
- git clone https://github.com/dmitriy-sanders/user-crm-spa-vue
- cd user-crm-spa-vue
- docker-compose up -d
- docker-compose run --rm composer composer install
- cp .env.example .env
- docker-compose exec web php artisan key:generate
- docker-compose exec web php artisan storage:link
- sudo chmod -R 777 storage/
- docker-compose exec web php artisan migrate
- docker-compose run --rm node npm install
- docker-compose run --rm node npm run dev
- docker-compose exec web php artisan db:seed (Will be generated 10 users)


## Local Installing
- git clone https://github.com/dmitriy-sanders/user-crm-spa-vue
- cd user-crm-spa-vue
- composer install
- cp .env.example .env (Change DB settings)
- sudo chmod -R 777 storage/
- php artisan key:generate
- php artisan storage:link
- php artisan migrate
- npm install && npm run dev
- php artisan db:seed (Generate 10 users)


# Preview

![All Users](https://i.imgur.com/nA2bzrf.png)

![With Filters](https://i.imgur.com/VQ4kcRj.png)

![With Search Form and filter](https://i.imgur.com/Js7gvEk.png)

![Add User](https://i.imgur.com/J6HcXHE.png)

![View User](https://i.imgur.com/l4E2x4k.png)

![Edit User](https://i.imgur.com/jaOVUmW.png)

![Delete User](https://i.imgur.com/dvZj2BY.png)



