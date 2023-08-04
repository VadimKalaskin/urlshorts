<?php
include 'db.php';

$db = new Database("localhost", "urlcut", "root123", "urlcutpass");
$db = $db->connect();

$stmt = $db->query("SELECT * FROM urls");
$urls = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сервис сокращения ссылок</title>
    <link rel="stylesheet" href="/style/style.css">
</head>

<body>
    <div class="container">
        <form method="post" action="/urlcut/index.php">
            <label for="url">Ссылка для сокращения:</label>
            <input type="url" name="long_url" id="long_url" placeholder="https://example.com" size="30" required />
            <input type="submit" value="Сократить">
        </form>
        <div class="urls">
            <table class="styled-table">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>Короткая ссылка</td>
                        <td>Изначальная ссылка</td>
                    </tr>
                    <?php foreach ($urls as $url): ?>
                        <tr class="url">
                            <td class="id">
                                <?php echo $url['ID'] ?>
                            </td>
                            <td class="short"><a
                                    href="<? echo "http://ivanbrazhnikov999.devseo.ru/r?c=" . $url['ID'] ?>"><?php echo "http://ivanbrazhnikov999.devseo.ru/r?c=" . $url['ID'] ?></td>
                            <td class="long"><a href="<?php echo $url['long'] ?>" target="_black"><?php echo $url['long'] ?></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>