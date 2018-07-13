<?php
if(!$_POST)
{
    $list = $journal_list->getJournalList();
}
elseif ($_POST)
{
    $list = $journal_list->getJournalList($_POST);
}
var_export($list);