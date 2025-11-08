<?php include 'includes/header.php'; ?>

<h2>Songs to Learn</h2>
<div id="songs-grid" 
     style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 0; width: 100%;">
</div>

<h2>Trending Gospel Songs</h2>
<div id="trending-grid" 
     style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 0; width: 100%;">
</div>

<script>
// ✅ Your YouTube API Key
const API_KEY = "AIzaSyCB_x8cv8qheYXvK4dzbvxDj76wGl2rsR0";

// ✅ Songs your band is learning
const songsToLearn = [
  "Way Maker Sinach",
  "You Are Yahweh Steve Crown"
];

// ✅ Function: fetch and embed YouTube video
async function fetchYouTubeVideo(query, containerId, addButtons=false) {
  const url = `https://www.googleapis.com/youtube/v3/search?part=snippet&q=${encodeURIComponent(query)}&type=video&maxResults=1&key=${API_KEY}`;
  const response = await fetch(url);
  const data = await response.json();

  if (data.items && data.items.length > 0) {
    const videoId = data.items[0].id.videoId;
    const title = data.items[0].snippet.title;

    const div = document.createElement("div");
    div.style.border = "1px solid #ddd";
    div.style.padding = "10px";
    div.style.background = "#fafafa";
    div.style.textAlign = "center";

    div.innerHTML = `
      <h3 style="font-size: 14px; margin-bottom: 6px;">${title}</h3>
      <iframe width="100%" height="180"
        src="https://www.youtube.com/embed/${videoId}"
        frameborder="0" allowfullscreen></iframe>
    `;

    // ✅ Add download & stream buttons (for Songs to Learn only)
    if (addButtons) {
      div.innerHTML += `
        <div style="margin-top: 8px;">
          <a href="https://www.ssyoutube.com/watch?v=${videoId}" 
             target="_blank" 
             style="margin-right: 10px; text-decoration:none; color:white; background:#007bff; padding:6px 12px; border-radius:5px;">
             ⬇ Download
          </a>
          <a href="https://www.youtube.com/watch?v=${videoId}" 
             target="_blank" 
             style="text-decoration:none; color:white; background:#28a745; padding:6px 12px; border-radius:5px;">
             🎧 Stream
          </a>
        </div>
      `;
    }

    document.getElementById(containerId).appendChild(div);
  }
}

// ✅ Load Songs to Learn (with buttons)
songsToLearn.forEach(song => fetchYouTubeVideo(song, "songs-grid", true));

// ✅ Load Trending Gospel Songs automatically (no manual list)
async function loadTrendingGospelSongs() {
  const url = `https://www.googleapis.com/youtube/v3/search?part=snippet&q=gospel%20songs&type=video&maxResults=25&order=viewCount&key=${API_KEY}`;
  const response = await fetch(url);
  const data = await response.json();

  if (data.items && data.items.length > 0) {
    data.items.forEach(item => {
      fetchYouTubeVideo(item.snippet.title, "trending-grid");
    });
  }
}
loadTrendingGospelSongs();
</script>

<?php include 'includes/footer.php'; ?>
