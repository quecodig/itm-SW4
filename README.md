# Despliegue y puertos

El proyecto se despliega fácilmente usando Docker Compose. Solo necesitas tener Docker y Docker Compose instalados.

1. Ubícate en la carpeta raíz del proyecto.
2. Ejecuta:

	 ```bash
	 docker compose up --build
	 ```

Esto levantará tres servicios:

- **Base de datos (MySQL):**
	- Puerto externo: `3307` (interno en el contenedor: `3306`)
- **Backend (PHP/Apache):**
	- Puerto externo: `8000` (interno en el contenedor: `80`)
	- API disponible en: `http://localhost:8000/api/products`
- **Frontend (Nginx):**
	- Puerto externo: `3000` (interno en el contenedor: `80`)
	- Interfaz web en: `http://localhost:3000`

Puedes detener los servicios con:

```bash
docker compose down
```
# Decisiones de diseño y arquitectura

El proyecto está dividido en dos módulos principales: Backend y Frontend, cada uno con su propio Dockerfile para facilitar el despliegue y la independencia tecnológica.

- **Backend (PHP + MySQL):**
	- Arquitectura MVC simplificada: separa controladores, modelos y helpers para mantener el código organizado y facilitar el mantenimiento.
	- Uso de PDO con configuración explícita de charset `utf8mb4` para asegurar compatibilidad con caracteres especiales y emojis.
	- API RESTful: expone endpoints para CRUD de productos, siguiendo buenas prácticas de respuesta JSON y manejo de errores.
	- Inicialización de la base de datos mediante scripts SQL y configuración de charset en el dump para evitar problemas de codificación.

- **Frontend (HTML + JS):**
	- Interfaz responsiva y moderna, con estilos CSS personalizados y manejo de eventos por delegación para mayor robustez.
	- Comunicación con la API mediante `fetch` y renderizado dinámico de la tabla de productos.
	- Modal para ver detalles y formulario para edición/creación, todo en una sola página para mejor experiencia de usuario.

# Diseño conceptual de la base de datos

La base de datos se compone de una sola tabla principal:

**Tabla `products`**

| Campo        | Tipo           | Descripción                                 |
|------------- |---------------|---------------------------------------------|
| id           | INT, PK, AI    | Identificador único del producto            |
| name         | VARCHAR(100)   | Nombre del producto                         |
| description  | TEXT           | Descripción detallada del producto          |
| price        | DECIMAL(10,2)  | Precio unitario                             |
| stock        | INT            | Cantidad disponible en inventario           |
| created_at   | TIMESTAMP      | Fecha de creación (por defecto actual)      |

# Ejecución de pruebas unitarias
El proyecto incluye un conjunto de pruebas unitarias para asegurar la calidad del código. Las pruebas están organizadas en carpetas según su tipo (modelos, controladores, helpers).
## Comandos para ejecutar las pruebas
Primero comprueba que estes dentro de la carpeta de Backend.
- **Ejecutar todas las pruebas**
`composer exec phpunit`

- **Ejecutar con formato TestDox (legible)**
`./vendor/bin/phpunit --testdox`

- **Ejecutar solo pruebas del modelo**
`./vendor/bin/phpunit test/Unit/Models/`

- **Ejecutar solo pruebas del controlador**
`./vendor/bin/phpunit test/Unit/Controllers/`

- **Ejecutar solo pruebas del helper**
`./vendor/bin/phpunit test/Unit/Helpers/`