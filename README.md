# DLE-Billing - Баланс пользователей  
Версия DLE	10.0 - 14.0
# Установка и настройка модуля:  
Скачать архив с модулем  
Загрузить содержимое каталога "upload" из архива в корень сайта  
Открыть engine/classes/templates.class.php и найти:
```php
$this->_clear();
```
Добавить выше:
```php
include( ENGINE_DIR . "/modules/billing/helpers/parser.php" );
```
Открыть страницу Ваш_Сайт.ру/admin.php?mod=billing  
Выполнить инструкции установщика  
URL обработчика указан на странице плагинов пополнений в разделе "Интеграция"  
URL успешного платежа https://сайт/billing.html/pay/success  
URL неуспешного платежа https://сайт/billing.html/pay/fail
