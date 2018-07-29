<?php
namespace app\classes;


class CJournalList extends MJournalList
{
    /**
     * This method use for get all information
     * from table `journal_list`
     * @param $id int
     * @return array|\mysqli_result
     */
    private function getStudentInfo($id)
    {
        $response = $this->getStudent($id);

        $result = mysqli_fetch_assoc($response);

        return $result;
    }

    /**
     * This method use for get all information
     * from table `journal_list`
     * @param $choose array Default = NULL
     * @return mixed
     */
    public function getJournalList($choose = null)
    {
        $student = $this->getStudentInfo($_SESSION['authorized']);

        // Начальный sql-запрос
        $sql = "SELECT `subject`, `mark`, `date` FROM journal.journal_list";

        // добавляем в переменную с запросом "WHERE".
        $sql .= " WHERE `name` = '{$student['name']}' AND `surname` = '{$student['surname']}' AND";

        // Если что-то выбрано пользователем, то
        if (isset($choose))
        {
            // В цикле 'foreach' перебираем массив $choose как ключ и значение
            // (ключ - имя столбца, а значение - его значение).
            foreach ($choose as $col => $value)
            {
                foreach ($value as $item)
                {
                    $sql .= " `{$col}` = '{$item}' OR"; // добавляем "OR"
                }

                $sql = substr($sql, 0, -3); // обрезаем последнее " OR"
                // (чтобы не было ошибки в запросе)

                $sql .= " AND";// добавляем "AND"
            }
        }
        $sql = substr($sql, 0, -4); // обрезаем последнее " AND"
        // (чтобы не было ошибки в запросе)

        // Запрос к БД
        $response = $this->receiveJournalList($sql);

        // Делаем резулльтат запроса к БД 'читабельным'
        while ($row = mysqli_fetch_assoc($response))
        {
            $list[] = $row;
        }

        return $list;
    }

    /**
     * This method use for get all information
     * from tables `subjects` and `students`
     * @return array|mixed
     */
    public function getAllSubjects()
    {
        $response = $this->getValue("subjects", "subject");

        while ($row = mysqli_fetch_assoc($response))
        {
            if ($row != null)
            {
                $for_select[] = $row;
            }
        }

        return $for_select;
    }
}