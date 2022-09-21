# GIRR - Gateway, Intrumentation, Request & Response

Modèle d'architecture permettant de gérer les entrées utilisateurs et les sorties après traitement par le domaine.

- Gateway : Segmentation entre "Front" et "Back".
- Instrumentation : Observe le système aux travers de logs/monitoring.
- Request : Format le point d'entrée de la Gateway.
- Response : Format la sortie de la Gateway.

Avantages de ce modèle : 

- Permet de découper chaque traitement dans une Gateway.
- Permet d'unifier tous les traitements métier de l'application.
- Permet d'attacher du log et du monitoring pour chaque User Case.

## Exemple

Framework : SlimPHP
Fonctionnalité : Pouvoir laisser un message dans le "Livre d'Or"

Pour lancer le projet :
```shell
cd girr

./configure --with-docker
make start
```

Puis aller sur `http://localhost:8080`
