
## About Login Task


- нова инсталация на Laravel последна версия
- логин страница на две стъпки:
    - на първата стъпка да пита за имейла на потребителя
    - на втората стъпка да пита за паролата на потребителя
- да отива на втората стъпка само ако въведения имейл съществува


How to run it?
1. Download and install xampp https://www.apachefriends.org/download.html
2. Install Composer https://getcomposer.org/Composer-Setup.exe
3. Open Git bash or PowerShell
4. Navigate to project directory ex: cd /c//xampp/htdocs/
5. git clone git@github.com:sashokrist/Login-system-job-interview-task.git
6. composer install
7. cp .env.example .env
8. php artisan key:generate

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

