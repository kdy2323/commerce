CREATE VIEW public.vue_produits_categories AS
 SELECT categorie.id_cat,
    categorie.nom_categorie,
    produit.id_produit,
    produit.nom_produit,
    produit.image,
    produit.prix_produit,
    produit.description
   FROM public.categorie,
    public.produit
  WHERE (categorie.id_cat = produit.id_cat);