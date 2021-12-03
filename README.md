# TEST

Ceci est le repository pour le test technique de Farmitoo.
Celui-ci est en 3 étapes consécutives.

## 1/ Faire fonctionner les Tests
Implémenter les méthodes pour que les tests fonctionnent.

## 2/ Afficher la page panier
Afficher le panier en twig tel que vous l'imagineriez pour une commande.
Seule l'UX sera regardée, des compétences développées en front n'étant pas requises pour le poste (donc une mise en tableau, une utilisation d'un bootstrap, etc suffiront).

## 3/ Ajouter une gestion de Promotion
Simulation de cas concret : L'équipe business veut pouvoir gérer des promotions, voici l'US à traiter:

"En tant qu'utilisateur,
Si j'ajoute un produit dans ma commande et si une promotion est applicable, alors sa réduction s'applique sur ma commande. Je peux retrouver la réduction appliquée sur ma page panier.

Seule la première promotion applicable sur ma commande (par ordre de création) sera appliquée.

Les conditions d'application possibles sont :
- des dates de validités de la promotion
- un montant minimum de commande
- un nombre de produit minimum dans la commande.

Une promotion pourra posséder 1 ou plusieurs de ces conditions. Si plusieurs conditions sont configurées sur la promotion, alors la condition d'application de la promotion nécessite la validation de l'ensemble de ses conditions.
"

*NB: Ajouter sur la page panier là où ça vous semble pertinent. Vous trouverez 2 promotions "en cours" dans le Controller à appliquer (ou non)*


# L'évaluation
Au niveau global, sera évalué :
- la qualité du code
- la rigueur
- les choix de conception pour la Promotion
- l'UX

## Guide de réflexion
Prenez ce projet comme si c'était le **votre** projet: si une évolution du code déjà écrit vous semble nécessaire, vous pouvez le modifier à votre guise
(et on ne dit pas par là que c'est nécessaire)

N'hésitez pas à ajouter des commentaires dans le README pour expliquer ces choix


# Annexe


#### Info TVA
Le business modèle de Farmitoo implique des règles de calculs de la TVA complexes.
Dans notre cas, il est simplifié et le taux de TVA dépend seulement de la marque du produit :
- Farmitoo => 20%
- Gallagher => 10%

#### Info frais de port
Les partenaires de Farmitoo ont des règles de calculs de frais de port très différentes.
Voici celles de notre cas :
- Farmitoo : 12€ quelque soit le nombre de produits
- Gallagher : 14€ par tranche de 2 produits (ex: 14€ pour 1 ou 2 produits et 28€ pour 3 produits)


# Informations pour lancer le projet
Afin de faire fonctionner correctement le projet, il est nécessaire de compiler le css avec Encore/Webpack avant de lancer le server Symfony. Après récupération via git, la marche à suivre est donc la suivante (les commandes sont celles pour yarn):
- composer install
- yarn install
- yarn encore dev
- symfony server:start

Je vous souhaite une bonne installation, à très vite :)
