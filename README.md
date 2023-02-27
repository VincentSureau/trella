# Projet Trella

## Schema de la base de données

![Schema de la base de données](docs/mcd.png)

## Controller

Pour fonctionner, les controllers doivent implémenter l'interface `App\Trello\ControllerInterface`


## Routes / Urls
| Fonctionnalité                | HTTP Method | Route         | Controller              | Method | Name         |
|-------------------------------|-------------|---------------|-------------------------|--------|--------------|
| Afficher la liste des projets | GET,POST    | /             | ProjectsController      | index  | home         |
| Afficher un projet            | GET         | /board/[i:project_id] | BoardController         | index  | board_index  |
| Ajouter un projet             | POST        | /board/add    | ProjectsController      | index  | board_add    |
| Supprimer un projet           | GET         | /board/[i:project_id]/delete | DeleteProjectController | index  | board_delete |
| Ajouter nue liste             | POST        | /board/[i:project_id]/list/add | BoardController         | index  | list_add     |
| Supprimer une liste           | GET         | /board/[i:project_id]/list/[i:list_id]/delete  | DeleteListeController   | index  | list_delete  |
| Ajouter une carte             | POST        | /board/[i:project_id]/list/[i:list_id]/card/add | AddCardController       | index  | card_add     |
| Supprimer une carte           | POST        | /board/[i:project_id]/list/[i:list_id]/card/[i:card_id]/delete | DeleteCardController    | index  | card_detele  |
|                               |             |               |                         |        |              |
