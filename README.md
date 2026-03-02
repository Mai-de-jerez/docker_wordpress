# 🐳 Mi Sitio WordPress con Docker

> Levanta mi sitio web de WordPress en tu ordenador en menos de 5 minutos, sin saber nada de servidores.

---

## 📋 ¿Qué necesitas antes de empezar?

Antes de nada, asegúrate de tener instalado esto en tu ordenador:

### 1. Docker Desktop
Es el programa que hace funcionar todo. Si no lo tienes:
- 🔗 Descárgalo aquí: [https://www.docker.com/products/docker-desktop](https://www.docker.com/products/docker-desktop)
- Instálalo como cualquier programa normal (siguiente, siguiente, finalizar)
- **Ábrelo** y espera a que el icono de la ballena 🐋 aparezca en la barra de tareas

> ⚠️ **Importante:** Docker Desktop tiene que estar **abierto y ejecutándose** para que todo funcione. Si ves la ballena en la barra de tareas, está funcionando.

### 2. Git (para clonar el repositorio)
- 🔗 Descárgalo aquí: [https://git-scm.com/downloads](https://git-scm.com/downloads)
- Si prefieres, también puedes descargar el ZIP del repositorio directamente desde GitHub (botón verde "Code" → "Download ZIP")

---

## 🚀 Pasos para levantar el sitio

### Paso 1 — Descarga el proyecto

Abre una terminal (o PowerShell en Windows) y escribe:

```bash
git clone https://github.com/Mai-de-jerez/docker_wordpress.git
```

> 💡 Si no sabes abrir la terminal:
> - **Windows:** Pulsa `Windows + R`, escribe `powershell` y pulsa Enter
> - **Mac:** Pulsa `Cmd + Espacio`, escribe `Terminal` y pulsa Enter
> - **Linux:** Busca "Terminal" en tus aplicaciones

### Paso 2 — Entra en la carpeta del proyecto

```bash
cd docker_wordpress
```

### Paso 3 — Arranca el sitio

```bash
docker compose up -d
```

Este comando va a:
1. Descargar todo lo necesario automáticamente 📦
2. Crear la base de datos con todos los datos del sitio 🗄️
3. Levantar el servidor de WordPress 🌐

> ⏳ La **primera vez** puede tardar unos minutos porque tiene que descargar las imágenes de Docker. Las siguientes veces será mucho más rápido.

### Paso 4 — Abre el sitio en el navegador

Una vez que el comando haya terminado, abre tu navegador y ve a:

```
http://localhost:8888
```

**¡Y ya está! 🎉** Deberías ver el sitio web funcionando.

---

## 🛑 Cómo apagar el sitio

Cuando termines y quieras apagar el servidor:

```bash
docker compose down
```

Esto para los contenedores pero **no borra nada**. La próxima vez que hagas `docker compose up -d` todo seguirá igual.

---

## 📁 Estructura del proyecto

```
📦 tu-repositorio/
├── 🐳 docker-compose.yml      ← El archivo que configura todo
├── 📄 wordpress.sql           ← La base de datos con todo el contenido
├── 📁 wp-content/             ← Temas, plugins e imágenes del sitio
└── 📄 README.md               ← Este archivo que estás leyendo
```

---

## ❓ Preguntas frecuentes y problemas comunes

### 🔴 "El puerto 8888 ya está en uso"

Significa que otro programa está usando ese puerto. Solución: cambia el puerto en `docker-compose.yml`:

```yaml
ports:
  - "9999:80"   # Cambia 8888 por cualquier otro número como 9999
```

Y luego accede en `http://localhost:9999`

---

### 🔴 El sitio carga pero las imágenes o el diseño están rotos

Esto pasa porque WordPress guardó la URL original del sitio. Solución:

1. Ve a `http://localhost:8888/wp-admin`
2. Usuario: *(el que esté configurado en el sitio)*
3. Ve a **Ajustes → Generales**
4. Cambia "Dirección de WordPress" y "Dirección del sitio" a `http://localhost:8888`
5. Guarda los cambios

---

### 🔴 "Cannot connect to the Docker daemon" o "Docker not found"

Docker Desktop no está abierto. Búscalo en tus programas instalados y ábrelo. Espera a que la ballena 🐋 aparezca en la barra de tareas.

---

### 🔴 La página tarda mucho o no carga

La base de datos puede tardar unos segundos en iniciarse. Espera 30 segundos y recarga la página. Si sigue sin funcionar:

```bash
docker compose down
docker compose up -d
```

---

### 🔴 "Port 3360 is already in use" (error de base de datos)

Tienes MySQL instalado en tu ordenador y está usando el mismo puerto. No pasa nada, el sitio seguirá funcionando igualmente (ese puerto es solo para acceder a la base de datos desde fuera).

---

## 🔧 Comandos útiles

| Comando | ¿Para qué sirve? |
|---|---|
| `docker compose up -d` | Arranca el sitio |
| `docker compose down` | Para el sitio |
| `docker compose restart` | Reinicia el sitio |
| `docker compose logs` | Ver si hay algún error |
| `docker ps` | Ver los contenedores que están corriendo |

---

## 🌐 URLs de acceso

| ¿Qué es? | URL |
|---|---|
| 🌍 El sitio web | http://localhost:8888 |
| ⚙️ Panel de administración | http://localhost:8888/wp-admin |

---

## 💻 Requisitos del sistema

| | Mínimo |
|---|---|
| RAM | 2 GB libres |
| Espacio en disco | 2 GB libres |
| Sistema operativo | Windows 10/11, macOS 10.15+, o Linux |

---

## 📬 ¿Algo no funciona?

Abre un [Issue en GitHub](../../issues) describiendo:
1. Tu sistema operativo
2. El error exacto que ves (puedes pegar el resultado de `docker compose logs`)
3. Los pasos que seguiste

---

*Hecho con ❤️ y Docker*



