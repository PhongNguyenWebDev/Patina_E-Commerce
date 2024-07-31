// Set the date we're counting down to
document.addEventListener("DOMContentLoaded", function () {
    // Set the date we're counting down to
    var countDownDate = new Date("December 30, 2024 23:59:59").getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="countdown"
        var daysElement = document.getElementById("days");
        var hoursElement = document.getElementById("hours");
        var minutesElement = document.getElementById("minutes");
        var secondsElement = document.getElementById("seconds");

        if (daysElement && hoursElement && minutesElement && secondsElement) {
            daysElement.innerHTML = days;
            hoursElement.innerHTML = hours;
            minutesElement.innerHTML = minutes;
            secondsElement.innerHTML = seconds;
        }

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            if (daysElement) {
                daysElement.innerHTML = "EXPIRED";
            }
        }
    }, 1000);
});

// Click img in product details
document.addEventListener("DOMContentLoaded", function () {
    var mainImage = document.getElementById("mainImage");
    var thumbnails = document.querySelectorAll(".thumbnail");
    var prevButton = document.getElementById("prevButton");
    var nextButton = document.getElementById("nextButton");

    // Kiểm tra xem phần tử chính có tồn tại hay không
    if (!mainImage || !prevButton || !nextButton || thumbnails.length === 0) {
        console.error("Một hoặc nhiều phần tử cần thiết không tồn tại.");
        return;
    }

    var images = Array.from(thumbnails).map((thumbnail) => thumbnail.src);
    var currentIndex = 0;

    function updateMainImage(index) {
        mainImage.src = images[index];
        currentIndex = index;
    }

    thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener("click", function () {
            updateMainImage(index);
        });
    });

    prevButton.addEventListener("click", function () {
        var newIndex =
            currentIndex === 0 ? images.length - 1 : currentIndex - 1;
        updateMainImage(newIndex);
    });

    nextButton.addEventListener("click", function () {
        var newIndex = (currentIndex + 1) % images.length;
        updateMainImage(newIndex);
    });
});

// Product detail
document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".mt-tabs a");
    const tabContent = document.querySelectorAll(".tab-content .tab-pane");

    tabs.forEach((tab) => {
        tab.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));

            tabs.forEach((t) => t.classList.remove("active"));
            tabContent.forEach((tc) => tc.classList.remove("active"));

            this.classList.add("active");
            target.classList.add("active");
        });
    });
});

// Thong tin khach hang
document.querySelectorAll(".list-group-item-action").forEach((item) => {
    item.addEventListener("click", (event) => {
        event.preventDefault();
        const target = event.target.getAttribute("data-target");
        document.querySelectorAll(".info-content").forEach((content) => {
            content.classList.add("d-none");
        });
        document.querySelector(target).classList.remove("d-none");
    });
});
// Function hiển thị thông tin chi tiết
function showOrderDetails() {
    document.getElementById("orderDetailsContainer").style.display = "block";
}

// Function ẩn thông tin chi tiết
function closeOrderDetails() {
    document.getElementById("orderDetailsContainer").style.display = "none";
}
