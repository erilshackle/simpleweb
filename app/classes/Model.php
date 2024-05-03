<?php require_once __DIR__ . '/../database.php';


/**
 *?MODEL
 **Facilita as operacoes com a base de dados, instanciando um Model passando o nome da tabela e seu id -> new Model(tbl, id)
 * $model = new Model('User', 'id')
 * $model->getAll()
 * $model->get(id)
 * $model->insert([table_field => value])
 * $model->update(id, [table_field => value])
 * $model->delete(id)
 * $model_fk = (new model(fk_table))->get(model->fk_id)
 */
class Model
{
    protected $table;
    protected $pkey;
    private \PDO $database;
    public function __construct($tableName, $primaryKey = "id")
    {
        $this->table = filter_var($tableName,FILTER_SANITIZE_STRING);
        $this->pkey = filter_var($primaryKey,FILTER_SANITIZE_STRING);
        $this->database = getDatabaseConnection();
        $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $result = $this->database->query("SELECT * FROM $this->table");
        return $result->fetchAll();
    }

    public function get($id)
    {   // SELECT field FROM table WHERE id = ?
        $query = $this->database->prepare("SELECT * FROM $this->table WHERE $this->pkey = ? LIMIT 1");
        $query->bindValue(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function find($field, $value){
        $field = htmlspecialchars($field);
        $query = $this->database->prepare("SELECT * FROM $this->table WHERE $field=? LIMIT 1");
        $query->bindValue(1, $value);
        $query->execute();
        return $query->fetchObject();
    }

    /**
     * @param array $data  key value pair: db_tbl_field => value 
     */
    public function insert($data)
    {   // INSERT INTO table VALUES (?,?,...)
        $fields = implode(',', array_keys($data));
        $values = implode(',', array_fill(0, count($data), '?'));  // 
        $query = $this->database->prepare("INSERT INTO $this->table($fields) VALUES ($values) ");
        $i = 1;
        foreach ($data as $value) {
            $query->bindValue($i++, $value);
        }
        return $query->execute();
    }

    /**
     ** Update the Model xxx Table
     * (new Model('User'))->update(1,['email' => 'stranger@gmail.who', 'name'  => 'stranger'])
     */
    public function update($id, $data)
    {   // UPDATE table SET field=? ... WHERE id = ?
        if(empty($data)){
            return false;
        }
        $fields = implode('=?, ', array_keys($data));
        $query = $this->database->prepare("UPDATE $this->table SET $fields=? WHERE $this->pkey = ?");
        $i = 1;
        foreach ($data as $value) {
            $query->bindParam($i++, $value);
        }
        $query->bindValue($i, $id);
        return $query->execute();
    }

    public function delete($id)
    {   // DELETE FROM table WHERE id = ?
        $query = $this->database->prepare("DELETE FROM $this->table WHERE $this->pkey = ?");
        return $query->execute([$id]);
    }

    /** MORE THAN CRUD */

    public function search($field, $filter){
        $field = filter_var($field, FILTER_SANITIZE_STRING);
        $filter = filter_var($filter, FILTER_SANITIZE_STRING);
        $filter = str_replace(' ','%',$filter);
        $query = $this->database->prepare("SELECT * FROM $this->table WHERE $this->pkey LIKE %$filter% ");
        $query->execute();
        return $query->fetchAll();
    }

    public function paginate($start, $pages){
        $query = $this->database->prepare("SELECT * FROM $this->table LIMIT $start, $pages");
        $query->execute();
        return $query->fetchAll();
    }


}
