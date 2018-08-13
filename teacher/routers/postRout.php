<?php

if ($_POST)
{
    foreach ($_POST as $key => $value)
    {
        switch ($key)
        {
            // ADD
            case "addStudents":
                $students->addStudents($_POST);
                break;

            case "addSubjects":
                $subjects->addSubjects($_POST);
                break;

            case "addMarks":

                break;

            // DELETE
            case "deleteStudents":
                $students->deleteStudents($_POST);
                break;

            case "deleteSubjects":
                $subjects->deleteSubjects($_POST);
                break;

            case "deleteMarks":

                break;

            // EDIT
            case "editStudents":
                $students->editStudents($_POST);
                break;

            case "editSubjects":
                $subjects->editSubjects($_POST);
                break;

            case "editMarks":

                break;
        }
    }
}