<?php
$db_connect = \myfrm\App::get(\myfrm\Db::class);

$api_data = json_decode(file_get_contents('php://input')); // Отримуємо сирі POST дані, оскільки $_POST може бути порожнім для DELETE запитів з підміною методу через _method

$data = $api_data ?? $_POST;
$id = $data['id'] ?? 0;

$db_connect->query("DELETE FROM posts WHERE id = ?", [$id]);

if ($db_connect->rowCount()) { //
    $response = ["answer"];
    $_SESSION['success'] = "Post deleted successfully";
    $response["answer"] = $_SESSION['success']; //записуємо повідомлення про успішне видалення в сесію та масив,який буде передано в JSON для передачі у відповідь по API
} else {
    //записуємо повідомлення про помилку видалення
    $response = ["answer"];
    $_SESSION['error'] = "Error deleting post";
    $response["answer"] = $_SESSION['error'];

}

if ($api_data) {
    echo json_decode($response);
    die;
}

redirect('/phproject/index');

//dd( $_POST );