using Microsoft.AspNetCore.Mvc;
using System.Diagnostics;
using commerce.Models;


namespace commerce.Controllers
{
    public class ProduitLaitierController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }
    }
}
