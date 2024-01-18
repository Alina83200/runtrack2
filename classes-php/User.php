<?php
class User
{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;

    private $conn; //приватний атрибут для підключення до Б/Д

    public function __construct() //встановлення підключення до Б/Д
    {
        $this->conn = new mysqli("localhost", "root", "", "classes");

        if ($this->conn->connect_error) {
            die("Échec de la connexion à la base de données : " . $this->conn->connect_error);
        } //в цьому випадку сценарій зупиняється з повідомленням про помилку
    }

    public function register($login, $password, $email, $firstname, $lastname)
    /*
    Функція register=зареєструватися
    приймає в якості параметра (логін, пароль, email, ім'я, прізвище) 
    */
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        /*
        Функція password_hash - Утворює хеш пароля
        1. $password - це пароль, який користувач вводить.
        2. password_hash - це функція PHP, яка перетворює пароль в хеш.
        3. PASSWORD_DEFAULT - це константа, яка вказує використовувати поточний алгоритм хешування 
        а замовчуванням Bcrypt.
        */

        $stmt = $this->conn->prepare("INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES (?, ?, ?, ?, ?)");
        /*Метод prepare - використовуеться для підготовки запиту до виконання
        ("INSERT INTO utilisateurs (login, password, email, fistname, lastname) VALUES (?,?,?,?,?)")
        це підготовленний запит. Ці '?' будуть зв'язані пізніше.
        */
        $stmt->bind_param("sssss", $login, $hashedPassword, $email, $firstname, $lastname);
        /*
        bind_param - використовуеться для прив'язки параметрів до підготовленного запиту
        Аргумент "sss" перераховує типи даних, які є параметрами. 
        Символ s повідомляє mysql, що параметр є рядком. 
        У цьому прикладі: "s" вказує, що наступні параметри є рядками.
        Змінні $login, $hashedPassword, $email, $firstnameі $lastnameє фактичними значеннями,
        які будуть використовуватися для їх заміни '?' в SQL-запиті.
        */
        $stmt->execute();
        /*
        execute - викликається для виконання підготовленного SQL-запиту
        Це вставляє новий рядок у таблицю utilisateursзі значеннями, наданими для:
        'login', 'hashedPassword', та 'email' 'firstname' 'lastname'.
         */
        $this->id = $this->conn->insert_id;
        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        return $this->getAllInfos();
    }

    /*
     Цей процес забезпечує належне екранування значень параметрів і захист SQL-запиту від SQL-ін’єкцій,
     оскільки метод bind_param піклується про безпечне зв’язування значень.
    */
    public function connect($login, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM utilisateurs WHERE login =? LIMIT 1");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result(); // викликається для отримання резултату запиту як об'єкта 'mysql_result'

        if ($result->num_rows === 1) // перевіряється чи знайденно в таблиці хоч 1 рядок що відповідає вказанному логіну utilisateurs
        {

            /*
            Перевірка пароля
            Використовується fetch_assoc для отримання даних користувача у вигляді асоціативного масиву.
            Ми перевіряємо, чи наданий пароль відповідає хешованому паролю, 
            який зберігається в базі даних, за допомогою password_verify.
            */
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $this->id = $user['id'];
                $this->login = $user['login'];
                $this->email = $user['email'];
                $this->firstname = $user['firstname'];
                $this->lastname = $user['lastname'];

                return true;
            }
        }
        return false;
    }

    public function disconnect()
    //Скидає всі атрибути об’єкта до null, таким чином виходячи з системи користувача
    {
        $this->id = null;
        $this->login = null;
        $this->email = null;
        $this->firstname = null;
        $this->lastname = null;
    }

    public function delete()
    /* 
    Видаляє користувача з бази даних за допомогою його імені користувача.
    Викликає метод disconnectвиходу користувача після видалення.
    */
    {
        if ($this->isConnected()) {
            $stmt = $this->conn->prepare("DELETE FROM utilisateurs WHERE id = ?");
            $stmt->bind_param("i", $this->id); // і ціле число
            $stmt->execute();
            $this->disconnect();
        }
    }

    public function update($login, $password, $email, $firstname, $lastname)
    {
        if ($this->isConnected())
        /*
        Метод isConnected перевіряє, чи користувач увійшов у систему. 
        Це гарантує, що оновлення виконується, лише якщо користувач увійшов у систему
        */{
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            /*
            Якщо надається новий пароль, він хешується з функцією password_hash
            для безпечного зберігання в базі даних.
            */

            $stmt = $this->conn->prepare("UPDATE utilisateurs SET login = ?, password = ?, email = ?, firstname = ?, lastname = ? WHERE id = ?");
            $stmt->bind_param("sssssi", $login, $hashedPassword, $email, $firstname, $lastname, $this->id);
            echo "<br/>";
            echo "Update debug <br/>";
            var_dump($login, $hashedPassword, $email, $firstname, $lastname, $this->id);
            echo "<br/>";
            /*
            Метод prepareвикористовується для підготовки запиту SQL UPDATE до виконання.
            "UPDATE utilisateurs SET login = ?, password = ?, email = ?, firstname = ?, lastname = ? WHERE id = ?"
            це підготовлений SQL-запит із параметрами ( ?), які будуть зв’язані пізніше. */

            $stmt->execute();

            $this->login = $login;
            $this->email = $email;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
        }
    }
    public function isConnected()
    {
        return !empty($this->id);
    }
    public function getAllInfos()
    {
        return [
            'id' => $this->id,
            'login' => $this->login,
            'email' => $this->email,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
        ];
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getFirstname()
    {

        return $this->firstname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
}
