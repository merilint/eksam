<?php

function getHeader() {

    global $page;

    include(__DIR__ . '/pages/_partials/header.php');
}


function getFooter() {

    include(__DIR__ . '/pages/_partials/footer.php');
}

function login($username, $password) {

    global $pdo;
    //Sisselogimine
    $stmt = $pdo->prepare('SELECT * FROM administrator WHERE username = :username AND password = :password');
    $stmt->execute([
                       ':username' => $username,
                       ':password' => $password
                   ]);

    $result = $stmt->fetch(PDO::FETCH_OBJ);

    if (isset($result->username) && $result->username == $username) {
        $_SESSION['login'] = true;
    }
}

function logout() {

    //logime välja
    $_SESSION['login'] = false;
}

//Kas kasutaja on sisse logitud?
function isLoggedIn() {

    return isset($_SESSION['login']) && $_SESSION['login'] == true;
}

function register($contestant) {

    //Registreerime võistleja, genereerime suvalise numbri
    global $pdo;

    $code = substr(rand(12550, 7345345), 1, 5); //Suvaline number
    $stmt = $pdo->prepare('INSERT INTO contestant (id, name, code, is_confirmed) VALUES(NULL, :name, :code, 0)');
    $stmt->execute([
                       ':name' => $contestant,
                       ':code' => $code
                   ]);

    return $code;
}

function registerCheckpoint($code, $x, $y) {

    global $pdo;

    //leiame checkpointi koordinaatide järgi

    $stmt = $pdo->prepare('SELECT * FROM checkpoint WHERE x = :x AND y = :y');

    $stmt->execute([':x' => $x, ':y' => $y]);

    $checkpoint = $stmt->fetch(PDO::FETCH_OBJ);
    if ($checkpoint == false) {
        return 'Kontrollpunkti ei leitud!';
    }
    //Leiame osaleja koodi järgi
    $stmt = $pdo->prepare('SELECT * FROM contestant WHERE code = :code');
    $stmt->execute([':code' => $code]);

    $contenstant = $stmt->fetch(PDO::FETCH_OBJ);

    if ($contenstant == false) {
        return "Osalejat ei leitud koodi järgi";
    }
    //Salvestame punktist läbimise
    $stmt = $pdo->prepare('INSERT INTO checkpoint_registration (timestamp, contestant_id, checkpoint_id)' .
                          ' VALUES(:timestamp, :contestant_id, :checkpoint_id)');
    $stmt->execute(
        [
            ':timestamp'     => time(),
            ':contestant_id' => $contenstant->id,
            ':checkpoint_id' => $checkpoint->id
        ]
    );

    return true;
}
