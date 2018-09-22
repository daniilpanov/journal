<?php
require_once "config/ini.php";

$subject = "труд";
$form = "11";

/*$STH = $DBH->prepare("INSERT INTO journal.subjects(subject, form) VALUES (:subject, :form)");
$STH->bindParam(':subject',$subject);
$STH->bindParam(':form',$form);
var_dump($STH->execute());*/

$STH = $DBH->query("SELECT * FROM journal.subjects");
$STH->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $STH->fetch())
{
    echo $rows[] = $row;
}
?>
<pre>
    <?var_export($rows);?>
</pre>
