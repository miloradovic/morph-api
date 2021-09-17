## Morph Network test project

Potrebno je da se napravi PHP API framework (da poseduje CRUD mogucnosti)

Laravel 8, MySQL 5.7, PHPUnit 9

Koristio sam Laragon aplikaciju koja sadrzi: Apache 2.4 i MySQL 5.7

Kada skines aplikaciju i postavis u odgovarajuci folder (ako je wampp, xampp onda tamo gde su ostali projekti),
mora manuelno da se napravi baza u MySQL-u [unutar .env fajla ima DB_DATABASE, pa neka se nazivi poklapaju]

Terminal komande:
> composer install (instalira se aplikacija i paketi)

> php artisan migrate (pokreces migracije, mislim da je ovaj deo drugaciji od symfony-a)

> php ./vendor/bin/phpunit (ovako sam pokretao phpunit testove, nadam se da nema sukoba putanja Win/Mac/Linux)
-------------------------------------------------------

> php artisan serve (ova komanda pokrece web server ukoliko ne zelis da se igras sa drugim aplikacijama, samo treba da je Mysql server prethodno pokrenut i to je to)

i ides na adresu: 
>> '127.0.0.1:8000/api/posts'

U fajlu api.php su ispisane sve rute.

Postoji model Post ['title', 'content'] i kontroler PostController ['index', 'show', 'store', 'update','delete']

PostTest.php koristi PhpUnit i tu imamo 5 testa (po jedna za svaku metodu iz PostController-a)

PostController treba da je u mnozini (koristio sam artisan precicu i on je tako odlucio) i druga izmena bi bila api/v1/posts
