<?php
namespace eduluz1976\user_management;


trait PDOModel {


    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }

    /**
     * @param \PDO $pdo
     * @return $this
     */
    public function setPdo(\PDO $pdo): self
    {
        $this->pdo = $pdo;
        return $this;
    }


    /**
     * PDOModel constructor.
     * @param \PDO|null $pdo
     */
//    public function __construct(\PDO $pdo=null)
//    {
//        if ($pdo) {
//            $this->setPdo($pdo);
//        }
//    }



    public function bindIn($arr=[], $map=[]) {

//        $map = [
//            'username' => 'username',
//            'hash' => 'hash',
//            'email' => 'email',
//            'restriction' => 'restriction'
//        ];


        foreach ($arr as $k=>$v) {

            if (array_key_exists($k,$map)) {
                $propertyName = $map[$k];
            } else {
                $propertyName = $k;
            }

            if (property_exists(get_class($this), $propertyName)) {
                $this->$propertyName = $v;
            }

        }



    }


    public function bindOut() {
        $response = [];

        $properties = get_object_vars($this);

        foreach ($properties as $k=>$v) {
            if ((substr($k,0,1) === '_') || (!is_scalar($v))) {
                continue;
            }
            $response[$k] = $v;
        }

        return $response;
    }



    public function save() {

        $arr = $this->bindOut();

        $lsFields = [];
        $lsValues = [];
        $lsBindField = [];
        foreach ($arr as $k=>$v) {
            if ((substr($k,0,1) === '_') || (!is_scalar($v))) {
                continue;
            }

            $lsFields[] = $k;
            $k2 = ':'.$k;
            $lsBindField[] = $k2;
            $lsValues[$k2] = $v;

        }


        $sql = sprintf("INSERT INTO users (%s) VALUES (%s);",join(",",$lsFields), join(",", $lsBindField) );

        $statement = $this->getPdo()->prepare($sql);
        foreach ($lsValues as $k2=>$v) {
            $statement->bindValue($k2, $v);
        }

        try {
            $statement->execute();

            $response = [
                'success' => true
            ];

            $lastID = $this->getPdo()->lastInsertId();

            if ($lastID) {
                $response['id'] = $lastID;
            }

        } catch (\Exception $ex) {
            $response = [
                'msg' => $ex->getMessage(),
                'code' => $ex->getCode(),
                'success' => false
            ];
        }




        return $response;
    }








}