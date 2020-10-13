
## About Login Task


- нова инсталация на Laravel последна версия
- логин страница на две стъпки:
    - на първата стъпка да пита за имейла на потребителя
    - на втората стъпка да пита за паролата на потребителя
- да отива на втората стъпка само ако въведения имейл съществува


How to run it?
1. git@github.com:sashokrist/Login-system-job-interview-task.git
2. composer install
3. cp .env.example .env
4. php artisan key:generate

Put in .env:
Set database credentials

5. php artisan migrate
6. php artisan db:seed

Open project on localhost:8000

Administration: localhost:8000/admin-login

 ADMIN: 
 
 admin@admin.com
 
 password: admin
 
 Admin can manage users.
 
 USER:
 
 user@user.com
 
 password: user
 
 User can register and see user profile.

