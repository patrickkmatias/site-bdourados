// slick slider
$(document).ready(function(){
  $('.banner').slick({
    autoplay: true,
    autoplaySpeed: 10000,
    arrows: false,
    dots: false,
    fade: true,
    speed: 1500,
    infinite: true,
    cssEase: 'ease-in-out',
    loop: true,
    pauseOnHover: false,
    pauseOnFocus: false
  });
  $('.sliderServicos').slick({
    arrows: false,
    draggable: false,
    autoplay: true,
    autoplaySpeed: 3000,
    dots: true,
    asNavFor: '.sliderServicosTitle'
  })
  $('.sliderServicosTitle').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.sliderServicos',
    dots: false,
    arrows: false,
    draggable: false,
    fade: true
  });
});

//typewriter effect
const typedTextSpan = document.querySelector(".typed-text");
const cursorSpan = document.querySelector(".cursor");

const textArray = ["seu corte", "suas luzes", "sua progressiva", "sua barba"];
const typingDelay = 200;
const erasingDelay = 100;
const newTextDelay = 2000; // Delay between current and next text
let textArrayIndex = 0;
let charIndex = 0;

function type() {
  if (charIndex < textArray[textArrayIndex].length) {
    if(!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
    typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
    charIndex++;
    setTimeout(type, typingDelay);
  } 
  else {
    cursorSpan.classList.remove("typing");
  	setTimeout(erase, newTextDelay);
  }
}

function erase() {
	if (charIndex > 0) {
    if(!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
    typedTextSpan.textContent = textArray[textArrayIndex].substring(0, charIndex-1);
    charIndex--;
    setTimeout(erase, erasingDelay);
  } 
  else {
    cursorSpan.classList.remove("typing");
    textArrayIndex++;
    if(textArrayIndex>=textArray.length) textArrayIndex=0;
    setTimeout(type, typingDelay + 1100);
  }
}

document.addEventListener("DOMContentLoaded", function() { // On DOM Load initiate the effect
  if(textArray.length) setTimeout(type, newTextDelay + 250);
});

// video play effect
let btn = document.querySelector('.btn');
let clip = document.querySelector('.clip');
let galeria = document.querySelector('#galeria');
let fechar = document.querySelector('.close');

btn.onclick = function(){
  btn.classList.add('active');
  clip.classList.add('active');
  galeria.classList.add('active');

}
fechar.onclick = function(){
  btn.classList.remove('active');
  clip.classList.remove('active');
  galeria.classList.remove('active');

}

// GSAP scrolling animations
let hidden = document.querySelector('.menu');

gsap.to('#navbar', {
  scrollTrigger: {
    trigger: '#blackspace',
    endTrigger: '#midias',
    end: '0 20%',
    toggleClass: {
      className: 'shrink', 
      targets: ['#navbar', '#logo', '#mi1','#mi2']},
    onLeave: (function(){

      hidden.classList.add("hidden");
      gsap.to('#navbar', {delay: 1, overflow: 'hidden', height: 0});
    }
    ),
    onEnterBack: (function(){
      
      hidden.classList.remove('hidden');
      gsap.to('#navbar', {overflow: 'visible'});

    }),
    markers: false
  },
  delay: 1,
  
  // overflow: "hidden",
});



gsap.to('.sombraGaleria', {
  scrollTrigger: {
    trigger: '.sombraGaleria',
    toggleClass: 'active',
    scrub: 6,
    start: '0 70%',
    end: () => '+' +
    document.querySelector('.sombraGaleria').offsetWidth,
    markers: false,
  },
  x: -250,
  y: 250,
  duration: 4
})

gsap.to('.maskServicos', {
  scrollTrigger: {
    trigger: '.maskServicos',
    scrub: 4,
    start: '0 70%',
    end: () => '+' +
    document.querySelector('.maskServicos').offsetWidth,
    toggleClass: 'active',
    markers: false,
  },
  x: -250,
  y: 250,
  duration: 4
})

gsap.to('#parallaxGaleria', {
  scrollTrigger: {
    trigger: '#parallaxGaleria',
    start: 'top bottom',
    end: 'bottom bottom',
    endTrigger: '#rodape',
    scrub: 5,
    markers: false
  },
  scale: 1.2,
  y: 100
})

gsap.timeline({
  scrollTrigger: {
    trigger: '.video',
    toggleClass: 'active',
    start: '20% center',
    end: 'bottom bottom',
    markers: false,
    scrub: 5,
    once: true,
  },
})

.from(".sombraVideo", 
{
   y : innerHeight * 1,
})

.from(".imagemVideo",
{ 
  y : innerWidth * 1,
})


gsap.set([".imagemGaleria",".sombraImgGaleria"], {opacity: 0});

gsap.set(".sombraImgGaleria", {y: 100});

ScrollTrigger.batch(".sombraImgGaleria", {
  interval: 0.1, // time window (in seconds) for batching to occur. 
  batchMax: 4,   // maximum batch size (targets). Can be function-based for dynamic values
  onEnter: batch => gsap.to(batch, {opacity: 1, y: 0, x: -100, stagger: {each: 0.2}, overwrite: true}),
  onLeave: batch => gsap.set(batch, {opacity: 0, y: -100, x: -100, overwrite: true}),
  // you can also define most normal ScrollTrigger values like start, end, etc.
  trigger: '.imagemGaleria',
  start: "top 70%",
  end: "center bottom",
  toggleClass: 'active',
  markers: false,
  once: true
});

gsap.set(".imagemGaleria", {y: -100});

ScrollTrigger.batch(".imagemGaleria", {
  interval: 0.1, // time window (in seconds) for batching to occur. 
  batchMax: 4,   // maximum batch size (targets). Can be function-based for dynamic values
  onEnter: batch => gsap.to(batch, {delay: 1.2, opacity: 1, y: 0, x: -100, stagger: {each: 0.2}, overwrite: true}),
  onLeave: batch => gsap.set(batch, {opacity: 0, y: 100, x: -100, overwrite: true}),
  // you can also define most normal ScrollTrigger values like start, end, etc.
  start: "top 60%",
  end: "bottom bottom",
  toggleClass: 'active',
  markers: false,
  once: true
});

// when ScrollTrigger does a refresh(), it maps all the positioning data which 
// factors in transforms, but in this example we're initially setting all the ".box"
// elements to a "y" of 100 solely for the animation in which would throw off the normal 
// positioning, so we use a "refreshInit" listener to reset the y temporarily. When we 
// return a gsap.set() in the listener, it'll automatically revert it after the refresh()!
ScrollTrigger.addEventListener("refreshInit", () => gsap.set(".imagemGaleria", {y: 0}));
// .from(".sombraImgGaleria", 
// {
//    y : innerHeight * 1,
//    duration: 8
// })

// .from(".sombraVideo", 
// {
//    y : innerHeight * 1,
//    duration: 8
// })
// .from("#img1", 
// {
//    y : innerHeight * 1,
//    duration: 8
// })


// ANIMAÇÕES RESPONSIVAS GSAP

ScrollTrigger.matchMedia({

  "(min-width: 601px": function() {

    gsap.to('#modeloBarbearia', {
      scrollTrigger: {
        trigger: '#modeloBarbearia',
        toggleClass: 'active',
        toggleActions: 'restart pause reverse pause',
        scrub: 3,
        start: '0 100%',
        end: () => '+=' +
        (document.querySelector('#modeloBarbearia').offsetHeight - (
          document.querySelector('#modeloBarbearia').offsetHeight * 0
        )) + ' 80%',
        once: true,
        markers: false,
      },
      x: 600,
      duration: 4
    })

  },

  "(max-width: 600px)": function() {
    let tl = gsap.timeline({
      scrollTrigger: {
        trigger: "#aBarbearia",
        toggleClass: {targets:'#modeloBarbearia', className: 'active'},
        start: 'top center',
        end: 'center center',
        scrub: false,
        once: true,
        markers: false
      }
    });
    tl.from('#modeloBarbearia', {
      duration: 1,
      x: - innerWidth * 1,
      ease: 'power3.easeIn' })

      .from('#aBarbearia article>div', {
        delay: 1.5,
        duration: 2.5, 
        ease: 'expo', 
        y: innerHeight * 1 })
  },
  "(min-width: 426px)": function() {
    gsap.to('#bolinhasApp', {
      scrollTrigger: {
        trigger: '#bolinhasApp',
        toggleClass: 'active',
        scrub: 2,
        start: '20 bottom',
        end: () => '+=' +
        (document.querySelector('#bolinhasApp').offsetWidth * 0.8) + ' 70%',
        markers: false,
      },
      x: -800,
      duration: 4
    })

    gsap.set('#bolinhasGaleria', {scaleX: "1", scaleY: "-1"})

    gsap.to('#bolinhasGaleria', {
      scrollTrigger: {
        trigger: '#bolinhasGaleria',
        toggleClass: 'active',
        scrub: 10,
        start: '20 bottom',
        end: () => '+=' +
        document.querySelector('#bolinhasGaleria').offsetWidth + ' center',
        markers: false,
      },
      x: 50,
      duration: 4
    })
  },
  "(max-width: 425px)": function() {
    
    gsap.set('#bolinhasApp', {scaleX: "1", scaleY: "-1"})

    gsap.to('#bolinhasApp', {
      scrollTrigger: {
        trigger: '#app',
        toggleClass:  {targets:'#bolinhasApp', className: 'active'},
        scrub: 2,
        start: 'top center',
        end: '80% center',
        markers: false,
      },
      x: -150,
      duration: 4
    })

    gsap.set('#bolinhasGaleria', {scaleX: "-1", scaleY: "1"})

    gsap.to('#bolinhasGaleria', {
      scrollTrigger: {
        trigger: '#bolinhasGaleria',
        toggleClass: 'active',
        scrub: 10,
        start: '20 bottom',
        end: () => '+=' +
        document.querySelector('#bolinhasGaleria').offsetWidth + ' center',
        markers: false,
      },
      x: 200,
      duration: 4
    })
    

  }
});






