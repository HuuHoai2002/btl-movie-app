import { $, $$ } from "../utils/selector.js";

const listItem = $$(".dashboard-item");

const listTable = $$(".table");

listItem.forEach(function (item, index) {
  item.addEventListener("click", function () {
    $(".dashboard-item.active").classList.remove("active");
    this.classList.add("active");
    $(".table.active").classList.remove("active");
    listTable[index].classList.add("active");
  });
});
