<?php
function getDailyVerse($conn) {
    $today = date('Y-m-d');
    $sql = "SELECT text, reference FROM verses WHERE date = '$today' LIMIT 1";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['text']." <br><small>(".$row['reference'].")</small>";
    } else {
        return "No verse available today.";
    }
}

function getLatestMinistration($conn) {
    $sql = "SELECT * FROM ministrations ORDER BY date DESC LIMIT 1";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function getUpcomingEvents($conn) {
    $today = date('Y-m-d');
    $sql = "SELECT * FROM events WHERE date >= '$today' ORDER BY date ASC LIMIT 3";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getAnnouncements($conn) {
    $sql = "SELECT * FROM announcements ORDER BY created_at DESC LIMIT 5";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
