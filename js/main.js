$(document).ready(function () {
    let teachersSlider = $('.teachers__slider').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1
    });

    let reviewsSlider = $('.reviews__slider').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1
    });

    updateSlider()

    $(window).resize(function() {
        updateSlider()
    });

    function updateSlider() {
        if (screen.width < 1400) {
            reviewsSlider.slick('unslick')
            reviewsSlider.slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });
        }

        if (screen.width < 1300) {
            teachersSlider.slick('unslick')
            teachersSlider.slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1
            });
        }

        if (screen.width < 1100) {
            teachersSlider.slick('unslick')
            teachersSlider.slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1
            });
        }

        if (screen.width < 800) {
            teachersSlider.slick('unslick')
            teachersSlider.slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });
        }
    }

    document.addEventListener("mousemove",  function (event) {
        this.querySelectorAll(".mouse").forEach((shift) => {
            const position = shift.dataset.value;
            const x = (window.innerWidth - event.pageX * position) / 90;
            const y = (window.innerHeight - event.pageY * position) / 90;

            shift.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
        });
    });

    $("input[type='tel']").inputmask("+7(999)999-99-99")
    $("button[type='submit']").on("click", function (e) {
        // e.preventDefault()
        let form = $(this).parents(".form")
        let name = form.find("input[name='name']")
        let phone = form.find("input[name='phone']")
        let email = form.find("input[name='email']")

        if (name.val() === "") {
            name.addClass("error")
        } else {
            name.removeClass("error")
        }

        if (phone.val() === "") {
            phone.addClass("error")
        } else {
            phone.removeClass("error")
        }

        if (email.val() === "") {
            email.addClass("error")
        } else {
            email.removeClass("error")
        }

        if ((name.val() === "") || (phone.val() === "") || (email.val() === "")) {
            e.preventDefault()
        }
    })
})