<?php
/*include_once("Address.php");*/

class userSession {
    private $username;
    private $password;
    private $userID;
    private $fname;
    private $lname;
    private $email;
    private $phonenum;
    private $role;
    

    function __construct($userID, $username, $password, $fname, $lname, $email, $phonenum, $role){
        $this->userID = $userID;
        $this->username = $username;
        $this->password = $password;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->phonenum = $phonenum;
        $this->role = $role;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getUserID() {
        return $this->userID;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhone() {
        return $this->phone;
    }

    function getAddress() {
        return $this->address;
    }

    function toString() {
        /*echo '<table align="center" cellspacing="5" cellpadding="8">';
        echo '<tr><td align="left"><b>Id: </b></td>';
        echo '<td align="left">'.$this->userID.'</td></tr>';
        echo '<tr><td align="left"><b>User Name: </b></td>';
        echo '<td align="left">'.$this->username.'</td></tr>';
        echo '<tr><td align="left"><b>First Name: </b></td>';
        echo '<td align="left">'.$this->fname.'</td></tr>';
        echo '<tr><td align="left"><b>Last Name: </b></td>';
        echo '<td align="left">'.$this->lname.'</td></tr>';
        echo '<tr><td align="left"><b>Email: </b></td>';
        echo '<td align="left">'.$this->email.'</td></tr>';
        echo '<tr><td align="left"><b>Phone Number: </b></td>';
        echo '<td align="left">'.$this->phonenum.'</td></tr>';
        echo '<tr><td align="left"><b>Role: </b></td>';
        echo '<td align="left">'.$this->role.'</td></tr>';
        echo '</table>';*/
    }
}

?>