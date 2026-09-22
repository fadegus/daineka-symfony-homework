# Запуск

### docker compose up --build

http://localhost:8080/

<img width="1920" height="994" alt="image" src="https://github.com/user-attachments/assets/a7e62b90-d97f-4fdf-ac63-2dfb4b4a3cc1" />

# Проверка работы worker-a

Необходимо зайти в контейнер:

### docker exec -it daineka_notes-php-1  bash

В контейнере из папки /var/www/daineka_homework запустить процесс:

### php bin/console messenger:consume async -vv

Перейти на http://localhost:8080/
Нажать "Отправить на email 🚀" - через 5 секунд (имитация работы отправки) в консоли появится сообщение Message was send: daineka@local.local
<img width="905" height="246" alt="image" src="https://github.com/user-attachments/assets/4e88239b-a5f6-405e-be60-df61b6752129" />
<img width="1040" height="332" alt="image" src="https://github.com/user-attachments/assets/ddb1f37a-7f50-46d3-9215-4b0699a5ec68" />


# Итого по ДЗ

- Отработка, установка и ознакомление с основными пакетами symfony
- Работа с генерацией кода
- Настройка прокта (sqlite, transports), организация docker окружения в минимальном исполнении 
- Работа с CRUD, формой и ее валидацией, route-ами, symfony/messenger
- Минимальная стилизация и работа с шаблонами twig
