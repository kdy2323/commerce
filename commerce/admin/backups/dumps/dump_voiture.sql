CREATE TABLE public.categorie (
    id_cat integer NOT NULL,
    nom_categorie text NOT NULL,
    image_cat text
);

CREATE SEQUENCE public.categorie_id_cat_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.categorie_id_cat_seq OWNED BY public.categorie.id_cat;

CREATE TABLE public.produit (
    id_produit integer NOT NULL,
    nom_produit text NOT NULL,
    image text,
    prix_produit numeric,
    description text,
    id_cat integer
);


CREATE SEQUENCE public.produit_id_produit_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.produit_id_produit_seq OWNED BY public.produit.id_produit;




ALTER TABLE ONLY public.categorie ALTER COLUMN id_cat SET DEFAULT nextval('public.categorie_id_cat_seq'::regclass);


ALTER TABLE ONLY public.produit ALTER COLUMN id_produit SET DEFAULT nextval('public.produit_id_produit_seq'::regclass);


SELECT pg_catalog.setval('public.categorie_id_cat_seq', 3, true);


SELECT pg_catalog.setval('public.produit_id_produit_seq', 1, false);


ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (id_cat);


ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_pkey PRIMARY KEY (id_produit);


ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_id_cat_fkey FOREIGN KEY (id_cat) REFERENCES public.categorie(id_cat);



CREATE TABLE public.marque (
    id_marque SERIAL PRIMARY KEY,
    nom_marque TEXT NOT NULL
);

ALTER TABLE public.produit
ADD COLUMN id_marque INTEGER;

ALTER TABLE public.produit
ADD CONSTRAINT produit_id_marque_fkey FOREIGN KEY (id_marque)
REFERENCES public.marque(id_marque);

CREATE TABLE public.commande (
    id_commande SERIAL PRIMARY KEY,
    id_produit INTEGER NOT NULL,
    nom_client TEXT NOT NULL,
    date_commande DATE DEFAULT CURRENT_DATE,
    quantite INTEGER NOT NULL CHECK (quantite > 0),
    FOREIGN KEY (id_produit) REFERENCES public.produit(id_produit)
);
