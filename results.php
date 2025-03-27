<?php
include 'db.php';

$results = $conn->query("
    SELECT c.name, COUNT(v.id) AS total_votes
    FROM candidates c
    LEFT JOIN votes v ON c.id = v.candidate_id
    GROUP BY c.id
")->fetchAll();

echo "<h2>Voting Results</h2>";
foreach ($results as $result) {
    echo "{$result['name']}: {$result['total_votes']} votes<br>";
}
?>
