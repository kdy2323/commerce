using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace commerce.Migrations
{
    /// <inheritdoc />
    public partial class AjoutEstValideeCommande : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<bool>(
                name: "EstValidee",
                table: "Commandes",
                type: "boolean",
                nullable: false,
                defaultValue: false);
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "EstValidee",
                table: "Commandes");
        }
    }
}
