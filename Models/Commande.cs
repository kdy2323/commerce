using System;
using System.Collections.Generic;

namespace commerce.Models
{
    public class Commande
    {
        public int Id { get; set; }
        public int UtilisateurId { get; set; }
        public DateTime DateCommande { get; set; }

        public Utilisateur? Utilisateur { get; set; }
        public List<LigneCommande> Lignes { get; set; } = new();
    }
}
