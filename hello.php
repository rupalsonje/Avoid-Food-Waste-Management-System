<?php
    $name="rupal";
    $age = 30;
    $products = [
        ['name'=>'rupal','age'=>20],
        ['name'=>'john','age'=>22],
        ['name'=>'tom','age'=>30],
        ['name'=>'mac','age'=>38],
        ['name'=>'mitch','age'=>56]
    ];
    function say($name){
        echo "Hello $name";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
    <?php
        echo("hello world");
    ?>
    </h1>
    <div>
        <?php echo $name;echo $age; ?>
    </div>
    <h3>loops</h3>
    <div>
        <ul>
            <?php foreach($products as $product) {?>
            <?php if($product['age']>20) {?>
                <li><?php echo $product['name'] ?></li>
            <?php }?>
            <?php }?>
        </ul>
    </div>
    <div>
        <?php
            foreach($products as $product){
                if($product['name']=='mac'){
                // break;
                continue;
                }
                echo $product['name'] . '<br>';
            }
        ?>
    </div>
    <h3>function</h3>
    <div>
        <?php say('rupal'); ?>
    </div>
</body>
</html>