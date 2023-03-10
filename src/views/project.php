<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accueil !</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    </head>
    <body>
        {include "_navbar.php"}

        <main>
            <div class="container">
                <h1 class="title">
                    {$project->getTitle()}
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

            <div class="columns is-flex is-justify-content-center sortable-lists">
                {foreach $lists as $list}
                    <div data-id="{$list->getId()}" class="column is-3 sortable-list">
                        <div class="card has-background-light mgr-medium">
                            <header class="card-header">
                                <p class="card-header-title is-justify-content-space-between">
                                    {$list->getTitle()}
                                    <a href="{$router->generate('list_delete', ['project_id' => $project->getId(),'list_id' => $list->getId()])}" class="delete"></a>
                                </p>
                            </header>
                            <div class="card-content">
                                <div class="sortable-cards py-3">
                                    {foreach $list->getCards() as $card}
                                        <div data-id="{$card->getId()}" class="notification has-background-white">
                                            <a href="{$router->generate('card_delete', ['project_id'=> $project->getId(), 'list_id' => $list->getId(), 'card_id' => $card->getId()])}" class="delete"></a>
                                            {$card->getTitle()}
                                        </div>
                                    {/foreach}
                                </div>
                                <form class="py-5" action="{$router->generate("card_add", ['project_id' => $list->getProjectId(), 'list_id' => $list->getId()])}" method="POST">
                                    <input type="hidden" name="listId" value="{$list->getId()}">
                                    <input type="hidden" name="projectId" value="{$list->getProjectId()}">
                                    <div class="field has-addons">
                                        <div class="control">
                                            <input name="title" class="input" type="text" placeholder="Titre">
                                        </div>
                                        <div class="control">
                                            <button class="button is-link">Ajouter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>
            // je génère mon url pour modifier la route
            const update_list_order_url = "{$router->generate('list_update_order')}";
            const update_card_order_url = "{$router->generate('card_update_order')}";
            const update_card_list_url = "{$router->generate('card_update_list')}";
            // je rends mes cartes sortables
            $( ".sortable-cards" ).sortable({
                connectWith: ".sortable-cards",
                update: function(event, ui) {
                    // je récupère les cards qui sont les enfants de .sortable-cards
                    const cards = $(event.target).children();
                    // je fais une boucle sur toutes les cards
                    for(let i = 0; i < cards.length; i++) {
                        // je récupère le data-id
                        const cardId = $(cards[i]).data('id');
                        // je calcule le nouvel ordre de chaque card
                        const order = i + 1;
                        $.ajax({
                            method: "POST",
                            url: update_card_order_url,
                            data: { card_id: cardId, order: order }
                        })
                        .done(function( msg ) {
                            console.log(msg);
                        });
                    }
                },
                receive: function( event, ui ) {
                    console.log('receive event',event, ui);
                    const listId = $(event.target).closest('.sortable-list').data('id');
                    const cardId = $(ui.item[0]).data('id');
                    console.log(listId, cardId)
                    $.ajax({
                        method: "POST",
                        url: update_card_list_url,
                        data: { list_id: listId, card_id: cardId }
                    })
                    .done(function( msg ) {
                        console.log(msg);
                    });
                }
            }).disableSelection();
            // je rends mes listes sortables
            $( ".sortable-lists" ).sortable({
                update: function(event, ui) {
                    // je récupère les listes qui sont les enfants de .sortable-lists
                    const lists = $(event.target).children();
                    // je fais une boucle sur toutes les listes
                    for(let i = 0; i < lists.length; i++) {
                        console.log(lists[i])
                        // je récupère le data-id
                        const listId = $(lists[i]).data('id');
                        // je calcule le nouvel ordre de chaque liste
                        const order = i + 1;
                        $.ajax({
                            method: "POST",
                            url: update_list_order_url,
                            data: { list_id: listId, order: order }
                        })
                        .done(function( msg ) {
                            console.log(msg);
                        });
                    }
                }
            }).disableSelection();
        </script>
    </body>
</html>