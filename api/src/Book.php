<?php

class Book
{
    private $id;

    private $title;

    private $author;

    private $description;

    function __construct()
    {
        $this->id = -1;
        $this->title = '';
        $this->author = '';
        $this->description = '';
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public static function loadFromDB(mysqli $connection, $id)
    {
        $id = intval($id);
        $sql = "SELECT * FROM book WHERE id=$id";

        $result = $connection->query($sql);

        if (!$result) {
            die("Błąd połączenia z bazą danych");
        }
        $bookArray = $result->fetch_assoc();
        $book = new Book();

        $book->setId($bookArray['id']);
        $book->setTitle($bookArray['title']);
        $book->setAuthor($bookArray['author']);
        $book->setDescription($bookArray['description']);

        return $book;
    }

    public static function loadAllFromDB(mysqli $connection)
    {

        $sql = "SELECT * FROM book";

        $result = $connection->query($sql);

        if (!$result) {
            die("Błąd połączenia z bazą danych");
        }
        $table = [];

        foreach($result as $row) {
            $newBook = new Book();
            $newBook->id = $row['id'];
            $newBook->title = $row['title'];
            $newBook->author = $row['author'];
            $newBook->description = $row['description'];

            $table[] = $newBook;
        }
        return $table;
    }

    public function create(mysqli $connection, $title, $author, $description)
    {
        if ($this->id == -1) {

            $sql = "INSERT INTO book (title, author, description) VALUES ('$title', '$author', '$description')";

            $result = $connection->query($sql);
            if($result) {
                $this->id = $connection->insert_id;
            } else {
                die("Błąd zapisu do bazy danych" . $connection->error);
            }
        }
    }

    public function update(mysqli $connection, $name, $author, $description)
    {

    }

    public function deleteFromDB(mysqli $connection, $id)
    {

    }

}