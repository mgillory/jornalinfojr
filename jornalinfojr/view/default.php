<!DOCTYPE html>
<html>
    <head>
        <title><?= Lib\Config::get('site_name') ?></title>
    </head>
    <body>
        <h2>Header</h2>
        <?= $data['content'] ?>
        <h2>Footer</h2>
    </body>
</html>


