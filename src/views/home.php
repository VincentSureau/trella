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
                <div class="tile is-ancestor">
                    <div class="tile is-parent is-4">
                        <article class="tile is-child notification is-primary">
                            <p class="title">Projet 1</p>
                            <p class="subtitle">Description 1</p>
                        </article>
                    </div>
                    <div class="tile is-parent is-4">
                        <article class="tile is-child notification is-primary">
                        <p class="title">Projet 2</p>
                            <p class="subtitle">Description 2</p>
                        </article>
                    </div>
                    <div class="tile is-parent is-4">
                        <article class="tile is-child notification is-primary">
                            <p class="title">Projet 3</p>
                            <p class="subtitle">Description 3</p>
                        </article>
                    </div>
                </div>
                <div class="tile is-ancestor">
                    <div class="tile is-parent is-4">
                        <article class="tile is-child notification is-primary">
                            <p class="title">Projet 4</p>
                            <p class="subtitle">Description 4</p>
                        </article>
                    </div>
                    <div class="tile is-parent is-4">
                        <article class="tile is-child notification is-primary">
                            <p class="title">Projet 5</p>
                            <p class="subtitle">Description 5</p>
                        </article>
                    </div>
                    <div class="tile is-parent is-4">
                        <article class="tile is-child notification is-primary">
                            <p class="title">Projet 6</p>
                            <p class="subtitle">Description 6</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>