

function show() {
    document.querySelector(".hamburger").classList.toggle("open");
    document.querySelector(".navigation").classList.toggle("active");
  }

  /* --------------------------- CARROUSEL ---------------------------- */
  var carrouselTestimonios = new Swiper(".myTestimonios", {
    slidesPerView: 4, //3
    spaceBetween: 25,
    loop: true,
    grabCursor: true,
    centeredSlides: true,
    initialSlide: 0,
    pagination: {
      el: ".swiper-pagination-testimonios",
      clickable: true,
      /* dynamicBullets: true, */
    },
    autoplay: {
      delay: 1500,
      disableOnInteraction: false,
    },
  
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 4,
      },
    },
  });
  
  /* ------------------------------------------------------------------ */
  
  var carrouselBeneficios = new Swiper(".myBeneficios", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    grab: false,
    centeredSlides: false,
    initialSlide: 0, // Empieza en el cuarto slide (índice 3)
    pagination: {
      el: ".swiper-pagination-beneficios",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
    },
  });
  
  /* ------------------------------------------- */
  
  var carrouselCategorias = new Swiper(".categorias", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: false,
    grab: false,
    centeredSlides: true,
    initialSlide: 0, // Empieza en el cuarto slide (índice 3)
    pagination: {
      el: ".swiper-pagination-categorias",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
    },
  });
  
  /* --------------------------------------------- */
  
  var carrosuelDestacados = new Swiper(".productos-destacados", {
    slidesPerView: 4,
    spaceBetween: 10,
    loop: true,
    grab: false,
  
    centeredSlides: false,
    initialSlide: 0, // Empieza en el cuarto slide (índice 3)
    pagination: {
      el: ".swiper-pagination-productos-destacados",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 4,
      },
    },
  });
  
  /* --------------------------------------------- */
  
  var carrouselOferta = new Swiper(".productos-oferta", {
    slidesPerView: 4,
    spaceBetween: 10,
    loop: true,
    grab: false,
    centeredSlides: false,
    initialSlide: 0, // Empieza en el cuarto slide (índice 3)
    pagination: {
      el: ".swiper-pagination-productos-oferta",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 4,
      },
    },
  });
  
  /* --------------------------------------------- */
  
  var carrosuelComplementario = new Swiper(".productos-complementarios", {
    slidesPerView: 4,
    spaceBetween: 10,
    loop: true,
    grab: false,
    centeredSlides: false,
    initialSlide: 0, // Empieza en el cuarto slide (índice 3)
  
    pagination: {
      el: ".swiper-pagination-producto-complementario",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 4,
      },
    },
  });
  
  /* --------------------------------------------- */
  
  var carrouselHeader = new Swiper(".header-slider", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    grab: true,
    centeredSlides: false,
    initialSlide: 0, // Empieza en el cuarto slide (índice 3)
    pagination: {
      el: ".swiper-pagination-slider-header",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
    },
  });
  
  /* ------------------------------------------ */
  
  var carrosuelProductoSlider = new Swiper(".producto-slider", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    grab: true,
    centeredSlides: false,
    initialSlide: 0, // Empieza en el cuarto slide (índice 3)
    pagination: {
      el: ".swiper-pagination-productos",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
    },
  });
  
  /* ------------------------------------------ */
  
  var CarrosuelCatalogo = new Swiper(".producto-catalogo", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    grab: true,
    centeredSlides: false,
    initialSlide: 0, // Empieza en el cuarto slide (índice 3)
    pagination: {
      el: ".swiper-pagination-producto-catalogo",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
    },
  });
  

