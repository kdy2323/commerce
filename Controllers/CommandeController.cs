using Commerce.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace commerce.Controllers
{
    public class CommandeController : Controller
    {
        private readonly CommerceContext _context;

        public CommandeController(CommerceContext context)
        {
            _context = context;
        }

        public IActionResult Panier()
        {
            int? utilisateurId = HttpContext.Session.GetInt32("UtilisateurId");
            if (utilisateurId == null) return RedirectToAction("Login");

            var panier = _context.LigneCommandes
                .Include(l => l.Produit)
                .Where(l => l.Commande.UtilisateurId == utilisateurId && l.Commande.EstValidee == false)
                .ToList();

            return View(panier);
        }

        public IActionResult SupprimerDuPanier(int id)
        {
            var ligne = _context.LigneCommandes.Find(id);
            if (ligne != null)
            {
                _context.LigneCommandes.Remove(ligne);
                _context.SaveChanges();
            }

            return RedirectToAction("Panier");
        }
        public IActionResult Message()
        {
            return View();
        }


        public IActionResult Valider()
        {
            int? utilisateurId = HttpContext.Session.GetInt32("UtilisateurId");
            if (utilisateurId == null) return RedirectToAction("Login", "Utilisateur");

            var commande = _context.Commandes
                .Include(c => c.Lignes)
                .FirstOrDefault(c => c.UtilisateurId == utilisateurId && !c.EstValidee);

            if (commande != null)
            {
                commande.EstValidee = true;
                _context.SaveChanges();
            }

            return RedirectToAction("Message","Commande");
        }
    }
}
