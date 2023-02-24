# Projet Trella

## Schema de la base de données

![Schema de la base de données](docs/mcd.png)

## Controller

Pour fonctionner, les controllers doivent implémenter l'interface `App\Trello\ControllerInterface`


## Routes / Urls
| Fonctionnalité                | HTTP Method | Route         | Controller              | Method | Name         |   |   |   |   |
|-------------------------------|-------------|---------------|-------------------------|--------|--------------|---|---|---|---|
| Afficher la liste des projets | GET,POST    | /             | ProjectsController      | index  | home         |   |   |   |   |
| Afficher un projet            | GET         | /board        | BoardController         | index  | board_index  |   |   |   |   |
| Ajouter un projet             | POST        | /board/add    | ProjectsController      | index  | board_add    |   |   |   |   |
| Supprimer un projet           | GET         | /board/delete | DeleteProjectController | index  | board_delete |   |   |   |   |
| Ajouter nue liste             | POST        | /list/add     | BoardController         | index  | list_add     |   |   |   |   |
| Supprimer une liste           | GET         | /list/delete  | DeleteListeController   | index  | list_delete  |   |   |   |   |
| Ajouter une carte             | POST        | /card/add     | AddCardController       | index  | card_add     |   |   |   |   |
| Supprimer une carte           | POST        | /card/delete  | DeleteCardController    | index  | card_detele  |   |   |   |   |
|                               |             |               |                         |        |              |   |   |   |   |
