using Microsoft.EntityFrameworkCore;
using Microsoft.AspNetCore.Mvc;
using commerce.Models;
using Commerce.Models;

namespace Commerce.Controllers
{
    public class UtilisateurController : Controller
    {
        private readonly CommerceContext _context;

        public UtilisateurController(CommerceContext context)
        {
            _context = context;
        }

        // GET: /Utilisateur/Login
        public IActionResult Login()
        {
            return View();
        }

        // POST: /Utilisateur/Login
        [HttpPost]
        public IActionResult Login(LoginViewModel model)
        {
            if (!ModelState.IsValid)
                return View(model);

            var utilisateur = _context.Utilisateurs
                .FirstOrDefault(u => u.Email == model.Email && u.MotDePasse == model.MotDePasse);

            if (utilisateur == null)
            {
                ModelState.AddModelError("", "Email ou mot de passe incorrect");
                return View(model);
            }

            // Stocker les infos de session si besoin
            HttpContext.Session.SetInt32("UtilisateurId", utilisateur.Id);
            HttpContext.Session.SetString("Role", utilisateur.Role);

            // Rediriger selon le rôle
            if (utilisateur.Role == "Producteur")
                return RedirectToAction("ProfilProducteur");
            else
                return RedirectToAction("Profil");
        }
        [HttpGet]
        public IActionResult Register()
        {
            return View();
        }

        [HttpPost]
        public IActionResult Register(Utilisateur utilisateur)
        {
            if (ModelState.IsValid)
            {
                _context.Utilisateurs.Add(utilisateur);
                _context.SaveChanges();
                return RedirectToAction("Login");
            }

            return View(utilisateur);
        }
        public IActionResult Profil()
        {
            int? id = HttpContext.Session.GetInt32("UtilisateurId");
            if (id == null) return RedirectToAction("Login");

            var utilisateur = _context.Utilisateurs.Find(id);
            if (utilisateur == null) return RedirectToAction("Login");

            return View(utilisateur);
        }
        public IActionResult ProfilProducteur()
        {
            var utilisateurId = HttpContext.Session.GetInt32("UtilisateurId");
            if (utilisateurId == null) return RedirectToAction("Login");

            var produits = _context.Produits
                .Where(p => p.ProducteurId == utilisateurId)
                .ToList();

            return View(produits);
        }


    }
}
