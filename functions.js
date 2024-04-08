// add more photos to the array if needed
const photoUrls = [
    "./images/IMG_0533.jpg",
    "./images/IMG_0577.jpg",
    "./images/IMG_0578.jpg",
    "./images/IMG_0851.jpg",
    "./images/IMG_5549.jpg",
    "./images/IMG_6195.jpg",
    "./images/IMG_6855.jpg",
    "./images/IMG_9243.jpg",
    "./images/IMG_9295.jpg",
    "./images/IMG_9749.jpg"
];

function displayPhotos() {
    const photoContainer = document.getElementById("photo-container");
    const currentPhoto = document.getElementById("current-photo");
    let currentIndex = 0;

    function displayNextPhoto() {
        currentPhoto.style.opacity = 0;

        // waits for anim to finish
        setTimeout(() => {
            // changes the photo src
            currentPhoto.src = photoUrls[currentIndex];
            
            // increments index for next photo
            currentIndex = (currentIndex + 1) % photoUrls.length;

            // fade in new photo
            currentPhoto.style.opacity = 1;
        }, 1000); // Wait for fade out animation to finish (1000ms = 1s)
        
        // recall the func after time
        setTimeout(displayNextPhoto, 5000);
    }

    displayNextPhoto();
}

// call the function when the page loads instead of needing to call it from the page itself
window.onload = displayPhotos;