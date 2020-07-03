<?php


function getAllMainCatsWithChildren(PDO $db)
{
    $sql = "SELECT * FROM categories
            WHERE parent_id = 0";

    $rs = $db->query($sql);
    $smartyRs = [];

    while($row = $rs->fetch(2)) {
       $rsChildren = getChildrenForCat($row['id'], $db);

       if ($rsChildren) {
           $row['children'] = $rsChildren;
       }
       $smartyRs[] = $row;
    }
    return $smartyRs;
}

function getChildrenForCat($catId, PDO $db)
{
    $sql = "SELECT * FROM categories
            WHERE parent_id = {$catId}";

    $rs = $db->query($sql);
    return $rs->fetchAll(2);

}

function getCatById($catId, PDO $db)
{
    $catId = intval($catId);
    $sql = "SELECT * FROM categories
            WHERE id={$catId}";

    $rs = $db->query($sql);

    return $rs->fetch(2);
}