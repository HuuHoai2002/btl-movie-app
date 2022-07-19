import { api_key, base_url } from "../config/config.js";
import { params } from "../utils/getParams.js";
import { renderListMovie } from "../utils/render.js";
import { $ } from "../utils/selector.js";
import { setTitle } from "../utils/setTitle.js";

const movie_list = $(".movie-list");

const keyword = params.get("keyword");

const search_url = `${base_url}/search/multi?api_key=${api_key}&language=vi&query=${keyword}`;

async function Main() {
  if (keyword) {
    await renderListMovie(search_url, movie_list);
    setTitle(`Kết quả tìm kiếm cho: ${keyword}`);
  }
}
Main();
