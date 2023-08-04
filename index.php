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
    <style>* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
  font-size: 16px;
}

.container {
  width: 1000px;
  margin: 0 auto;
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.container form {
  display: flex;
  flex-direction: column;
}
.container form > *:not(:last-child) {
  margin-bottom: 20px;
}
.container form input[type=url] {
  padding: 5px 10px;
}
.container form input[type=submit] {
  padding: 5px 10px;
}


.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}</style>
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