namespace commerce.Models
{
    public abstract class Produit
    {
        public int Id { get; set; }
        public string Nom { get; set; }
        public string Description { get; set; }
        public float Prix { get; set; }
        public int Stock { get; set; }
        public string ImageUrl { get; set; }

        public int ProducteurId { get; set; }
        public Utilisateur Producteur { get; set; }
    }

}
