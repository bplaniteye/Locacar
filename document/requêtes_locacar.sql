-- Facture des locations sans les options
create view loc_FactureHorsOptions AS
select loc_id as FHO_id, loc_debut as FHO_debut, loc_fin as FHO_fin, timestampdiff(hour,loc_debut,loc_fin) as FHO_duree , tra_id as FHO_tranche, cat_libelle as FHO_categorie, tar_prix as FHO_prix, timestampdiff(hour,loc_debut,loc_fin) * tar_prix as FHO_montant
from location, tarification, tranche, categorie, voiture
where loc_voiture=voi_id and 
voi_categorie=cat_id and 
tar_categorie=cat_id and 
tar_tranche=tra_id and 
timestampdiff(hour,loc_debut,loc_fin)>tra_dureemin and 
timestampdiff(hour,loc_debut,loc_fin)<=tra_dureemax 
group by loc_id ;

-- 1 Liste des agences avec le nombre de véhicules présents
select age_id, age_ville, count(veh_id) as nbvoitures
from agence,voiture
where voi_localisation = age_id
order by age_id ;

-- 2 Liste des véhicules par agence
select age_id, age_ville, voi_immatriculation
from voiture, agence
where voi_localisation = age_id
order by age_id ;

-- 3 Liste des locations par statut pour une agence donnée
select loc_id, loc_agencedepart, loc_statut, age_ville
from location, agence
where loc_agencedepart = age_id and age_id=2
order by loc_statut, age_id ;

-- 4 Liste des locations entre 2 dates données pour une agence donnée
select *
from location
where  loc_debut < "2020-03-10" and loc_fin > "2020-03-10" and age_id = 2;

-- 5 Nombre de locations par agence et par statut
select age_ville, loc_statut , count(loc_id) as nblocations
from location, agence
where loc_agencedepart = age_id
group by loc_agencedepart , loc_statut ;

-- 6 Liste des agences par département
select *
from agence
    
-- 7 Chiffre d’affaire d’une agence donnée.
select
from
where 

-- 8 Requête donnant la durée (en nombre d’heures) d’une location.
select loc_id, loc_debut, loc_fin, timestampdiff(second, loc_debut, loc_fin)/3600 as durée
from location ; 

-- 9 Liste les véhicules libres dans une agence donnée et entre deux dates données. 
select
from
where 

-- 10 Requête donnant le prix d’une location (hors options sur le véhicule).
select *
from loc_FactureHorsOptions
where FHO_id=2;

-- 11 Requête donnant le montant total des options attachées à chaque véhicule.
select for_location, sum(acc_prix) as montant
from forfait , accessoire
where for_accessoire=acc_id
group by for_location;