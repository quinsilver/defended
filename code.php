<!DOCTYPE html>
<html>
<head>
    <title>Emergency Device Location</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script></script>
    <style>
        #mapid { height: 500px; width: 100%; }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Latest Emergency Device Location</h1>
    <p>Last updated: <?php echo htmlspecialchars($timestamp); ?></p>
    <div id="mapid"></div>

    <script>
        var lat = <?php echo json_encode($latitude); ?>;
        var lon = <?php echo json_encode($longitude); ?>;

        var mymap = L.map('mapid').setView([lat, lon], 17); // Set zoom level to 17 for close-up view

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 19,
        }).addTo(mymap);

        // Add a marker to the latest location
        var marker = L.marker([lat, lon]).addTo(mymap);
        marker.bindPopup("<b>Latest Location!</b><br>Latitude: " + lat + "<br>Longitude: " + lon + "<br>Time: <?php echo htmlspecialchars($timestamp); ?>").openPopup();
    </script>

    <nav class="navbar">
    <div class="logo">
        <a href="code.php">
            <img src="pictures/pindot-logo.png" alt="pinDOT" />
        </a>
    </div>
    <ul class="nav-links">
      <li><a href="indexes/contact-us.html">Contact</a></li>
    </ul>
    </nav>

    <footer class="footer">
        <div class="footer-container">
            <h6>Footer na to</h6>
            <img src="pictures/pindot-logo.png" alt="pinDOT Logo" class="footer-logo">
        </div>
    </footer>

    <script>
        let lastScrollTop = 0;
        const navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
        // Scrolling down
        navbar.classList.add('hide');
        } else {
        // Scrolling up
        navbar.classList.remove('hide');
        }

        lastScrollTop = scrollTop;
        });
</script>

</body>
</html>