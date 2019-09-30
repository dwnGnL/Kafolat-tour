function scrolling() {
  let scroller = document.body.scrollTop || window.pageYOffset;
  let time = setInterval(function () {
    if(scroller > 0) {
      window.scroll(0, scroller -= 25);
    } else {
      clearInterval(time);
    };
  }, 1);
};
