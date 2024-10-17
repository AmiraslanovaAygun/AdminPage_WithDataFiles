<?php

declare(strict_types=1);


function getTransactions(string $fileName): array
{
    if (!file_exists($fileName)) {
        trigger_error("File " . $fileName . " not found", E_USER_ERROR);
    }

    $file = fopen($fileName, "r");
    fgetcsv($file);
    $transactions = [];

    while (($transaction = fgetcsv($file)) !== false) {
        $transactions[] = extractTransactions($transaction);
    }
    return $transactions;
    fclose($file);
}

function extractTransactions(array $transaction): array
{
    [$username, $surname, $password] = $transaction;

    return [
        'username' => $username,
        'surname' => $surname,
        'password' => $password,
    ];
}
