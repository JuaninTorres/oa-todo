# OA Todo

Este es un muy simple sistema "Todo Manager", que tratar de hacer uso del mayor uso de
funcionalidades disponibles en [Laravel](http://laravel.com), solo con la finalidad de que
podamos aprender a trabajar con este excelente Framework.

## Instalación en un ambiente de desarrollo
### Librerías necesarias (Dependencias)
```
composer install
npm install
bower install
```
### Variables de entorno
#### Colas
Los envío de correo se realizan haciendo uso de colas, por lo que es necesario que se 
especifique la variable `QUEUE_DRIVER`
#### Correo
Para realizar los envío de correos tambien necesitan que se especifiquen las variables
```
MAIL_DEFAULT_EMAIL
MAIL_DEFAULT_NAME
MAIL_DRIVER
```
Además de todas las otras que sean propias de la configuración del servicio que se usará para
realizar esta tarea.
#### Broadcasting
Se implementó un sistema de notificaciones, por lo que se necesita definir el valor de 
la variable `BROADCAST_DRIVER`.
Si se hace uso del servicio de [Pusher](https://pusher.com/), se necesitan estas variables definidas:
```
PUSHER_KEY
PUSHER_SECRET
PUSHER_APP_ID
```
#### Creación de las migraciones y data de prueba
```
php artisan migrate --seed
```


## Tareas pendientes por realizar (Homework)
- Evitar que aparezca la notificación de asignación de tarea, cuando se esté realizando una auto asignación de tareas.
- Creación del evento de finalización de una tarea, esto involucra un envío de correo y la notificación a el o los involucrados
- Crear algun indicador en la barra de navegación que nos indique la cantidad de tareas pendientes por realizar y ésta se pueda ir actualizando en tiempo real a través de los eventos con broadcasting.
- Tanto el actual método de despliegue de la notificación de asignación, como el indicador del punto anterior, deben ser pasados a [VUE](http://vuejs.org/). Este cambio tambien tiene que considerar el soporte para multiples notificaciones y no que una nueva elimine a otra que se esté mostrando
- Todas las pruebas de integración 
- Y otras cosas más que en este momento no me puedo acordar :P