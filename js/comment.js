let dotsItem = document.querySelectorAll('.dots-item');
let responseItme = document.querySelectorAll('.response-item');
let previousComment = 0;
let nextComment = 0;

dotsItem.forEach(function (elem, index) {
  elem.onclick = function () {
    previousComment = nextComment;
    nextComment = index;

    responseItme[previousComment].style.display = 'none';
    dotsItem[previousComment].style.border = '2px solid #ffffff';

    responseItme[nextComment].style.display = 'block';
    dotsItem[nextComment].style.border = '2px solid #000000';
  };
});
