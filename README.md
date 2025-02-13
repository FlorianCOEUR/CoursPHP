# Exercice 1: formulaire.php

Un site e-commerce souhaite mettre en place un programme de fidélité pour ses clients.
Le montant de réduction appliqué dépend de plusieurs conditions :
Statut du client :
- "Nouveau client" → Pas de réduction
- "Régulier" (au moins 5 commandes passées) → 5% de réduction
- "VIP" (au moins 10 commandes passées et plus de 1000€ dépensés au total) → 10% de réduction
- Montant de la commande :
- Si la commande dépasse 200€, une réduction supplémentaire de 5% est appliquée.
- Jour de la semaine :
- Si c’est mercredi, tous les clients VIP ont 5% de réduction supplémentaire.

# Exercice 2 : salaires.php

Une entreprise souhaite automatiser le calcul du salaire de ses employés en fonction de plusieurs critères :
Poste de l’employé (géré avec un switch) :
- "Développeur" → Salaire de base : 3000€
- "Designer" → Salaire de base : 2800€
- "Manager" → Salaire de base : 4000€
- "Stagiaire" → Salaire de base : 1200€
Ancienneté (gérée avec un if/else) :
- Si l’employé a plus de 5 ans d’ancienneté → +10% de prime
- Si l’employé a plus de 10 ans d’ancienneté → +20% de prime
Heures supplémentaires :
- Chaque heure supplémentaire est payée 25€.
Retard / Absence non justifiée :
- Pour chaque jour d’absence injustifiée, -50€ sont déduits.

# Exercice 3: exotableau.php

Nous devions créer un tableau de comprenant le prenom et l'age des étudiants, les trier en fonction de leur age, puis les afficher.
On devais faire une disctinction entre les mineurs et les majeurs

# Exercice 4: triTableau.php

Exercice : Manipuler du HTML avec PHP
- Créer un tableau associatif comprenant une marque, un nom d’objet, une couleur et un prix.
- Générer un tableau HTML avec ces données stockées en PHP.

# Exercice 5: useFonctions.php

Exercice :
- Reprendre le tableau de l’exercice précédent et trier les éléments par le prix avec une fonction native
- Ajouter un identifiant dans une colonne du tableau qui sera un nombre aléatoire généré entre 1 et 100
- Mettre en majuscules le nom des marques
- Déclarer un second tableau et l’ajouter au premier avant d’afficher les éléments

# Excercice 6: inlineShop.php

## Gestion des Commandes d’un Magasin en Ligne
Contexte

Vous devez développer un programme en PHP pour gérer les commandes d’un magasin en ligne. Chaque commande contient plusieurs articles avec leur prix et leur quantité.
- Calculer le total de chaque commande.
- Appliquer des réductions selon certaines conditions.
- Déterminer si la commande est éligible à la livraison gratuite.
- Classer les commandes en fonction de leur montant total (petite, moyenne, grande commande).
Règles de réduction et de livraison
- Réduction de 10% si le total dépasse 200€.
- Réduction de 20% si le total dépasse 500€.
- Livraison gratuite si le total (après réduction) dépasse 100€.
- Classification des commandes :
- Petite commande : Moins de 100€.
- Commande moyenne : Entre 100€ et 500€.
- Grande commande : Plus de 500€.