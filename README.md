# Unue
Unused PHP code detector library.

## Usage
All you need to do is add this code before and after the code you want to examine

```php
use Pogulailo\Unue;

$driver = new Driver\Pcov();
$transport = new Transport\RabbitMq();
$detector = new Manager($driver, $transport);

$detector->start();

// Your code

$detector->stop();
```
