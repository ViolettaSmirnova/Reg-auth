<?
header('Content-Type: text/html; charset=utf-8');
$nam = htmlspecialchars( trim($_POST['nam']));
$fam = htmlspecialchars( trim($_POST['fam']));
$otch = htmlspecialchars( trim($_POST['otch']));
$bdate = htmlspecialchars( trim($_POST['bdate']));
$docno = htmlspecialchars( trim($_POST['docno']));

$bdate = explode("-", $bdate);
$bdate = array_reverse($bdate);
$bdate = join(".", $bdate);

$docno = str_replace(" ", "", $docno);
if(mb_strlen($docno) != 10) {
    $result = ['status' => "incorrectnumber", "message" => "Некорректный номер паспорта"];
    exit(json_encode($result));
}

$docno = mb_substr($docno, 0, 2) . " " . mb_substr($docno, 2, 2) . " " . mb_substr($docno, 4);

$data = "c=innMy&captcha=&captchaToken=&fam=$fam&nam=$nam&otch=$otch&bdate=$bdate&bplace=&doctype=21&docno=$docno&docdt=";

$result = getCurl("https://service.nalog.ru/inn-proc.do", $data);
if($result['code'] === 1) {
    $response = ["status" => "ok", "inn" => $result['inn']];

} elseif ($result['code'] === 0) {
    $response = ["status" => "notfound"];
} else {
    $response = ["status" => "ERROR", "errors" => $result["ERRORS"]];
}
exit(json_encode($response));

function getCurl($url, $data) {
    $curl = curl_init(); //Инициализация сессии cURL
    curl_setopt($curl, CURLOPT_URL, $url);
    //На какой url идет запрос
    curl_setopt($curl, CURLOPT_POST, true);
    //Указываем, что отправляем данные методом POST
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    //Тело запроса POST
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //убирает все лишнее, помимо ответа 
    $result = curl_exec($curl);
    //Выполняем запрос cURL
    curl_close($curl);
    $result = json_decode($result, true);

    return $result;
}