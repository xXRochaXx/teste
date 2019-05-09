# calendario-melhorias

## Instalação
docker-compose up

## Carregando dados na base
docker exec -it calendariomelhorias_database_1 bash
cd /home
psql -U postgres -f database.sql
psql -U postgres -f seeds/seeds.sql

## Instalando dependências
docker exec -it calendariomelhorias_web_1 bash
chmod +x composer
php composer install