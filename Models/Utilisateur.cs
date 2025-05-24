using System.ComponentModel.DataAnnotations;

namespace commerce.Models
{
    public class Utilisateur
    {
        public int Id { get; set; }

        [Required]
        public string Nom { get; set; }

        [Required, EmailAddress]
        public string Email { get; set; }

        [Required, DataType(DataType.Password)]
        public string MotDePasse { get; set; }

        [Required]
        public string Role { get; set; } = "Client"; // Par défaut
    }

}
