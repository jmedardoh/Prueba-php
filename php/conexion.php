
<?php
class mysqlconex
{
    public function conex()
    {
        $enlace = mysqli_connect("localhost", "root", "Jose12345.", "dbschool");
        return $enlace;
    }
}
?>