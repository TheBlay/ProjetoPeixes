<?php

//apagar um item

$filmeARemover = 2;
    $found = false;
    foreach ($filmes as $index => $filme) {
        // Example condition: remove by 'id'
        if (isset($filme['id']) && $filme['id'] == $filmeARemover) {
            unset($filme[$index]);
            $found = true;
        }
    }


    if (!$found) {
        echo "No item found with id = $filmeARemover\n";
    } else {
        // 5. Reindex array if it's an indexed array
        $filmes = array_values($filmes);

        // 6. Save updated data back to file
        if (file_put_contents($arquivoFilmes, json_encode($filmes, JSON_PRETTY_PRINT)) === false) {
            throw new Exception("Failed to write updated JSON to file.");
        }

        echo "Item with id = $filmeARemover removed successfully.\n";
    }





?>