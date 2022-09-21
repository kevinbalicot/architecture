# CQRS - Command Query Responsability Segregation

Modèle d'architecture reposant sur le principe de la séparation des opérations de lecture et d’écriture tel que :

- Query : Opération qui renvoie un résultat sans modifier l’état du système (lecture). Elle est donc exempte d’effet de bord.
- Domain : Opération qui va modifier l’état du système mais sans renvoyer de valeur (écriture). Elles portent les règles et le comportement métier.

Avantages de ce modèle : 

- Suppression du risque d’effets de bord : les méthodes des services de lecture ne modifient pas l’état du système.
- Allègement des classes de service en découpant lecture et écriture en deux services.
- Exposition facilitée au reste du monde : l’API de notre application est rendue réellement indépendante de son implémentation et de sa dynamique interne, grâce à l’utilisation de DTOs.
- Meilleure isolation des responsabilités : en isolant chacune des fonctionnalités d’action fournies par l’API de notre application, on obtient des classes qui se conforment d’avantage au principe d’unique responsabilité.
- Asynchronisme envisageable : l’asynchronisme est un mécanismes pouvant nous aider à réaliser des applications plus réactives, plus fluides.

Article sur le sujet [https://blog.octo.com/cqrs-larchitecture-aux-deux-visages-partie-1/](https://blog.octo.com/cqrs-larchitecture-aux-deux-visages-partie-1/).

## Exemple

Framework : SlimPHP
Fonctionnalité : Pouvoir laisser un message dans le "Livre d'Or"

Pour lancer le projet :
```shell
cd cqrs

./configure --with-docker
make start
```

Puis aller sur `http://localhost:8080`
