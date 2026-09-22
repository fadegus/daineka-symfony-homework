# Запуск

### docker compose up --build

http://localhost:8080/

# Проверка работы worker-a

Необходимо зайти в контейнер:

### docker exec -it daineka_notes-php-1  bash

В контейнере из папки /var/www/daineka_homework запустить процесс:

### php bin/console messenger:consume async -vv

Перейти на http://localhost:8080/
Нажать "Отправить на email 🚀" - через 5 секунд (имитация работы отправки) в консоли появится сообщение Message was send: daineka@local.local


# Итого по ДЗ

- Отработка, установка и ознакомление с основными пакетами symfony
- Работа с генерацией кода
- Настройка прокта (sqlite, transports), организация docker окружения в минимальном исполнении 
- Работа с CRUD, формой и ее валидацией, route-ами, symfony/messenger
- Минимальная стилизация и работа с шаблонами twig