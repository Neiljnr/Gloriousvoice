<?php 
include 'includes/header.php'; 
include 'includes/db.php'; 
include 'includes/functions.php';
?>

<section class="page-header">
  <h2>🎶 Upcoming & Past Events</h2>
</section>

<section class="events-page">

  <!-- 🗓 Upcoming Events -->
  <h3>✨ Upcoming Events</h3>
  <div class="events-grid">
    <?php
      $upcomingEvents = getUpcomingEvents($conn);
      if (!empty($upcomingEvents)) {
        foreach ($upcomingEvents as $event) {
          $eventId = "countdown_" . $event['id'];
          echo "
          <div class='event-card'>
            <h4>" . htmlspecialchars($event['title']) . "</h4>
            <p><strong>Date:</strong> " . htmlspecialchars($event['date']) . "</p>
            <p><strong>Venue:</strong> " . htmlspecialchars($event['venue'] ?? 'TBA') . "</p>
            <p><strong>Description:</strong> " . htmlspecialchars($event['description'] ?? 'No details available.') . "</p>
            <p id='{$eventId}' class='countdown'></p>
            <script>
              document.addEventListener('DOMContentLoaded', function() {
                countdown('" . $event['date'] . "', '{$eventId}');
              });
            </script>
          </div>";
        }
      } else {
        echo "<p>No upcoming events at the moment.</p>";
      }
    ?>
  </div>

  <!-- 🎉 Special Random Events -->
  <h3>🌍 Special Random Highlights</h3>
  <div id="randomEvents" class="events-grid"></div>

  <script>
    // 🎲 Generate 3 random inspirational event cards
    const specialEvents = [
      { title: "Praise Concert", date: "Every Last Sunday", venue: "Majaga Church Hall" },
      { title: "Youth Revival Night", date: "Quarterly", venue: "St. John Anglican Church Majaga" },
      { title: "Thanksgiving & Testimony Service", date: "First Sunday Each Month", venue: "Main Auditorium" }
    ];

    const container = document.getElementById("randomEvents");
    specialEvents.forEach(ev => {
      const div = document.createElement("div");
      div.classList.add("event-card");
      div.innerHTML = `
        <h4>${ev.title}</h4>
        <p><strong>Date:</strong> ${ev.date}</p>
        <p><strong>Venue:</strong> ${ev.venue}</p>
      `;
      container.appendChild(div);
    });
  </script>

  <!-- ⏳ Past Events -->
  <h3>🕰️ Past Events</h3>
  <div class="events-grid">
    <?php
      $pastEvents = getPastEvents($conn);
      if (!empty($pastEvents)) {
        foreach ($pastEvents as $event) {
          echo "
          <div class='event-card past'>
            <h4>" . htmlspecialchars($event['title']) . "</h4>
            <p><strong>Date:</strong> " . htmlspecialchars($event['date']) . "</p>
            <p><strong>Venue:</strong> " . htmlspecialchars($event['venue'] ?? 'N/A') . "</p>
          </div>";
        }
      } else {
        echo "<p>No past events recorded yet.</p>";
      }
    ?>
  </div>

</section>

<?php include 'includes/footer.php'; ?>
