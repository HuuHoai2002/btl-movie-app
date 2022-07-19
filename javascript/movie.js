import { api_key, base_url, data_type } from "../config/config.js";
import { params } from "../utils/getParams.js";
import { renderListMovie } from "../utils/render.js";
import { $ } from "../utils/selector.js";
import { setTitle } from "../utils/setTitle.js";

const movie_list = $(".movie-list");

const page = params.get("page") || 1;

const popular_url = `${base_url}/movie/${data_type.POPULAR}?api_key=${api_key}&language=vi&page=${page}`;

async function Main() {
  await renderListMovie(popular_url, movie_list);
  setTitle(`Phim chiếu rạp | trang ${page}`);
}
Main();
