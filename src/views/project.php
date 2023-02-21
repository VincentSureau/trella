<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accueil !</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    </head>
    <body>
        <?php include "_navbar.php" ?>

        <main>
            <div class="container">
                <h1 class="title">
                    <?= $project->getTitle() ?>
                </h1>
                <form class="py-5" action="" method="POST">
                    <div class="field has-addons">
                        <div class="control">
                            <input id="title" name="title" class="input" type="text" placeholder="Titre">
                        </div>
                        <div class="control">
                            <button class="button is-link">Ajouter une liste</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="columns is-flex is-justify-content-center">
                <?php foreach($lists as $list): ?>
                    <div class="column is-3 ">
                        <div class="card has-background-light mgr-medium">
                            <header class="card-header">
                                <p class="card-header-title is-justify-content-space-between">
                                    <?= $list->getTitle() ?>
                                    <a href="?page=delete_list&listId=<?= $list->getId() ?>&projectId=<?= $list->getProjectId() ?>" class="delete"></a>
                                </p>
                            </header>
                            <div class="card-content">
                                <div class="notification has-background-white">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                </div>
    
                                <div class="notification has-background-white">
                                Primar lorem ipsum dolor sit amet, consectetur
                                </div>
    
                                <div class="notification has-background-white">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto alias in recusandae nisi. Et, quas!
                                </div>
    
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </main>
       
    </body>
</html>