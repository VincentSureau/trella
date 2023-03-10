<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accueil !</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    </head>
    <body>
        {include "_navbar.php"}
        <section class="section">
            <div class="container">
                <h1 class="title">
                    Hello Prénom
                </h1>
                <p class="subtitle">
                   Bienvenue sur ton <strong>Trellä</strong>!
                </p>

                <form class="py-5" action="" method="POST">
                    <div class="field">
                        <label for="title" class="label">Titre du projet</label>
                        <div class="control">
                            <input id="title" name="title" class="input" type="text" placeholder="Titre">
                        </div>
                    </div>
                        
                    <div class="field">
                        <label for="description" class="label">Description</label>
                        <div class="control">
                            <textarea id="description" name="description" class="textarea" placeholder="Description"></textarea>
                        </div>
                    </div>
                    
                    <div class="control">
                        <button class="button is-link">Ajouter</button>
                    </div>
                </form>
                {foreach $projects as $chunk}
                    <div class="tile is-ancestor">
                        {foreach $chunk as $project}
                            <a class="tile is-parent is-4" href="{$router->generate('board_index', ['project_id' => $project->getId()])}">
                                <article class="tile is-child notification is-primary">
                                    <form action="{$router->generate('board_delete', ['project_id' => $project->getId()])}" method="POST">
                                        <input type="hidden" name="page" value="delete_project">
                                        <input type="hidden" name="projectId" value="{$project->getId()}">
                                        <button type="submit" class="delete"></button>
                                    </form>

                                    <p class="title">{$project->getTitle()}</p>
                                    <p class="subtitle">{$project->getDescription()}</p>
                                </article>
                            </a>
                        {/foreach}
                    </div>
                {/foreach}
            </div>
        </section>
    </body>
</html>