//* Bắt đầu với Scroll to top
document.addEventListener("DOMContentLoaded", function () {
    const scrollToTopBtn = document.getElementById("scrollToTopBtn");

    // Hiển thị nút khi cuộn xuống
    window.addEventListener("scroll", function () {
        if (window.pageYOffset > 20) {
            // Nếu cuộn xuống hơn 300px
            scrollToTopBtn.style.display = "block";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    });

    // Xử lý sự kiện khi nhấn vào nút
    scrollToTopBtn.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth", // Cuộn mượt mà
        });
    });
});

//* Sự kiện click menu
document.addEventListener("DOMContentLoaded", function () {
    const defaultNavLinkId = "home";
    const currentActive =
        localStorage.getItem("activeNavLink") || defaultNavLinkId;
    const activeLink = document.getElementById(currentActive);

    if (activeLink) {
        activeLink.classList.add("active");
    }

    document.querySelectorAll(".nav-link").forEach((link) => {
        link.addEventListener("click", function () {
            document
                .querySelector(".nav-link.active")
                ?.classList.remove("active");
            this.classList.add("active");
            localStorage.setItem("activeNavLink", this.id);
        });
    });
});

//* Cuộn trang tới vị trí khi làm mới trang
window.onload = function () {
    const targetElement = document.getElementById("scroll-target");
    if (targetElement) {
        targetElement.scrollIntoView({ behavior: "smooth" });
    }
};
