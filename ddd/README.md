# DDD - Domain Driven Design

Approche d'agencement du code, dont l'objectif est de définir une vision et un langage partagés par toutes les personnes impliquées dans la construction d’une application, afin de mieux en appréhender la complexité

Elle se découpe en quatre couches :

- UI : Couche responsable de présenter les informations observables du système à l'utilisateur et interpréter ses actions.
- Application : Couche ayant la responsabilité de coordonner les activités de l’application. Elle ne contient pas de logique métier et ne maintient aucun état des objets du domaine.
- Domain : Couche comportant toutes les classes correspondant aux éléments du modèle du domaine ainsi que la logique et le règles métier.
- La robustesse vis-à-vis des changements dans le SI et de l’architecture technique est améliorée, grâce à la couche d’infrastructure / anti-corruption.
- Infrastructure : Couche permettant d'isoler la complexité technique, la persistance des données ainsi que la communication entre les différentes couches (ou services tiers).

Enfin toutes ces couches peuvent être ranger dans des _Bounded Context_, des espaces de nom définissant les bornes d'un domaine.

Avantages de ce modèle : 

- La testabilité fonctionnelle est facilitée : les règles métier sont explicitées, concentrées dans une couche bien définie de l’application, et donc plus facilement testables par un outil de tests fonctionnels automatisés.
- Les développeurs bénéficient d’une meilleure compréhension du métier à la lecture du code du domaine.
- Il découpe le code permettant une meilleure maintenabilité et évolution.

Article sur le sujet [https://blog.octo.com/domain-driven-design-des-armes-pour-affronter-la-complexite/](https://blog.octo.com/domain-driven-design-des-armes-pour-affronter-la-complexite/).

## Exemple

Framework : SlimPHP
Fonctionnalité : Pouvoir laisser un message dans le "Livre d'Or"

Pour lancer le projet :
```shell
cd ddd

./configure --with-docker
make start
```

Puis aller sur `http://localhost:8080`
