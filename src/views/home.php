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
        <section class="section">
            <div class="container">
                <h1 class="title">
                    Hello {{Prénom}}
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
                <?php foreach($projects as $chunk): ?>
                    <div class="tile is-ancestor">
                        <?php foreach($chunk as $project): ?>
                            <a class="tile is-parent is-4" href="?page=board">
                                <article class="tile is-child notification is-primary">
                                    <p class="title"><?= $project['title'] ?></p>
                                    <p class="subtitle"><?= $project['description'] ?></p>
                                </article>
                            </a>
                        <?php endforeach ?>
                    </div>
                <?php endforeach ?>
            </div>
        </section>
    </body>
</html>