---
layout: default
---

# General Layout

Questions générales sur le layout.

## Conteneur et marges

*Comment fonctionnent les marges? Sur quel bloc les marges sont-elles appliquées, et comment ça marche en responsive?*

Les deux éléments les plus extérieurs - `body`, `#page` - n'ont pas de marge.

Les éléments de 3e niveau peuvent avoir une marge: c'est le cas de `.footer-widget-area` et `.site-footer`. La marge de ces éléments a été définie dans le thème parent, Goran. 

La définition est dans: [02-goran/07-layout.css](../css/dev/02-goran/07-layout.css). Voilà la marge de base:

```css
.content-area,
.featured-page-area,
.footer-widget-area,
.front-page-widget-area,
.grid-area,
.site-branding,
.site-footer,
.widget-area {
	padding-right: 24px;
	padding-left: 24px;
}
```

Cette marge augmente avec certains breakpoints:

- à 768px, elle passe à 48px.
- à 1020px, elle passe à 72px.

## Et pour les blocs de la page d'accueil?

Mise à disposition d'une classe CSS qui appliquera la marge: 

`.base-margin`

Classe pour les blocs pouvant prendre toute la largeur: 

`.front-item`

