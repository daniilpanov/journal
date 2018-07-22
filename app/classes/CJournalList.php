<?php
namespace app\classes;


class CJournalList extends MJournalList
{
    /**
     * This method use for get all information
     * from table `journal_list`
     * @param $choose array Default = NULL
     * @return mixed
     */
    public function getJournalList($choose = null)
    {
        // Удаляем пустые элементы массива(если ничего не выбрано)
        // КАК ПРОИСХОДИТ УДАЛЕНИЕ:
        // 1. Перебираем массив choose как ключ и значение
        foreach ($choose as $col => $value)
        {
            foreach ($value as $key => $item)
            {
                // 2. Проверка(ести значение choose равно ""(пусто))
                if ($item == '' or $item == "" or empty($item))
                {
                    // 3. Удаление(удаляем элемент массива choose с ключом $key)
                    unset($choose[$col][$key]);
                }
            }
            // Если после удаления пустых элементов из массива choose
            // в нём ничего не осталось, то удаляем $choose с ключом [$col]
            if (count($choose[$col]) === 0 or $choose[$col] == '' or $choose[$col] == "" or empty($choose[$col]))
            {
                unset($choose[$col]);
            }
        }

        // Начальный sql-запрос
        $sql = "SELECT `name`, `surname`, `subject`, `mark`, `date`, `form` FROM journal.journal_list";

        // Если что-то выбрано пользователем, то
        if ($choose !== null)
        {
            // добавляем в переменную с запросом "WHERE".
            $sql .= " WHERE";

            // После этого - считаем кол-во элементов в массиве choose
            $count = count($choose);

            // и объявляем переменную для счёта.
            $counter = 1;

            // В цикле 'foreach' перебираем массив $choose как ключ и значение
            // (ключ - имя столбца, а значение - его значение).
            //    ДАЛЬШЕ - ВСЁ ЯСНО
            foreach ($choose as $col => $value)
            {
                $count2 = count($value);

                $counter2 = 1;

                foreach ($value as $item)
                {
                    $sql .= " `{$col}` = '{$item}'";

                    if ($counter2 != $count2)
                    {
                        $sql .= " OR";// если дальше будет ещё что-нибудь - добавляем "OR"
                        $counter2++;
                    }
                }

                if ($counter != $count)
                {
                    $sql .= " AND";// если дальше будет ещё что-нибудь - добавляем "AND"
                    $counter++;
                }
            }
        }

        // Запрос к БД
        $response = $this->receiveJournalList($sql);

        // Делаем резулльтат запроса к БД читабельным
        while ($row = mysqli_fetch_assoc($response))
        {
            $list[] = $row;
        }

        return $list;
    }

    /**
     * This method use for get all information
     * from tables `subjects` and `students`
     * @return mixed
     */
    public function getValuesForSelect()
    {
        $response = $this->getValue("students", 'name');
        while ($row = mysqli_fetch_assoc($response))
        {
            if ($row != null)
            {
                $result[] = $row;
            }
        }
        $for_select['name'] = $result;
        unset($result, $response);

        $response = $this->getValue("students", 'surname');
        while ($row = mysqli_fetch_assoc($response))
        {
            if ($row != null)
            {
                $result[] = $row;
            }
        }
        $for_select['surname'] = $result;
        unset($result, $response);

        $response = $this->getValue("subjects");
        while ($row = mysqli_fetch_assoc($response))
        {
            if ($row != null)
            {
                $result[] = $row;
            }
        }
        $for_select['subject'] = $result;
        unset($result, $response);

        return $for_select;
    }
}