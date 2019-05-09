## Project shows how to use Deejff/DataGridBundle

###### How to setup project:

- Download code.
- Create mysql db and fill connection data in parameters.ini
- Download dependencies: composer install
- Create db schema: bin/console doctrine:migrations:migrate
- Load test data to db: bin/console doctrine:fixtures:load

###### Example of use is in ListController
