<!-- PROJECT SHIELDS -->

[![Contributors](https://img.shields.io/badge/CONTRIBUTORS-01-blue?style=plastic)](https://github.com/ZouariOmar/AgriGO/graphs/contributors)
[![Forks](https://img.shields.io/badge/FORKS-00-blue?style=plastic)](https://github.com/ZouariOmar/AgriGO/network/members)
[![Stargazers](https://img.shields.io/badge/STARS-02-blue?style=plastic)](https://github.com/ZouariOmar/AgriGO/stargazers)
[![Issues](https://img.shields.io/badge/ISSUES-00-blue?style=plastic)](https://github.com/ZouariOmar/AgriGO/issues)
[![MIT License](https://img.shields.io/badge/LICENSE-GPL-blue?style=plastic)](LICENSE)
[![Linkedin](https://img.shields.io/badge/Linkedin-6.1k-blue?style=plastic)](https://www.linkedin.com/in/zouari-omar-143239283)

<!-- PROJECT HEADER -->
<h1 align="center">
  <br>
  <a href="https://github.com/ZouariOmar/Code-Practice"><img src="public/assets/imgs/symfony.png" alt="symfony" width="600"></a>
  <br>
  web2.0-symfony-esprit
  <br>
</h1>

<!-- PROJECT LINKS -->
<p align="center">
  <a href="#description">Description</a> •
  <a href="#features">Features</a> •
  <a href="#requirements">Requirements</a> •
  <a href="#installation">Installation</a> •
  <a href="#usage">Usage</a> •
  <a href="#contribution">Contribution</a> •
  <a href="#license">License</a> •
  <a href="#contact">Contact</a> •
</p>

## Description

**web2.0-symfony-esprit** is a university project developed as part of the curriculum at [ESPRIT](https://www.esprit.tn) (École Supérieure Privée d'Ingénierie et de Technologies). This project focuses on building a web application using the Symfony PHP framework, demonstrating key concepts of Web 2.0 development including dynamic content, user interaction, and modern web architecture.

The project aims to provide hands-on experience with Symfony, object-oriented PHP, MVC architecture, routing, templating, database integration, and best practices in web development.

## Features

- Developed using Symfony Framework (version 6.4.25)
- Implements MVC architecture
- User authentication and authorization
- Database integration with Doctrine ORM
- Responsive front-end using Twig templating engine
- Sample CRUD operations (Create, Read, Update, Delete)
- Modular and extensible code structure

## Requirements

- PHP >= 7.4
- Composer
- Symfony CLI (optional but recommended)
- MySQL or any supported relational database
- Web server (Apache, Nginx, or Symfony built-in server)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/ZouariOmar/web2.0-symfony-esprit.git
   cd web2.0-symfony-esprit
   ```

2. Install dependencies with Composer:

   ```bash
   composer install
   ```

3. Configure your database connection in `.env` file:

   ```
   DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
   ```

4. Create the database and run migrations:

   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

5. Run the Symfony server:

   ```bash
   symfony server:start
   ```

6. Access the application at `http://localhost:8000`

## Usage

This project is intended for educational purposes. Feel free to explore the code, understand the Symfony workflow, and extend the application with additional features.

## Contribution

As this is a university project, contributions are limited. However, feedback and suggestions are welcome.

## License

This project is licensed under the GNU General Public License v3.0. See the [LICENSE](LICENSE) file for more details.

## Contact

For questions or suggestions, feel free to reach out:

- **GitHub**: [ZouariOmar](https://github.com/ZouariOmar)
- **Email**: [zouariomar20@gmail.com](mailto:zouariomar20@gmail.com)
- **LinkedIn**: [Zouari Omar](https://www.linkedin.com/in/zouari-omar-143239283/)
