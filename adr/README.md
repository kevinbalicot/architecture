# ADR - Action Domain Responder

Modèle d'architecture remplaçant celui de MVC, mieux adapté aux applications Web. On distingue trois parties :

- Action : l'équivalent d’un contrôleur, dédié à une opération HTTP (une route) de l’application
- Domain : le point d'entrée logique vers le code métier
- Responder : en charge du traitement et du rendu de la réponse

Avantages de ce modèle : 

- L'ADR applique le principe de "Single responsibility principle" de SOLID qui veut qu’un composant n'ait qu'une seule responsabilité. Cela permet de simplifier les tests.
- Il évite la duplication de code.
- Il découpe le code permettant une meilleure maintenabilité et évolution.

Article de [Alexandre Balmes](https://github.com/pocky/) sur le sujet [https://write.vanoix.com/alexandre/architecture-action-domain-responder-adr](https://write.vanoix.com/alexandre/architecture-action-domain-responder-adr).

## Exemple

Framework : SlimPHP
Fonctionnalité : Pouvoir laisser un message dans le "Livre d'Or"

Pour lancer le projet :
```shell
cd adr

./configure --with-docker
make start
```

Puis aller sur `http://localhost:8080`
