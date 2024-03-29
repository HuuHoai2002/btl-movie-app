import { api_key, base_url } from "../config/config.js";
import { params } from "../utils/getParams.js";
import { renderListMovie, renderMovieDetails } from "../utils/render.js";
import { $ } from "../utils/selector.js";

const movie_details = $(".app-movie-details");
const movie_similar = $(".movie-list");

const type = params.get("type");
const id = params.get("id");

const details_url = `${base_url}/${type}/${id}?api_key=${api_key}&language=vi`;
const similar_url = `${base_url}/${type}/${id}/similar?api_key=${api_key}&language=vi`;

async function Main() {
  if (type !== "movie" && type !== "tv") {
    movie_details.innerHTML =
      "<h1 style='padding: 12px 0; color: var(--red); font-size: 20px'>type chỉ có thể là movie hoặc tv</h1>";
  } else {
    await renderMovieDetails(details_url, movie_details);
    await renderListMovie(similar_url, movie_similar);
  }
}

Main();
