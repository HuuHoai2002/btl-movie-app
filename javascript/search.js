import { api_key, base_url } from "../config/config.js";
import { renderListMovie } from "../utils/render.js";
import { $ } from "../utils/selector.js";
import { setTitle } from "../utils/setTitle.js";

const movie_list = $(".movie-list");
const params = new URLSearchParams(window.location.search);

const query = params.get("query");

const search_url = `${base_url}/search/multi?api_key=${api_key}&language=vi&query=${query}`;

async function Main() {
  await renderListMovie(search_url, movie_list);
  setTitle(`Kết quả tìm kiếm: ${query}`);
}
Main();
