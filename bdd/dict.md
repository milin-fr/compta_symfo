# Dictionnaire de données

## Type de traveaux/charges (`workType`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
| id | INT | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | L'identifiant de type de traveaux/charges |
| title | VARCHAR | NOT NULL | L'intitulé de type de traveaux/charges |
| budgetEuro | INT | NOT NULL | Budget, attribué à ce type de traveaux/charges (euros) |
| budgetCent | INT | NOT NULL | Budget, attribué à ce type de traveaux/charges (centimes) |
| companies | entity | NULL | La liste des entreprises, effectuant ce type de traveux |
| bills | entity | NULL | La liste des factures, liés à ce type de traveux |
| createdAt | TIMESTAMP |NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date d'ajout de ce type de traveaux/charges |
| updatedAt | TIMESTAMP |NULL |La date de la dernière mise à jour de ce type de traveaux/charges |
| enabled | BOOLEAN | NOT NULL, DEFAULT 1 | Une option pour le soft delete en cas de besoin |


## Entreprise executante (`company`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
| id | INT | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | L'identifiant de l'entreprise |
| title | VARCHAR | NOT NULL | L'intitulé de l'entreprise |
| email | VARCHAR | NULL | L'email de contact de l'entreprise (si elle en as un) |
| phoneNumber | VARCHAR | NOT NULL | Le numero de telephone de contact de l'entreprise |
| pointOfContact | VARCHAR | NULL | Le nom du correspondant privilégié au sein de l'entreprise (si elle en as un) |
| workTypes | entity | NULL | La liste de types de traveaux, que l'entreprise a realisé |
| bills | entity | NULL | La liste des devis/factures emis par l'entreprise |
| createdAt | TIMESTAMP |NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date d'ajout de cette entreprise |
| updatedAt | TIMESTAMP |NULL |La date de la dernière mise à jour de cette entreprise |
| enabled | BOOLEAN | NOT NULL, DEFAULT 1 | Une option pour le soft delete en cas de besoin |

## Facture (`bill`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
| id | INT | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | L'identifiant de la facture |
| billNumber | VARCHAR | NULL | Identifiant public du devis / de la facture (si elle en as un) |
| description | TEXT | NOT NULL | Le descriptif de travail à realiser en relation avec cette facture |
| priceEuro | INT | NOT NULL | Le prix de du devis/facture (euros) |
| priceCent | INT | NOT NULL | Le prix de du devis/facture (cents) |
| startDate | TIMESTAMP |NULL| La date de debut de traveaux (si pertinant) |
| endDate | TIMESTAMP |NULL | La date de debut de traveaux (si pertinant) |
| workType | entity | NOT NULL | Le type de traveaux a laquelle est associé cette facture |
| company | entity | NOT NULL | L'entreprise, à laquelle est associé cette facture |
| status | entity | NOT NULL | L'etat de la facture (ex : devis, payé, annulé) |
| createdAt | TIMESTAMP |NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date d'ajout de ce type de traveaux/charges |
| updatedAt | TIMESTAMP |NULL |La date de la dernière mise à jour de ce type de traveaux/charges |
| enabled | BOOLEAN | NOT NULL, DEFAULT 1 | Une option pour le soft delete en cas de besoin |

## Status de la facture (`status`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
| id | INT | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | L'identifiant de status |
| title | VARCHAR | NOT NULL | L'intitulé du status de la facture |
| bills | entity | NULL | La liste des factures, portant ce status |
| createdAt | TIMESTAMP |NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date d'ajout de ce status |
| updatedAt | TIMESTAMP |NULL |La date de la dernière mise à jour de ce status |
| enabled | BOOLEAN | NOT NULL, DEFAULT 1 | Une option pour le soft delete en cas de besoin |