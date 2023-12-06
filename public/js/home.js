// Navbar when scrolled change.
const heroElement = document.querySelector("section.bg-hero");

const heroObserver = new IntersectionObserver(
    (entries) => {
        const [entry] = entries;

        if (!entry.isIntersecting) {
            var elements = document.querySelectorAll(".navbar-home");

            elements.forEach((element) => {
                element.classList.remove("navbar-home")
            })

            document.getElementById("service-type").classList.remove("d-none");
            document.getElementById("nav-search").classList.remove("d-none");
            document.getElementById("hero-content").classList.add("d-none");
            document.getElementById("logo-white").classList.add("d-none");
            document.getElementById("logo-black").classList.remove("d-none");

        } else {
            document.querySelectorAll(".navbar.navbar-expand-md")[0].classList.add("navbar-home");
            document.getElementsByClassName("navbar-brand")[0].classList.add("navbar-home");
            var elements = document.querySelectorAll(".nav-link");
            elements[0].classList.add("navbar-home");
            elements[1].classList.add("navbar-home");

            document.getElementById("service-type").classList.add("d-none");
            document.getElementById("nav-search").classList.add("d-none");
            document.getElementById("hero-content").classList.remove("d-none");
            document.getElementById("logo-white").classList.remove("d-none");
            document.getElementById("logo-black").classList.add("d-none");
        }
    },
    { threshold: 0.8 }
);

heroObserver.observe(heroElement);
