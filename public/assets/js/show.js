document.addEventListener("DOMContentLoaded", function () {
    const propertyPage = document.getElementById("property-page");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");

    let currentIndex = 0;

    function updateBackground() {
        if (imageUrls.length > 0) {
            const imageUrl = imageUrls[currentIndex];
            propertyPage.style.backgroundImage = `url('${imageUrl}')`;
        }
    }

    nextBtn?.addEventListener("click", function () {
        if (imageUrls.length === 0) return;

        currentIndex = (currentIndex + 1) % imageUrls.length;
        updateBackground();
    });

    prevBtn?.addEventListener("click", function () {
        if (imageUrls.length === 0) return;

        currentIndex = (currentIndex - 1 + imageUrls.length) % imageUrls.length;
        updateBackground();
    });

    // 🔍 Detect which image is currently shown from background style
    const bg = propertyPage.style.backgroundImage;
    const cleanUrl = bg.replace(/^url\(["']?/, '').replace(/["']?\)$/, '');

    // Normalize both for better matching
    const foundIndex = imageUrls.findIndex((url) => {
        const absoluteUrl = new URL(url, window.location.origin).href;
        return absoluteUrl === cleanUrl;
    });

    // Use foundIndex if valid
    if (foundIndex >= 0) {
        currentIndex = foundIndex;
    } else {
        // fallback: start at 0
        currentIndex = 0;
    }

    updateBackground();
});
