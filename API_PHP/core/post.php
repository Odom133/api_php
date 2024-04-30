<?php
    class Post{
        //db stuff
        private $conn;
        private $table = 'posts';

        //post properties
        public $id;
        public $outlet_id;
        public $emp_id;
        public $role_id;
        public $username;
        public $password;
        public $actived_at;
        public $create_by;
        public $create_at;

        // contructor with db connection
        public function __construct($db)
        {
            // create query
            $query = 'SELECT 
            C.Name as Username,
            p.ID,
            p.OutletId,
            p.EmployeeId,
            p.RoleId,
            p.Password,
            p.ActivedAt,
            p.CreateBy
            p.CreateAt
            FROM 
            '
                .$this->table. ' p
                LEFT JOIN
                    Username c ON p.EmployeeId = c.Id
                    ORDERED BY p.CreateAt DESC';
            '
         ';
         // prepare statement
         $stmt = $this->conn->prepare($query);
         // execute query
         $stmt->execute();
         return $stmt;
        }

    }
?>