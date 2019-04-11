---
layout: default
---

# Fiches membres (Fiche personnelle)

Proposition développée par Ornella:

"Afin de mieux connaître les personnes avec qui tu partages notre espace et pour savoir notamment à qui t’adresser en cas de besoin selon le domaine concerné, nous avons le projet de créer une base de données. Celle-ci regroupera l’ensemble des coworkers, mais également les membres et partenaires du Coworking Neuchâtel."

Un questionnaire Google Drive a été créé, et diffusé par mail le 31 juillet 2018:

https://goo.gl/forms/u4Eg0e1IxxB93XEP2 

Les réponses sont récoltées dans un tableau Google Drive.  
Dans : 04. Opérationnel > Communication Institutionnelle.

## Champs du questionnaire:

- Prénom Nom * : utiliser le titre
- Photo de profil (de vous) : fiche_photo
- Date d'anniversaire : fiche_anniv
- ~ Profession ~ fiche_profession (taxonomie?)
- ~ Entreprise (si non indépendant) ~ fiche_entreprise
- ~ Lien du site web (de l'entreprise ou d'un éventuelle page personnelle) ~ fiche_url
- ~ Logo de l'entreprise ~ fiche_logo
- ~ Domaine de compétence particulier ~ fiche_domaine = taxonomie
- ~ Loisir quelconque ~ fiche_loisir
- ~ E-mail professionnel ~ fiche_email
- Numéro de téléphone fiche_tel
- Raison du choix d'adhésion au Coworking Neuchâtel fiche_raison
- J'accepte que les réponses données aux questions entourées de "~" soient publiées sur le site web du Coworking Neuchâtel en accès public *

Informations complémentaires pour créer ta "story":

- Depuis combien de temps exerces-tu ton activité ? fiche_combien
- Pourquoi exercer ce métier ? fiche_pourquoi
- Que retires-tu de ton expérience professionnelle jusqu'à aujourd'hui ? fiche_experience
- As-tu une citation ou une phrase qui te résume ou qui résume ton expérience ? fiche_citation

Les résultats sont dans le dossier Google Drive:

4. Opérationnel > Communication Inst.

## Comment c'est géré dans le site?

Type de contenu: cwn_fiches

Ce contenu est déclaré dans l'extension CWN-Functions.

champs ACF:
fiche_nom
fiche_photo
fiche_anniversaire
etc.

## Comment fonctionnent les URL?

Dans la déclaration du post-type "fiche", on définit le slug: "membre".
cela détermine l'URL de la page Archive de ce Post-Type.
Pour afficher la page des membres, on utilisera ce template: archive-cwn_fiche.php

### Listes des compétences

Le slug de cette taxonomie est "competence". Cela produit des URL de ce type:
p.ex. compétence: webdesign : coworking-neuchatel.ch/competence/webdesign/

Quel template sera utilisé?
taxonomy-$taxonomy.php : donc, taxonomy-cwn_competence.php

***



