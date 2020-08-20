var file = document.querySelectorAll("input[type=file]")[0];
var file1 = document.querySelectorAll("input[type=file]")[1];
var output = document.getElementById("output1");
const form = document.querySelector("form");

let imgOprava = "";
let imgRecept = "";
output1.src = "https://www.optica.kh.ua/image/data/recept.png";
file.addEventListener("change", function (event) {
  var input = event.target;

  var reader = new FileReader();
  reader.onload = function () {
    var dataURL = reader.result;
    var output = document.getElementById("output");
    output.setAttribute("height", "100");
    imgOprava = dataURL;
    output.src = dataURL;
  };
  reader.readAsDataURL(input.files[0]);
});
file1.addEventListener("change", function (event) {
  var input = event.target;
  console.log(input);
  var reader = new FileReader();
  reader.onload = function () {
    var dataURL = reader.result;
    var output = document.getElementById("output1");
    output.setAttribute("height", "100");
    document.querySelector(".example").textContent = "Ваш рецепт";
    imgRecept = dataURL;
    output.src = dataURL;
    console.log(input.file);
  };
  reader.readAsDataURL(input.files[0]);
});

form.addEventListener("submit", function (e) {
  e.preventDefault();
  let order = new FormData(form);
  order.append("oprava", file.files[0]);
  order.append("recept", file1.files[0]);
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {
      if (request.responseText == "good") {
        document.querySelector(".form-order").style.display = "none";
        document.querySelector(".goodOrder").style.visibility = "visible";
      }
    }
  };
  request.open("POST", "./assets/php/query.php");
  request.send(order);
});
