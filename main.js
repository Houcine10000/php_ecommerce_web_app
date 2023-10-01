const header = document.querySelector("header");

window.addEventListener("scroll", () => {
  header.classList.toggle("sticky", window.scrollY > 0);
});

const menu = document.querySelector("#menu-icon")
const nav = document.querySelector("nav");
const scrollTop = document.querySelector(".scroll-top")

menu.onclick = () =>{
  menu.classList.toggle('bx-x');
  nav.classList.toggle('open');
}

window.onscroll = () =>{
  menu.classList.remove('bx-x');
  nav.classList.remove('open');
  scrollTop.style.display = ('block');
}

const sr = ScrollReveal ({
  distance: '60px',
  duration: 2500,
  reset: true
})

sr.reveal('.home-text',{delay:200, origin:'left'});
sr.reveal('.home',{delay:200, origin:'top'});

sr.reveal('.featured, .cta, .new-arrivals, .brand-content',
{delay:200, origin:'bottom'});