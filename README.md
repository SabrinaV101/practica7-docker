# Práctica 7: Web App "Hola mundo" con Dockerfile y Docker Compose

Aplicación web **Hola mundo** en **PHP** que se conecta a una base de datos **MySQL**, todo levantado con **Docker Compose**.

## Estructura

```
.
├── src/
│   └── index.php          # Código fuente de la app (Hola mundo + conexión a MySQL)
├── db/
│   └── init.sql           # Crea la tabla "mensajes" la primera vez
├── Dockerfile             # Receta para construir la imagen de la app (PHP 8.3 + Apache)
├── docker-compose.yml     # Define los 2 servicios: app (PHP) y db (MySQL)
├── .env.example           # Plantilla de variables de ambiente (sin claves reales)
└── .gitignore             # Evita subir el archivo .env
```

## Cómo ejecutarlo

Requisito: tener **Docker Desktop** instalado y abierto.

1. Crear el archivo de variables de ambiente a partir de la plantilla:

   ```bash
   copy .env.example .env      # Windows
   cp .env.example .env        # Linux / Mac
   ```

2. Levantar los servicios en segundo plano:

   ```bash
   docker compose up -d --build
   ```

3. Abrir en el navegador: <http://localhost:8080>

   Debe aparecer **"Hola mundo desde MySQL"** y el mensaje **"Conectado a MySQL ..."**.

## Comandos útiles

| Comando | Para qué sirve |
|---|---|
| `docker compose ps` | Ver el estado de los contenedores |
| `docker compose logs -f app` | Ver los logs de la aplicación |
| `docker compose down` | Detener y eliminar los contenedores (los datos se conservan) |
| `docker compose down -v` | Lo mismo, pero borrando también los datos de la BD |

## Seguridad

Las credenciales de la base de datos **no están escritas en el código**: se leen de variables de ambiente (`getenv()` en PHP) que Docker Compose toma del archivo `.env`, el cual no se sube a GitHub.
