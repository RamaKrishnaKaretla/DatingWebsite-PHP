<?php

include "Model/Favourite.php";

function favList($login_id, $fav_id){

$favObj = new FavouriteBean();

$favObj->set_u_id($login_id);
$favObj->set_f_id($fav_id);

$res = $favObj->addFav();
header("Location:View/work-details.php?id=$fav_id&&res=$res");
}
?>