using Microsoft.AspNetCore.Mvc;

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
