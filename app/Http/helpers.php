<?php
    
function roleTrd($role)
{
    switch ($role) {
        case '1':
            echo 'Super Administrador';
            break;
        case '2':
            echo 'Administrador';
            break;
        case '3':
            echo 'Invitado';
            break;

        default:
            echo '';
            break;
    }
}

function groupsTrd($group)
{
    switch ($group) {
        case '1':
            echo 'Miembro';
            break;
        case '2':
            echo 'Usuario';
            break;
        case '0':
            echo 'Sin Rol';
            break;
        default:
            echo 'Sin Rol';
            break;
    }
}

function statusTrd($status) {

    switch ($status) {
        case 'activo':
            echo 'En lista';
            break;
        case 'pausado':
            echo 'Sin listar';
            break;
        default:
            echo 'Sin listar';
            break;
    }

}


function calcFinalPrice($cost, $pje){
    $result = $cost * $pje / 100;
    $result = $result + $cost;
    return $result;
}

function calcFinalPriceConvert($cost, $porcentage, $currencyActualValue){
    $porcentage = $cost * $porcentage / 100;
    $result     = $cost + $porcentage;
    $result     = $result * $currencyActualValue;
    return $result;
}


function transDateT($data){
    $a        = explode(' ', $data);
    $b        = explode('-', $a[0]);
    $date     = $b[2]."/".$b[1]."/".$b[0];
    return $date;
}

function transDateTS($data){
    $a        = explode(' ', $data);
    $b        = explode('-', $a[0]);
    $pretime  = explode(':', $a[1]);
    $time     = $pretime[0].':'.$pretime[1];
    $date     = $b[2]."/".$b[1]."/".$b[0];
    $datetime = $date.' '.$time;
    return $datetime;
}

function transDateTO($data){
    $a        = explode('-', $data);
    $date     = $a[2].'/'.$a[1].'/'.$a[0];
    return $date;
}

function formatNum($number, $digitos)
{
    $raiz = 10;
    $multiplicador = pow ($raiz,$digitos);
    $resultado = ((int)($number * $multiplicador)) / $multiplicador;
    return number_format($resultado, $digitos, ',', '.');
}

function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}