<!DOCTYPE html>
<html>
<meta charset="utf-8"> 
<head>
    <title>Домашнее задание к лекции 3.2 «Наследование и интерфейсы»</title>
</head>
<body> 
    <h2>Полиморфизм и наследование</h2>
    <p><strong>Полиморфизм</strong> - принцип ООП, позволяющий переопределять свойства и методы, унаследованные от родительского класса. </p>
    <p><strong>Наследование</strong> - принцип ООП, позволяющий наследовать без копирования свойства и методы родительского класса, расширяя их собственными свойствами и методами. Наследование всегда осуществляется от одного родителя.</p>
    <h2>Интерфейсы и абстрактные классы</h2>
    <p><strong>Интерфейс</strong> - это объект, содержащий в себе только методы с аргументами. Он имплементируется в класс, и уже в классе реализуются методы и константы. Интерфейс, как и класс, тоже может наследовать другой интерфейс.</p>
    <p><strong>Абстрактные классы</strong> - это классы предусмотрены для проектнирования и содержат в себе свойства и методы, которые через директиву abstract можно сделать обязательными для определения в дочерних классах. Создавать объекты нельзя.</p>
    <p><strong>ВЫВОД:</strong> мы можем создать обычный класс, в который можем включить все свойства и методы, общие для всех дочерних классов, и создавать прочие классы путем наследования от базового. Обязательные свойства или методы мы можем задать через абстрактный класс, а переопределять свойства или методы в дочерних классах. Данный подход позволяет структуризироать и систематизировать код для удобного редактирования.</p>

<?php 
class SuperClass 
{
    public $name;
    public $color;
    public $tecnology;       
}
interface DescriptionInterface 
{
    public function setDescription($name);
}
class Car extends SuperClass implements DescriptionInterface 
{
    public $model;
    public $transmission;
    public $countryIssue;
    public function __construct ($name, $model, $countryIssue)
    {
        $this->name = $name;
        $this->model = $model;
        $this->countryIssue = $countryIssue;
    }
    public function character($countryIssue, $color, $transmission) 
    {
        $this->countryIssue = $countryIssue; 
        $this->color = $color;
        $this->transmission = $transmission;
        if ($this->countryIssue == "Россия")
        {
            echo "Выбор ограничен!" . "Доступна комплектация в цвете: " . $this->color . " с коробкой передач: " . $this->transmission . ".";
        } else 
        {
            echo "Широкий выбор автомобилей данной марки! Популярная модель в цвете: " . $this->color . " с коробкой передач: " . $this->transmission . ".";
        }
    }
    public function setDescription($name) 
    {
    echo "<pre>";
    print_r("Автомобиль {$this->name} модели {$this->model} производства {$this->countryIssue} можно заказать у нас в салоне по телефону 8799-648-46-88.<br>" );
    print_r("Так же в наличии имеется широкий выбор автомобилей марки {$this->name}. Чтобы ознакомиться подробней, зайдите на наш сайт.");
    echo "</pre>";
    }       

}
$car1 = new Car("Волга", "ГАЗ-3110", "Россия"); 
$car2 = new Car("Тойота", "Рав-4", "Япония"); 
?>

<h2>Машины</h2>

<table>
<ul>
    <li><?php print_r("Название автомобиля: " . $car1->name); ?></li>
    <li><?php print_r("Название модели: " . $car1->model); ?></li>
    <li><?php print_r("Страна изготовитель: " . $car1->countryIssue); ?></li>
    <li><?php print_r($car1->character("Россия","серый", "механика")); ?></li>
    <?=$car1->setDescription("Волга");?>
</ul>
</table>
<br>
<table>
<ul>
    <li><?php print_r("Название автомобиля: " . $car2->name); ?></li>
    <li><?php print_r("Название модели: " . $car2->model); ?></li>
    <li><?php print_r("Страна изготовитель: " . $car2->countryIssue); ?></li>
    <li><?php print_r($car2->character("Япония","белый", "автомат")); ?></li>
    <?=$car2->setDescription("Тойота");?>
</ul>
</table>
<br>

<h2>Телевизоры</h2>

<?php 
class TV extends SuperClass implements DescriptionInterface 
{
    public $screenSize;
    public function __construct ($name, $screenSize, $tecnology) 
    {
        $this->name = $name;
        $this->screenSize = $screenSize;
        $this->tecnology = $tecnology;
        echo "На наличии модели телевизоров " . $this->name . " диагональю " . $this->screenSize . "'' с технологией: " . $this->tecnology."<br>";
    }
    public function color($color) 
    {
        $this->color = $color;
        if ($this->color == "черный") 
        {
            echo "Выбор ограничен!" . "Доступна комплектация в цвете: " . $this->color . ".<br>";
        }  
        else 
        {
            echo "Скидка на все телевизоры марки LG в цвете: " . $this->color . ".";
        }
    }
    public function setDescription($name) 
    {
        echo "<pre>";
        print_r ("Вы можете приобрести телевизор {$this->name} с дополнительной гарантией на два года.");
        print_r ("Эксклюзивно от нашего магазина!<br><br>");
        echo "</pre>";      
    }
}
$tv1 = new TV("Samsung", "55", "4K"); 
print_r($tv1->color("черный"));
echo $tv1->setDescription("Samsung");
$tv2 = new TV("LG", "43", "HD");
print_r($tv2->color("белый"));
echo $tv2->setDescription("LG");
?>

