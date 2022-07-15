$(document).ready(function () {
  SmoothScroll({
    animationTime: 600,
    stepSize: 75,
    accelerationDelta: 30,
    accelerationMax: 2,
    keyboardSupport: !0,
    arrowScroll: 50,
    pulseAlgorithm: !0,
    pulseScale: 4,
    pulseNormalize: 1,
    touchpadSupport: !0
  });
  new WOW().init();
  $('.drawer').drawer();

  $("a").on('click', function (event) {
    if ($(this).attr("href")[0] === "#") {
      if (this.hash !== "") {
        event.preventDefault();
        const hash = this.hash;
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function () {
          window.location.hash = hash;
        });
      }
    }
  });

  if ($('.main .first-screen__title span').length > 0) {
    new Typed('.main .first-screen__title span', {
      strings: [
        `<span class="green">Онлайн</span>-школа для <br>
          ребят с большими <br>
          <span class="pink">амбициями</span>`
      ],
      typeSpeed: 50,
      backSpeed: 100,
      backDelay: 500
    })
  }

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

  $(window).resize(function () {
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


  document.addEventListener("mousemove", function (event) {
    this.querySelectorAll(".mouse").forEach((shift) => {
      const position = shift.dataset.value;
      const x = (window.innerWidth - event.pageX * position) / 90;
      const y = (window.innerHeight - event.pageY * position) / 90;

      shift.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
    });
  });
  const line = $(".scroller__line")
  const ok1 = $(".scroller__line__items__item__icon.one")
  const ok2 = $(".scroller__line__items__item__icon.two")
  const ok3 = $(".scroller__line__items__item__icon.three")
  const top = line.offset().top - screen.height
  const bottom = line.offset().top
  let percent = 100 - (bottom - window.scrollY) / (bottom - top) * 100

  function loadScrollerAnim() {
    line.css('width', percent + "%")
    percent > 25 ? ok1.css('opacity', '100%') : ok1.css('opacity', '0%')
    percent > 50 ? ok2.css('opacity', '100%') : ok2.css('opacity', '0%')
    percent > 75 ? ok3.css('opacity', '100%') : ok3.css('opacity', '0%')
  }

  loadScrollerAnim()
  window.addEventListener('scroll', function () {
    if (window.scrollY > top && window.scrollY < bottom) {
      percent = 100 - (bottom - window.scrollY) / (bottom - top) * 100
      loadScrollerAnim()
    }
  })

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
  $(".faq__item__top").on('click', function () {
    const item = $(this).parents('.faq__item')
    item.toggleClass('active')
    item.find('.faq__item__content').slideToggle()
  })
})