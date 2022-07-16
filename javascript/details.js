import { api_key, base_url } from "../config/config.js";
import { renderMovieDetails } from "../utils/render.js";
import { $ } from "../utils/selector.js";

const movie_details = $(".app-movie-details");
const params = new URLSearchParams(window.location.search);

const id = params.get("id");

const details_url = `${base_url}/movie/${id}?api_key=${api_key}&language=vi`;

async function Main() {
  await renderMovieDetails(details_url, movie_details);
}
Main();
