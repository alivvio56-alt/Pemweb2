package main

import (
	"log"

	"github.com/gofiber/fiber/v3"
)

func main() {
	app := fiber.New()

	// Endpoint 1: GET /
	app.Get("/", func(c fiber.Ctx) error {
		return c.SendString("Halo Pemrograman Web II")
	})

	// Endpoint 2: GET /api/info
	app.Get("/api/info", func(c fiber.Ctx) error {
		return c.JSON(fiber.Map{
			"aplikasi": "Latihan Fiber",
			"versi":    "1.0.0",
			"status":   "berjalan",
		})
	})

	// Endpoint 3: GET /api/mahasiswa (TUGAS 1)
	app.Get("/api/mahasiswa", func(c fiber.Ctx) error {
		return c.JSON(fiber.Map{
			"nim":   "H1H024031",       // GANTI DENGAN NIM ANDA
			"nama":  "Ardhis Alivio",   // GANTI DENGAN NAMA ANDA
			"prodi": "Teknik Komputer", // GANTI DENGAN PRODI ANDA
		})
	})

	log.Fatal(app.Listen(":3000"))
}
