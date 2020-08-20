const cards = document.querySelectorAll(".card");
const modal = document.querySelector(".modal");
const modalIMG = document.querySelector(".modalIMG");
for (let i = 0; i < cards.length; i++) {
  cards[i].addEventListener("click", function (e) {
    if (event.target.tagName !== "IMG") {
      return;
    }
    modal.style.display = "block";
    modalIMG.src = event.target.src;
  });
}

modal.addEventListener("click", function () {
  modal.style.display = "none";
});
