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
        foreach ($choose as $key => $value)
        {
            // 2. Проверка(ести значение choose равно ""(пусто))
            if ($value == '' or $value == "")
            {
                // 3. Удаление(удаляем элемент массива choose с ключом $key)
                unset($choose[$key]);
            }
        }

        // Если после удаления пустых элементов из массива choose
        // в нём ничего не осьалось, то $choose = null
        if (count($choose) === 0)
        {
            $choose = null;
        }

        // Запрос к БД
        $response = $this->receiveJournalList($choose);

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

        return $for_select;
    }
}