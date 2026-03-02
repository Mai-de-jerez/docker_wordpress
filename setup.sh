#!/bin/bash

echo "Levantando contenedores..."
docker-compose up -d

echo "Esperando 10 segundos a que MySQL arranque..."
sleep 10

echo "Importando la base de datos..."
docker exec -i wp-db sh -c 'mysql -u root -p"mai1234" wordpress' < wordpress.sql

echo "¡Todo listo! Abre tu navegador en http://localhost:8888"