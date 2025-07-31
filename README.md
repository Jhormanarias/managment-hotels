
---

## — Prueba Técnica Gestión hoteles 🏨

---

### 👋 Bienvenido

Este proyecto es una prueba técnica para una compañia que gestiona hoteles, desarrollada en:

* 🔙 **Laravel** (PHP) para el backend (API REST)
* 🌐 **React.js** para el frontend (una sola página tipo dashboard)
* 🛢️ **PostgreSQL** como base de datos
* 🐳 **Docker** para que no tengas que instalar nada a mano

---

### ¿Quién puede usar esto?

Literalmente cualquier persona que tenga:

✅ Un computador con **Docker instalado**
✅ Un poco de paciencia (¡te prometo que no duele!)

---

### 📦 Archivos importantes del proyecto

* `docker-compose.yml` → Une todo y lo hace funcionar.
* `api/` → Aquí está el corazón de los datos (backend).
* `gui/` → Aquí ves lo que pasa (frontend).
* `dump.sql` → Base de datos para importar (opcional).
* `.env` → Configuraciones como clave y puerto.

---

## 🌍 Proyecto desplegado (en vivo)

Puedes ver el sistema funcionando en producción en el siguiente enlace:

🔗 **[https://management-hotels.ganantech.com/](https://management-hotels.ganantech.com/)**

* Panel web (React): `https://management-hotels.ganantech.com/`
* API REST: `https://management-hotels.ganantech.com/api/`

Este entorno fue desplegado en un VPS con Ubuntu, usando Docker, Nginx con proxy inverso y un SSL con certbot.

---

## 🚀 PASO A PASO PARA LEVANTAR EL PROYECTO

---

### 🐳 1. Instalar Docker (si no lo tienes)

Ve a [https://www.docker.com/products/docker-desktop](https://www.docker.com/products/docker-desktop)
Haz clic en descargar → Instala → Reinicia el computador (si te lo pide)

---

### 📥 2. Clonar el repositorio del proyecto

Abre tu consola o terminal y escribe:

```bash
git clone https://github.com/Jhormanarias/managment-hotels.git
cd managment-hotels
```

### 📁 2.1. Copiar archivos `.env` necesarios

Para que cada parte del sistema sepa cómo comportarse, necesitas copiar los archivos `.env.example` como `.env`.

Ejecuta estos comandos desde la raíz del proyecto:

```bash
cp api/.env.example api/.env # el del backend
cp gui/.env.example gui/.env # el del frontend
cp .env.example .env  # El de la bd
```

---

### 🛠️ 3. Levantar todo con Docker

Simplemente escribe este comando dentro de la carpeta del proyecto:

```bash
docker-compose up --build
```

🔁 Esto puede tardar unos minutos la primera vez. No te asustes si ves muchas letras y barras de progreso.

---

Luego, cuando arranque Laravel por primera vez, deberás generar la clave secreta 👇.
En este punto si llegase el caso de que ingresaste a localhost:8000 y no ves la pantalla de laravel,
puede que haya ocurrido un error instalando las dependencias, pero ya los solucionamos
(Muy importante ejecutar las migraciones de la BD)

---

### 🛠️ 2.2 (Solo para Laravel) Generar la clave de la aplicación

Una vez montado el contenedor de Laravel por primera vez, entra a él:

```bash
docker exec -it managment-hotels-api-1 bash
```

Y dentro del contenedor ejecuta:

```bash
composer install
php artisan key:generate
# Ejecutar migraciones con seeders (crea toda la bd y algunos hoteles)
php artisan migrate:fresh --seed
```


### ✅ 4. Acceder a la aplicación

Cuando termine, abre tu navegador y visita:

* 🌐 **Frontend React**: [http://localhost:3000](http://localhost:3000)
* 🔙 **API Laravel (opcional)**: [http://localhost:8000/api/hotels](http://localhost:8000/api/hotels)

---

### 🧠 5. ¿Y qué puedo hacer con esto?

* Ver todos los hoteles registrados
* Crear, editar y eliminar hoteles
* Asignar habitaciones por tipo y acomodación
* Ver y gestionar esas asignaciones
* ¡Todo en una sola vista, sin recargar la página!

---

## 🛠️ Funcionalidades técnicas importantes

* Validación de reglas de negocio (como máximo de habitaciones por hotel)
* Control de errores con alertas visuales
* Separación limpia entre frontend y backend
* Arquitectura escalable y mantenible
* Totalmente listo para producción

---

## 🧪 Datos técnicos si eres desarrollador

* Laravel 10 con Sanctum (pero sin login en esta prueba)
* PostgreSQL con migraciones
* React con estructura tipo Atomic Design
* Axios para consumo de API
* Docker multi-contenedor: frontend, backend y base de datos

---

## 🧰 Comandos útiles

### Backend Laravel

```bash
# Acceder al contenedor del backend
docker exec -it managment-hotels-api-1 bash

# Ejecutar migraciones con seeders (crea algunos hoteles)
php artisan migrate:fresh --seed

# Crear base desde dump
psql -U postgres -d laravel < dump.sql
```

### Frontend React

```bash
# Acceder al contenedor del frontend(Aunque este como nos trae el build de producción no es necesario)
docker exec -it managment-hotels-gui-1 sh
npm run build
```

---

## 🆘 ¿Problemas comunes?

| Error                   | Solución                                   |
| ----------------------- | ------------------------------------------ |
| `Port already in use`   | Cierra apps que usan el puerto 3000 o 8000 |
| No se carga nada        | Asegúrate de tener Docker corriendo        |
| No ves alertas de error | Abre la consola del navegador (`F12`)      |

---

## ❤️ Gracias por revisar

Esta prueba fue desarrollada con todo el cuidado y estructura de un entorno real de producción, cumpliendo criterios funcionales, técnicos y de buenas prácticas.
Si tienes dudas técnicas, puedes contactarme directamente.

---

## ✨ Autor

**Jhorman Gañan**
Desarrollador Full Stack (Laravel + React)
Colombia 🇨🇴
[GitHub](https://github.com/Jhormanarias)

---

