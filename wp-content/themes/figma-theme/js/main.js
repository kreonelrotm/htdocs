document.addEventListener("DOMContentLoaded", function () {
    // Function to initialize the word carousel animation
    var words = document.querySelectorAll('.message .word');
    var index = 0;
    var interval = setInterval(function () {
        for (var i = 0; i < words.length; i++) {
            words[i].style.opacity = '0';
        }
        words[index].style.opacity = '1';
        index++;
        if (index === words.length) {
            index = 0;
        }
    }, 1500);
    initCarousel();
});

function initCarousel() {
    // Function to initialize the carousel
    const slider = document.querySelector(".items");
    const slides = document.querySelectorAll(".item");
    const button = document.querySelectorAll(".button");

    let current = 0;
    let autoplayInterval;

    const gotoPrev = () => {
        current = current > 0 ? current - 1 : slides.length - 1;
        updateClasses();
    };

    const gotoNext = () => {
        current = current < slides.length - 1 ? current + 1 : 0;
        updateClasses();
    };

    const updateClasses = () => {
        for (let i = 0; i < slides.length; i++) {
            slides[i].classList.remove("active", "prev", "next");
        }

        let prev = current > 0 ? current - 1 : slides.length - 1;
        let next = current < slides.length - 1 ? current + 1 : 0;

        slides[current].classList.add("active");
        slides[prev].classList.add("prev");
        slides[next].classList.add("next");
    };

    const startAutoplay = () => {
        clearInterval(autoplayInterval);
        autoplayInterval = setInterval(gotoNext, 3000);
    };

    startAutoplay();

    slider.addEventListener("mouseover", () => {
        clearInterval(autoplayInterval);
    });

    slider.addEventListener("mouseout", () => {
        startAutoplay();
    });

    for (let i = 0; i < button.length; i++) {
        button[i].addEventListener("click", () => i == 0 ? gotoPrev() : gotoNext());
    }
}

const select = document.getElementById("select");

select.addEventListener("change", function () {
    // Function to fetch articles based on selected category
    const category = select.value;
    fetchArticles(category);
    fetchTags(category);
});

function fetchArticles(category) {
    // Function to fetch articles from the server
    const url = category ? 'http://localhost/wp-content/themes/figma-theme/ajax/category_query.php?category=' + encodeURIComponent(category) : '';
    fetch(url)
        .then(response => response.text())
        .then(data => {
            const slider = document.querySelector(".items");
            slider.innerHTML = data;
            initCarousel();
        })
        .catch(error => console.error('Error fetching articles:', error));
}

// Function to fetch tags based on selected category
function fetchTags(category) {
    console.log(category)
    const url = category ? 'http://localhost/wp-content/themes/figma-theme/ajax/find_tags_query.php?category=' + encodeURIComponent(category) : '';
    fetch(url)
        .then(response => response.json())
        .then(tags => {
            updateCheckboxList(tags, category);
        })
        .catch(error => console.error('Error fetching tags:', error));
}

function updateCheckboxList(tags, category) {
    // Function to update the checkbox list with fetched tags
    console.log(tags);
    const checkboxList = document.querySelector('.checkbox-list');
    checkboxList.innerHTML = '';

    // Creating an object to store all selected tags
    const selectedTags = {};
    const cat_id = tags.category_id;
    tags.tags.forEach(tag => {
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.name = 'tags[]';
        checkbox.value = tag.slug;

        // Add a right margin of 10 pixels to each checkbox
        checkbox.style.marginRight = '10px';

        // Adding a 'change' event for each checkbox
        checkbox.addEventListener('change', function () {
            if (this.checked) {
                // If checkbox is checked, add the tag to the selected tags list
                selectedTags[tag.slug] = tag.name;
            } else {
                // If checkbox is unchecked, remove the tag from the selected tags list
                delete selectedTags[tag.slug];
            }
            console.log(selectedTags)
            // Calling the function to send AJAX request
            sendAjaxRequest(cat_id, selectedTags);
        });

        const label = document.createElement('label');
        label.appendChild(checkbox);
        label.appendChild(document.createTextNode(tag.name));
        checkboxList.appendChild(label);
    });
}


function sendAjaxRequest(category, selectedTags) {

    let url = category ? `http://localhost/wp-content/themes/figma-theme/ajax/tags_query.php?category=${encodeURIComponent(category)}` : '';

    // Adding tags to the URL if available
    if (selectedTags && Object.keys(selectedTags).length > 0) {
        // Iterating through the keys of selectedTags
        for (const tagName in selectedTags) {
            if (selectedTags.hasOwnProperty(tagName)) {
                const tagValue = selectedTags[tagName];
                url += `&tags[]=${encodeURIComponent(tagValue)}`; // Add each tag value to the URL
            }
        }
    }

    // Making the AJAX request with the constructed URL
    fetch(url)
        .then(response => response.text())
        .then(data => {
            const slider = document.querySelector(".items");
            slider.innerHTML = data;
            initCarousel();
        })
        .catch(error => console.error('Error fetching articles:', error));
}
