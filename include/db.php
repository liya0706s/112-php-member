<?php 
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{

    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=school";
    protected $pdo;
    protected $table;

    public function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }


    function all( $where = '', $other = '')
    {
        $sql = "select * from `$this->table` ";
    
        if (isset($this->table) && !empty($this->table)) {
    
            if (is_array($where)) {
    
                if (!empty($where)) {
                    $tmp = $this->a2s($where);
                    $sql .= " where " . join(" && ", $tmp);
                }
            } else {
                $sql .= " $where";
            }
    
            $sql .= $other;
            //echo 'all=>'.$sql;
            $rows = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } else {
            echo "錯誤:沒有指定的資料表名稱";
        }
    }
    function count( $where = '', $other = '')
    {
        $sql = "select count(*) from `$this->table` ";
    
        if (isset($this->table) && !empty($this->table)) {
    
            if (is_array($where)) {
    
                if (!empty($where)) {
                    $tmp = $this->a2s($where);
                    $sql .= " where " . join(" && ", $tmp);
                }
            } else {
                $sql .= " $where";
            }
    
            $sql .= $other;
            //echo 'all=>'.$sql;
            $rows = $this->pdo->query($sql)->fetchColumn();
            return $rows;
        } else {
            echo "錯誤:沒有指定的資料表名稱";
        }
    }
    
    
    function find($id)
    {
        $sql = "select * from `$this->table` ";
    
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= " where " . join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " where `id`='$id'";
        } else {
            echo "錯誤:參數的資料型態比須是數字或陣列";
        }
        //echo 'find=>'.$sql;
        $row = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    
    function save($array){
        if(isset($array['id'])){
            $sql = "update `$this->table` set ";
    
            if (!empty($array)) {
                $tmp = $this->a2s($array);
            } else {
                echo "錯誤:缺少要編輯的欄位陣列";
            }
        
            $sql .= join(",", $tmp);
            $sql .= " where `id`='{$array['id']}'";
        }else{
            $sql = "insert into `$this->table` ";
            $cols = "(`" . join("`,`", array_keys($array)) . "`)";
            $vals = "('" . join("','", $array) . "')";
        
            $sql = $sql . $cols . " values " . $vals;
        }

        return $this->pdo->exec($sql);
    }

    function del($id)
    {
        $sql = "delete from `$this->table` where ";
    
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " `id`='$id'";
        } else {
            echo "錯誤:參數的資料型態比須是數字或陣列";
        }
        //echo $sql;
    
        return $this->pdo->exec($sql);
    }
    
    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    }

    private function a2s($array){
        foreach ($array as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        return $tmp;
    }
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


$student=new DB('students');
$rows=$student->count();
dd($rows);

?>