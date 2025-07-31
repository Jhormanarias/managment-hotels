
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

---

### 🛠️ 3. Levantar todo con Docker

Simplemente escribe este comando dentro de la carpeta del proyecto:

```bash
docker-compose up --build
```

🔁 Esto puede tardar unos minutos la primera vez. No te asustes si ves muchas letras y barras de progreso.

---

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

## ☁️ Despliegue en la nube (opcional)

Puedes desplegar esto fácilmente en:

* Frontend en **Vercel** o **Netlify**
* Backend en **Render**, **Railway** o **Heroku**
* DB PostgreSQL en **Supabase** o **ElephantSQL**

---

## 🧰 Comandos útiles

### Backend Laravel

```bash
# Acceder al contenedor del backend
docker exec -it backend-app bash

# Ejecutar migraciones con seeders (crea algunos hoteles)
php artisan migrate:fresh --seed

# Crear base desde dump
psql -U postgres -d laravel < dump.sql
```

### Frontend React

```bash
# Acceder al contenedor del frontend
docker exec -it frontend-app sh
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

**Jhorman (JH)**
Desarrollador Full Stack (Laravel + React)
Colombia 🇨🇴
[GitHub](https://github.com/Jhormanarias)

---
