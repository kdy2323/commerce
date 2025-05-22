using System.Diagnostics;
using Microsoft.AspNetCore.Mvc;
using commerce.Models;

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
