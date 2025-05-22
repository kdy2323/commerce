using Microsoft.AspNetCore.Mvc;

namespace commerce.Controllers
{
    public class FruitLegumeController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }
    }
}