<h2>Ручки</h2>

<?php
class Pen extends SuperClass implements DescriptionInterface 
{
    public $packAmount;
    public $price;
    public $discount;
    public function __construct ($name, $color, $price) 
    {
    $this->name = $name;
    $this->color = $color;
    $this->price = $price;
    }
    public function sale ($packAmount, $discount) 
    {
    $this->packAmount = $packAmount; 
    $this->discount = $discount;
        if ($this->packAmount >= 10) 
        {
            echo "При покупке этой модели от 5 ручек предоставляется скидка " . $this->discount . "%" . ".";
        } else 
        {
            echo "Скидки на данный товар не предусмотрены!";
        }
    }
    public function setDescription($name) 
    {
    echo "<pre>";
    print_r("Все ручки марки {$this->name} являются именем качества и завоевали рынок европы уже давным-давно.");
    echo "</pre>";
    }
}
$pen1 = new Pen("Parker", "синий", 120); 
$pen2 = new Pen("Quality", "черный", 80); 
?>

<table>
    <ul>
    <li><?php print_r("Бренд ручки: " . $pen1->name); ?></li>
    <li><?php print_r("Цвет чернил: " . $pen1->color); ?></li>
    <li><?php print_r("Цена: " . $pen1->price . " руб."); ?></li>
    <li><?php print_r($pen1->sale(8,0)); ?></li>
    <?=$pen1->setDescription("Parker");?>
    </ul>
</table>
<br>
<table>
    <ul>
    <li><?php print_r("Бренд ручки: " . $pen2->name); ?></li>
    <li><?php print_r("Цвет чернил: " . $pen2->color); ?></li>
    <li><?php print_r("Цена: " . $pen2->price . " руб."); ?></li>
    <li><?php print_r($pen2->sale(12, 7)); ?></li>
    <?=$pen2->setDescription("Quality");?>
    </ul>
</table>
<br>

<h2>Утки</h2>

<?php
class Duck 
{
    public $age;
    public $habitat;
    public $wintering;
    public function __construct ($name, $age)
    {
    $this->name = $name;
    $this->age = $age;
    }
    public function migration ($habitat, $wintering) 
    {
        $this->habitat = $habitat; 
        $this->wintering = $wintering;
        if ($this->wintering == false)
        {
            echo "Данный вид уток живет " . $this->habitat . " и им нет необходимости улетать на зимовку.";
        } else 
        {
            echo "Данный вид уток живет " . $this->habitat . " и во время холодов они мигрируют на юг";
        }
    }
    public function setDescription($name)
    {
    echo "<pre>";
    print_r("Внимание, пока тепло, успейте посмотреть на уток вида {$this->name}, пока они не улетели!");
    echo "</pre>";
    }
}
$duck1 = new Duck("Солнцелюбикус", 9);
echo $duck1->setDescription("Солнцелюбикус");
$duck2 = new Duck("Вхолодеживикус", 6); 
?>
<table>
<ul>
    <li><?php print_r("Наименование вида: " . $duck1->name); ?></li>
    <li><?php print_r("Продолжительность жизни: " . $duck1->age . " лет"); ?></li>
</ul>
    <?php print_r($duck1->migration("на юге", false)); ?>
    </br></br>
<table>
<ul>
    <li><?php print_r("Наименование вида: " . $duck2->name); ?></li>
    <li><?php print_r("Продолжительность жизни: " . $duck2->age . " лет"); ?></li>
    </ul><?php print_r($duck2->migration("на севере", true)); ?>
</table>
</br>

<h2>Товар</h2>

<?php
class goods extends SuperClass implements DescriptionInterface
{
    public $wasMade;
    public $quality;
    public function __construct ($name, $wasMade, $quality) 
    {
    $this->name = $name;
    $this->wasMade = $wasMade;
    $this->quality = $quality;
    echo $this->name . " имеет {$this->quality} качество. Сдеално в {$this->wasMade}<br>";
    }
    public function region($region)
    {
        $this->region = $region;
        if ($this->region == 1 )
        {
        return "требуется заплатить 10% от стоимости за доставку товара<br>";
        }  
        else
        {
        return "бесплатно<br><br>";
        }
    }
    public function setDescription($name)
    {
    print_r("Описание товара {$this->name} полностью идентично как на сайте производителя.<br>");    
    }
}

$good1 = new goods("Samsung S9 plus", "Китае", "хорошее", 2); 
print_r ($good1->setDescription("Samsung S9 plus"));
print_r("Доставка: " . $good1->region(2));

$good2 = new goods("Aplle Iphone 8plus", "Америке", "выше среднего", 1); 
print_r ($good2->setDescription("Aplle Iphone 8plus"));
print_r("Доставка: " . $good2->region(1));
?>

</body>
</html>
