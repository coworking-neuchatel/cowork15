# Le modèle Front-Page

La page d'accueil utilise le modèle "Front-page" dont le code se trouve dans: 

page-templates/front-page.php

Ce template contient un en-tête, dont le code est dans: content-hero.php ("The template used for displaying hero content in page.php and page-templates.")

C'est dans content-hero.php qu'est intégré la [zone de widgets](https://coworking-neuchatel.ch/wp-admin/widgets.php) FrontPage Gallery, permettant d'ajouter une galerie d'images (depuis décembre 2017).

Ensuite, le template front-page.php contient les sections suivantes:

1. **Bloc 1: Prestations** - fait appel à la page par son ID, [2048](https://coworking-neuchatel.ch/wp-admin/post.php?post=2048&action=edit).
2. **Bloc 2: Tarifs** - page ID [2046](https://coworking-neuchatel.ch/wp-admin/post.php?post=2046&action=edit).
3. **Bloc 3: Extensions** - page ID [2047](https://coworking-neuchatel.ch/wp-admin/post.php?post=2047&action=edit).
4. **Témoignages** (3 contenus aléatoires parmi les "testimonials").

***

## Modèles et barre latérale

Comment fonctionne la barre latérale? Comment faire pour ne pas l'afficher?

La barre latérale est inclue dans les modèles par défaut (single.php, archive.php).

Une classe ".sidebar-right" est ajoutée au body. Cela se passe dans /edin/inc/extras.php (edin_body_classes). Cette classe est ajoutée partout, sauf pour les cas suivants:

- page d'accueil: ( is_page_template( 'page-templates/front-page.php' )
- template grille: is_page_template( 'page-templates/grid-page.php' )
- template full-width: is_page_template( 'page-templates/full-width-page.php' )
- erreur 404: is_404()
- archive des témoignages jetpack: is_post_type_archive( 'jetpack-testimonial' )

Pour les modèles **sans sidebar**, il est nécessaire d'ajouter au body la classe ".no-sidebar-full".

Pour les templates custom du thème Coworking Neuchâtel, nous faisons cela dans cowork15/inc/extras.php:


TODO: supprimer la classe sidebar-right pour le modèle archive des compétences!
