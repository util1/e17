<!DOCTYPE html>

<html>
<body>


<?php
$username="user";
$password="password";
$database="<NOME_DB>";
$host="172.18.0.3";   //NON MODIFICARE!!

// Creare connessione al database
$connessione = new mysqli($host, $username, $password, $database);

// Controllare la connessione
if ($connessione->connect_error) {
    die("Connessione al database fallita: " . $connessione->connect_error);
}

// Preparare una query SQL
$query = "SELECT id, domanda, risposta, email FROM faq";

// Eseguire la query e verificare il risultato
if ($risultato = $connessione->query($query)) {
    echo '<table>';
    echo '<tr>
            <td>ID</td>
            <td>Domanda</td>
            <td>Risposta</td>
            <td>Email</td>
          </tr>';

    // Ciclo sui risultati
    while ($row = $risultato->fetch_assoc()) {
        $id = $row["id"];
        $domanda = $row["domanda"];
        $risposta = $row["risposta"];
        $email = $row["email"];

        // Mostrare i risultati nella tabella
        echo '<tr>
                <td>' . htmlspecialchars($id) . '</td>
                <td>' . htmlspecialchars($domanda) . '</td>
                <td>' . htmlspecialchars($risposta) . '</td>
                <td>' . htmlspecialchars($email) . '</td>
              </tr>';
    }

    $risultato->free();
} else {
    echo "Errore nella query: " . $connessione->error;
}

// Chiudere la connessione
$connessione->close();
?>

</body>
</html>
