
# Livewire APP

## Funkcje

- Lista dodanych produktów
- Dodawanie, edycja, usuwanie produktów
- Widok szczegłówy dodanego produktu
- Panel Logowania i rejestracji
- Panel "Mój profil"
- API


## Technologie

- Laravel 9v
- Livewire
- Datatable
- jQuery


## Instalacja

Projekt wymaga node w wersji 17.x.x w moim przypadku było to 17.7.2, NPM w wersji 7.x.x u mnie jest to 8.5.2 oraz PHP 8.x.x u mnie 8.1.6


```sh
git clone https://github.com/MateuszKalwinski/livewire.git
composer install
cp .env.example .env
php artisan key:generate
npm install
```

Stwórz bazę danych MySql i uzupełnij plik .env. Następnie uruchom poniższe polecenia

```sh
php artisan migrate:fresh --seed
php artisan serve
```

wejdź na adres

```sh
127.0.0.1:8000
```

## API
Pobranie produktów wymaga uwierzytelnienia metodą Basic Auth
Wpisz swoje dane logowania przed wysłaniem request-a. W przypadku Postman-a wybierz zakładkę "Authorization" i typ "Basic Auth"

api/products - zwróci wszytskie produkty - METODA GET

```sh
http://127.0.0.1:8000/api/products
```

api/products/{id} - zwróci szczegóły danego produktu - METODA GET

poniższy przykład zwróci szczegóły produktu o id 1
```sh
http://127.0.0.1:8000/api/products/1
```

## License

MIT

**Free Software, Hell Yeah!**

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

   [dill]: <https://github.com/joemccann/dillinger>
   [git-repo-url]: <https://github.com/joemccann/dillinger.git>
   [john gruber]: <http://daringfireball.net>
   [df1]: <http://daringfireball.net/projects/markdown/>
   [markdown-it]: <https://github.com/markdown-it/markdown-it>
   [Ace Editor]: <http://ace.ajax.org>
   [node.js]: <http://nodejs.org>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [@tjholowaychuk]: <http://twitter.com/tjholowaychuk>
   [express]: <http://expressjs.com>
   [AngularJS]: <http://angularjs.org>
   [Gulp]: <http://gulpjs.com>

   [PlDb]: <https://github.com/joemccann/dillinger/tree/master/plugins/dropbox/README.md>
   [PlGh]: <https://github.com/joemccann/dillinger/tree/master/plugins/github/README.md>
   [PlGd]: <https://github.com/joemccann/dillinger/tree/master/plugins/googledrive/README.md>
   [PlOd]: <https://github.com/joemccann/dillinger/tree/master/plugins/onedrive/README.md>
   [PlMe]: <https://github.com/joemccann/dillinger/tree/master/plugins/medium/README.md>
   [PlGa]: <https://github.com/RahulHP/dillinger/blob/master/plugins/googleanalytics/README.md>

