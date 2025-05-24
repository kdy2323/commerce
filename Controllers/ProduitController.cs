using Microsoft.AspNetCore.Mvc;
using System.Diagnostics;
using commerce.Models;
using Microsoft.EntityFrameworkCore;
using Commerce.Models;


namespace commerce.Controllers
{
    public class ProduitController : Controller
    {
        private readonly CommerceContext _context;

        public ProduitController(CommerceContext context)
        {
            _context = context;
        }
        public IActionResult Index()
        {
            var produits = _context.Produits.ToList();
            return View(produits);
        }
        public IActionResult AjouterAuPanier(int produitId)
        {
            var utilisateurId = HttpContext.Session.GetInt32("UtilisateurId");
            if (utilisateurId == null) return RedirectToAction("Login", "Utilisateur");

            // Vérifie s’il y a une commande non validée
            var commande = _context.Commandes
                .Include(c => c.Lignes)
                .FirstOrDefault(c => c.UtilisateurId == utilisateurId && !c.EstValidee);

            if (commande == null)
            {
                commande = new Commande
                {
                    UtilisateurId = utilisateurId.Value,
                    EstValidee = false
                };
                _context.Commandes.Add(commande);
                _context.SaveChanges();
            }

            // Vérifie si le produit est déjà dans la commande
            var ligne = commande.Lignes.FirstOrDefault(l => l.ProduitId == produitId);
            if (ligne != null)
            {
                ligne.Quantite++;
            }
            else
            {
                ligne = new LigneCommande
                {
                    CommandeId = commande.Id,
                    ProduitId = produitId,
                    Quantite = 1
                };
                _context.LigneCommandes.Add(ligne);
            }

            _context.SaveChanges();

            return RedirectToAction("Index", "Produit");
        }

        // GET: Produit/Ajouter
        public IActionResult Ajouter()
        {
            return View();
        }

        // POST: Produit/Ajouter
        [HttpPost]
        public IActionResult Ajouter(Produit produit)
        {
            int? utilisateurId = HttpContext.Session.GetInt32("UtilisateurId");
            if (utilisateurId == null) return RedirectToAction("Login", "Utilisateur");

            produit.ProducteurId = utilisateurId.Value;
            _context.Produits.Add(produit);
            _context.SaveChanges();

            return RedirectToAction("ProfilProducteur", "Utilisateur");
        }

        // GET: Produit/Modifier/5
        public IActionResult Modifier(int id)
        {
            var produit = _context.Produits.Find(id);
            if (produit == null) return NotFound();
            return View(produit);
        }

        // POST: Produit/Modifier/5
        [HttpPost]
        public IActionResult Modifier(Produit produit)
        {
            int? utilisateurId = HttpContext.Session.GetInt32("UtilisateurId");
            if (utilisateurId == null) return RedirectToAction("Login", "Utilisateur");

            produit.ProducteurId = utilisateurId.Value;
            _context.Produits.Update(produit);
            _context.SaveChanges();
            return RedirectToAction("ProfilProducteur", "Utilisateur");
        }


        // GET: Produit/Supprimer/5
        public IActionResult Supprimer(int id)
        {
            var produit = _context.Produits.Find(id);
            if (produit == null) return NotFound();
            _context.Produits.Remove(produit);
            _context.SaveChanges();
            return RedirectToAction("ProfilProducteur", "Utilisateur");
        }

    }
}
