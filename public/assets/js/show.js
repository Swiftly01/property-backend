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

        currentIndex =
            (currentIndex - 1 + imageUrls.length) % imageUrls.length;
        updateBackground();
    });

    const initialUrl = propertyPage.style.backgroundImage
    .replace(/^url\(["']?/, '')
    .replace(/["']?\)$/, '')
    .replace(location.origin, ''); // normalize to relative URL

const foundIndex = imageUrls.findIndex((url) =>
    initialUrl.includes(url)
);
});