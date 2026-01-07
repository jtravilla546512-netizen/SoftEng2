// CoolSystem Specialist - JavaScript

// Mobile Menu Toggle and Map Initialization
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking on a link
        const mobileMenuLinks = mobileMenu.querySelectorAll('a');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    }

    // Initialize OpenStreetMap with Leaflet
    // Business coordinates: 7.076027788843113, 125.60318340532645
    const businessLat = 7.076027788843113;
    const businessLng = 125.60318340532645;

    // Create map centered on business location
    const map = L.map('map').setView([businessLat, businessLng], 16);

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 19
    }).addTo(map);

    // Create custom icon for the marker
    const customIcon = L.icon({
        iconUrl: 'data:image/svg+xml;base64,' + btoa(`
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48">
                <path fill="#DC2626" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
        `),
        iconSize: [48, 48],
        iconAnchor: [24, 48],
        popupAnchor: [0, -48]
    });

    // Add marker for business location
    const marker = L.marker([businessLat, businessLng], { icon: customIcon }).addTo(map);

    // Add popup to marker
    marker.bindPopup(`
        <div style="font-family: 'Lato', sans-serif; text-align: center;">
            <strong style="color: #2B9DD1; font-size: 16px;">CoolSystem Specialist</strong><br>
            <span style="font-size: 14px;">Door 4-B Lopez Jaen Street<br>Davao City</span><br>
            <a href="https://www.google.com/maps/dir/?api=1&destination=${businessLat},${businessLng}" 
               target="_blank" 
               style="color: #2B9DD1; font-size: 13px; text-decoration: none; font-weight: bold;">
                Get Directions →
            </a>
        </div>
    `).openPopup();

    // Make entire map clickable to open Google Maps
    map.on('click', function() {
        window.open(`https://www.google.com/maps?q=${businessLat},${businessLng}`, '_blank');
    });

    // Also make marker clickable to open Google Maps
    marker.on('click', function(e) {
        // Prevent default popup behavior temporarily
        L.DomEvent.stopPropagation(e);
        // Open Google Maps in new tab
        window.open(`https://www.google.com/maps?q=${businessLat},${businessLng}`, '_blank');
    });
});
