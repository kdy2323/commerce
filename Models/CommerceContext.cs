using commerce.Models;
using Microsoft.EntityFrameworkCore;

namespace Commerce.Models
{
    public class CommerceContext : DbContext
    {
        public CommerceContext(DbContextOptions<CommerceContext> options) : base(options) { }

        public DbSet<Utilisateur> Utilisateurs { get; set; }
        public DbSet<Produit> Produits { get; set; }
        public DbSet<Commande> Commandes { get; set; }
        public DbSet<LigneCommande> LigneCommandes { get; set; }
    }
}