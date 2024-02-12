<?php

    $result = $db->query("SELECT * FROM proizvodi");

    $proizvodi = $result->fetch_all(MYSQLI_ASSOC);

?>