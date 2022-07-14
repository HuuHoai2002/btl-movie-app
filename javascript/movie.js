import { api_key, base_url, data_type } from "../config/config.js";
import { renderListMovie } from "../utils/render.js";
import { $ } from "../utils/selector.js";

const movie_list = $(".movie-list");
const params = new URLSearchParams(window.location.search);

const page = params.get("page");

const popular_url = `${base_url}/movie/${data_type.POPULAR}?api_key=${api_key}&language=vi&page=${page}`;

async function Main() {
  await renderListMovie(popular_url, movie_list);
}
Main();
