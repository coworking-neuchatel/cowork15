# Le modèle Front-Page

La page d'accueil utilise le modèle "Front-page" dont le code se trouve dans: 

page-templates/front-page.php

Ce template contient plusieurs sections, qui sont pour la plupart gérées avec le Custom Post Type "Bloc" (et des champs ACF).

Premièrement, la section "Notre espace".
- Notre espace: get_template_part( 'template-parts/blocs/notre-espace' );

Ensuite, trois sections avec une structure similaire:
- Salle de réunion
- Salle de conférence
- Travailler 1 jour

Puis des sections spécifiques:

- Prestations
- Tarifs
- Autres Prestations
- Fiches des membres
- Partenariats (à créer!)
- Evenements (à créer!)
- Témoignages

***

## Modèles et barre latérale

Comment fonctionne la barre latérale? Comment faire pour ne pas l'afficher?

La barre latérale est inclue dans les modèles par défaut (single.php, archive.php).

Une classe ".sidebar-right" est ajoutée au body. Cela se passe dans /edin/inc/extras.php (edin_body_classes). Cette classe est ajoutée partout, **sauf pour les cas suivants**:

- page d'accueil: is_page_template( 'page-templates/front-page.php' )
- template grille: is_page_template( 'page-templates/grid-page.php' )
- template full-width: is_page_template( 'page-templates/full-width-page.php' )
- erreur 404: is_404()
- archive des témoignages jetpack: is_post_type_archive( 'jetpack-testimonial' )

Pour les modèles **sans sidebar**, il est nécessaire d'ajouter au body la classe ".no-sidebar-full".

Pour les templates custom du thème Coworking Neuchâtel, nous faisons cela dans cowork15/inc/extras.php avec la fonction cowork_body_classes.