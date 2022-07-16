import { api_key, base_url, data_type } from "../config/config.js";
import { renderAppBanner } from "../utils/render.js";

const appBanner = document.querySelector(".app-banner");

const url = `${base_url}/movie/${data_type.POPULAR}?api_key=${api_key}&language=vi&page=1`;

async function Main() {
  await renderAppBanner(url, appBanner);
  $(document).ready(function () {
    $(".app-banner").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      fade: true,
      arrows: false,
      cssEase: "linear",
    });
  });
}
Main();
